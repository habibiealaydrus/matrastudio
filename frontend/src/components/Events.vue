<template>
    <div class="container-fluid bg-white">
        <div class="d-flex flex-wrap justify-content-center">
            <div v-for="event in events">
                <div class="news px-3">
                    <a
                        :href="`/event/detail/${event.id}`"
                        class="link-offset-2 link-underline link-underline-opacity-0"
                        style="color: black"
                    >
                        <div>
                            <img
                                :src="
                                    baseURL +
                                    `/storage/event/${event.thumbnail_event}`
                                "
                                alt=""
                                class="w-100"
                            />
                            <button
                                class="btn btn-info mt-2"
                                v-if="new Date(event.date) > today"
                            >
                                Incoming Event
                            </button>
                        </div>
                        <h1>{{ event.title_event }}</h1>
                        <p class="">
                            {{ event.article_event.substr(0, 100) }}.....
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const events = ref([]);
const baseURL = axios.defaults.baseURL;
const urlevent = baseURL + "/api/event";
const today = new Date();
const date =
    today.getFullYear() + "-" + (today.getMonth() + 1) + "-" + today.getDate();

const getevent = async () => {
    try {
        const response = await axios.get(urlevent);
        console.log(response.data.data);
        events.value = response.data.data;
    } catch (error) {}
};

onMounted(() => {
    getevent();
});
</script>

<style lang="scss" scoped></style>
