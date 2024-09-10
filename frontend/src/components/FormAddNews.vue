<template>
    <div>
        <div
            class="modal fade modal-lg"
            id="NewsAddModal"
            tabindex="-1"
            aria-labelledby="workModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h1
                            class="modal-title fs-5 text-white"
                            id="NewsModalLabel"
                        >
                            Tambah News
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="addnews">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Main Picture
                                        </label>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="formFile"
                                            ref="main_pic"
                                            accept=".jpg, .png, .jpeg, .gif"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Headline News</label
                                        >
                                        <input
                                            v-model="headline_news"
                                            type="text"
                                            class="form-control"
                                            id="headline_news"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Project Article</label
                                        >
                                        <textarea
                                            class="form-control"
                                            id="article"
                                            rows="3"
                                            v-model="article_news"
                                        ></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Logo News
                                        </label>
                                        <input
                                            ref="logo_news"
                                            accept=".jpg, .png, .jpeg, .gif"
                                            class="form-control"
                                            type="file"
                                            id="formFile"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Link Berita
                                        </label>
                                        <input
                                            v-model="link_berita"
                                            type="text"
                                            class="form-control"
                                            id="link_berita"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal"
                                >
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Add News
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const main_pic = ref("");
const headline_news = ref("");
const logo_news = ref("");
const article_news = ref("");
const link_berita = ref("");

const urladdnews = "/addnews";

const clearInput = () => {
    main_pic.value = "";
    headline_news.value = "";
    logo_news.value = "";
    article_news.value = "";
    link_berita.value = "";
};

const config = {
    headers: { "Content-Type": "multipart/form-data" },
};

const addnews = async () => {
    try {
        const datanews = {
            main_pic: main_pic.value.files[0],
            headline_news: headline_news.value,
            logo_news: logo_news.value.files[0],
            article_news: article_news.value,
            link_berita: link_berita.value,
        };

        console.log(datanews);
        const response = await axios.post(urladdnews, datanews, config);

        clearInput();
        alert("News has been added");
        window.location.href = "/admin/content";
    } catch (error) {
        alert("Gagal menambahkan News");
    }
};
</script>

<style lang="scss" scoped></style>
