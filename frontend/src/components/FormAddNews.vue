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
                                            >News Article</label
                                        >
                                        <ckeditor
                                            v-model="article_news"
                                            :editor="editor"
                                            :config="editorConfig"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Preview News
                                        </label>
                                        <span class="required">
                                            Format 1X1</span
                                        >
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
import axios, { all } from "axios";
import { ref } from "vue";

import {
    ClassicEditor,
    Bold,
    Essentials,
    Italic,
    Mention,
    Paragraph,
    Undo,
    Underline,
    Link,
    List,
    BlockQuote,
    CodeBlock,
    MediaEmbed,
    Table,
    TableToolbar,
    Heading,
    FontColor,
    FontSize,
    Highlight,
    Alignment,
} from "ckeditor5";
import "ckeditor5/ckeditor5.css";
import { Ckeditor } from "@ckeditor/ckeditor5-vue";

// CKEditor instance and configuration
const editor = ClassicEditor;
const editorData = ref("<p>Hello from CKEditor 5 in Vue!</p>");
const editorConfig = {
    plugins: [
        Bold,
        Essentials,
        Italic,
        Mention,
        Paragraph,
        Undo,
        Underline,
        Link,
        List,
        BlockQuote,
        CodeBlock,
        MediaEmbed,
        Table,
        TableToolbar,
        Heading,
        FontColor,
        FontSize,
        Highlight,
        Alignment,
    ],
    toolbar: [
        "undo",
        "redo",
        "|",
        "heading",
        "|",
        "bold",
        "italic",
        "underline",
        "link",
        "bulletedList",
        "numberedList",
        "|",
        "blockQuote",
        "codeBlock",
        "|",
        "insertTable",
        "|",
        "fontColor",
        "fontSize",
        "highlight",
        "|",
        "alignment",
    ], // Full toolbar with all options
};

const main_pic = ref("");
const headline_news = ref("");
const logo_news = ref("");
const article_news = ref("");
const link_berita = ref("");

const baseURL = axios.defaults.baseURL;
const urladdnews = baseURL + "/api/addnews";

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
