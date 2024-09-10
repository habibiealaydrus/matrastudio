<template>
    <div class="row px-4 py-2 justify-content-center">
        <div class="col-md-4" v-for="blog in blogs">
            <div class="news px-5">
                <a
                    :href="`/blog/detail/${blog.id}`"
                    class="link-offset-2 link-underline link-underline-opacity-0"
                    style="color: black"
                >
                    <img
                        :src="`http://127.0.0.1:8000/storage/blog/${blog.main_img}`"
                        alt=""
                        class="w-100"
                    />
                    <h1>{{ blog.title_blog }}</h1>
                    <p class="">{{ blog.article_blog.substr(0, 100) }}....</p>
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const blogs = ref([]);
const urlblog = "http://127.0.0.1:8000/api/allblog";

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
