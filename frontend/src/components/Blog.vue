<template>
    <section class="listing-page">
        <header class="listing-heading"><p class="eyebrow">Notes from the studio</p><h1>Stories & ideas</h1><p>Perspectives on the places we make and the questions that shape them.</p></header>
        <div class="listing-grid">
            <article v-for="blog in blogs" :key="blog.id" class="editorial-card">
                <a :href="`/blog/detail/${projectSlug(blog.title_blog)}`">
                    <img :src="`${baseURL}/storage/blog/${blog.main_img}`" :alt="blog.title_blog" loading="lazy" />
                    <div class="editorial-card-copy"><time>{{ blog.created_at?.slice(0, 10) }}</time><h2>{{ blog.title_blog }}</h2><p v-html="excerpt(blog.article_blog)"></p></div>
                </a>
            </article>
        </div>
        <p v-if="!blogs.length" class="text-center text-secondary">Stories will appear here soon.</p>
    </section>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import { projectSlug } from "../utils/projectSlug";

const blogs = ref([]);
const baseURL = axios.defaults.baseURL;
const urlblog = baseURL + "/api/allblog";

const excerpt = (html = "") => String(html).replace(/<[^>]*>/g, " ").replace(/\s+/g, " ").trim().slice(0, 180) + "…";

const getblogs = async () => {
    try {
        const response = await axios.get(urlblog);
        console.log(response.data.data);
        blogs.value = response.data.data;
    } catch (error) {}
};

onMounted(() => {
    getblogs();
});
</script>

<style lang="scss" scoped></style>
