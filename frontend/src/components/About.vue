<template>
    <div class="text-center bg-white container-fluid" style="z-index: -100">
        <h1 class="h1 text-uppercase pt-5">About</h1>
        <div class="container">
            <p class="pt-2 px-20 text-center fs-3">
                "We are a collective of interdisciplinary young designers who
                believe that design is a medium for connecting people. cultures,
                and nature. We create sustainable and inspiring architecture,
                exploring possibilities while valuing practicality. For us,
                architecture is not just about physical structures, it's about
                creating spaces for human life and shaping social constructs. We
                believe that by designing better architecture, we can help
                create more livable and sustainable cities for people
            </p>
        </div>

        <div class="profile my-5 row justify-content-center">
            <img
                src="../assets/img/foto crew matra.png"
                class="px-5 col-md-9"
                alt=""
            />
        </div>

        <div class="pb-5">
            <h5 class="h5 fst-italic pb-5">PEOPLE WE’VE WORKED WITH</h5>
            <div
                class="d-flex justify-content-center gap-5 flex-wrap container"
            >
                <div
                    class="logoclient d-flex align-items-center"
                    v-for="logo in logoclients"
                >
                    <img
                        alt=""
                        class="img-fluid"
                        :src="`https://mantra.matrastudio.com/storage/app/public/projectclients/${logo.projectclient_img}`"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const baseURL = axios.defaults.baseURL;

const urllogoclient = baseURL + "/api/allimageclient";
const logoclients = ref([]);

const getlogoclient = async () => {
    try {
        const response = await axios.get(urllogoclient);
        logoclients.value = response.data.data;
    } catch (error) {}
};
onMounted(() => {
    getlogoclient();
});
</script>

<style lang="scss" scoped></style>
