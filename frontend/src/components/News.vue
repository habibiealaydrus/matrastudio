<template>
    <section class="listing-page">
        <header class="listing-heading"><p class="eyebrow">Matra in the world</p><h1>News & press</h1><p>Studio updates, project milestones, and stories from our collaborators.</p></header>
        <div class="listing-grid">
            <article v-for="item in news" :key="item.id" class="editorial-card">
                <a :href="`/news/detail/${projectSlug(item.headline_news)}`">
                    <img :src="`${baseURL}/storage/news/${item.main_pic || item.logo_news}`" :alt="item.headline_news" loading="lazy" />
                    <div class="editorial-card-copy"><time>{{ item.created_at?.slice(0, 10) }}</time><h2>{{ item.headline_news }}</h2><p v-html="excerpt(item.article_news)"></p></div>
                </a>
            </article>
        </div>
        <p v-if="!news.length" class="text-center text-secondary">Studio updates will appear here soon.</p>
    </section>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import { projectSlug } from "../utils/projectSlug";

const news = ref([]);
const baseURL = axios.defaults.baseURL;
const urlnews = baseURL + "/api/newsall";

const excerpt = (html = "") => String(html).replace(/<[^>]*>/g, " ").replace(/\s+/g, " ").trim().slice(0, 180) + "…";

const getnews = async () => {
    try {
        const response = await axios.get(urlnews);

        news.value = response.data.data;
    } catch (error) {}
};
onMounted(() => {
    getnews();
});
</script>

<style lang="scss" scoped></style>
