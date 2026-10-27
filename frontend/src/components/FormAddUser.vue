<template>
    <div>
        <div
            class="modal fade modal-lg"
            id="userAddModal"
            tabindex="-1"
            aria-labelledby="userModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h1
                            class="modal-title fs-5 text-white"
                            id="userModalLabel"
                        >
                            Tambah user
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="adduser">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Name user</label
                                        >
                                        <input
                                            v-model="name"
                                            type="text"
                                            class="form-control"
                                            id="headline_user"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Email</label
                                        >
                                        <input
                                            class="form-control"
                                            id="email"
                                            rows="3"
                                            v-model="email"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Password</label
                                        >
                                        <input
                                            v-model="password"
                                            type="password"
                                            class="form-control"
                                            id="password"
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
                                    Add user
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

const name = ref("");
const email = ref("");
const password = ref("");

const baseURL = axios.defaults.baseURL;

const urladduser = baseURL + "/api/register";

const clearInput = () => {
    name.value = "";
    email.value = "";
    password.value = "";
};

const config = {
    headers: { "Content-Type": "multipart/form-data" },
};

const adduser = async () => {
    try {
        const datauser = {
            name: name.value,
            email: email.value,
            password: password.value,
        };

        const response = await axios.post(urladduser, datauser, config);

        alert("user has been added");
        window.location.href = "/admin/user";
    } catch (error) {
        console.log(error.data.data);
    }
};
</script>

<style lang="scss" scoped></style>
