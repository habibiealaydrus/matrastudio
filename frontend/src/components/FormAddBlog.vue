<template>
    <div>
        <div
            class="modal fade modal-lg"
            id="BlogAddModal"
            tabindex="-1"
            aria-labelledby="workModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h1
                            class="modal-title fs-5 text-white"
                            id="BlogModalLabel"
                        >
                            Tambah Blog
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="addblog">
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
                                            ref="main_img"
                                            accept=".jpg, .png, .jpeg, .gif"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Title Blog</label
                                        >
                                        <input
                                            v-model="title_blog"
                                            type="text"
                                            class="form-control"
                                            id="headline_Blog"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Blog Article</label
                                        >
                                        <ckeditor
                                            v-model="article_blog"
                                            :editor="editor"
                                            :config="editorConfig"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Pic 1
                                        </label>
                                        <input
                                            ref="pic1"
                                            accept=".jpg, .png, .jpeg, .gif"
                                            class="form-control"
                                            type="file"
                                            id="formFile"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Pic 2
                                        </label>
                                        <input
                                            ref="pic2"
                                            accept=".jpg, .png, .jpeg, .gif"
                                            class="form-control"
                                            type="file"
                                            id="formFile"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Pic 3
                                        </label>
                                        <input
                                            ref="pic3"
                                            accept=".jpg, .png, .jpeg, .gif"
                                            class="form-control"
                                            type="file"
                                            id="formFile"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Pic 4
                                        </label>
                                        <input
                                            ref="pic4"
                                            accept=".jpg, .png, .jpeg, .gif"
                                            class="form-control"
                                            type="file"
                                            id="formFile"
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
                                    Add Blog
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

const main_img = ref("");
const title_blog = ref("");
const article_blog = ref("");
const pic1 = ref("");
const pic2 = ref("");
const pic3 = ref("");
const pic4 = ref("");

const baseURL = axios.defaults.baseURL;
const urladdblog = baseURL + "/public/api/addblog";

const clearInput = () => {
    main_img.value = "";
    title_blog.value = "";
    article_blog.value = "";
    pic1.value = "";
    pic2.value = "";
    pic3.value = "";
    pic4.value = "";
};

const config = {
    headers: { "Content-Type": "multipart/form-data" },
};

const addblog = async () => {
    try {
        const datablog = {
            main_img: main_img.value.files[0],
            title_blog: title_blog.value,
            article_blog: article_blog.value,
            pic1: pic1.value.files[0],
            pic2: pic2.value.files[0],
            pic3: pic3.value.files[0],
            pic4: pic4.value.files[0],
        };
        //console.log(datablog);
        const response = await axios.post(urladdblog, datablog, config);

        clearInput();
        alert("Blog has been added");
        window.location.href = "/admin/content";
    } catch (error) {
        alert("Gagal menambahkan News");
    }
};
</script>

<style lang="scss" scoped></style>
