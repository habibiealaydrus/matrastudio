<template>
    <section class="listing-page">
        <header class="listing-heading"><p class="eyebrow">Meet, share, learn</p><h1>Events</h1><p>Gatherings and conversations around design, culture, and a more sustainable future.</p></header>
        <div class="listing-grid">
            <article v-for="event in events" :key="event.id" class="editorial-card">
                <a :href="`/event/detail/${projectSlug(event.title_event)}`">
                    <img :src="`${baseURL}/storage/event/${event.pic_event}`" :alt="event.title_event" loading="lazy" />
                    <div class="editorial-card-copy"><span class="meta">{{ event.date?.slice(0, 10) }} <template v-if="new Date(event.date) > today"> · Upcoming</template></span><h2>{{ event.title_event }}</h2><p v-html="excerpt(event.article_event)"></p></div>
                </a>
            </article>
        </div>
        <p v-if="!events.length" class="text-center text-secondary">There are no events to show right now.</p>
    </section>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import { projectSlug } from "../utils/projectSlug";

const events = ref([]);
const baseURL = axios.defaults.baseURL;
const urlevent = baseURL + "/api/event";

const today = new Date();
const date =
    today.getFullYear() + "-" + (today.getMonth() + 1) + "-" + today.getDate();

const excerpt = (html = "") => String(html).replace(/<[^>]*>/g, " ").replace(/\s+/g, " ").trim().slice(0, 180) + "…";

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
