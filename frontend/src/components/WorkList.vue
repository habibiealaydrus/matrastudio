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
                                    class="btn btn-warning"
                                    @click="getdetailtargetupdate(work.id)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal"
                                >
                                    Edit
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
                                        <label class="form-label">
                                            Logo Client
                                        </label>
                                        <br />
                                        <img
                                            :src="`${baseURL}/storage/logoclient/${detailproject.logo_client}`"
                                            alt=""
                                            class="img-fluid"
                                            style="width: 10%"
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
                                            class="w-25 img-fluid"
                                            :src="`${baseURL}/storage/projectpicture/${detailproject.main_pic}`"
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
                                            :value="`${detailproject.article}`"
                                            disabled
                                        ></textarea>
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
                                    <div class="mb-3">
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
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Carbon Reduction</label
                                        >
                                        <input
                                            class="form-control"
                                            id="carbon_reduction"
                                            rows="3"
                                            :value="`${detailproject.carbon_reduction}`"
                                            disabled
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Designer 1</label
                                        >
                                        <input
                                            class="form-control"
                                            id="designer1"
                                            rows="3"
                                            :value="`${detailproject.designer1}`"
                                            disabled
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Designer 2</label
                                        >
                                        <input
                                            class="form-control"
                                            id="designer2`"
                                            rows="3"
                                            :value="`${detailproject.designer2}`"
                                            disabled
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Designer 3</label
                                        >
                                        <input
                                            class="form-control"
                                            id="designer3`"
                                            rows="3"
                                            :value="`${detailproject.designer3}`"
                                            disabled
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Designer 4</label
                                        >
                                        <input
                                            class="form-control"
                                            id="designer4`"
                                            rows="3"
                                            :value="`${detailproject.designer4}`"
                                            disabled
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Designer 5</label
                                        >
                                        <input
                                            class="form-control"
                                            id="designer5"
                                            rows="3"
                                            :value="`${detailproject.designer5}`"
                                            disabled
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex flex-wrap gap-2">
                                    <img
                                        class="img-fluid"
                                        alt=""
                                        :src="`${baseURL}/storage/projectpicture/${detailproject.pic1}`"
                                    />
                                    <img
                                        class="img-fluid"
                                        alt=""
                                        :src="`${baseURL}/storage/projectpicture/${detailproject.pic2}`"
                                    />
                                    <img
                                        class="img-fluid"
                                        alt=""
                                        :src="`${baseURL}/storage/projectpicture/${detailproject.pic3}`"
                                    />
                                    <img
                                        class="img-fluid"
                                        alt=""
                                        :src="`${baseURL}/storage/projectpicture/${detailproject.pic4}`"
                                    />
                                    <img
                                        class="img-fluid"
                                        alt=""
                                        :src="`${baseURL}/storage/projectpicture/${detailproject.pic5}`"
                                    />
                                    <img
                                        class="img-fluid"
                                        alt=""
                                        :src="`${baseURL}/storage/projectpicture/${detailproject.pic6}`"
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
        <!-- Edit Project Modal  start -->
        <div>
            <div
                class="modal fade modal-xl"
                id="editModal"
                tabindex="-1"
                aria-labelledby="workModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h1 class="modal-title fs-5" id="editModalLabel">
                                Edit Project
                            </h1>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="updateproject">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                Type Project
                                            </label>
                                            <select
                                                name=""
                                                id=""
                                                class="form-control"
                                                v-model="type_project"
                                            >
                                                <option>
                                                    {{
                                                        existingdata.type_project
                                                    }}
                                                </option>
                                                <option>
                                                    {{ optiontipe }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                >Nama Client</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="name_client"
                                                :value="`${existingdata.name_client}`"
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">
                                                Logo Client
                                            </label>
                                            <br />
                                            <img
                                                alt=""
                                                class="img-fluid mb-1"
                                                style="width: 10%"
                                            />
                                            <input
                                                accept=".jpg, .png, .jpeg, .gif"
                                                class="form-control"
                                                name="logo_client"
                                                type="file"
                                                id="formFile"
                                                ref="logo_client"
                                                @change="
                                                    getLogo(
                                                        existingdata.logo_client
                                                    )
                                                "
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
                                                :value="`${existingdata.project_name}`"
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">
                                                Main Picture
                                            </label>
                                            <br />
                                            <img
                                                alt=""
                                                class="w-25 img-fluid mb-1"
                                            />
                                            <input
                                                ref="main_pic"
                                                accept=".jpg, .png, .jpeg, .gif"
                                                class="form-control"
                                                type="file"
                                                id="formFile"
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
                                                :value="`${existingdata.article}`"
                                            ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                Picture 1
                                            </label>
                                            <br />
                                            <img
                                                alt=""
                                                class="w-25 img-fluid mb-1"
                                            />
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
                                                Picture 2
                                            </label>
                                            <br />
                                            <img
                                                alt=""
                                                class="w-25 img-fluid mb-1"
                                            />
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
                                                Picture 3
                                            </label>
                                            <br />
                                            <img
                                                alt=""
                                                class="w-25 img-fluid mb-1"
                                            />
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
                                                Picture 4
                                            </label>
                                            <br />
                                            <img
                                                alt=""
                                                class="w-25 img-fluid"
                                            />
                                            <input
                                                ref="pic4"
                                                accept=".jpg, .png, .jpeg, .gif"
                                                class="form-control"
                                                type="file"
                                                id="formFile"
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">
                                                Picture 5
                                            </label>
                                            <br />
                                            <img
                                                alt=""
                                                class="w-25 img-fluid"
                                            />
                                            <input
                                                ref="pic5"
                                                accept=".jpg, .png, .jpeg, .gif"
                                                class="form-control"
                                                type="file"
                                                id="formFile"
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">
                                                Picture 6
                                            </label>
                                            <br />
                                            <img
                                                alt=""
                                                class="w-25 img-fluid"
                                            />
                                            <input
                                                ref="pic6"
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
                                    <button
                                        type="submit"
                                        class="btn btn-warning"
                                        @click="updateProject"
                                    >
                                        Update Project
                                    </button>
                                </div>
                            </form>
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
import FormWork from "../components/FormWork.vue";

const project = ref([]);
const baseURL = axios.defaults.baseURL;

const urlproject = baseURL + "/api/client";

const type_project = ref([]);

const getproject = async () => {
    const response = await axios.get(urlproject);
    project.value = response.data.data;
};

const deleteproject = async (e) => {
    const id = e;

    const urldeletenews = baseURL + "/api/deletenews/" + id;

    const response = await axios.delete(urldeletenews);
    alert("Project deleted");
};

const detailproject = ref([]);

const getdetailproject = async (e) => {
    const idDetail = e;
    const urlDetailProject = baseURL + "/api/clientdetail/" + idDetail;
    const response = await axios.get(urlDetailProject);
    detailproject.value = response.data.data;
    //type_project.value = response.data.data.type_project;
};

const existingdata = ref([]);
const optiontipe = ref([]);

const getdetailtargetupdate = async (e) => {
    const target = e;
    // const urlDetailProject = baseURL + "/api/clientdetail/" + target;
    // const response = await axios.get(urlDetailProject);

    // type_project.value = response.data.data.type_project;
    // if (type_project.value == "Arsitektur") {
    //     optiontipe.value = "Green Building";
    // } else {
    //     optiontipe.value = "Arsitektur";
    // }
    // existingdata.value = response.data.data;
};

const getLogo = (e) => {
    const file = e.target.files[0];
};
const updateProject = () => {
    console.log(type_project.value);
    console.log(name_client[2].value);
    console.log(project_name[2].value);
    console.log(article[2].value);
    console.log(logo_client[2].value.files[0]);
};
onMounted(() => {
    getproject();
});
</script>

<style lang="scss" scoped></style>
