<template>
    <div>
        <div class="card bg-primary" style="width: 100%">
            <div class="card-header d-flex justify-content-between flex-wrap">
                <div
                    class="text-white fs-3 text-start"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsework"
                >
                    Work/Project
                </div>
                <button
                    type="button"
                    class="btn btn-success"
                    data-bs-toggle="modal"
                    data-bs-target="#workModal"
                >
                    Tambah
                </button>
            </div>
            <!-- Modal -->
            <FormWork />
            <div class="collapse table-responsive" id="collapsework">
                <table class="table border table-bordered rounded-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Project</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(work, index) in project" :key="work.id">
                            <th scope="row">{{ index + 1 }}</th>
                            <td>{{ work.name_client }}</td>
                            <td>{{ work.project_name }}</td>
                            <td class="d-flex flex-column gap-1">
                                <button
                                    class="btn btn-primary"
                                    @click.prevent="getdetailproject(work.id)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#detailModal"
                                >
                                    Detail
                                </button>

                                <button
                                    class="btn btn-danger deleteitem"
                                    @click="deleteproject(work.id)"
                                    id="delete"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Detail Project Modal Stat -->
        <div
            class="modal fade modal-xl"
            id="detailModal"
            tabindex="-1"
            aria-labelledby="workModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5 fw-1" id="workModalLabel">
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
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Nama Client</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name_client"
                                            :value="`${detailproject.name_client}`"
                                            disabled
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Nama Project</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="project_name"
                                            :value="`${detailproject.project_name}`"
                                            disabled
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Main Picture
                                        </label>
                                        <br />
                                        <img
                                            alt=""
                                            class="img-fluid"
                                            :src="`${baseURL}/storage/projectpicture/${detailproject.main_pic}`"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Project Article</label
                                        >
                                        <div
                                            v-html="detailproject.article"
                                        ></div>
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Location</label
                                        >
                                        <input
                                            class="form-control"
                                            id="location"
                                            rows="3"
                                            :value="`${detailproject.location}`"
                                            disabled
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Year</label
                                        >
                                        <input
                                            class="form-control"
                                            id="year"
                                            rows="3"
                                            :value="`${detailproject.year}`"
                                            disabled
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >STATUS</label
                                        >
                                        <input
                                            class="form-control"
                                            id="year"
                                            rows="3"
                                            :value="`${detailproject.status}`"
                                            disabled
                                        />
                                    </div>
                                    <div
                                        class="mb-3"
                                        v-if="detailproject.energy_savings"
                                    >
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Energy Savings</label
                                        >
                                        <input
                                            class="form-control"
                                            id="energy_savings"
                                            rows="3"
                                            :value="`${detailproject.energy_savings}`"
                                            disabled
                                        />
                                    </div>
                                    <div
                                        class="mb-3"
                                        v-if="detailproject.energy_savings"
                                    >
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Water Savings</label
                                        >
                                        <input
                                            class="form-control"
                                            id="water_savings"
                                            rows="3"
                                            :value="`${detailproject.water_savings}`"
                                            disabled
                                        />
                                    </div>
                                    <div
                                        class="mb-3"
                                        v-if="detailproject.basic_design"
                                    >
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >BASIC DESIGN</label
                                        >
                                        <input
                                            class="form-control"
                                            id="water_savings"
                                            rows="3"
                                            :value="`${detailproject.basic_design}`"
                                            disabled
                                        />
                                    </div>
                                    <div
                                        class="mb-3"
                                        v-if="detailproject.main_contractor"
                                    >
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label text-uppercase"
                                            >Main Contractor</label
                                        >
                                        <input
                                            class="form-control"
                                            id="water_savings"
                                            rows="3"
                                            :value="`${detailproject.main_contractor}`"
                                            disabled
                                        />
                                    </div>
                                    <div
                                        class="mb-3"
                                        v-if="detailproject.architecht_build"
                                    >
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label text-uppercase"
                                            >architecht & build</label
                                        >
                                        <input
                                            class="form-control"
                                            id="water_savings"
                                            rows="3"
                                            :value="`${detailproject.architecht_build}`"
                                            disabled
                                        />
                                    </div>
                                    <div
                                        class="mb-3"
                                        v-if="detailproject.sustainability_team"
                                    >
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label text-uppercase"
                                            >Sustainability team</label
                                        >
                                        <div
                                            class="form-control"
                                            v-html="
                                                detailproject.sustainability_team
                                            "
                                            disabled
                                        ></div>
                                    </div>
                                    <div
                                        class="mb-3"
                                        v-if="detailproject.team_arsitektur"
                                    >
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label text-uppercase"
                                        >
                                            Architecture team</label
                                        >
                                        <div
                                            v-html="
                                                detailproject.team_arsitektur
                                            "
                                            disabled
                                        ></div>
                                    </div>
                                    <div
                                        class="mb-3"
                                        v-if="detailproject.struktur"
                                    >
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label text-uppercase"
                                            >Struktur</label
                                        >
                                        <input
                                            class="form-control"
                                            id="water_savings"
                                            rows="3"
                                            :value="`${detailproject.struktur}`"
                                            disabled
                                        />
                                    </div>
                                    <div class="mb-3" v-if="detailproject.mep">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label text-uppercase"
                                            >MEP</label
                                        >
                                        <input
                                            class="form-control"
                                            id="water_savings"
                                            rows="3"
                                            :value="`${detailproject.mep}`"
                                            disabled
                                        />
                                    </div>
                                    <div class="mb-3" v-if="detailproject.qs">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label text-uppercase"
                                            >QS</label
                                        >
                                        <input
                                            class="form-control"
                                            id="water_savings"
                                            rows="3"
                                            :value="`${detailproject.qs}`"
                                            disabled
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex flex-wrap gap-2">
                                    <img
                                        class="img-fluid"
                                        alt=""
                                        :src="
                                            baseURL +
                                            `/public/storage/projectpicture/${detailproject.pic1}`
                                        "
                                    />
                                    <img
                                        class="img-fluid"
                                        alt=""
                                        :src="
                                            baseURL +
                                            `/public/storage/projectpicture/${detailproject.pic2}`
                                        "
                                    />
                                    <img
                                        class="img-fluid"
                                        alt=""
                                        :src="
                                            baseURL +
                                            `/public/storage/projectpicture/${detailproject.pic3}`
                                        "
                                    />
                                    <img
                                        class="img-fluid"
                                        alt=""
                                        :src="
                                            baseURL +
                                            `/public/storage/projectpicture/${detailproject.pic4}`
                                        "
                                    />
                                    <img
                                        class="img-fluid"
                                        alt=""
                                        :src="
                                            baseURL +
                                            `/public/storage/projectpicture/${detailproject.pic5}`
                                        "
                                    />
                                    <img
                                        class="img-fluid"
                                        alt=""
                                        :src="
                                            baseURL +
                                            `/public/storage/projectpicture/${detailproject.pic6}`
                                        "
                                    />
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Detail Project Modal End-->
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import FormWork from "../components/FormWork.vue";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";

const notify = (message) => {
    toast.success(message, {
        autoClose: 1000,
    }); // ToastOptions
};

const project = ref([]);
const baseURL = axios.defaults.baseURL;

const urlproject = baseURL + "/public/api/client";

const type_project = ref([]);

const getproject = async () => {
    const response = await axios.get(urlproject);
    project.value = response.data.data;
};

const deleteproject = async (e) => {
    const id = e;

    const urldeletenews = baseURL + "/api/clientdelete/" + id;

    const response = await axios.delete(urldeletenews);
    notify("Work Deleted");
    //alert("Project deleted");
    window.location.href = "/admin/content";
};

const detailproject = ref([]);

const getdetailproject = async (e) => {
    const idDetail = e;
    const urlDetailProject = baseURL + "/public/api/clientdetail/" + idDetail;
    const response = await axios.get(urlDetailProject);
    detailproject.value = response.data.data;
    //type_project.value = response.data.data.type_project;
};

onMounted(() => {
    getproject();
});
</script>

<style lang="scss" scoped></style>
