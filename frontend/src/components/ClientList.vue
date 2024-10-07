<template>
    <div>
        <div class="card bg-info-subtle" style="width: 100%">
            <div class="card-header d-flex justify-content-between flex-wrap">
                <div
                    class="text-dark fs-3 text-start"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsclient"
                >
                    Client
                </div>
                <button
                    type="button"
                    class="btn btn-success text-end"
                    data-bs-toggle="modal"
                    data-bs-target="#ProjectclientAddModal"
                >
                    Tambah
                </button>
            </div>
            <FormAddProjectclient />
            <div class="collapse" id="collapsclient">
                <div class="table-responsive">
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
                            <tr v-for="(client, index) in clients">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ client.projectclient_name }}</td>
                                <td class="text-center">
                                    <img
                                        alt=""
                                        class="w-50"
                                        :src="`https://mantra.matrastudio.com/storage/app/public/projectclients/${client.projectclient_img}`"
                                    />
                                </td>
                                <td
                                    class="d-flex flex-column gap-3 align-items-center h-100"
                                >
                                    <button
                                        class="btn btn-primary"
                                        @click="previewimageclient(client.id)"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#clientPreviewModal"
                                    >
                                        Preview
                                    </button>
                                    <button class="btn btn-warning">
                                        Edit
                                    </button>
                                    <button
                                        class="btn btn-danger"
                                        @click="deleteclient(client.id)"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Preview blog modal  -->
        <div
            class="modal fade modal-md"
            id="clientPreviewModal"
            tabindex="-1"
            aria-labelledby="clientModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h1
                            class="modal-title fs-5 fw-bold text-white"
                            id="BlogModalLabel"
                        >
                            Preview Image Client
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
                            <div>
                                {{ idImage.projectclient_name }}
                            </div>
                            <div>
                                <img frameborder="0" class="w-100" />
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
import FormAddProjectclient from "../components/FormAddProjectclient.vue";

const clients = ref([]);
const baseURL = axios.defaults.baseURL;
const urlclient = baseURL + "/api/allimageclient";

const getclient = async () => {
    const response = await axios.get(urlclient);
    //console.log(response.data.data);
    clients.value = response.data.data;
};

const idImage = ref([]);
const urlidetailclient = baseURL + "/api/allimageclientid/";

const previewimageclient = async (e) => {
    const id = e;
    const response = await axios.get(urlidetailclient + id);
    idImage.value = response.data.data;
};

const deleteclient = async (e) => {
    const idDeleteclient = e;

    const apideleteclient = baseURL + "/api/deleteimageclient/";
    const urlDeleteclient = apideleteclient + idDeleteclient;

    const response = await axios.delete(urlDeleteclient);
    alert("client deleted");
    window.location.href = "/admin/content";
};
onMounted(() => {
    getclient();
});
</script>

<style lang="scss" scoped></style>
