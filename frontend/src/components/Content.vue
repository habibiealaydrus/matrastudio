<template>
    <div class="container card p-5 mt-2">
        <div class="row">
            <div class="col-md-6">
                <WorkList />
            </div>
            <div class="col-md-6">
                <NewsList />
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-6">
                <BlogList />
            </div>
            <div class="col-md-6">
                <EventList />
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-6">
                <ClientList />
            </div>
        </div>
    </div>
</template>

<script setup>
import WorkList from "../components/WorkList.vue";
import NewsList from "../components/NewsList.vue";
import BlogList from "../components/BlogList.vue";
import EventList from "../components/EventList.vue";
import ClientList from "../components/ClientList.vue";
</script>

<style lang="scss" scoped></style>
