<template>
    <section class="bannerhome" aria-labelledby="home-title">
        <div class="home-hero-copy">
            <h1 id="home-title">
                <span class="hero-lead">We are creating meaningful spaces with a focus on</span>
                <span class="hero-focus-slot" aria-live="polite">
                    <Transition mode="out-in">
                        <span :key="currentFocus" class="hero-focus">{{ currentFocus }}</span>
                    </Transition>
                </span>
            </h1>
            <div class="hero-actions">
                <RouterLink class="button-primary" to="/work">
                    Explore our work <span aria-hidden="true">↗</span>
                </RouterLink>
                <RouterLink class="button-ghost" to="/about">Meet Matra</RouterLink>
                <a class="hero-scroll" href="#featured-projects">
                    <span>Scroll to explore</span>
                    <span class="hero-scroll-arrow" aria-hidden="true">↓</span>
                </a>
            </div>
        </div>
    </section>
</template>

<script setup>
import { onMounted, onUnmounted, ref } from "vue";
import { RouterLink } from "vue-router";

const focusWords = [
    "Sustainability",
    "Green Building",
    "Energy Efficiency",
    "Community Well-being",
];
const currentFocus = ref(focusWords[0]);
let rotationTimer;

onMounted(() => {
    let index = 0;
    rotationTimer = window.setInterval(() => {
        index = (index + 1) % focusWords.length;
        currentFocus.value = focusWords[index];
    }, 2000);
});

onUnmounted(() => {
    window.clearInterval(rotationTimer);
});
</script>
