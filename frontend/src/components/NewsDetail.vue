<template>
    <div>
        <img
            :src="`http://192.168.101.44:5000/storage/news/${news.main_pic}`"
            alt=""
            class="w-100 img-fluid"
            style="height: 100dvh"
        />
        <div class="container-fluid p-5 bg-dark text-white text-left">
            <div class="row justify-content-center">
                <div class="col-6 fs-5">
                    <h3 class="h3 text-left">News</h3>
                    <p class="display-5 fw-medium">{{ news.headline_news }}</p>
                    <h3 class="h3 text-left"></h3>
                    <p class="pt-5">
                        {{ news.article_news }}
                    </p>
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

const id = window.location.pathname.substring(13);
const urldetail = "http://192.168.101.44:5000/api/detailnews/" + id;

const getdetailnews = async () => {
    const response = await axios.get(urldetail);
    news.value = response.data.data;
};

onMounted(() => {
    getdetailnews();
});
</script>

<style lang="scss" scoped></style>
