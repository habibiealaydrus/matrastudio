<script setup>
import { RouterView } from "vue-router";
import Navigation from "@/components/Navigation.vue";
</script>

<template>
    <div class="app-shell">
        <Navigation />
        <main class="app-main">
            <RouterView />
        </main>
    </div>
</template>

<style scoped></style>
