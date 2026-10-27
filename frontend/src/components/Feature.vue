<template>
    <section id="featured-projects" class="section-pad feature-section">
        <header class="section-heading">
            <p class="eyebrow">A few things we’ve made</p>
            <h2>Selected projects</h2>
            <p>Thoughtful responses to the people, context, and possibilities of each place.</p>
        </header>
        <div class="featured-grid">
            <a v-for="project in feature" :key="project.id" :href="`/work/detail/${projectSlug(project.project_name)}`" class="featured-card">
                <img :src="`${baseURL}/storage/projectpicture/${project.main_pic || project.grid_pic}`" :alt="project.project_name" loading="lazy" />
                <div class="featured-card-copy"><span>Featured project</span><h3>{{ project.project_name }}</h3></div>
            </a>
        </div>
        <div class="text-center mt-4"><RouterLink class="button-primary" to="/work">View all work <span aria-hidden="true">↗</span></RouterLink></div>
    </section>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { projectSlug } from "../utils/projectSlug";

const feature = ref([]);
const baseURL = axios.defaults.baseURL;
const urlfeature = baseURL + "/api/limitedclient";
const url = window.location.href;

const getfeatureproject = async () => {
    try {
        const response = await axios.get(urlfeature);

        feature.value = response.data.data;
    } catch (error) {}
};
onMounted(() => {
    getfeatureproject();
});
</script>

<style lang="scss" scoped></style>
