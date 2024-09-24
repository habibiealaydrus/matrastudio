<template>
    <div class="container card">
        <div row>
            <div class="col-12 p-3">
                <div
                    class="card bg-success-subtle shadow-sm"
                    style="width: 100%"
                >
                    <div
                        class="card-header btn text-white fs-3 text-start"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsemessage"
                    >
                        Messages
                    </div>
                    <div class="collapse" id="collapsemessage">
                        <table class="table border table-bordered rounded-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in messages">
                                    <th scope="row">{{ index + 1 }}</th>
                                    <td>{{ item.name }}</td>
                                    <td>{{ item.email }}</td>
                                    <td>{{ item.subject }}</td>
                                    <td>
                                        <button
                                            class="btn btn-primary"
                                            @click="getdetailmesagge(item.id)"
                                            type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#messagePreviewModal"
                                        >
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Detail message modal -->
        <div
            class="modal fade modal-md"
            id="messagePreviewModal"
            tabindex="-1"
            aria-labelledby="messageModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h1
                            class="modal-title fs-5 fw-bold text-white"
                            id="messageModalLabel"
                        >
                            Preview message
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
                            <div class="mb-3">
                                <label
                                    for="exampleInputEmail1"
                                    class="form-label"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    aria-describedby="emailHelp"
                                    :value="`${messagedetail.name}`"
                                    disabled
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    for="exampleInputPassword1"
                                    class="form-label"
                                    >Email</label
                                >
                                <input
                                    type="text"
                                    :value="`${messagedetail.email}`"
                                    class="form-control"
                                    id="exampleInputPassword1"
                                    disabled
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    for="exampleInputPassword1"
                                    class="form-label"
                                    >Subject</label
                                >
                                <input
                                    type="text"
                                    :value="`${messagedetail.subject}`"
                                    class="form-control"
                                    id="exampleInputPassword1"
                                    disabled
                                />
                            </div>
                            <div class="mb-3">
                                <label
                                    for="exampleFormControlTextarea1"
                                    class="form-label"
                                    >Message</label
                                >
                                <textarea
                                    class="form-control"
                                    :value="`${messagedetail.message}`"
                                    id="exampleFormControlTextarea1"
                                    rows="3"
                                    disabled
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div row>
            <div class="col-12 p-3">
                <div class="card bg-warning shadow-sm" style="width: 100%">
                    <div
                        class="card-header btn text-white fs-3 text-start"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapinquirymessages"
                    >
                        Inquiry Messages
                    </div>
                    <div class="collapse" id="collapinquirymessages">
                        <table class="table border table-bordered rounded-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Type Project</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(inquiryitem, index) in inquiries">
                                    <th scope="row">{{ index + 1 }}</th>
                                    <td>{{ inquiryitem.email_inquiry }}</td>
                                    <td>{{ inquiryitem.company_location }}</td>
                                    <td>{{ inquiryitem.type_project }}</td>
                                    <td>
                                        <button
                                            class="btn btn-primary"
                                            @click="
                                                getdetailinquiry(inquiryitem.id)
                                            "
                                            type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#inquiryPreviewModal"
                                        >
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Detail inquiry modal -->
            <div
                class="modal fade modal-xl"
                id="inquiryPreviewModal"
                tabindex="-1"
                aria-labelledby="inquiryModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h1
                                class="modal-title fs-5 fw-bold text-white"
                                id="inquiryModalLabel"
                            >
                                Preview inquiry
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
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label
                                                for="exampleInputEmail1"
                                                class="form-label"
                                                >Gender
                                            </label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="exampleInputEmail1"
                                                aria-describedby="emailHelp"
                                                :value="`${inquirydetail.title_gender}`"
                                                disabled
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="exampleInputPassword1"
                                                class="form-label"
                                                >First Name</label
                                            >
                                            <input
                                                type="text"
                                                :value="`${inquirydetail.first_name}`"
                                                class="form-control"
                                                disabled
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="exampleInputPassword1"
                                                class="form-label"
                                                >Last Name</label
                                            >
                                            <input
                                                type="text"
                                                :value="`${inquirydetail.last_name}`"
                                                class="form-control"
                                                disabled
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="exampleInputPassword1"
                                                class="form-label"
                                                >Email</label
                                            >
                                            <input
                                                type="text"
                                                :value="`${inquirydetail.email_inquiry}`"
                                                class="form-control"
                                                disabled
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="exampleInputPassword1"
                                                class="form-label"
                                                >Phone</label
                                            >
                                            <input
                                                type="text"
                                                :value="`${inquirydetail.phone}`"
                                                class="form-control"
                                                disabled
                                            />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label
                                                for="exampleInputPassword1"
                                                class="form-label"
                                                >Post Code</label
                                            >
                                            <input
                                                type="text"
                                                :value="`${inquirydetail.post_code}`"
                                                class="form-control"
                                                id="exampleInputPassword1"
                                                disabled
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="exampleInputPassword1"
                                                class="form-label"
                                                >Company Name</label
                                            >
                                            <input
                                                type="text"
                                                :value="`${inquirydetail.company_name}`"
                                                class="form-control"
                                                id="exampleInputPassword1"
                                                disabled
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="exampleInputPassword1"
                                                class="form-label"
                                                >Company Location</label
                                            >
                                            <input
                                                type="text"
                                                :value="`${inquirydetail.company_location}`"
                                                class="form-control"
                                                id="exampleInputPassword1"
                                                disabled
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="exampleInputPassword1"
                                                class="form-label"
                                                >Type Project</label
                                            >
                                            <input
                                                type="text"
                                                :value="`${inquirydetail.type_project}`"
                                                class="form-control"
                                                id="exampleInputPassword1"
                                                disabled
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="exampleInputPassword1"
                                                class="form-label"
                                                >Subject</label
                                            >
                                            <input
                                                type="text"
                                                :value="`${inquirydetail.subject_inquiry}`"
                                                class="form-control"
                                                id="exampleInputPassword1"
                                                disabled
                                            />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label
                                                for="exampleInputPassword1"
                                                class="form-label"
                                                >Message</label
                                            >
                                            <textarea
                                                type="text"
                                                rows="4"
                                                :value="`${inquirydetail.message_inquiry}`"
                                                class="form-control"
                                                id="exampleInputPassword1"
                                                disabled
                                            ></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label
                                                for="exampleInputPassword1"
                                                class="form-label"
                                                >File</label
                                            >
                                            <br />

                                            <a
                                                :href="`http://127.0.0.1:8000/storage/projectfile/${inquirydetail.project_file}`"
                                                target="_blank"
                                                >Data upload</a
                                            >
                                        </div>
                                    </div>
                                </div>
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

const messages = ref([]);
const baseURL = axios.defaults.baseURL;
const urlmessages = baseURL + "/api/allmessage";
const messagedetail = ref([]);
const inquiries = ref([]);
const inquirydetail = ref([]);

const getmessages = async () => {
    const response = await axios.get(urlmessages);
    messages.value = response.data.data;
};
const getdetailmesagge = async (e) => {
    const idDteailMessage = e;
    const urldetailmessage =
        axios.defaults.baseURL + "/" + "detailmessage" + "/" + idDteailMessage;
    console.log(urldetailmessage);
    const response = await axios.get(urldetailmessage);
    messagedetail.value = response.data.data;
};

const getinquiries = async () => {
    const urlinquiries = baseURL + "/api/inquiries";
    const response = await axios.get(urlinquiries);

    inquiries.value = response.data.data;
};
const getdetailinquiry = async (e) => {
    const idDteailInquiry = e;
    const urldetailinquiry =
        axios.defaults.baseURL + "/" + "inquirymessage" + "/" + idDteailInquiry;
    //console.log(urldetailinquiry);
    const response = await axios.get(urldetailinquiry);
    //console.log(response);
    inquirydetail.value = response.data.data;
};

onMounted(() => {
    getmessages();
    getinquiries();
});
</script>

<style lang="scss" scoped></style>
