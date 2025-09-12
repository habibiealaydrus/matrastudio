<template>
    <div class="bg-secondary-subtle text-center container-fluid">
        <div class="row">
            <h1 class="text-center text-bold col-12 pt-3 pb-5">OUR APPROACH</h1>
        </div>
        <div class="row pb-5">
            <div class="mx-auto col-md-4 px-4">
                <h4 class="text-uppercase">DATA-DRIVEN DESIGN</h4>
                <p class="" style="text-align: justify">
                    Our data-driven design approach is deeply intertwined with
                    local culture, creating architecture that is efficient,
                    sustainable and culturally meaningful. Using computational
                    tools and data analytics, we enhance design performance
                    while respecting the heritage, traditions,and identity of
                    the communities we serve
                </p>
            </div>
            <div class="mx-auto col-md-4 px-4">
                <h4 class="text-uppercase">SUSTAINABLE DESIGN</h4>
                <p class="" style="text-align: justify">
                    Our sustainable design approach ensure sthat architecture
                    meets both current needs and future environmental
                    challenges.We integrate sustainable practices into every
                    phase of our projects,ensuring that each design respects and
                    harmonizes with its surrounding environment while reducing
                    its ecological footprint.
                </p>
            </div>
            <div class="mx-auto col-md-4 px-4">
                <h4 class="">COMPUTATIONAL TOOLS</h4>
                <p class="" style="text-align: justify">
                    We believe that the future of architecture lies in these
                    amless integration of computational design tools to create
                    innovative, efficient and sustainable solutions. Our
                    approach to computational design is grounded in harnessing
                    the power of technology to enhance creativity,optimize
                    performance,and respond dynamically to the commplexities of
                    each project.
                </p>
            </div>
        </div>
        <div class="row">
            <img
                src="../assets/img/SUT_Sustainabilty.jpg"
                class="img-fluid m-0 p-0"
                alt=""
            />
        </div>
    </div>

    <!-- perhitungan carbon dan lain2 -->

    <div class="container">
        <div class="row d-flex justify-content-center px-auto py-2 text-center">
            <div
                class="col-md-6 col-sm-12 d-flex py-2 justify-content-md-end justify-content-sm-center"
            >
                <table>
                    <tr>
                        <td rowspan="2">
                            <img
                                src="../assets/img/lightning.png"
                                style="
                                    background-color: transparent;
                                    height: 100px;
                                "
                                alt=""
                                class="w-100"
                            />
                        </td>
                        <td>
                            <p
                                class="display-6 counter text-start"
                                :style="`
                                                            --from: 0;
                                                            --to: ${Energy};
                                                            --time: 4s;
                                                        `"
                            ></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="fs-5 text-start">
                                Energy Savings (kWh/year)
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <div
                class="col-md-6 col-sm-12 d-flex py-2 justify-content-md-start justify-content-sm-center"
            >
                <table>
                    <tr>
                        <td rowspan="2">
                            <img
                                src="../assets/img/co2.png"
                                style="
                                    background-color: transparent;
                                    height: 100px;
                                "
                                alt=""
                                class="w-100"
                            />
                        </td>
                        <td>
                            <p
                                class="display-6 counter text-start"
                                :style="`
                                                            --from: 0;
                                                            --to: ${Carbon};
                                                            --time: 4s;
                                                        `"
                            ></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="fs-5 text-start text-nowrap">
                                Carbon Reduction (tC0<sub
                                    style="background-color: transparent"
                                    >2</sub
                                >e/year)
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row d-flex justify-content-center px-auto py-2 text-center">
            <div
                class="col-md-6 col-sm-12 d-flex py-2 justify-content-md-end justify-content-sm-center"
            >
                <table>
                    <tr>
                        <td rowspan="2">
                            <img
                                src="../assets/img/water.png"
                                style="
                                    background-color: transparent;
                                    height: 100px;
                                "
                                alt=""
                                class="w-100"
                            />
                        </td>
                        <td>
                            <p
                                class="display-6 counter text-start"
                                :style="`--from: 0;--to: ${Water};--time: 4s;`"
                            ></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="fs-5 text-start">
                                Water Savings (liters)
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <div
                class="col-md-6 col-sm-12 d-flex py-2 justify-content-md-start justify-content-sm-center"
            >
                <table>
                    <tr>
                        <td rowspan="2">
                            <img
                                src="../assets/img/Eett.png"
                                style="
                                    background-color: transparent;
                                    height: 100px;
                                "
                                alt=""
                                class="w-100"
                            />
                        </td>
                        <td>
                            <p
                                class="display-6 counter text-start"
                                :style="`
                                                            --from: 0;
                                                            --to: ${Embodied};
                                                            --time: 4s;
                                                        `"
                            ></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="fs-5 text-start text-nowrap">
                                Embodied Energy (GJ)
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- perhitungan carbon dan lain2 -->
</template>

<script setup>
const Water = 22745;
const Carbon = 145656;
const Embodied = 145656;
const Energy = 745656;
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
