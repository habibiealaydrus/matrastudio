<template>
    <div class="container-fluid pb-3 bg-white">
        <div class="px-3">
            <p
                class="text-uppercase fs-1 fw-bold my-0 py-0"
                @click="getfeatureproject()"
            >
                Projects
            </p>
            <div class="d-flex flex-row my-0 py-0 ms-1">
                <div
                    @click="filter('Architecture')"
                    class="text-uppercase fs-3 me-5"
                >
                    Architecture
                </div>

                <div
                    @click="filter('Sustainability')"
                    class="text-uppercase fs-3 me-5"
                >
                    Sustainability
                </div>
                <div
                    @click="filter('Installation')"
                    class="text-uppercase fs-3 me-5"
                >
                    Instalation
                </div>
            </div>
            <TransitionGroup name="slide" tag="a" class="row">
                <a
                    :href="`/work/detail/${project.id}`"
                    v-for="project in feature"
                    class="col-md-4 project px-2 pt-0"
                    :key="project"
                >
                    <img
                        class="p-2 w-100 h-100"
                        :src="`https://mantra.matrastudio.com/storage/app/public/projectpicture/${project.main_pic}`"
                        alt=""
                    />
                    <div class="overlay">
                        <div class="text text-uppercase fw-bold">
                            {{ project.project_name }}
                        </div>
                    </div>
                </a>
            </TransitionGroup>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const feature = ref([]);
const type = ref([]);

const baseURL = axios.defaults.baseURL;
const urlfeature = baseURL + "/api/client";

const getfeatureproject = async (e) => {
    try {
        const response = await axios.get(urlfeature);
        feature.value = response.data.data;
    } catch (error) {}
};
const filter = async (e) => {
    const type = e;
    const urlfilter = baseURL + "/api/filterclient/" + type;
    //console.log(urlfilter);
    const response = await axios.get(urlfilter);
    //console.log(response.data.data);
    feature.value = response.data.data;
};
onMounted(() => {
    getfeatureproject();
});
</script>

<style>
.slide-enter-from,
.slide-leave-to {
    opacity: 0;
    transform: translateX(100%);
}

.slide-move,
.slide-enter-active,
.slide-leave-active {
    transition: all 0.5s ease-out;
}
.slide-leave-active {
    position: absolute;
}
</style>
