<template>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <img
                src="../assets/img/logo-matra-studio.png"
                class="w-25"
                alt=""
            />

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
                @click="NavButton"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse nav justify-content-end"
                id="navbarSupportedContent"
            >
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <RouterLink class="nav-link" aria-current="page" to="/">
                            Home</RouterLink
                        >
                    </li>
                    <li class="nav-item">
                        <RouterLink
                            class="nav-link"
                            aria-current="page"
                            to="/work"
                        >
                            Work</RouterLink
                        >
                    </li>
                    <li class="nav-item">
                        <RouterLink class="nav-link" to="/about"
                            >About</RouterLink
                        >
                    </li>
                    <li class="nav-item">
                        <RouterLink class="nav-link" to="/process"
                            >Process</RouterLink
                        >
                    </li>
                    <li class="updates nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            Updates
                        </a>
                        <ul
                            class="dropdown-menu bg-white"
                            style="
                                margin-top: -4dvh;
                                border: none;
                                background-color: transparent;
                            "
                        >
                            <div
                                class="d-flex flex-row justify-content-center gap-2"
                                id="sublink"
                            >
                                <li>
                                    <RouterLink class="nav-link" to="/news"
                                        >News</RouterLink
                                    >
                                </li>
                                <li>
                                    <RouterLink class="nav-link" to="/blogs"
                                        >Blog</RouterLink
                                    >
                                </li>
                                <li>
                                    <RouterLink class="nav-link" to="/events"
                                        >Event</RouterLink
                                    >
                                </li>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <RouterLink class="nav-link" to="/contact"
                            >Contact</RouterLink
                        >
                    </li>
                    <div class="d-flex flex-row mb-3 mx-auto">
                        <li class="nav-item">
                            <a class="nav-link p-2" href="#">
                                <font-awesome-icon
                                    :icon="['fab', 'instagram']"
                                />
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2" href="#">
                                <font-awesome-icon :icon="['fab', 'youtube']" />
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-2" href="#">
                                <font-awesome-icon
                                    :icon="['fab', 'facebook']"
                                />
                            </a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref, onMounted } from "vue";

const buttonNav = ref(null);

const NavButton = () => {
    const eCollapse = document.getElementById("navbarSupportedContent");
    const sublink = document.getElementById("sublink");
    eCollapse.classList.toggle("justify-content-end");
    eCollapse.classList.toggle("justify-content-center");
    eCollapse.classList.toggle("text-center");
    eCollapse.classList.toggle("mobilemenu");
    sublink.classList.toggle("sublinkmobile");
};
</script>

<style lang="scss" scoped></style>
