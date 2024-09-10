<template>
    <div class="container-fluid pb-3">
        <div class="row px-3">
            <div class="d-flex flex-row justitfy-content-center gap-1">
                <div @click="getfeatureproject()" class="btn fs-3">All</div>
                <div @click="filter('Arsitektur')" class="btn fs-3">
                    Arsitektur
                </div>
                <div @click="filter('Green building')" class="btn fs-3">
                    Green Building
                </div>
            </div>
            <TransitionGroup name="slide" tag="a" class="d-flex flex-wrap">
                <a
                    :href="`/work/detail/${project.id}`"
                    v-for="project in feature"
                    class="col-md-4 project px-2 pt-3"
                    :key="project"
                >
                    <img
                        class="p-2"
                        style="width: 100%; height: 300px"
                        :src="`http://127.0.0.1:8000/storage/projectpicture/${project.main_pic}`"
                        alt=""
                    />
                    <div class="overlay">
                        <div class="text text-uppercase">
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

const urlfeature = "http://127.0.0.1:8000/api/client";

const getfeatureproject = async (e) => {
    try {
        const response = await axios.get(urlfeature);
        feature.value = response.data.data;
    } catch (error) {}
};
const filter = async (e) => {
    const type = e;
    const urlfilter = "http://127.0.0.1:8000/api/filterclient/" + type;
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
