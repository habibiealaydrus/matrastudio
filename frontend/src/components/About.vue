<template>
    <div class="text-center bg-white container-fluid" style="z-index: -100">
        <h1 class="h1 text-uppercase pt-5">About</h1>
        <div class="container">
            <p class="pt-2 px-5 text-center fs-4">
                "We are a collective of interdisciplinary young designers who
                believe that design is a medium for connecting people, cultures,
                and nature. We create sustainable and inspiring architecture,
                exploring possibilities while valuing practicality. For us,
                architecture is not just about physical structures; it’s about
                creating spaces for human life and shaping social constructs. We
                believe that by designing better architecture, we can help
                create more livable and sustainable cities for people."
            </p>
        </div>

        <div class="my-5 container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <img
                        src="../assets/img/profile/Rizkikay.jpeg"
                        class="px-5 img-fluid"
                        alt=""
                    />
                    <p class="fs-4 mb-0 pb-0">Ar. Rizki T. Siregar, M.T, GP</p>
                    <span class="fs-4 mt-0 pt-0">Co-founder/CEO</span>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img
                        src="../assets/img/profile/yasser.jpeg"
                        class="px-5 img-fluid"
                        alt=""
                    />
                    <p class="fs-4 mb-0 pb-0">
                        Ar. Yasser Hafizs,S.T , M.T, GP
                    </p>
                    <span class="fs-4 mt-0 pt-0"
                        >Co-founder/Design Director</span
                    >
                </div>
            </div>
        </div>
        <div class="my-5 container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <img
                        src="../assets/img/profile/Aurora.jpg"
                        class="px-5 img-fluid"
                        alt=""
                    />
                    <p class="fs-4 mb-0 pb-0">Aurora F. Dahniar, S.E</p>
                    <span class="fs-4 mt-0 pt-0">Finance Administrator</span>
                </div>
                <div class="col-md-4 col-sm-12">
                    <img
                        src="../assets/img/profile/Erika.jpg"
                        class="px-5 img-fluid"
                        alt=""
                    />
                    <p class="fs-4 mb-0 pb-0">Erika Angelina, S.Ar</p>
                    <span class="fs-4 mt-0 pt-0"
                        >Sustainability Specialist</span
                    >
                </div>
                <div class="col-md-4 col-sm-12">
                    <img
                        src="../assets/img/profile/Jonathan.jpg"
                        class="px-5 img-fluid"
                        alt=""
                    />
                    <p class="fs-4 mb-0 pb-0">Jonathan A. Danilo, S.Ar</p>
                    <span class="fs-4 mt-0 pt-0">Architectural Designer</span>
                </div>
            </div>
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
                        :src="
                            baseURL +
                            `/public/storage/projectclients/${logo.projectclient_img}`
                        "
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

const urllogoclient = baseURL + "/public/api/allimageclient";
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
