<template>
    <nav class="site-nav" aria-label="Navigasi utama">
        <div class="nav-inner">
            <RouterLink class="brand-lockup" to="/" aria-label="Matra Studio, beranda" @click="closeMenu">
                <img src="../assets/img/logo-matra-studio.png" alt="Matra Studio" />
            </RouterLink>

            <button class="nav-toggle" type="button" :aria-expanded="menuOpen" aria-controls="primary-navigation" @click="menuOpen = !menuOpen">
                <span class="nav-toggle-icon" aria-hidden="true">{{ menuOpen ? "×" : "☰" }}</span>
                <span>{{ menuOpen ? "Close" : "Menu" }}</span>
            </button>

            <div id="primary-navigation" class="nav-links" :class="{ 'is-open': menuOpen }">
                <RouterLink to="/" @click="closeMenu">Home</RouterLink>
                <RouterLink to="/work" @click="closeMenu">Work</RouterLink>
                <RouterLink to="/about" @click="closeMenu">About</RouterLink>
                <div class="nav-updates">
                    <button type="button" :aria-expanded="updatesOpen" @click="updatesOpen = !updatesOpen">Journal <span class="nav-chevron" aria-hidden="true"></span></button>
                    <div v-if="updatesOpen" class="nav-submenu">
                        <RouterLink to="/news" @click="closeMenu">News</RouterLink>
                        <RouterLink to="/blogs" @click="closeMenu">Stories</RouterLink>
                        <RouterLink to="/events" @click="closeMenu">Events</RouterLink>
                    </div>
                </div>
                <RouterLink to="/contact" class="nav-cta" @click="closeMenu">Start a project <span aria-hidden="true">↗</span></RouterLink>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref } from "vue";

const menuOpen = ref(false);
const updatesOpen = ref(false);
const closeMenu = () => {
    menuOpen.value = false;
    updatesOpen.value = false;
};
</script>
