<script setup>
import { RouterLink, RouterView } from "vue-router";
import Navigation from "@/components/Navigation.vue";
</script>

<template>
    <div style="background-color: white">
        <Navigation />
        <RouterView />
    </div>
</template>

<style scoped></style>
