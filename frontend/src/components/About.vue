<template>
    <section class="about-page">
        <header class="about-hero">
            <div class="about-hero-copy">
                <p class="eyebrow">Who we are · Jakarta</p>
                <h1>Architecture<br /><em>for everyday life.</em></h1>
                <p class="about-intro">We are a collective of interdisciplinary young designers who believe that design is a medium for connecting people, cultures, and nature. We create sustainable and inspiring architecture, exploring possibilities while valuing practicality. For us, architecture is not just about physical structures; it’s about creating spaces for human life and shaping social constructs. We believe that by designing better architecture, we can help create more livable and sustainable cities for people.</p>
                <a href="#our-team" class="about-scroll-link">Meet the people behind the work <span aria-hidden="true">↓</span></a>
            </div>
            <figure class="about-hero-photo">
                <img src="../assets/img/foto crew matra.png" alt="The Matra Studio team" />
                <figcaption>Matra Studio · An interdisciplinary team</figcaption>
            </figure>
            <div class="about-disciplines"><span>People</span><i></i><span>Culture</span><i></i><span>Nature</span></div>
        </header>
        <section id="our-team" class="about-team-section">
            <header class="about-section-heading">
                <div><p class="eyebrow">People behind the work</p><h2>Different perspectives.<br /><em>Shared purpose.</em></h2></div>
                <p>Our work is shaped by a close-knit team bringing design, architecture, sustainability, and thoughtful collaboration to every project.</p>
            </header>
            <div class="team-grid">
                <article class="team-card"><div class="team-card-photo"><img src="../assets/img/profile/Rizkikay.jpeg" alt="Ar. Rizki T. Siregar" loading="lazy" /><span>01</span></div><div><p>Ar. Rizki T. Siregar, M.T, GP</p><span>Co-founder · CEO</span></div></article>
                <article class="team-card"><div class="team-card-photo"><img src="../assets/img/profile/yasser.jpeg" alt="Ar. Yasser Hafizs" loading="lazy" /><span>02</span></div><div><p>Ar. Yasser Hafizs, S.T, M.T, GP</p><span>Co-founder · Design Director</span></div></article>
                <article class="team-card"><div class="team-card-photo"><img src="../assets/img/profile/Aurora.jpg" alt="Aurora F. Dahniar" loading="lazy" /><span>03</span></div><div><p>Aurora F. Dahniar, S.E</p><span>Finance Administrator</span></div></article>
                <article class="team-card"><div class="team-card-photo"><img src="../assets/img/profile/Erika.jpg" alt="Erika Angelina" loading="lazy" /><span>04</span></div><div><p>Erika Angelina, S.Ar</p><span>Sustainability Specialist</span></div></article>
                <article class="team-card"><div class="team-card-photo"><img src="../assets/img/profile/Jonathan.jpg" alt="Jonathan A. Danilo" loading="lazy" /><span>05</span></div><div><p>Jonathan A. Danilo, S.Ar</p><span>Architectural Designer</span></div></article>
            </div>
        </section>

        <section class="about-partners">
            <header class="about-section-heading partners-heading">
                <div><p class="eyebrow">In good company</p><h2>Better work,<br /><em>made together.</em></h2></div>
                <p>We value the people and organizations who share our curiosity and help turn ideas into meaningful places.</p>
            </header>
            <div v-if="logoclients.length" class="about-partner-grid">
                <div class="about-partner-logo" v-for="logo in logoclients" :key="logo.id || logo.projectclient_img">
                    <img :src="`${baseURL}/storage/projectclients/${logo.projectclient_img}`" :alt="logo.projectclient_name || 'Matra Studio collaborator'" loading="lazy" />
                </div>
            </div>
        </section>
    </section>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const baseURL = axios.defaults.baseURL;

const urllogoclient = baseURL + "/api/allimageclient";
const logoclients = ref([]);

const getlogoclient = async () => {
    try {
        const response = await axios.get(urllogoclient);
        logoclients.value = response.data.data;
    } catch (error) {}
};
onMounted(() => {
    getlogoclient();
});
</script>

<style lang="scss" scoped></style>
