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
    </div>
    <div class="container-fluid p-0">
        <img
            src="../assets/img/SUT_Sustainabilty.jpg"
            class="img-fluid"
            alt=""
        />
    </div>
    <div class="container-fluid" style="padding: 5% 10% 5% 10%">
        <!-- atas/kanan/bawah/kiri -->
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-2">
                        <img
                            src="../assets/img/lightning.png"
                            style="
                                max-height: 100px;
                                background-color: transparent;
                            "
                            alt=""
                            class="img-fluid"
                        />
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div
                                class="col-12 display-3 pb-0 counter border-0"
                                style="--from: 0; --to: 745656; --time: 4s"
                            ></div>
                            <div class="col-12 text-nowrap">
                                Energy Savings (kWh/year)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-4 text-center">
                        <img
                            src="../assets/img/co2.png"
                            style="
                                max-height: 100px;
                                background-color: transparent;
                            "
                            alt=""
                            class="img-fluid"
                        />
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div
                                class="col-12 display-3 pb-0 counter border-0"
                                style="--from: 0; --to: 145656; --time: 4s"
                            ></div>
                            <div class="col-12 text-nowrap">
                                Carbon Reduction (tC0<sub
                                    style="background-color: transparent"
                                    >2</sub
                                >e/year)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-2">
                        <img
                            src="../assets/img/water.png"
                            style="
                                max-height: 100px;
                                background-color: transparent;
                            "
                            alt=""
                            class="img-fluid"
                        />
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div
                                class="col-12 display-3 pb-0 counter border-0"
                                style="--from: 0; --to: 22745; --time: 4s"
                            ></div>
                            <div class="col-12 text-nowrap">
                                Water Savings (liters)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-4 text-center">
                        <img
                            src="../assets/img/Eett.png"
                            style="
                                max-height: 100px;
                                background-color: transparent;
                            "
                            alt=""
                            class="img-fluid"
                        />
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div
                                class="col-12 display-3 pb-0 counter border-0"
                                style="--from: 0; --to: 145656; --time: 4s"
                            ></div>
                            <div class="col-12 text-nowrap">
                                Embodied Energy (GJ)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup></script>

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
