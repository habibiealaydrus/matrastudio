<template>
    <div>
        <img
            :src="baseURL + `/storage/blog/${blog.main_img}`"
            alt=""
            class="w-100 img-fluid"
            style="height: 100dvh"
        />
        <div class="container-fluid p-5 bg-dark text-white text-left">
            <div class="row justify-content-center">
                <div class="col-6 fs-5">
                    <h3 class="h3 text-left">Blog</h3>
                    <p class="display-5 fw-medium">{{ blog.title_blog }}</p>
                    <h3 class="h3 text-left"></h3>
                    <p class="pt-5">
                        {{ blog.article_blog }}
                    </p>

                    <a href="/blogs" class="nav-link pt-5">
                        <font-awesome-icon :icon="['fas', 'arrow-left']" /> Back
                        to blog</a
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const blog = ref([]);
const baseURL = axios.defaults.baseURL;
const id = window.location.pathname.substring(13);
const urldetail = baseURL + "/api/detailblog/" + id;

const getdetailblog = async () => {
    const response = await axios.get(urldetail);

    blog.value = response.data.data;
};

onMounted(() => {
    getdetailblog();
});
</script>

<style lang="scss" scoped></style>
