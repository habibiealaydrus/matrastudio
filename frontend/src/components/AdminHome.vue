<template>
    <div class="container-fluid">
        <div class="row">
            <div
                class="col-lg-2 col-sm-3 h-auto"
                style="background-color: lightslategrey"
            >
                <nav class="navbar">
                    <div class="container-fluid">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a
                                    class="nav-link text-white display-6"
                                    aria-current="page"
                                    href="/admin"
                                    >Home</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link text-white"
                                    href="/admin/user"
                                    >Users</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link text-white"
                                    href="/admin/content"
                                    >Content</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link text-white"
                                    href="/admin/inquiry"
                                    >Inquiry & Messages</a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" @click="logout"
                                    >Log Out</a
                                >
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div
                class="col-lg-10 col-sm-9"
                style="background-color: bisque; min-height: 70vh"
            >
                <RouterView />
            </div>
        </div>
    </div>
</template>

<script setup>
import { RouterLink, RouterView } from "vue-router";
import axios from "axios";

const tokenLogin = localStorage.getItem("token");
const baseURL = axios.defaults.baseURL;

const urlLogout = baseURL + "/api/logout";
const config = {
    headers: { Authorization: `Bearer ${tokenLogin}` },
};
const logout = async () => {
    try {
        await axios.get(urlLogout, config).then((response) => {
            window.location.href = "/login";
        });
        localStorage.clear();
    } catch (error) {
        console.error(error);
    }
};
</script>

<style lang="scss" scoped></style>
