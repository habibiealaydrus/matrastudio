<template>
    <footer class="site-footer">
        <div class="footer-top">
            <div>
                <p class="eyebrow">Have a place in mind?</p>
                <h2>Let’s make room for what matters.</h2>
            </div>
            <div class="footer-contact">
                <RouterLink class="button-ghost footer-cta" to="/contact">Tell us about your project <span class="footer-cta-arrow" aria-hidden="true">↗</span></RouterLink>
                <div class="contact-details">
                    <a href="mailto:info@matrastudio.com">info@matrastudio.com</a>
                    <span>Jakarta Creative Hub · Central Jakarta</span>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <RouterLink class="footer-brand" to="/">
                <img src="../assets/img/logo.png" alt="Matra Studio" />
            </RouterLink>
            <div class="footer-socials" aria-label="Social media">
                <a href="https://www.instagram.com/matra.studio" target="_blank" rel="noreferrer">Instagram</a>
                <a href="https://www.youtube.com/@matraarchitecturestudio1353" target="_blank" rel="noreferrer">YouTube</a>
                <a href="https://www.linkedin.com/company/matrastudio/" target="_blank" rel="noreferrer">LinkedIn</a>
            </div>
            <span>© {{ year }} Matra Studio</span>
        </div>
    </footer>
</template>

<script setup>
import { RouterLink } from "vue-router";
const year = new Date().getFullYear();
</script>
