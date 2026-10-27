<template>
    <section class="page-work">
        <header class="work-hero">
            <div class="work-hero-top">
                <p class="eyebrow">Matra Studio · Selected work</p>
                <span>Portfolio / {{ String(allProjects.length).padStart(2, "0") }} projects</span>
            </div>
            <div class="work-hero-main">
                <h1>Work shaped<br /><em>by place.</em></h1>
                <div class="work-hero-copy">
                    <p>Ideas grounded in context. Explore spaces and systems designed with care for people, culture, and the environment.</p>
                    <a href="#project-list" class="work-explore-link">Explore selected work <span aria-hidden="true">↓</span></a>
                </div>
            </div>
            <div class="work-hero-bottom"><span>Architecture</span><i></i><span>Sustainability</span><i></i><span>Installation</span></div>
        </header>

        <div id="project-list" class="work-filter-bar">
            <span class="work-filter-label">Explore by discipline</span>
            <div class="work-filters" aria-label="Filter projects">
            <button v-for="category in categories" :key="category.value" type="button" class="work-filter" :class="{ 'is-active': activeCategory === category.value }" @click="chooseCategory(category.value)">
                {{ category.label }} <span>{{ category.count }}</span>
            </button>
            </div>
        </div>

        <p v-if="loading" class="work-status" role="status">Loading selected projects…</p>
        <div v-else-if="feature.length" class="work-grid">
            <a v-for="(project, index) in feature" :key="project.id" :href="`/work/detail/${projectSlug(project.project_name)}`" class="work-card" :class="{ 'is-featured': activeCategory === 'all' && index === 0 }">
                <div class="work-card-image">
                    <img :src="`${baseURL}/storage/projectpicture/${project.grid_pic || project.main_pic}`" :alt="project.project_name" :loading="index < 2 ? 'eager' : 'lazy'" />
                    <span class="work-card-category">{{ project.type_project || "Project" }}</span>
                    <span class="work-card-arrow" aria-hidden="true">↗</span>
                </div>
                <div class="work-card-copy">
                    <div><span class="work-card-index">{{ String(index + 1).padStart(2, "0") }} / {{ String(feature.length).padStart(2, "0") }}</span><h2>{{ project.project_name }}</h2></div>
                    <span class="work-card-meta">{{ [project.location, project.year].filter(Boolean).join(" · ") }}</span>
                </div>
            </a>
        </div>
        <div v-else class="work-empty">
            <h2>No projects in this category yet.</h2>
            <button type="button" class="work-filter is-active" @click="chooseCategory('all')">View all projects</button>
        </div>
    </section>
</template>

<script setup>
import axios from "axios";
import { computed, onMounted, ref } from "vue";
import { projectSlug } from "../utils/projectSlug";

const allProjects = ref([]);
const loading = ref(true);
const activeCategory = ref("all");
const baseURL = axios.defaults.baseURL;
const categories = computed(() => [
    { label: "All work", value: "all", count: allProjects.value.length },
    ...["Architecture", "Sustainability", "Installation"].map((value) => ({
        label: value,
        value,
        count: allProjects.value.filter((project) => project.type_project === value).length,
    })),
]);
const feature = computed(() => activeCategory.value === "all"
    ? allProjects.value
    : allProjects.value.filter((project) => project.type_project === activeCategory.value));

const loadProjects = async () => {
    loading.value = true;
    try {
        const response = await axios.get(`${baseURL}/api/client`);
        allProjects.value = response.data.data || [];
    } catch (error) {
        allProjects.value = [];
        console.error("Unable to load projects", error);
    } finally {
        loading.value = false;
    }
};

const chooseCategory = (category) => { activeCategory.value = category; };
onMounted(() => loadProjects());
</script>
