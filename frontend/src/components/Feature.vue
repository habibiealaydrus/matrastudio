<template>
    <div
        class="container-fluid bg-light bg-gradient justify-content-center text-center bg-white"
    >
        <h1 class="h1 text-center pt-3">FEATURE PROJECTS</h1>
        <div class="container-fluid">
            <div class="row px-5">
                <div v-for="project in feature" class="col-md-4 mx-auto">
                    <a :href="`/work/detail/${project.id}`" class="nav-link">
                        <img
                            class="p-2"
                            style="width: 30vw; height: 20vw"
                            :src="
                                baseURL +
                                `/storage/projectpicture/${project.main_pic}`
                            "
                            alt=""
                        />
                    </a>
                    <h3 class="text-start px-1">{{ project.project_name }}</h3>
                    <p class="text-start px-1">
                        {{ project.article.substring(0, 100) }}...
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const feature = ref([]);
const baseURL = axios.defaults.baseURL;
const urlfeature = baseURL + "/api/limitedclient";

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
