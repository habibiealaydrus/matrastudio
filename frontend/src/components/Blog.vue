<template>
    <div class="container-fluid">
        <div class="row bg-white">
            <div class="col-md-4" v-for="blog in blogs">
                <div class="news px-5">
                    <a
                        :href="`/blog/detail/${blog.id}`"
                        class="link-offset-2 link-underline link-underline-opacity-0"
                        style="color: black"
                    >
                        <img
                            :src="baseURL + `/storage/blog/${blog.main_img}`"
                            alt=""
                            class="img-fluid"
                        />
                        <h1>{{ blog.title_blog }}</h1>

                        <div v-html="blog.article_blog.substr(0, 150)"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const blogs = ref([]);
const baseURL = axios.defaults.baseURL;
const urlblog = baseURL + "/api/allblog";

const getblogs = async () => {
    try {
        const response = await axios.get(urlblog);
        console.log(response.data.data);
        blogs.value = response.data.data;
    } catch (error) {}
};

onMounted(() => {
    getblogs();
});
</script>

<style lang="scss" scoped></style>
