<template>
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <p class="admin-brand">MATRA STUDIO <span>· STUDIO DESK</span></p>
            <nav aria-label="Admin navigation">
                <ul class="navbar-nav">
                    <li><a class="nav-link" href="/admin">Overview</a></li>
                    <li><a class="nav-link" href="/admin/user">Users</a></li>
                    <li><a class="nav-link" href="/admin/content">Content library</a></li>
                    <li><a class="nav-link" href="/admin/inquiry">Inquiries & messages</a></li>
                    <li><a class="nav-link" href="#" @click.prevent="logout">Log out</a></li>
                </ul>
            </nav>
        </aside>
        <main class="admin-content"><RouterView /></main>
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
            alert("You successfully logout");
        });
        localStorage.clear();
    } catch (error) {
        console.error(error);
    }
};
</script>

<style lang="scss" scoped></style>
