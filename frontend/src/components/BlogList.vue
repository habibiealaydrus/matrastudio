<template>
    <div>
        <div class="card bg-success" style="width: 100%">
            <div class="card-header d-flex justify-content-between flex-wrap">
                <div
                    class="text-white fs-3 text-start"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsblog"
                >
                    Blog
                </div>
                <button
                    type="button"
                    class="btn btn-primary text-end"
                    data-bs-toggle="modal"
                    data-bs-target="#BlogAddModal"
                >
                    Tambah
                </button>
            </div>
            <FormAddBlog />
            <div class="collapse" id="collapsblog">
                <table class="table border table-bordered rounded-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Picture</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(blog, index) in blogs">
                            <th scope="row">{{ index + 1 }}</th>
                            <td>{{ blog.title_blog }}</td>
                            <td class="text-center">
                                <img
                                    :src="`http://127.0.0.1:8000/storage/blog/${blog.main_img}`"
                                    alt=""
                                    class="w-50"
                                />
                            </td>
                            <td
                                class="d-flex flex-column gap-3 align-items-center h-100"
                            >
                                <button
                                    class="btn btn-primary"
                                    @click="previewblog(blog.id)"
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#BlogPreviewModal"
                                >
                                    Preview
                                </button>
                                <button class="btn btn-warning">Edit</button>
                                <button
                                    class="btn btn-danger"
                                    @click="deleteBlog(blog.id)"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Preview blog modal  -->
        <div
            class="modal fade modal-xl"
            id="BlogPreviewModal"
            tabindex="-1"
            aria-labelledby="BlogModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h1
                            class="modal-title fs-5 fw-bold text-white"
                            id="BlogModalLabel"
                        >
                            Preview Blog
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body h-100">
                            <div v-if="`${idBlog}`">
                                <iframe
                                    :src="`http://localhost:5173/blog/detail/${idBlog}`"
                                    frameborder="0"
                                    class="w-100"
                                    style="min-height: 75vh"
                                ></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import FormAddBlog from "../components/FormAddBlog.vue";

const blogs = ref([]);
const urlblog = "/allblog";

const getblog = async () => {
    const response = await axios.get(urlblog);

    blogs.value = response.data.data;
};

const idBlog = ref([]);
const previewblog = (e) => {
    idBlog.value = e;
};

const deleteBlog = async (e) => {
    const idDeleteBlog = e;
    const url = axios.defaults.baseURL;
    const apideleteBlog = url + "/deleteblog/";
    const urlDeleteBlog = apideleteBlog + idDeleteBlog;

    const response = await axios.delete(urlDeleteBlog);
    alert("Blog deleted");
    window.location.href = "/admin/content";
};
onMounted(() => {
    getblog();
});
</script>

<style lang="scss" scoped></style>
