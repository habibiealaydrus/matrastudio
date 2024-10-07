<template>
    <div>
        <div
            class="modal fade modal-xl"
            id="workModal"
            tabindex="-1"
            aria-labelledby="workModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="workModalLabel">
                            Tambah Project
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
                                            >Tipe Project </label
                                        ><span class="required">*required</span>
                                        <select
                                            class="form-control"
                                            v-model="type_project"
                                            name="type_project"
                                            id="type_project"
                                            required
                                        >
                                            <option value="Architecture">
                                                Architecture
                                            </option>
                                            <option value="Sustainability">
                                                Sustainability
                                            </option>
                                            <option value="Instalation">
                                                Instalation
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Nama Client</label
                                        ><span class="required">*required</span>
                                        <input
                                            v-model="name_client"
                                            type="text"
                                            class="form-control"
                                            id="name_client"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Logo Client </label
                                        ><span class="required">*required</span>
                                        <input
                                            ref="logo_client"
                                            accept=".jpg, .png, .jpeg, .gif"
                                            class="form-control"
                                            type="file"
                                            id="formFile"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Nama Project</label
                                        ><span class="required">*required</span>
                                        <input
                                            v-model="project_name"
                                            type="text"
                                            class="form-control"
                                            id="project_name"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Main Picture </label
                                        ><span class="required">*required</span>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="formFile"
                                            ref="main_pic"
                                            accept=".jpg, .png, .jpeg, .gif"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Grid Picture
                                        </label>
                                        <span class="required">*required</span>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="formFile"
                                            ref="grid_pic"
                                            accept=".jpg, .png, .jpeg, .gif"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Project Article</label
                                        ><span class="required">*required</span>
                                        <textarea
                                            class="form-control"
                                            id="article"
                                            rows="3"
                                            v-model="article"
                                            required
                                        ></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Location</label
                                        ><span class="required">*required</span>
                                        <input
                                            v-model="location"
                                            type="text"
                                            class="form-control"
                                            id="location"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Year</label>
                                        <span class="required">*required</span>
                                        <input
                                            v-model="year"
                                            type="text"
                                            class="form-control"
                                            id="year"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Energy Savings</label
                                        >

                                        <input
                                            v-model="energy_savings"
                                            type="number"
                                            class="form-control"
                                            id="energy_savings"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Water Savings</label
                                        >
                                        <input
                                            v-model="water_savings"
                                            type="number"
                                            class="form-control"
                                            id="water_savings"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Carbon Reduction</label
                                        >
                                        <input
                                            v-model="carbon_reduction"
                                            type="number"
                                            class="form-control"
                                            id="carbon_reduction"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Embodied Energy</label
                                        >
                                        <input
                                            v-model="embodied_energy"
                                            type="number"
                                            class="form-control"
                                            id="embodied_energy"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Designer 1</label
                                        >
                                        <input
                                            v-model="designer1"
                                            type="text"
                                            class="form-control"
                                            id="designer1"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Designer 2</label
                                        >
                                        <input
                                            v-model="designer2"
                                            type="text"
                                            class="form-control"
                                            id="designer2"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Designer 3</label
                                        >
                                        <input
                                            v-model="designer3"
                                            type="text"
                                            class="form-control"
                                            id="designer3"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Designer 4</label
                                        >
                                        <input
                                            v-model="designer4"
                                            type="text"
                                            class="form-control"
                                            id="designer4"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Designer 5</label
                                        >
                                        <input
                                            v-model="designer5"
                                            type="text"
                                            class="form-control"
                                            id="designer5"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Designer 6</label
                                        >
                                        <input
                                            v-model="designer6"
                                            type="text"
                                            class="form-control"
                                            id="designer6"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Picture 1 </label
                                        ><span class="required">*required</span>
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
                                            Picture 2 </label
                                        ><span class="required">*required</span>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="pic2"
                                            C
                                            ref="pic2"
                                            accept=".jpg, .png, .jpeg, .gif"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Picture 3 </label
                                        ><span class="required">*landcape</span>
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
                                            Picture 6
                                        </label>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="pic6"
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
import { ref, onMounted } from "vue";

const type_project = ref("");
const name_client = ref("");
const logo_client = ref("");
const project_name = ref("");
const main_pic = ref("");
const grid_pic = ref("");
const article = ref("");
const location = ref("");
const year = ref("");
const energy_savings = ref("");
const water_savings = ref("");
const carbon_reduction = ref("");
const embodied_energy = ref("");
const designer1 = ref("");
const designer2 = ref("");
const designer3 = ref("");
const designer4 = ref("");
const designer5 = ref("");
const designer6 = ref("");
const pic1 = ref("");
const pic2 = ref("");
const pic3 = ref("");
const pic4 = ref("");
const pic5 = ref("");
const pic6 = ref("");

const baseURL = axios.defaults.baseURL;

const urladdproject = baseURL + "/api/addclient";

const clearInput = () => {
    type_project.value = "";
    name_client.value = "";
    logo_client.value = "";
    project_name.value = "";
    main_pic.value = "";
    grid_pic.value = "";
    article.value = "";
    location.value = "";
    year.value = "";
    water_savings.value = "";
    energy_savings.value = "";
    carbon_reduction.value = "";
    embodied_energy.value = "";
    designer1.value = "";
    designer2.value = "";
    designer3.value = "";
    designer4.value = "";
    designer5.value = "";
    pic1.value = "";
    pic2.value = "";
    pic3.value = "";
    pic4.value = "";
    pic5.value = "";
    pic6.value = "";
};

const config = {
    headers: { "Content-Type": "multipart/form-data" },
};

const addproject = async () => {
    try {
        const data = {
            type_project: type_project.value,
            name_client: name_client.value,
            logo_client: logo_client.value.files[0],
            project_name: project_name.value,
            main_pic: main_pic.value.files[0],
            grid_pic: grid_pic.value.files[0],
            article: article.value,
            location: location.value,
            year: year.value,
            energy_savings: energy_savings.value,
            water_savings: water_savings.value,
            carbon_reduction: carbon_reduction.value,
            embodied_energy: embodied_energy.value,
            designer1: designer1.value,
            designer2: designer2.value,
            designer3: designer3.value,
            designer4: designer4.value,
            designer5: designer5.value,
            pic1: pic1.value.files[0],
            pic2: pic2.value.files[0],
            pic3: pic3.value.files[0],
            pic4: pic4.value.files[0],
            pic5: pic5.value.files[0],
            pic6: pic6.value.files[0],
        };

        console.log(data);
        const response = await axios.post(urladdproject, data, config);
        clearInput();
        alert("Project has been added");
        window.location.href = "/admin/content";
    } catch (error) {
        console.log(error.response);
    }
};
</script>

<style lang="scss" scoped></style>
