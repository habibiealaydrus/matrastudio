<template>
    <div>
        <div class="card bg-info" style="width: 100%">
            <div class="card-header d-flex justify-content-between flex-wrap">
                <div
                    class="text-white fs-3 text-start"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsenews"
                >
                    News List
                </div>
                <button
                    type="button"
                    class="btn btn-success text-end"
                    data-bs-toggle="modal"
                    data-bs-target="#NewsAddModal"
                >
                    Tambah
                </button>
            </div>
            <FormAddNews />
            <div class="collapse table-responsive" id="collapsenews">
                <table class="table border table-bordered rounded-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Headline</th>
                            <th scope="col">Pic</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(itemsnews, index) in news">
                            <th scope="row">{{ index + 1 }}</th>
                            <td>{{ itemsnews.headline_news }}</td>
                            <td>
                                <img
                                    :src="`http://127.0.0.1:8000/storage/news/${itemsnews.main_pic}`"
                                    alt=""
                                    class="img-fluid"
                                />
                            </td>
                            <td
                                class="d-flex flex-column gap-3 align-items-center"
                            >
                                <button
                                    class="btn btn-primary"
                                    @click="getIdNews(itemsnews.id)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#newsDetailModal"
                                >
                                    Preview
                                </button>
                                <button class="btn btn-warning" disabled>
                                    Edit
                                </button>
                                <button
                                    class="btn btn-danger"
                                    @click="deleteNews(itemsnews.id)"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Detail News Modal Stat -->
                <div
                    class="modal fade modal-xl"
                    id="newsDetailModal"
                    tabindex="-1"
                    aria-labelledby="newsDetailModalLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h1
                                    class="modal-title fs-5 fw-bold"
                                    id="newsDetailModalLabel"
                                >
                                    Preview
                                </h1>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body h-100">
                                <div v-if="`${idNews}`">
                                    <iframe
                                        :src="`http://192.168.1.97:5000/news/detail/${idNews}`"
                                        frameborder="0"
                                        class="w-100"
                                        style="min-height: 75vh"
                                    ></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Detail News Modal End-->
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import FormAddNews from "../components/FormAddNews.vue";

const news = ref([]);
const baseURL = axios.defaults.baseURL;
const urlnews = baseURL + "/api/newsall";

const getnews = async () => {
    const response = await axios.get(urlnews);

    news.value = response.data.data;
};

const idNews = ref([]);
const getIdNews = (e) => {
    idNews.value = e;
};

const deleteNews = async (e) => {
    getIdNews(e);
    //alert(idNews.value);
    const urldeletenews = baseURL + "/api/deletenews/" + idNews.value;
    const response = await axios.delete(urldeletenews);
    alert(response);
};
onMounted(() => {
    getnews();
});
</script>

<style lang="scss" scoped></style>
