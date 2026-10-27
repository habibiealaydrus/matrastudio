<template>
    <main class="project-detail-page">
        <p v-if="loading" class="project-detail-state" role="status">Loading project…</p>
        <section v-else-if="!project" class="project-detail-state">
            <p class="eyebrow">Project not found</p>
            <h1>We couldn’t find that project.</h1>
            <RouterLink class="button-primary" to="/work">Back to projects <span aria-hidden="true">↗</span></RouterLink>
        </section>

        <template v-else>
            <header class="project-detail-hero">
                <img class="project-detail-cover" :src="imageUrl(project.main_pic || project.grid_pic)" :alt="project.project_name" />
                <div class="project-detail-shade"></div>
                <div class="project-detail-hero-content">
                    <RouterLink class="project-back-link" to="/work"><span aria-hidden="true">←</span> All projects</RouterLink>
                    <p class="project-detail-kicker">{{ project.type_project || "Selected work" }}<span v-if="project.year"> · {{ project.year }}</span></p>
                    <h1>{{ project.project_name }}</h1>
                    <p v-if="project.location" class="project-detail-location"><span aria-hidden="true">⌖</span> {{ project.location }}</p>
                </div>
                <span class="project-detail-index">MATRA STUDIO · PROJECT</span>
            </header>

            <section class="project-detail-overview">
                <div class="project-detail-story">
                    <p class="eyebrow">Project overview</p>
                    <div class="project-detail-article" v-html="project.article || '<p>More about this project coming soon.</p>'"></div>
                </div>
                <aside class="project-detail-facts" aria-label="Project information">
                    <p class="eyebrow">At a glance</p>
                    <dl>
                        <div v-for="fact in facts" :key="fact.label" class="project-detail-fact">
                            <dt>{{ fact.label }}</dt>
                            <dd>{{ fact.value }}</dd>
                        </div>
                    </dl>
                </aside>
            </section>

            <section v-if="impactFacts.length" class="project-detail-impact">
                <header>
                    <p class="eyebrow">Measured impact</p>
                    <h2>Better by design.</h2>
                </header>
                <div class="project-impact-grid">
                    <article v-for="impact in impactFacts" :key="impact.label" class="project-impact-card">
                        <span class="project-impact-value">{{ Number(impact.value).toLocaleString("en-US") }}</span>
                        <span class="project-impact-unit">{{ impact.unit }}</span>
                        <span class="project-impact-label">{{ impact.label }}</span>
                    </article>
                </div>
            </section>

            <section v-if="gallery.length" class="project-detail-gallery">
                <header class="project-gallery-heading">
                    <div><p class="eyebrow">In focus</p><h2>Project gallery</h2></div>
                    <span>{{ String(gallery.length).padStart(2, "0") }} images</span>
                </header>
                <div class="project-gallery-grid">
                    <figure v-for="(image, index) in gallery" :key="image.src" class="project-gallery-item" :class="{ 'is-wide': index === 0 || index === 3 }">
                        <img :src="imageUrl(image.src)" :alt="image.caption || `${project.project_name} view ${index + 1}`" loading="lazy" />
                        <figcaption v-if="image.caption">{{ image.caption }}</figcaption>
                    </figure>
                </div>
            </section>

            <section v-if="teamFacts.length" class="project-detail-team">
                <div><p class="eyebrow">People & partners</p><h2>Made together.</h2></div>
                <dl class="project-team-list">
                    <div v-for="fact in teamFacts" :key="fact.label">
                        <dt>{{ fact.label }}</dt><dd v-html="fact.value"></dd>
                    </div>
                </dl>
            </section>

            <footer class="project-detail-footer">
                <RouterLink class="project-back-link project-back-link-dark" to="/work"><span aria-hidden="true">←</span> Back to all projects</RouterLink>
                <RouterLink class="button-primary" to="/contact">Start a project <span aria-hidden="true">↗</span></RouterLink>
            </footer>
        </template>
    </main>
</template>

<script setup>
import axios from "axios";
import { computed, ref, watch } from "vue";
import { useRoute, RouterLink } from "vue-router";
import { projectSlug } from "../utils/projectSlug";

const route = useRoute();
const baseURL = axios.defaults.baseURL;
const project = ref(null);
const loading = ref(true);

const teamFields = [
    ["Architecture team", "team_arsitektur"], ["Basic design", "basic_design"],
    ["Main contractor", "main_contractor"], ["Architect & build", "architecht_build"],
    ["Architect", "architecht"], ["Sustainability team", "sustainability_team"],
    ["Structure", "struktur"], ["MEP", "mep"], ["QS", "qs"],
    ["Design team", "design_team"], ["Collaborators", "collaborators"],
    ["Fabrication team", "fabrication_team"], ["Publication", "publication"],
];

const facts = computed(() => {
    if (!project.value) return [];
    return [["Client", project.value.name_client], ["Location", project.value.location], ["Year", project.value.year], ["Status", project.value.status]]
        .filter(([, value]) => value)
        .map(([label, value]) => ({ label, value }));
});

const teamFacts = computed(() => teamFields
    .filter(([, key]) => project.value?.[key])
    .map(([label, key]) => ({ label, value: project.value[key] })));

const impactFacts = computed(() => {
    if (!project.value) return [];
    return [
        { value: project.value.energy_savings, unit: "kWh / year", label: "Energy savings" },
        { value: project.value.carbon_reduction, unit: "tCO₂e / year", label: "Carbon reduction" },
        { value: project.value.water_savings, unit: "litres / year", label: "Water savings" },
        { value: project.value.embodied_energy, unit: "GJ", label: "Embodied energy" },
    ].filter(({ value }) => Number(value) > 0);
});

const gallery = computed(() => {
    if (!project.value) return [];
    return Array.from({ length: 7 }, (_, index) => {
        const number = index + 1;
        return { src: project.value[`pic${number}`], caption: project.value[`name_pic${number}`] };
    }).filter(({ src }) => Boolean(src));
});

const imageUrl = (filename) => `${baseURL}/storage/projectpicture/${encodeURIComponent(filename || "")}`;

const loadProject = async (slug) => {
    loading.value = true;
    project.value = null;
    try {
        if (/^\d+$/.test(slug)) {
            const response = await axios.get(`${baseURL}/api/clientdetail/${encodeURIComponent(slug)}`);
            project.value = response.data.data || null;
        } else {
            const response = await axios.get(`${baseURL}/api/client`);
            const projects = response.data.data || [];
            project.value = projects.find((item) => projectSlug(item.project_name) === projectSlug(slug)) || null;
        }
    } catch (error) {
        console.error("Unable to load project detail", error);
    } finally {
        loading.value = false;
    }
};

watch(() => route.params.slug, (slug) => {
    if (slug) loadProject(String(slug));
}, { immediate: true });
</script>
