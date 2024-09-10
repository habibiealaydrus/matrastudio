<template>
    <div>
        <div class="card bg-warning" style="width: 100%">
            <div class="card-header d-flex justify-content-between flex-wrap">
                <div
                    class="text-dark fs-3 text-start"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsuser"
                >
                    User
                </div>
                <button
                    type="button"
                    class="btn btn-success text-end"
                    data-bs-toggle="modal"
                    data-bs-target="#userAddModal"
                >
                    Tambah
                </button>
            </div>
            <FormAddUser />
            <div class="collapse" id="collapsuser">
                <table class="table border table-bordered rounded-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name user</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user, index) in users">
                            <th scope="row">{{ index + 1 }}</th>
                            <td class="text-nowrap">
                                {{ user.name }}
                            </td>
                            <td class="text-nowrap">
                                {{ user.email }}
                            </td>
                            <td
                                class="d-flex flex-row gap-3 align-items-center text-center"
                            >
                                <button
                                    class="btn btn-primary"
                                    @click="previewuser(user.id)"
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#userPreviewModal"
                                >
                                    Detail
                                </button>
                                <button class="btn btn-warning" disabled>
                                    Edit
                                </button>
                                <button
                                    class="btn btn-danger"
                                    @click="deleteuser(user.id)"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Preview User modal  -->
        <div
            class="modal fade modal-sm"
            id="userPreviewModal"
            tabindex="-1"
            aria-labelledby="userModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h1
                            class="modal-title fs-5 fw-bold text-white"
                            id="userModalLabel"
                        >
                            Preview user
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
                            <p><strong>Name :</strong> {{ detailuser.name }}</p>
                            <p>
                                <strong>Email</strong> : {{ detailuser.email }}
                            </p>
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
import FormAddUser from "../components/FormAddUser.vue";

const users = ref([]);
const urlusers = "/alluser";
const detailuser = ref([]);

const getusers = async () => {
    const response = await axios.get(urlusers);

    users.value = response.data.data;
};

const urldetailuser = "/detailuser/";

const previewuser = async (e) => {
    const iduser = e;
    const response = await axios.get(urldetailuser + iduser);
    detailuser.value = response.data.data;
};

const deleteuser = async (e) => {
    const idDeleteuser = e;
    const url = axios.defaults.baseURL;
    const apideleteuser = url + "/deleteuser/";
    const urlDeleteuser = apideleteuser + idDeleteuser;

    const response = await axios.delete(urlDeleteuser);
    alert("user deleted");
    window.location.href = "/admin/user";
};

onMounted(() => {
    getusers();
});
</script>

<style lang="scss" scoped></style>
