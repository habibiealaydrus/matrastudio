<template>
    <div class="bodynews">
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
                            class="d-flex justify-content-center p-5 headernews"
                            style="height: 300px"
                            id="headernews"
                        >
                            <img
                                :src="`http://127.0.0.1:8000/storage/news/logo_news/${item.logo_news}`"
                                alt=""
                                class="w-100 p-5"
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
const urlnews = "http://127.0.0.1:8000/api/newsall";

const getnews = async () => {
    try {
        const response = await axios.get(urlnews);
        console.log(news.data);
        news.value = response.data.data;
    } catch (error) {}
};
onMounted(() => {
    getnews();
});
</script>

<style lang="scss" scoped></style>
