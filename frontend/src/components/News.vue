<template>
    <div class="bg-light py-2">
        <div class="container-fluid">
            <div class="row d-flex flex-row justify-content-center">
                <div
                    class="col-md-4 px-1"
                    @mouseenter="hoverineffect"
                    @mouseout="hoveroutffect"
                    v-for="item in news"
                >
                    <a
                        :href="`/news/detail/${item.id}`"
                        style="text-decoration: none"
                    >
                        <div
                            class="d-flex justify-content-center headernews"
                            style="height: 300px"
                            id="headernews"
                        >
                            <img
                                :src="
                                    baseURL +
                                    `/public/storage/news/logo_news/${item.logo_news}`
                                "
                                alt=""
                                class="w-100"
                            />
                        </div>
                        <div class="newscontent" id="newscontent">
                            <p>{{ item.headline_news.substr(0, 150) }}....</p>
                            <p class="fs-5 fw-bold">
                                {{ item.created_at.substr(0, 10) }}
                            </p>
                        </div>
                    </a>
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
const urlnews = baseURL + "/public/api/newsall";

const getnews = async () => {
    try {
        const response = await axios.get(urlnews);

        news.value = response.data.data;
    } catch (error) {}
};
onMounted(() => {
    getnews();
});
</script>

<style lang="scss" scoped></style>
