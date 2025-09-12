<template>
    <div>
        <div class="container-fluid p-1 bg-light">
            <img
            :src="baseURL + `/public/storage/news/${news.main_pic}`"
            alt=""
            class="rounded mx-auto d-block"
            />
            <div class="row justify-content-center">
                <div class="col-6 fs-5 text-black">
                    <h3 class="h3 text-left">News</h3>
                    <p class="display-5 fw-medium">{{ news.headline_news }}</p>
                    <div v-html="news.article_news"></div>
                    <a :href="`${news.link_berita}`" class="my-5">
                        <button class="btn btn-primary">Link Sumber</button>
                    </a>

                    <a href="/news" class="nav-link pt-5">
                        <font-awesome-icon :icon="['fas', 'arrow-left']" /> Back
                        to News</a
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const news = ref([]);
const baseURL = axios.defaults.baseURL;
const id = window.location.pathname.substring(13);
const urldetail = baseURL + "/public/api/detailnews/" + id;

const getdetailnews = async () => {
    const response = await axios.get(urldetail);
    news.value = response.data.data;
};

onMounted(() => {
    getdetailnews();
});
</script>

<style lang="scss" scoped></style>
