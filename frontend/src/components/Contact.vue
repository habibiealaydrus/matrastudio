<template>
    <div class="container">
        <div class="row p-5">
            <div class="col-md-6 pb-3">
                <h1 class="h1">
                    Let's create something extraordinary together!
                </h1>
                <p class="fs-5">
                    You can email us at info@matrastudio.com, fill out the form
                    below, or schedule a call.
                </p>
                <div class="d-flex flex-column">
                    <div class="py-1">
                        <p class="d-inline-flex gap-1">
                            <button
                                class="btn btn-primary"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#formmessage"
                                aria-expanded="false"
                                aria-controls="formmessage"
                            >
                                Form to message us
                            </button>
                        </p>
                        <div class="collapse" id="formmessage">
                            <form @submit.prevent="addmessage">
                                <div class="mb-3">
                                    <label
                                        for="exampleInputEmail1"
                                        class="form-label"
                                        >Name</label
                                    >
                                    <input
                                        type="text"
                                        v-model="name"
                                        class="form-control"
                                        id="exampleInputEmail1"
                                        aria-describedby="emailHelp"
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
                                        v-model="email"
                                        class="form-control"
                                        id="exampleInputPassword1"
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
                                        v-model="subject"
                                        class="form-control"
                                        id="exampleInputPassword1"
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
                                        v-model="message"
                                        id="exampleFormControlTextarea1"
                                        rows="3"
                                    ></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                    <div>
                        <p class="d-inline-flex gap-1">
                            <button
                                class="btn btn-secondary"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#forminquiry"
                                aria-expanded="false"
                                aria-controls="forminquiry"
                            >
                                Form with Enquiry
                            </button>
                        </p>
                        <div class="collapse pb-3" id="forminquiry">
                            <form @submit.prevent="inquiryform" class="fs-6">
                                <div class="d-flex flex-nowrap gap-1">
                                    <div class="mb-3">
                                        <label
                                            for="exampleInputEmail1"
                                            class="form-label"
                                        >
                                            Title
                                        </label>
                                        <select
                                            v-model="title_gender"
                                            id=""
                                            class="form-select"
                                        >
                                            <option value="Mr">Mr.</option>
                                            <option value="Mrs">Mrs.</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleInputEmail1"
                                            class="form-label"
                                        >
                                            First Name
                                            <span class="required"
                                                >(required)</span
                                            >
                                        </label>
                                        <input
                                            v-model="first_name"
                                            type="text"
                                            class="form-control"
                                            id="exampleInputEmail1"
                                            aria-describedby="emailHelp"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleInputEmail1"
                                            class="form-label"
                                        >
                                            Last Name
                                            <span class="required"
                                                >(required)</span
                                            >
                                        </label>
                                        <input
                                            v-model="last_name"
                                            type="text"
                                            class="form-control"
                                            id="exampleInputEmail1"
                                            aria-describedby="emailHelp"
                                        />
                                    </div>
                                </div>
                                <div class="d-flex flex-nowrap gap-1">
                                    <div class="mb-3">
                                        <label
                                            for="exampleInputEmail1"
                                            class="form-label"
                                        >
                                            Email
                                            <span class="required"
                                                >(required)</span
                                            >
                                        </label>
                                        <input
                                            v-model="email_inquiry"
                                            type="text"
                                            class="form-control"
                                            id="exampleInputEmail1"
                                            aria-describedby="emailHelp"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleInputEmail1"
                                            class="form-label"
                                        >
                                            Phone
                                            <span class="required"
                                                >(required)</span
                                            >
                                        </label>
                                        <input
                                            v-model="phone"
                                            type="number"
                                            class="form-control"
                                            id="exampleInputEmail1"
                                            aria-describedby="emailHelp"
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleInputEmail1"
                                            class="form-label"
                                        >
                                            Post Code
                                            <span class="required"
                                                >(required)</span
                                            >
                                        </label>
                                        <input
                                            v-model="post_code"
                                            type="number"
                                            class="form-control"
                                            id="exampleInputEmail1"
                                            aria-describedby="emailHelp"
                                        />
                                    </div>
                                </div>
                                <div class="d-flex flex-nowrap gap-1">
                                    <div class="mb-3">
                                        <label
                                            for="exampleInputEmail1"
                                            class="form-label"
                                        >
                                            Company Name
                                        </label>
                                        <div class="d-flex">
                                            <input
                                                v-model="company_name"
                                                type="text"
                                                class="form-control w-full"
                                                id="exampleInputEmail1"
                                                aria-describedby="emailHelp"
                                            />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleInputEmail1"
                                            class="form-label"
                                        >
                                            Company Location
                                        </label>
                                        <input
                                            v-model="company_location"
                                            type="text"
                                            class="form-control"
                                            id="exampleInputEmail1"
                                            aria-describedby="emailHelp"
                                        />
                                    </div>
                                </div>
                                <div class="gap-1">
                                    <div class="mb-3">
                                        <label
                                            for="exampleInputEmail1"
                                            class="form-label"
                                        >
                                            What can we help you?
                                        </label>
                                        <select
                                            v-model="type_project"
                                            id=""
                                            class="form-select"
                                        >
                                            <option value="Project Inquiry">
                                                Project Inquiry
                                            </option>
                                            <option value="Collaboration">
                                                Collaboration
                                            </option>
                                            <option value="Press">Press</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="gap-1">
                                    <div class="mb-3">
                                        <label
                                            for="exampleInputEmail1"
                                            class="form-label"
                                        >
                                            Subject
                                            <span class="required"
                                                >(required)</span
                                            >
                                        </label>
                                        <div class="d-flex">
                                            <input
                                                v-model="subject_inquiry"
                                                type="text"
                                                class="form-control w-full"
                                                id="exampleInputEmail1"
                                                aria-describedby="emailHelp"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="gap-1">
                                    <div class="mb-3">
                                        <label
                                            for="exampleInputEmail1"
                                            class="form-label"
                                        >
                                            Message
                                            <span class="required"
                                                >(required)</span
                                            >
                                        </label>
                                        <div class="d-flex">
                                            <textarea
                                                v-model="message_inquiry"
                                                class="form-control"
                                                id="exampleFormControlTextarea1"
                                                rows="3"
                                            ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="gap-1">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"
                                            >Upload supporting documents (site
                                            photos, plot, etc)</label
                                        >
                                        <input
                                            type="file"
                                            placeholder="Pilih File"
                                            class="form-control"
                                            ref="InputFile"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff, .pdf"
                                        />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="../assets/img/square.gif" alt="" class="img-fluid" />
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const name = ref("");
const email = ref("");
const subject = ref("");
const message = ref("");

const title_gender = ref("");
const first_name = ref("");
const last_name = ref("");
const email_inquiry = ref("");
const phone = ref("");
const post_code = ref("");
const company_name = ref("");
const company_location = ref("");
const type_project = ref("");
const subject_inquiry = ref("");
const message_inquiry = ref("");
const InputFile = ref("");

const urladdmessage = "http://127.0.0.1:8000/api/addmessage";
const urladdinquiry = "http://127.0.0.1:8000/api/inqurymessage";

const clearInput = () => {
    name.value = "";
    message.value = "";
    subject.value = "";
    email.value = "";
};

const addmessage = async () => {
    try {
        const data = {
            name: name.value,
            email: email.value,
            subject: subject.value,
            message: message.value,
        };
        console.log(data);
        const response = await axios.post(urladdmessage, data);
        clearInput();
        alert("Mesages has been sent");
    } catch (error) {
        console.log(error);
    }
};

const config = {
    headers: { "Content-Type": "multipart/form-data" },
};
const inquiryform = async () => {
    try {
        const dataInquiry = {
            title_gender: title_gender.value,
            first_name: first_name.value,
            last_name: last_name.value,
            email_inquiry: email_inquiry.value,
            phone: phone.value,
            post_code: post_code.value,
            company_name: company_name.value,
            company_location: company_location.value,
            type_project: type_project.value,
            subject_inquiry: subject_inquiry.value,
            message_inquiry: message_inquiry.value,
            project_file: InputFile.value.files[0],
        };
        const response = await axios.post(urladdinquiry, dataInquiry, config);

        clearInput();
        alert("Your Inquiry has been sent");
        window.location.href = "/about";
    } catch (error) {
        alert(error.response.data.message);
    }
};
</script>

<style lang="scss" scoped></style>
