<template>
    <div>
        <div
            class="modal fade modal-xl"
            id="detailModal"
            tabindex="-1"
            aria-labelledby="workModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="workModalLabel">
                            Detail Project
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="addproject">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Nama Client</label
                                        >
                                        <input
                                            v-model="name_client"
                                            type="text"
                                            class="form-control"
                                            id="name_client"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Logo Client
                                        </label>
                                        <input
                                            ref="logo_client"
                                            accept=".jpg, .png, .jpeg, .gif"
                                            class="form-control"
                                            type="file"
                                            id="formFile"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Nama Project</label
                                        >
                                        <input
                                            v-model="project_name"
                                            type="text"
                                            class="form-control"
                                            id="project_name"
                                        />
                                    </div>
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
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Project Article</label
                                        >
                                        <textarea
                                            class="form-control"
                                            id="article"
                                            rows="3"
                                            v-model="article"
                                        ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Picture 1
                                        </label>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="pic1"
                                            ref="pic1"
                                            accept=".jpg, .png, .jpeg, .gif"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Picture 2
                                        </label>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="pic2"
                                            ref="pic2"
                                            accept=".jpg, .png, .jpeg, .gif"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Picture 3
                                        </label>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="pic3"
                                            ref="pic3"
                                            accept=".jpg, .png, .jpeg, .gif"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Picture 4
                                        </label>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="pic4"
                                            ref="pic4"
                                            accept=".jpg, .png, .jpeg, .gif"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Picture 5
                                        </label>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="pic5"
                                            ref="pic5"
                                            accept=".jpg, .png, .jpeg, .gif"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Picture 5
                                        </label>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="pic5"
                                            ref="pic6"
                                            accept=".jpg, .png, .jpeg, .gif"
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
                                    Add Project
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
import { ref } from "vue";

const detailproject = ref([]);

const getdetailproject = async (e) => {
    try {
        const iddetail = e;
        console.log(iddetail);
        const urlgetdetailproject = "http://192.168.17.42:5000/detailclient";
        const response = await axios.get(urlgetdetailproject);
        // console.log(detailproject);
    } catch (error) {
        console.log(error);
    }
};
</script>

<style lang="scss" scoped></style>
