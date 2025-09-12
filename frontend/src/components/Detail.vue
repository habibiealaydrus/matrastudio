<template>
    <div class="bg-white">
        <img
            :src="
                baseURL +
                `/public/storage/projectpicture/${detailproject.main_pic}`
            "
            alt=""
            class="w-100 img-fluid"
        />
        <div class="container text-left">
            <div class="row">
                <div class="col-12 pt-5 ps-3">
                    <h1 class="h1 fw-bold text-justify">
                        {{ detailproject.project_name }}
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 pt-4 ps-3">
                    <div
                        class="text-break"
                        style="text-align: justify"
                        v-html="detailproject.article"
                    ></div>
                </div>
                <div class="col-md-12 col-lg-6 pt-4 ps-5">
                    <div class="container">
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
                                    <td>STATUS</td>
                                    <td>: {{ detailproject.status }}</td>
                                </tr>
                                <tr v-if="detailproject.team_arsitektur">
                                    <td class="text-uppercase">
                                        Archictect TEAM
                                    </td>
                                    <td class="d-flex flex-row">
                                        <div>:&nbsp;</div>
                                        <div class="d-flex flex-column">
                                            <div
                                                v-html="
                                                    detailproject.team_arsitektur
                                                "
                                            ></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="detailproject.basic_design">
                                    <td class="text-uppercase">Basic Design</td>
                                    <td class="d-flex flex-row">
                                        <div>:&nbsp;</div>
                                        <div class="d-flex flex-column">
                                            <div
                                                v-html="
                                                    detailproject.basic_design
                                                "
                                            ></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="detailproject.main_contractor">
                                    <td class="text-uppercase">
                                        Main Contractor
                                    </td>
                                    <td class="d-flex flex-row">
                                        <div>:&nbsp;</div>
                                        <div class="d-flex flex-column">
                                            <div
                                                v-html="
                                                    detailproject.main_contractor
                                                "
                                            ></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="detailproject.architecht_build">
                                    <td class="text-uppercase">
                                        Architect & Build
                                    </td>
                                    <td class="d-flex flex-row">
                                        <div>:&nbsp;</div>
                                        <div class="d-flex flex-column">
                                            <div
                                                v-html="
                                                    detailproject.architecht_build
                                                "
                                            ></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="detailproject.architecht">
                                    <td class="text-uppercase">Architect</td>
                                    <td class="d-flex flex-row">
                                        <div>:&nbsp;</div>
                                        <div class="d-flex flex-column">
                                            <div
                                                v-html="
                                                    detailproject.architecht
                                                "
                                            ></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="detailproject.sustainability_team">
                                    <td class="text-uppercase">
                                        Sustainability Team
                                    </td>
                                    <td class="d-flex flex-row">
                                        <div>:&nbsp;</div>
                                        <div class="d-flex flex-column">
                                            <div
                                                v-html="
                                                    detailproject.sustainability_team
                                                "
                                            ></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="detailproject.struktur">
                                    <td class="text-uppercase">Struktur</td>
                                    <td class="d-flex flex-row">
                                        <div>:&nbsp;</div>
                                        <div class="d-flex flex-column">
                                            <div
                                                v-html="detailproject.struktur"
                                            ></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="detailproject.mep">
                                    <td class="text-uppercase">MEP</td>
                                    <td class="d-flex flex-row">
                                        <div>:&nbsp;</div>
                                        <div class="d-flex flex-column">
                                            <div
                                                v-html="detailproject.mep"
                                            ></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="detailproject.qs">
                                    <td class="text-uppercase">QS</td>
                                    <td class="d-flex flex-row">
                                        <div>:&nbsp;</div>
                                        <div class="d-flex flex-column">
                                            <div
                                                v-html="detailproject.qs"
                                            ></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="detailproject.design_team">
                                    <td class="text-uppercase">Design Team</td>
                                    <td class="d-flex flex-row">
                                        <div>:&nbsp;</div>
                                        <div class="d-flex flex-column">
                                            <div
                                                v-html="
                                                    detailproject.design_team
                                                "
                                            ></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="detailproject.collaborators">
                                    <td class="text-uppercase">
                                        Collaborators
                                    </td>
                                    <td class="d-flex flex-row">
                                        <div>:&nbsp;</div>
                                        <div class="d-flex flex-column">
                                            <div
                                                v-html="
                                                    detailproject.collaborators
                                                "
                                            ></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="detailproject.fabrication_team">
                                    <td class="text-uppercase">
                                        Fabrication Team
                                    </td>
                                    <td class="d-flex flex-row">
                                        <div>:&nbsp;</div>
                                        <div class="d-flex flex-column">
                                            <div
                                                v-html="
                                                    detailproject.fabrication_team
                                                "
                                            ></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="detailproject.publication">
                                    <td class="text-uppercase">Publication</td>
                                    <td class="d-flex flex-row">
                                        <div>:&nbsp;</div>
                                        <div class="d-flex flex-column">
                                            <div
                                                v-html="
                                                    detailproject.publication
                                                "
                                            ></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div
                class="row bg-secondary-subtle my-3 p-3"
                v-if="Energy | Carbon | Embodied | Water"
            >
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-3" v-if="Energy">
                                <img
                                    src="../assets/img/lightning.png"
                                    style="background-color: transparent"
                                    alt=""
                                    class="w-100"
                                />
                            </div>
                            <div class="col-9">
                                <div v-if="Energy">
                                    <p
                                        class="display-6 counter"
                                        :style="`
                                                --from: 0;
                                                --to: ${Energy};
                                                --time: 4s;
                                            `"
                                    ></p>
                                    <p class="fs-5">
                                        Energy Savings (kWh/year)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-3" v-if="Carbon">
                                <img
                                    src="../assets/img/co2.png"
                                    style="background-color: transparent"
                                    alt=""
                                    class="w-100"
                                />
                            </div>
                            <div class="col-9" v-if="Carbon">
                                <div>
                                    <p
                                        class="display-6 counter"
                                        :style="`
                                                --from: 0;
                                                --to: ${Carbon};
                                                --time: 4s;
                                            `"
                                    ></p>
                                    <p class="fs-5 pt-0">
                                        Carbon Reduction (tC0<sub
                                            style="
                                                background-color: transparent;
                                            "
                                            >2</sub
                                        >e/year)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-3" v-if="Water">
                                <img
                                    src="../assets/img/water.png"
                                    style="background-color: transparent"
                                    alt=""
                                    class="w-100"
                                />
                            </div>
                            <div class="col-9">
                                <div v-if="Water">
                                    <p
                                        class="display-6 counter"
                                        :style="`
                                                --from: 0;
                                                --to: ${Water};
                                                --time: 4s;
                                            `"
                                    ></p>
                                    <p class="fs-5">Water Savings (liters)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-3" v-if="Embodied">
                                <img
                                    src="../assets/img/Eett.png"
                                    style="background-color: transparent"
                                    alt=""
                                    class="w-100"
                                />
                            </div>
                            <div class="col-9" v-if="Embodied">
                                <div>
                                    <p
                                        class="display-6 counter"
                                        :style="`
                                                --from: 0;
                                                --to: ${Embodied};
                                                --time: 4s;
                                            `"
                                    ></p>
                                    <p class="fs-5 pt-0">
                                        Embodied Energy (GJ)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- pic 1 & 2 -->
            <div class="row pb-5">
                <div class="col-md-12 col-lg-6 pt-4">
                    <img
                        :src="
                            baseURL +
                            `/public/storage/projectpicture/${detailproject.pic1}`
                        "
                        alt=""
                        class="w-100 img-fluid"
                    />
                    <div>{{ detailproject.name_pic1 }}</div>
                </div>
                <div class="col-md-12 col-lg-6 pt-4">
                    <img
                        :src="
                            baseURL +
                            `/public/storage/projectpicture/${detailproject.pic2}`
                        "
                        class="w-100 img-fluid"
                        alt=""
                    />
                    <div>{{ detailproject.name_pic2 }}</div>
                </div>
            </div>
            <!-- pic 3 -->
            <div class="row pb-5" v-if="detailproject.pic3">
                <div class="col-12">
                    <img
                        :src="
                            baseURL +
                            `/public/storage/projectpicture/${detailproject.pic3}`
                        "
                        alt=""
                        class="w-100 img-fluid"
                    />
                    <div>{{ detailproject.name_pic3 }}</div>
                </div>
            </div>
            <!-- pic 4 & 5 -->
            <div class="row pb-5" v-if="detailproject.pic4">
                <div class="col-md-12 col-lg-6 pt-4">
                    <img
                        :src="
                            baseURL +
                            `/public/storage/projectpicture/${detailproject.pic4}`
                        "
                        class="w-100 img-fluid"
                        alt=""
                    />
                    <div>{{ detailproject.name_pic4 }}</div>
                </div>
                <div class="col-md-12 col-lg-6 pt-4">
                    <img
                        :src="
                            baseURL +
                            `/public/storage/projectpicture/${detailproject.pic5}`
                        "
                        class="w-100 img-fluid"
                        alt=""
                    />
                    <div>{{ detailproject.name_pic5 }}</div>
                </div>
            </div>
            <!-- pic 6 & 7 -->
            <div class="row pb-5" v-if="detailproject.pic6">
                <div class="col-md-12 col-lg-6 pt-4">
                    <img
                        :src="
                            baseURL +
                            `/public/storage/projectpicture/${detailproject.pic6}`
                        "
                        class="w-100 img-fluid"
                        alt=""
                    />
                    <div>{{ detailproject.name_pic6 }}</div>
                </div>
                <div class="col-md-12 col-lg-6 pt-4">
                    <img
                        :src="
                            baseURL +
                            `/public/storage/projectpicture/${detailproject.pic7}`
                        "
                        class="w-100 img-fluid"
                        alt=""
                    />
                    <div>{{ detailproject.name_pic7 }}</div>
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

const id = window.location.pathname.slice(13);
console.log(id);

const detailproject = ref([]);
const designTeam = ref([]);
const team = ref([]);
const Energy = ref();
const Carbon = ref([]);
const Water = ref([]);
const Embodied = ref([]);

const baseURL = axios.defaults.baseURL;
const urldetail = baseURL + "/public/api/clientdetail/" + id;

const getdetailproject = async () => {
    try {
        const response = await axios.get(urldetail);
        detailproject.value = response.data.data;
        Energy.value = parseInt(response.data.data.energy_savings);
        Carbon.value = parseInt(response.data.data.carbon_reduction);
        Water.value = parseInt(response.data.data.water_savings);
        Embodied.value = parseInt(response.data.data.embodied_energy);
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
    content: counter();
}

@keyframes counter {
    to {
        --from: var(--to, 100);
    }
}
</style>
