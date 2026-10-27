<template>
    <main class="editorial-detail-page">
        <div v-if="loading" class="editorial-detail-state" role="status">Loading story…</div>
        <section v-else-if="!record" class="editorial-detail-state">
            <p class="eyebrow">{{ config.section }}</p>
            <h1>We couldn’t find this story.</h1>
            <RouterLink class="button-primary" :to="config.listPath">Back to {{ config.listLabel }} <span aria-hidden="true">↗</span></RouterLink>
        </section>

        <template v-else>
            <header class="editorial-detail-hero" :class="`is-${kind}`">
                <img class="editorial-detail-cover" :src="imageUrl(config.heroFolder, record[config.heroField])" :alt="record[config.titleField]" />
                <div class="editorial-detail-shade"></div>
                <div class="editorial-detail-hero-copy">
                    <RouterLink class="editorial-back-link" :to="config.listPath"><span aria-hidden="true">←</span> {{ config.listLabel }}</RouterLink>
                    <p class="eyebrow">{{ config.section }}<span v-if="publishedDate"> · {{ publishedDate }}</span></p>
                    <h1>{{ record[config.titleField] }}</h1>
                    <p v-if="kind === 'event' && record.location_event" class="editorial-event-location"><span aria-hidden="true">⌖</span> {{ record.location_event }}</p>
                </div>
                <span class="editorial-detail-index">MATRA STUDIO · {{ config.section.toUpperCase() }}</span>
            </header>

            <div class="editorial-detail-layout">
                <article class="editorial-detail-body" v-html="record[config.bodyField]"></article>
                <aside class="editorial-detail-aside">
                    <p class="eyebrow">{{ kind === 'event' ? 'Event details' : 'From the studio' }}</p>
                    <dl v-if="kind === 'event'" class="editorial-detail-facts">
                        <div v-if="record.date"><dt>Date</dt><dd>{{ eventDate }}</dd></div>
                        <div v-if="record.start_time"><dt>Time</dt><dd>{{ timeRange }}</dd></div>
                        <div v-if="record.location_event"><dt>Location</dt><dd>{{ record.location_event }}</dd></div>
                    </dl>
                    <p v-else class="editorial-aside-note">{{ kind === 'blog' ? 'Ideas, perspectives, and questions shaping the places we make.' : 'Updates, project milestones, and stories from our collaborators.' }}</p>
                    <a v-if="kind === 'news' && safeSourceUrl" class="editorial-source-link" :href="safeSourceUrl" target="_blank" rel="noopener noreferrer">Read the original story <span aria-hidden="true">↗</span></a>
                </aside>
            </div>

            <section v-if="gallery.length" class="editorial-detail-gallery" :aria-label="`${config.section} images`">
                <figure v-for="(image, index) in gallery" :key="image" :class="{ 'is-wide': index === 0 }">
                    <img :src="imageUrl(config.galleryFolder, image)" :alt="`${record[config.titleField]} image ${index + 1}`" loading="lazy" />
                </figure>
            </section>

            <footer class="editorial-detail-footer">
                <RouterLink class="editorial-back-link editorial-back-link-dark" :to="config.listPath"><span aria-hidden="true">←</span> Back to {{ config.listLabel }}</RouterLink>
                <RouterLink class="button-primary" to="/contact">Start a project <span aria-hidden="true">↗</span></RouterLink>
            </footer>
        </template>
    </main>
</template>

<script setup>
import axios from "axios";
import { computed, ref, watch } from "vue";
import { RouterLink, useRoute } from "vue-router";
import { projectSlug } from "../utils/projectSlug";

const props = defineProps({ kind: { type: String, required: true } });
const route = useRoute();
const baseURL = axios.defaults.baseURL;
const record = ref(null);
const loading = ref(true);

const configs = {
    news: { section: "News & press", listPath: "/news", listLabel: "News", listApi: "/api/newsall", detailApi: "/api/detailnews/", titleField: "headline_news", heroField: "main_pic", heroFolder: "news", bodyField: "article_news", galleryFolder: "news" },
    blog: { section: "Studio journal", listPath: "/blogs", listLabel: "Stories", listApi: "/api/allblog", detailApi: "/api/detailblog/", titleField: "title_blog", heroField: "main_img", heroFolder: "blog", bodyField: "article_blog", galleryFolder: "blog" },
    event: { section: "Matra events", listPath: "/events", listLabel: "Events", listApi: "/api/event", detailApi: "/api/detilevent/", titleField: "title_event", heroField: "pic_event", heroFolder: "event", bodyField: "article_event", galleryFolder: "event" },
};
const config = computed(() => configs[props.kind] || configs.news);
const publishedDate = computed(() => {
    const rawDate = props.kind === "event" ? record.value?.date : record.value?.created_at;
    if (!rawDate) return "";
    const date = new Date(rawDate);
    return Number.isNaN(date.valueOf()) ? "" : new Intl.DateTimeFormat("en", { day: "numeric", month: "long", year: "numeric" }).format(date);
});
const eventDate = computed(() => publishedDate.value);
const timeRange = computed(() => {
    const start = record.value?.start_time?.slice(0, 5);
    const end = record.value?.end_time?.slice(0, 5);
    return [start, end].filter(Boolean).join(" – ");
});
const gallery = computed(() => props.kind === "blog" && record.value
    ? [record.value.pic1, record.value.pic2, record.value.pic3, record.value.pic4].filter(Boolean)
    : []);
const safeSourceUrl = computed(() => {
    const value = record.value?.link_berita;
    if (!value) return "";
    try {
        const url = new URL(value.startsWith("http") ? value : `https://${value}`);
        return ["http:", "https:"].includes(url.protocol) ? url.href : "";
    } catch { return ""; }
});
const imageUrl = (folder, filename) => filename ? `${baseURL}/storage/${folder}/${encodeURIComponent(filename)}` : "";

const loadRecord = async (slug) => {
    loading.value = true;
    record.value = null;
    const page = config.value;
    try {
        if (/^\d+$/.test(slug)) {
            const response = await axios.get(`${baseURL}${page.detailApi}${encodeURIComponent(slug)}`);
            record.value = response.data.data || null;
        } else {
            const response = await axios.get(`${baseURL}${page.listApi}`);
            const rows = response.data.data || [];
            record.value = rows.find((item) => projectSlug(item[page.titleField]) === projectSlug(slug)) || null;
        }
    } catch (error) {
        console.error(`Unable to load ${props.kind} detail`, error);
    } finally {
        loading.value = false;
    }
};

watch([() => route.params.slug, () => props.kind], ([slug]) => {
    if (slug) loadRecord(String(slug));
}, { immediate: true });
</script>
