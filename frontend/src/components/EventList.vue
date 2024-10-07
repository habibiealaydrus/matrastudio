<template>
    <div>
        <div class="card bg-success-subtle" style="width: 100%">
            <div class="card-header d-flex justify-content-between flex-wrap">
                <div
                    class="text-white fs-3 text-start"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsevent"
                >
                    Event
                </div>
                <button
                    type="button"
                    class="btn btn-primary text-end"
                    data-bs-toggle="modal"
                    data-bs-target="#EventAddModal"
                >
                    Tambah
                </button>
            </div>
            <FormAddEvent />
            <div class="collapse" id="collapsevent">
                <div class="table-responsive">
                    <table class="table border table-bordered rounded-3">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title event</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(itemevent, index) in event">
                                <th scope="row">{{ index + 1 }}</th>
                                <td class="text-wrap">
                                    {{ itemevent.title_event }}
                                </td>
                                <td class="text-center">
                                    <img
                                        :src="
                                            baseURL +
                                            `/storage/event/${itemevent.pic_event}`
                                        "
                                        alt=""
                                        class="w-10075"
                                    />
                                </td>
                                <td
                                    class="d-flex flex-column gap-3 align-items-center"
                                >
                                    <button
                                        class="btn btn-primary"
                                        @click="previewEvent(itemevent.id)"
                                        type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#eventPreviewModal"
                                    >
                                        Detail
                                    </button>

                                    <button
                                        class="btn btn-danger"
                                        @click="deleteEvent(itemevent.id)"
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
        <!-- Preview Event modal  -->
        <div
            class="modal fade modal-xl"
            id="eventPreviewModal"
            tabindex="-1"
            aria-labelledby="eventModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h1
                            class="modal-title fs-5 fw-bold text-white"
                            id="eventModalLabel"
                        >
                            Preview event
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
                            <div v-if="`${idEvent}`">
                                <iframe
                                    :src="`${baseURL}/event/detail/${idEvent}`"
                                    frameborder="0"
                                    class="w-100"
                                    style="min-height: 75vh"
                                ></iframe>
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
import FormAddEvent from "../components/FormAddEvent.vue";

const pic_event = ref("");
const title_event = ref("");
const article_event = ref("");
const date = ref("");
const location_event = ref("");
const start_time = ref("");
const end_time = ref("");

const event = ref([]);
const baseURL = axios.defaults.baseURL;
const urlevent = baseURL + "/api/event";
const idEvent = ref([]);

const getevent = async () => {
    const response = await axios.get(urlevent);

    event.value = response.data.data;
};

const previewEvent = (e) => {
    idEvent.value = e;
};

const deleteEvent = async (e) => {
    const idDeleteEvent = e;
    const url = axios.defaults.baseURL;
    const apideleteEvent = url + "/api/deleteevent/";
    const urlDeleteEvent = apideleteEvent + idDeleteEvent;

    const response = await axios.delete(urlDeleteEvent);
    alert("Event deleted");
    window.location.href = "/admin/content";
};

onMounted(() => {
    getevent();
});
</script>

<style lang="scss" scoped></style>
