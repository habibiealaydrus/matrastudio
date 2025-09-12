<template>
    <div
        class="container-fluid bg-light bg-gradient justify-content-center text-center bg-white"
    >
        <h1 class="h1 text-center pt-3">FEATURE PROJECTS</h1>
        <div class="container-fluid">
            <div class="row px-5">
                <div
                    v-for="project in feature"
                    class="col-md-4 col-sm-12 mx-auto"
                >
                    <a
                        :href="url + `work/detail/${project.id}`"
                        class="nav-link d-flex flex-column"
                    >
                        <img
                            class="img-responsive ratio ratio-16x9"
                            style="min-height: 250px"
                            :src="
                                baseURL +
                                `/public/storage/projectpicture/${project.main_pic}`
                            "
                            alt="matrastudio"
                        />
                    </a>
                    <h3 class="text-center px-1">{{ project.project_name }}</h3>
                    <!-- <div
                        class="text-start"
                        v-html="project.article.substring(0, 120)"
                    ></div> -->
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
const urlfeature = baseURL + "/public/api/limitedclient";
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
