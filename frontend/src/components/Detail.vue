<template>
    <div class="bg-white">
        <img
            :src="`https://mantra.matrastudio.com/storage/app/public/projectpicture/${detailproject.main_pic}`"
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
                <div class="col-md-12 col-lg-6 pt-4 ps-3">
                    <p class="text-break" style="text-align: justify">
                        {{ detailproject.article }}
                    </p>
                </div>
                <div class="col-md-12 col-lg-6 pt-4">
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
            <div class="row mb-3 bg-secondary-subtle p-2">
                <table
                    class="table"
                    v-if="`${detailproject.energy_savings}` > 0"
                >
                    <tr>
                        <td rowspan="2" class="text-center">
                            <img
                                src="../assets/img/lightning.png"
                                style="
                                    max-height: 100px;
                                    background-color: transparent;
                                "
                                alt=""
                            />
                        </td>
                        <td
                            class="display-3 pb-0 counter"
                            :style="`--from: 0; --to: ${Energy} ; --time: 4s`"
                        ></td>
                        <td rowspan="2" class="text-center">
                            <img
                                src="../assets/img/co2.png"
                                style="
                                    max-height: 100px;
                                    background-color: transparent;
                                "
                                alt=""
                            />
                        </td>
                        <td
                            class="display-3 pb-0 counter"
                            :style="`--from: 0; --to: ${Carbon} ; --time: 4s`"
                        ></td>
                    </tr>
                    <tr>
                        <td class="fs-2">Energy Savings (kWh/year)</td>
                        <td class="fs-2">
                            Carbon Reduction (tC0<sub
                                style="background-color: transparent"
                                >2</sub
                            >e/year)
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="text-center">
                            <img
                                src="../assets/img/water.png"
                                style="
                                    max-height: 100px;
                                    background-color: transparent;
                                "
                                alt=""
                            />
                        </td>
                        <td
                            class="display-3 pb-0 counter"
                            :style="`--from: 0; --to: ${Water} ; --time: 4s`"
                        ></td>
                        <td
                            rowspan="2"
                            class="text-center"
                            v-if="`${detailproject.embodied_energy}` > 0"
                        >
                            <img
                                src="../assets/img/Eett.png"
                                style="
                                    max-height: 100px;
                                    background-color: transparent;
                                "
                                alt=""
                            />
                        </td>
                        <td
                            v-if="`${detailproject.embodied_energy}` > 0"
                            class="display-3 pb-0 counter"
                            :style="`--from: 0; --to: ${Embodied} ; --time: 4s`"
                        ></td>
                    </tr>
                    <tr>
                        <td class="fs-2">Water Savings (liters)</td>
                        <td
                            class="fs-2"
                            v-if="`${detailproject.embodied_energy}` > 0"
                        >
                            Embodied Energy (GJ)
                        </td>
                    </tr>
                </table>
            </div>
            <div class="row pb-5">
                <div class="col-6">
                    <img
                        :src="`https://mantra.matrastudio.com/storage/app/public/projectpicture/${detailproject.pic1}`"
                        alt=""
                        class="w-100 img-fluid"
                    />
                </div>
                <div class="col-6">
                    <img
                        :src="`https://mantra.matrastudio.com/storage/app/public/projectpicture/${detailproject.pic2}`"
                        class="w-100 img-fluid"
                        alt=""
                    />
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-12">
                    <img
                        :src="`https://mantra.matrastudio.com/storage/app/public/projectpicture/${detailproject.pic3}`"
                        alt=""
                        class="w-100 img-fluid"
                    />
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-6">
                    <img
                        :src="`https://mantra.matrastudio.com/storage/app/public/projectpicture/${detailproject.pic4}`"
                        class="w-100 img-fluid"
                        alt=""
                    />
                </div>
                <div class="col-6">
                    <img
                        :src="`https://mantra.matrastudio.com/storage/app/public/projectpicture/${detailproject.pic5}`"
                        class="w-100 img-fluid"
                        alt=""
                    />
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-6">
                    <img
                        :src="`https://mantra.matrastudio.com/storage/app/public/projectpicture/${detailproject.pic6}`"
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
const Energy = ref([]);
const Carbon = ref([]);
const Water = ref([]);

const baseURL = axios.defaults.baseURL;
const urldetail = baseURL + "/api/clientdetail/" + id;

const getdetailproject = async () => {
    try {
        const response = await axios.get(urldetail);
        detailproject.value = response.data.data;
        Energy.value = parseInt(response.data.data.energy_savings);
        Carbon.value = parseInt(response.data.data.carbon_reduction);
        Water.value = parseInt(response.data.data.water_savings);
        designTeam.value = response.data.data.designer1;
        if (designTeam.value) {
            team.value = true;
        } else {
            team.value = false;
        }
    } catch (error) {}
};

onMounted(() => {
    getdetailproject();
});
</script>

<style>
@property --from {
    syntax: "<integer>";
    initial-value: 0;
    inherits: false;
}

.counter {
    transition: --from 1s;
    counter-reset: int var(--from);
    animation: counter var(--time, 1000) forwards ease-in-out;
}

.counter::after {
    content: counter(int);
}

@keyframes counter {
    to {
        --from: var(--to, 100);
    }
}
</style>
