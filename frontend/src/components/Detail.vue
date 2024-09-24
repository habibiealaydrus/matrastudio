<template>
    <div>
        <img
            :src="`${baseURL}/storage/projectpicture/${detailproject.main_pic}`"
            alt=""
            class="w-100 img-fluid"
        />
        <div class="container text-left">
            <div class="row">
                <div class="col-6 pt-5 ps-3">
                    <h1 class="h1 fw-bold text-justify">
                        {{ detailproject.project_name }}
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6 pt-4 ps-3">
                    <p class="text-break" style="text-align: justify">
                        {{ detailproject.article }}
                    </p>
                </div>
                <div class="col-6 pt-4">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>CLIENT</td>
                                <td>: {{ detailproject.name_client }}</td>
                            </tr>
                            <tr>
                                <td>LOCATION</td>
                                <td>: {{ detailproject.location }}</td>
                            </tr>
                            <tr>
                                <td>YEAR</td>
                                <td>: {{ detailproject.year }}</td>
                            </tr>
                            <tr>
                                <td>DESIGN TEAM</td>
                                <td class="d-flex flex-row">
                                    <div>:&nbsp;</div>
                                    <div class="d-flex flex-column">
                                        <div>
                                            {{ detailproject.designer1 }}
                                        </div>
                                        <div>
                                            {{ detailproject.designer2 }}
                                        </div>
                                        <div>
                                            {{ detailproject.designer3 }}
                                        </div>
                                        <div>
                                            {{ detailproject.designer4 }}
                                        </div>
                                        <div>
                                            {{ detailproject.designer5 }}
                                        </div>
                                        <div>
                                            {{ detailproject.designer6 }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div
                v-if="`${detailproject.energy_savings}` > 0"
                class="row bg-body-secondary py-4 mb-5 mx-1"
            >
                <div class="d-flex flex-row px-5 justify-content-between">
                    <div class="d-flex flex-row">
                        <span style="background-color: transparent">
                            <font-awesome-icon
                                :icon="['fas', 'bolt']"
                                class="fa-5x"
                            />
                        </span>
                        <span class="d-flex flex-column bg-transparent ms-3">
                            <div class="display-3 pb-0">
                                {{ detailproject.energy_savings }}
                                <br />
                            </div>
                            <div class="fs-2 pt-0">
                                Energy Savings (kWh/year)
                            </div>
                        </span>
                    </div>
                    <div class="d-flex flex-row">
                        <span style="background-color: transparent">
                            <font-awesome-icon
                                :icon="['fas', 'cloud']"
                                class="fa-5x"
                            />
                        </span>
                        <span class="d-flex flex-column bg-transparent ms-3">
                            <div class="display-3 pb-0">
                                {{ detailproject.carbon_reduction }}
                            </div>
                            <div class="fs-2 pt-0">
                                Carbon Reduction (tC0<sub>2</sub>e/year)
                            </div>
                        </span>
                    </div>
                </div>
                <div class="d-flex flex-row px-5">
                    <span style="background-color: transparent">
                        <font-awesome-icon
                            :icon="['fas', 'tint']"
                            class="fa-5x"
                        />
                    </span>
                    <span class="d-flex flex-column bg-transparent ms-3">
                        <div class="display-3 pb-0">
                            {{ detailproject.water_savings }}
                        </div>
                        <div class="fs-2 pt-0">Water Savings (liters)</div>
                    </span>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-6">
                    <img
                        :src="`${baseURL}/storage/projectpicture/${detailproject.pic1}`"
                        alt=""
                        class="w-100 img-fluid"
                    />
                </div>
                <div class="col-6">
                    <img
                        :src="`${baseURL}/storage/projectpicture/${detailproject.pic2}`"
                        class="w-100 img-fluid"
                        alt=""
                    />
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-12">
                    <img
                        :src="`${baseURL}/storage/projectpicture/${detailproject.pic3}`"
                        alt=""
                        class="w-100 img-fluid"
                    />
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-6">
                    <img
                        :src="`${baseURL}/storage/projectpicture/${detailproject.pic4}`"
                        class="w-100 img-fluid"
                        alt=""
                    />
                </div>
                <div class="col-6">
                    <img
                        :src="`${baseURL}/storage/projectpicture/${detailproject.pic5}`"
                        class="w-100 img-fluid"
                        alt=""
                    />
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-6">
                    <img
                        :src="`${baseURL}/storage/projectpicture/${detailproject.pic6}`"
                        class="w-100 img-fluid"
                        alt=""
                    />
                </div>
            </div>
            <h2 class="h2 nav-link pb-5">
                <router-link class="nav-link" to="/work">
                    <font-awesome-icon :icon="['fas', 'arrow-left']" />
                    BACK TO PROJECTS
                </router-link>
            </h2>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const id = window.location.pathname.substring(13);
const detailproject = ref([]);
const designTeam = ref([]);
const team = ref([]);

const baseURL = axios.defaults.baseURL;
const urldetail = baseURL + "/api/clientdetail/" + id;

const getdetailproject = async () => {
    try {
        const response = await axios.get(urldetail);
        detailproject.value = response.data.data;
        designTeam.value = response.data.data.designer1;
        if (designTeam.value) {
            team.value = true;
        } else {
            team.value = false;
        }
        console.log(team.value);
    } catch (error) {}
};

onMounted(() => {
    getdetailproject();
});
</script>

<style lang="scss" scoped></style>
