<template>
    <Carousel :autoplay="2000" :wrap-around="true" class="bg-white">
        <slide v-for="project in projects" :key="project.id">
            <img
                class="p-2"
                style="width: 100%; max-height: 550px"
                :src="`http://127.0.0.1:8000/storage/projectpicture/${project.main_pic}`"
                alt=""
            />
        </slide>

        <template #addons>
            <pagination />
        </template>
    </Carousel>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

import { defineComponent } from "vue";
import { Carousel, Pagination, Slide } from "vue3-carousel";

import "vue3-carousel/dist/carousel.css";

defineComponent({
    name: "Autoplay",
    components: {
        Carousel,
        Slide,
        Pagination,
    },
});

const projects = ref([]);
const urlproject = "http://127.0.0.1:8000/api/client";

const getproject = async () => {
    try {
        const response = await axios.get(urlproject);

        projects.value = response.data.data;
    } catch (error) {}
};

onMounted(() => {
    getproject();
});
</script>

<style scoped></style>
