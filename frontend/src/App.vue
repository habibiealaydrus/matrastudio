<script setup>
import { RouterLink, RouterView } from "vue-router";
import Navigation from "@/components/Navigation.vue";
</script>

<template>
    <div>
        <Navigation />

        <div class="bg-dark" style="height: 95dvh">
            <RouterView />
        </div>
    </div>
</template>

<style scoped></style>
