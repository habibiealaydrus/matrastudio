<template>
    <div class="row px-4 py-2 bg-white">
        <div class="col-md-4 mx-auto" v-for="event in events">
            <div class="news px-5 justify-content-center">
                <a
                    :href="`/event/detail/${event.id}`"
                    class="link-offset-2 link-underline link-underline-opacity-0"
                    style="color: black"
                >
                    <img
                        :src="`http://192.168.101.44:5000/storage/event/${event.pic_event}`"
                        alt=""
                        class="w-100"
                    />
                    <h1>{{ event.title_event }}</h1>
                    <p class="">
                        {{ event.article_event.substr(0, 100) }}.....
                    </p>
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const events = ref([]);
const urlevent = "http://192.168.101.44:5000/api/event";

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
