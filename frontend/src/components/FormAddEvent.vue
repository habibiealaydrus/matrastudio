<template>
    <div>
        <div
            class="modal fade modal-lg"
            id="EventAddModal"
            tabindex="-1"
            aria-labelledby="EventModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h1
                            class="modal-title fs-5 text-white"
                            id="EventModalLabel"
                        >
                            Tambah Event
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="addevent">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Picture Event (Landcape) </label
                                        ><span class="required">*required</span>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="formFile"
                                            ref="pic_event"
                                            accept=".jpg, .png, .jpeg, .gif"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">
                                            Thumbnail (Potrait) </label
                                        ><span class="required">*required</span>
                                        <input
                                            class="form-control"
                                            type="file"
                                            id="formFile"
                                            ref="thumbnail_event"
                                            accept=".jpg, .png, .jpeg, .gif"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Title Event</label
                                        ><span class="required">*required</span>
                                        <input
                                            v-model="title_event"
                                            type="text"
                                            class="form-control"
                                            id="headline_Event"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label"
                                            >Event Article</label
                                        ><span class="required">*required</span>
                                        <textarea
                                            class="form-control"
                                            id="article_event"
                                            rows="3"
                                            v-model="article_event"
                                            required
                                        ></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Location Event</label
                                        ><span class="required">*required</span>
                                        <input
                                            v-model="location_event"
                                            type="text"
                                            class="form-control"
                                            id="headline_Event"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <span class="required">*required</span>
                                        <input
                                            v-model="date"
                                            type="date"
                                            class="form-control"
                                            id="headline_Event"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >Start time</label
                                        ><span class="required">*required</span>
                                        <input
                                            v-model="start_time"
                                            type="time"
                                            class="form-control"
                                            id="headline_Event"
                                            required
                                        />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"
                                            >End time</label
                                        ><span class="required">*required</span>
                                        <input
                                            v-model="end_time"
                                            type="time"
                                            class="form-control"
                                            id="headline_Event"
                                            required
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
                                    Add Event
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

const pic_event = ref("");
const thumbnail_event = ref("");
const title_event = ref("");
const article_event = ref("");
const date = ref("");
const location_event = ref("");
const start_time = ref("");
const end_time = ref("");

const baseURL = axios.defaults.baseURL;
const urladdevent = baseURL + "/api/addevent";

const clearInput = () => {
    pic_event.value = "";
    title_event.value = "";
    article_event.value = "";
    date = "";
    location_event.value = "";
    start_time.value = "";
    end_time.value = "";
};

const config = {
    headers: { "Content-Type": "multipart/form-data" },
};

const addevent = async () => {
    const dataevent = {
        pic_event: pic_event.value.files[0],
        thumbnail_event: thumbnail_event.value.files[0],
        title_event: title_event.value,
        article_event: article_event.value,
        date: date.value,
        location_event: location_event.value,
        start_time: start_time.value,
        end_time: end_time.value,
    };
    //console.log(date);
    const response = await axios.post(urladdevent, dataevent, config);

    alert("event has been added");
    window.location.href = "/admin/content";
};
</script>

<style lang="scss" scoped></style>
