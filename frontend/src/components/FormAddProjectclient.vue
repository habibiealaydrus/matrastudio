<template>
    <div>
        <div
            class="modal fade modal-lg"
            id="ProjectclientAddModal"
            tabindex="-1"
            aria-labelledby="ProjectclientModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h1
                            class="modal-title fs-5 text-white"
                            id="projectclientModalLabel"
                        >
                            Tambah Project Client
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="addprojectclient">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Name Client</label
                                        >
                                        <input
                                            v-model="projectclient_name"
                                            type="text"
                                            class="form-control"
                                            id="projectclient_name"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Image
                                        </label>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="formFile"
                                            ref="projectclient_img"
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
                                    Add Image Client
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

const projectclient_name = ref("");
const projectclient_img = ref("");

const urladdimgclient = "/addimageclient";

const clearInput = () => {
    projectclient_name.value = "";
    projectclient_img.value = "";
};

const config = {
    headers: { "Content-Type": "multipart/form-data" },
};

const addprojectclient = async () => {
    try {
        const dataclient = {
            projectclient_name: projectclient_name.value,
            projectclient_img: projectclient_img.value.files[0],
        };

        const response = await axios.post(urladdimgclient, dataclient, config);

        clearInput();
        alert("Client Image added");
        window.location.href = "/admin/content";
    } catch (error) {
        alert("Failed Add Image");
    }
};
</script>

<style lang="scss" scoped></style>
