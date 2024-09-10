<template>
    <div>
        <img
            :src="`http://127.0.0.1:8000/storage/projectpicture/${detailproject.main_pic}`"
            alt=""
            class="w-100 img-fluid"
        />
        <div class="container text-center">
            <div class="row">
                <div class="col-12 text-center p-5">
                    <h1 class="h1 fw-bold">{{ detailproject.project_name }}</h1>
                    <p class="fs-4 fw-semibold">
                        {{ detailproject.name_client }}
                    </p>
                    <p class="fs-4">
                        {{ detailproject.article }}
                    </p>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-6">
                    <img
                        :src="`http://127.0.0.1:8000/storage/projectpicture/${detailproject.pic1}`"
                        alt=""
                        class="w-100 img-fluid"
                    />
                </div>
                <div class="col-6">
                    <img
                        :src="`http://127.0.0.1:8000/storage/projectpicture/${detailproject.pic2}`"
                        class="w-100 img-fluid"
                        alt=""
                    />
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-6">
                    <img
                        :src="`http://127.0.0.1:8000/storage/projectpicture/${detailproject.pic3}`"
                        alt=""
                        class="w-100 img-fluid"
                    />
                </div>
                <div class="col-6">
                    <img
                        :src="`http://127.0.0.1:8000/storage/projectpicture/${detailproject.pic4}`"
                        class="w-100 img-fluid"
                        alt=""
                    />
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-6">
                    <img
                        :src="`http://127.0.0.1:8000/storage/projectpicture/${detailproject.pic5}`"
                        alt=""
                        class="w-100 img-fluid"
                    />
                </div>
                <div class="col-6">
                    <img
                        :src="`http://127.0.0.1:8000/storage/projectpicture/${detailproject.pic6}`"
                        class="w-100 img-fluid"
                        alt=""
                    />
                </div>
            </div>
            <h2 class="h2 nav-link pb-5">
                <router-link class="nav-link" to="/work">
                    BACK TO PROJECTS
                </router-link>
            </h2>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const id = window.location.pathname.substring(13);
const detailproject = ref([]);

const urlimage = "http://127.0.0.1:8000/storage/projectpicture/";
const urldetail = "http://127.0.0.1:8000/api/clientdetail/" + id;

const getdetailproject = async () => {
    try {
        const response = await axios.get(urldetail);
        console.log(urldetail);
        detailproject.value = response.data.data;
        console.log(detailproject);
    } catch (error) {}
};

onMounted(() => {
    getdetailproject();
});
</script>

<style lang="scss" scoped></style>
