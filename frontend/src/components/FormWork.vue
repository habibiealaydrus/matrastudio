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
                                            <option value="Installation">
                                                Installation
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
                                        >
                                        <ckeditor
                                            v-model="article"
                                            :editor="editor"
                                            :config="editorConfig"
                                        /><span class="required"
                                            >*required</span
                                        >
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
                                        <label class="form-label">Status</label>
                                        <span class="required">*required</span>
                                        <input
                                            v-model="status"
                                            type="text"
                                            class="form-control"
                                            id="status"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Basic Design</label
                                        >
                                        <input
                                            v-model="basic_design"
                                            type="text"
                                            class="form-control"
                                            id="basic_design"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Main Contractor</label
                                        >
                                        <input
                                            v-model="main_contractor"
                                            type="text"
                                            class="form-control"
                                            id="main_contractor"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Architect & Build</label
                                        >
                                        <input
                                            v-model="architecht_build"
                                            type="text"
                                            class="form-control"
                                            id="architecht_build"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Architecht</label
                                        >
                                        <input
                                            v-model="architecht"
                                            type="text"
                                            class="form-control"
                                            id="architecht"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Sustainability Team</label
                                        >

                                        <ckeditor
                                            v-model="sustainability_team"
                                            :editor="editor"
                                            :config="editorConfig"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Team Arsitektur</label
                                        >
                                        <ckeditor
                                            v-model="team_arsitektur"
                                            :editor="editor"
                                            :config="editorConfig"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Struktur</label
                                        >
                                        <input
                                            v-model="struktur"
                                            type="text"
                                            class="form-control"
                                            id="struktur"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">MEP</label>
                                        <input
                                            v-model="mep"
                                            type="text"
                                            class="form-control"
                                            id="mep"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">QS</label>
                                        <input
                                            v-model="qs"
                                            type="text"
                                            class="form-control"
                                            id="qs"
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
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Design Team</label
                                        >

                                        <ckeditor
                                            v-model="design_team"
                                            :editor="editor"
                                            :config="editorConfig"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Collaborator</label
                                        >

                                        <ckeditor
                                            v-model="collaborators"
                                            :editor="editor"
                                            :config="editorConfig"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Fabrication Team</label
                                        >

                                        <ckeditor
                                            v-model="fabrication_team"
                                            :editor="editor"
                                            :config="editorConfig"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Publication</label
                                        >

                                        <ckeditor
                                            v-model="publication"
                                            :editor="editor"
                                            :config="editorConfig"
                                        />
                                    </div>
                                    <!-- Picture -->
                                    <div class="mb-3 d-flex flex-row">
                                        <div>
                                            <label class="form-label">
                                                Picture 1 </label
                                            ><span class="required"
                                                >*required</span
                                            >
                                            <input
                                                class="form-control"
                                                type="file"
                                                id="pic1"
                                                ref="pic1"
                                                accept=".jpg, .png, .jpeg, .gif"
                                                required
                                            />
                                        </div>
                                        <div class="ps-2">
                                            <label class="form-label">
                                                Text Picture 1 </label
                                            ><span class="required"
                                                >*required</span
                                            >
                                            <input
                                                class="form-control"
                                                type="text"
                                                id="pic1"
                                                v-model="name_pic1"
                                            />
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex flex-row">
                                        <div>
                                            <label class="form-label">
                                                Picture 2 </label
                                            ><span class="required"
                                                >*required</span
                                            >
                                            <input
                                                class="form-control"
                                                type="file"
                                                id="pic2"
                                                ref="pic2"
                                                accept=".jpg, .png, .jpeg, .gif"
                                                required
                                            />
                                        </div>
                                        <div class="ps-2">
                                            <label class="form-label">
                                                Text Picture 2</label
                                            ><span class="required"
                                                >*required</span
                                            >
                                            <input
                                                class="form-control"
                                                type="text"
                                                id="pic2"
                                                v-model="name_pic2"
                                            />
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex flex-row">
                                        <div>
                                            <label class="form-label">
                                                Picture 3 </label
                                            ><span class="required"
                                                >*landscape full</span
                                            >
                                            <input
                                                class="form-control"
                                                type="file"
                                                id="pic3"
                                                ref="pic3"
                                                accept=".jpg, .png, .jpeg, .gif"
                                            />
                                        </div>
                                        <div class="ps-2">
                                            <label class="form-label">
                                                Text Picture 3</label
                                            ><span class="required"
                                                >*required</span
                                            >
                                            <input
                                                class="form-control"
                                                type="text"
                                                id="pic3"
                                                v-model="name_pic3"
                                            />
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex flex-row">
                                        <div>
                                            <label class="form-label">
                                                Picture 4 </label
                                            ><span class="required"></span>
                                            <input
                                                class="form-control"
                                                type="file"
                                                id="pic4"
                                                ref="pic4"
                                                accept=".jpg, .png, .jpeg, .gif"
                                            />
                                        </div>
                                        <div class="ps-2">
                                            <label class="form-label">
                                                Text Picture 4</label
                                            >
                                            <input
                                                class="form-control"
                                                type="text"
                                                id="pic4"
                                                v-model="name_pic4"
                                            />
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex flex-row">
                                        <div>
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
                                        <div class="ps-2">
                                            <label class="form-label">
                                                Text Picture 5</label
                                            >
                                            <input
                                                class="form-control"
                                                type="text"
                                                id="pic5"
                                                v-model="name_pic5"
                                            />
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex flex-row">
                                        <div>
                                            <label class="form-label">
                                                Picture 6</label
                                            >
                                            <input
                                                class="form-control"
                                                type="file"
                                                id="pic6"
                                                ref="pic6"
                                                accept=".jpg, .png, .jpeg, .gif"
                                            />
                                        </div>
                                        <div class="ps-2">
                                            <label class="form-label">
                                                Text Picture 6</label
                                            >
                                            <input
                                                class="form-control"
                                                type="text"
                                                id="pic6"
                                                v-model="name_pic6"
                                            />
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex flex-row">
                                        <div>
                                            <label class="form-label">
                                                Picture 7</label
                                            >
                                            <input
                                                class="form-control"
                                                type="file"
                                                id="pic7"
                                                ref="pic7"
                                                accept=".jpg, .png, .jpeg, .gif"
                                            />
                                        </div>
                                        <div class="ps-2">
                                            <label class="form-label">
                                                Text Picture 7</label
                                            >
                                            <input
                                                class="form-control"
                                                type="text"
                                                id="pic7"
                                                v-model="name_pic6"
                                            />
                                        </div>
                                    </div>
                                    <!-- Picture -->
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

const type_project = ref("");
const name_client = ref("");
const project_name = ref("");
const main_pic = ref("");
const grid_pic = ref("");
const article = ref("");
const location = ref("");
const year = ref("");
const status = ref("");
const energy_savings = ref("");
const water_savings = ref("");
const carbon_reduction = ref("");
const embodied_energy = ref("");
const basic_design = ref("");
const qs = ref("");
const mep = ref("");
const struktur = ref("");
const team_arsitektur = ref("");
const sustainability_team = ref("");
const architecht = ref("");
const architecht_build = ref("");
const main_contractor = ref("");
const design_team = ref("");
const collaborators = ref("");
const fabrication_team = ref("");
const publication = ref("");
const pic1 = ref("");
const name_pic1 = ref("");
const pic2 = ref("");
const name_pic2 = ref("");
const pic3 = ref("");
const name_pic3 = ref("");
const pic4 = ref("");
const name_pic4 = ref("");
const pic5 = ref("");
const name_pic5 = ref("");
const pic6 = ref("");
const name_pic6 = ref("");
const pic7 = ref("");
const name_pic7 = ref("");

const baseURL = axios.defaults.baseURL;

const urladdproject = baseURL + "/public/api/addclient";

const clearInput = () => {
    type_project.value = "";
    name_client.value = "";
    project_name.value = "";
    main_pic.value = "";
    grid_pic.value = "";
    article.value = "";
    location.value = "";
    year.value = "";
    status.value = "";
    water_savings.value = "";
    energy_savings.value = "";
    carbon_reduction.value = "";
    embodied_energy.value = "";
    basic_design.value = "";
    qs.value = "";
    mep.value = "";
    struktur.value = "";
    team_arsitektur.value = "";
    sustainability_team.value = "";
    architecht.value = "";
    architecht_build.value = "";
    main_contractor.value = "";
    design_team = "";
    collaborators = "";
    fabrication_team = "";
    publication = "";
    pic1.value = "";
    name_pic1.value = "";
    pic2.value = "";
    name_pic2.value = "";
    pic3.value = "";
    name_pic3.value = "";
    pic4.value = "";
    name_pic4.value = "";
    pic5.value = "";
    name_pic5.value = "";
    pic6.value = "";
    name_pic6.value = "";
    pic7.value = "";
    name_pic7.value = "";
};

const config = {
    headers: { "Content-Type": "multipart/form-data" },
};

const addproject = async () => {
    try {
        const data = {
            type_project: type_project.value,
            location: location.value,
            name_client: name_client.value,
            year: year.value,
            status: status.value,
            project_name: project_name.value,
            main_pic: main_pic.value.files[0],
            grid_pic: grid_pic.value.files[0],
            article: article.value,
            energy_savings: energy_savings.value,
            water_savings: water_savings.value,
            carbon_reduction: carbon_reduction.value,
            embodied_energy: embodied_energy.value,
            basic_design: basic_design.value,
            qs: qs.value,
            mep: mep.value,
            struktur: struktur.value,
            team_arsitektur: team_arsitektur.value,
            sustainability_team: sustainability_team.value,
            architecht: architecht.value,
            architecht_build: architecht_build.value,
            main_contractor: main_contractor.value,
            design_team: design_team.value,
            collaborators: collaborators.value,
            fabrication_team: fabrication_team.value,
            publication: publication.value,
            pic1: pic1.value.files[0],
            name_pic1: name_pic1.value,
            pic2: pic2.value.files[0],
            name_pic2: name_pic2.value,
            pic3: pic3.value.files[0],
            name_pic3: name_pic3.value,
            pic4: pic4.value.files[0],
            name_pic4: name_pic4.value,
            pic5: pic5.value.files[0],
            name_pic5: name_pic5.value,
            pic6: pic6.value.files[0],
            name_pic6: name_pic6.value,
            pic7: pic7.value.files[0],
            name_pic7: name_pic7.value,
        };
        const response = await axios.post(urladdproject, data, config);
        window.location.reload();
        notify("Work has been added");
        clearInput();
    } catch (error) {
        console.log(error);
    }
};
</script>

<style lang="scss" scoped></style>
