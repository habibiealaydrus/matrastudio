<template>
    <div>
        <img
            :src="baseURL + `/storage/event/${event.pic_event}`"
            alt=""
            class="w-100 img-fluid"
        />
        <div class="container-fluid p-5 bg-secondary text-white text-left">
            <div class="row justify-content-center">
                <div class="col-8 fs-5">
                    <h3 class="h3 text-left">Event</h3>
                    <p class="display-5 fw-medium">{{ event.title_event }}</p>
                    <h3 class="h3 text-left"></h3>
                    <div class="pt-5" v-html="event.article_event"></div>
                    <p class="fs-1">
                        Location: <strong>{{ event.location_event }}</strong>
                    </p>

                    <p class="fs-3">
                        Date:
                        <strong>
                            {{ date.slice(9, 11) }}/{{ date.slice(6, 8) }}/{{
                                date.slice(1, 5)
                            }}
                        </strong>
                    </p>
                    <p class="fs-6">
                        Time:
                        <strong
                            >{{ start.slice(1, 6) }} -
                            {{ end.slice(1, 6) }}</strong
                        >
                    </p>
                    <a href="/events" class="nav-link pt-5">
                        <font-awesome-icon :icon="['fas', 'arrow-left']" /> Back
                        to event
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const event = ref([]);
const start = ref([]);
const end = ref([]);
const date = ref([]);

const id = window.location.pathname.substring(13);
const baseURL = axios.defaults.baseURL;
const urldetail = baseURL + "/api/detilevent" + id;

const getdetailevent = async () => {
    const response = await axios.get(urldetail);
    event.value = response.data.data;
    start.value = JSON.stringify(response.data.data.start_time);
    end.value = JSON.stringify(response.data.data.end_time);
    date.value = JSON.stringify(response.data.data.date);
};

onMounted(() => {
    getdetailevent();
});
</script>

<style lang="scss" scoped></style>
