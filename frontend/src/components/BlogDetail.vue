<template>
    <div>
        <div class="container-fluid p-0 bg-white">
            <img
            :src="baseURL + `/public/storage/blog/${blog.main_img}`"
            class="rounded mx-auto d-block"
        />
            <div class="row justify-content-center">
                <div class="col-6 fs-5">
                    <h3 class="h3">Blog</h3>
                    <p class="display-5 fw-medium">{{ blog.title_blog }}</p>
                    <!-- Render the blog article safely -->
                    <div v-html="blog.article_blog"></div>
                </div>
            </div>
            <div class="container pb-3">
                <div class="row">
                    <div class="col-md-6">
                        <img
                            :src="baseURL + `/storage/blog/${blog.pic1}`"
                            class="w-100"
                            alt=""
                        />
                    </div>
                    <div class="col-md-6">
                        <img
                            :src="baseURL + `/storage/blog/${blog.pic2}`"
                            alt=""
                            class="w-100"
                        />
                    </div>
                    <a href="/blogs" class="nav-link pt-5">
                        <font-awesome-icon :icon="['fas', 'arrow-left']" /> Back
                        to blog
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import { Quill } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";

const blog = ref({});
const baseURL = axios.defaults.baseURL;
const id = window.location.pathname.split("/").pop(); // Get the last segment of the URL

const getDetailBlog = async () => {
    try {
        const response = await axios.get(`${baseURL}/public/api/detailblog/${id}`);
        blog.value = response.data.data;
    } catch (error) {
        console.error("Error fetching blog details:", error);
        // Handle the error (e.g., show an error message)
    }
};

onMounted(() => {
    getDetailBlog();
});
</script>

<style>
@import url("https://cdn.quilljs.com/1.3.6/quill.snow.css");
</style>
