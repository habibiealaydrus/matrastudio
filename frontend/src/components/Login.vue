<template>
    <section class="gradient-custom py-5">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div
                        class="card bg-dark text-white"
                        style="border-radius: 1rem"
                    >
                        <div class="card-body p-5 text-center">
                            <form @submit.prevent="login">
                                <div class="mt-md-3">
                                    <h2 class="fw-bold mb-2 text-uppercase">
                                        MatraStudio
                                    </h2>
                                    <p class="text-white-50">
                                        Website Admin System
                                    </p>

                                    <div
                                        data-mdb-input-init
                                        class="form-outline form-white text-start"
                                    >
                                        <input
                                            v-model="email"
                                            type="email"
                                            id="typeEmailX"
                                            class="form-control form-control-lg"
                                        />
                                        <label
                                            class="form-label text-start"
                                            for="typeEmailX"
                                            >Email</label
                                        >
                                    </div>

                                    <div
                                        data-mdb-input-init
                                        class="form-outline form-white text-start"
                                    >
                                        <input
                                            type="password"
                                            id="typePasswordX"
                                            class="form-control form-control-lg"
                                            v-model="password"
                                        />
                                        <label
                                            class="form-label"
                                            for="typePasswordX"
                                            >Password</label
                                        >
                                    </div>
                                    <button
                                        data-mdb-button-init
                                        data-mdb-ripple-init
                                        class="btn btn-outline-light btn-lg px-5 mt-4"
                                        type="submit"
                                    >
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const email = ref([]);
const password = ref([]);
const baseURL = axios.defaults.baseURL;

const urlLogin = baseURL + "/public/api/login";

const login = async () => {
    await axios
        .post(urlLogin, {
            email: email.value,
            password: password.value,
        })
        .then((response) => {
            //alert(response.data.message);
            const status = response.data.status;
            const data = response.data.token;
            const id = response.data.data;

            if (status == true) {
                window.localStorage.setItem("token", data);
                window.localStorage.setItem("id", id);
                window.localStorage.setItem("authorized", true);
                window.location.href = "/admin";
            }
        })
        .catch((error) => {
            alert("Gagal Login");
        });
};
</script>

<style>
.gradient-custom {
    /* fallback for old browsers */
    background: #6a11cb;

    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(
        to right,
        rgba(106, 17, 203, 1),
        rgba(37, 117, 252, 1)
    );

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(
        to right,
        rgba(106, 17, 203, 1),
        rgba(37, 117, 252, 1)
    );
}
</style>
