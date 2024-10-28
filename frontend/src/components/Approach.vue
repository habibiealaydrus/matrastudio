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

    <div class="container-fluid p-5 text-start bg-white">
        <div class="row px-5">
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-3">
                        <img
                            src="../assets/img/lightning.png"
                            style="background-color: transparent"
                            alt=""
                            class="w-100"
                        />
                    </div>
                    <div class="col-9">
                        <div>
                            <p
                                class="display-6 counter"
                                :style="`
                                                --from: 0;
                                                --to: ${Energy};
                                                --time: 4s;
                                            `"
                            ></p>
                            <p class="fs-5">Energy Savings (kWh/year)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-3">
                        <img
                            src="../assets/img/co2.png"
                            style="background-color: transparent"
                            alt=""
                            class="w-100"
                        />
                    </div>
                    <div class="col-9">
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
                                    style="background-color: transparent"
                                    >2</sub
                                >e/year)
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-5 pt-4">
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <div class="col-3">
                        <img
                            src="../assets/img/water.png"
                            style="background-color: transparent"
                            alt=""
                            class="w-100"
                        />
                    </div>
                    <div class="col-9">
                        <div>
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
                    <div class="col-3">
                        <img
                            src="../assets/img/Eett.png"
                            style="background-color: transparent"
                            alt=""
                            class="w-100"
                        />
                    </div>
                    <div class="col-9">
                        <div>
                            <p
                                class="display-6 counter"
                                :style="`
                                                --from: 0;
                                                --to: ${Embodied};
                                                --time: 4s;
                                            `"
                            ></p>
                            <p class="fs-5 pt-0">Embodied Energy (GJ)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
