<template>
    <div class="container-fluid bg-dark">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-12 text-white py-5">
                    <h1>LET’S GET IN TOUCH</h1>
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-4 text-center">
                    <img
                        src="../assets/img/logo.png"
                        alt=""
                        class="img-fluid"
                    />
                </div>
                <div class="col-4 text-white text-start">
                    Jakarta Creative Hub-Grha Niaga Thamrin, Lantai 1 <br />
                    Jl.Kb.Melati 5 No.202, RT.2/RW.8, Kb.Melati Tanah Abang
                    <br />
                    Kota Jakarta Pusat, Jakarta-10230
                </div>
                <div class="col-4">
                    <div class="row text-start text-white">
                        <p class="m-0">email :info@matrastudio.com</p>
                        <p>phone/wa :+62882-1239-9197</p>
                    </div>
                    <div class="row text-white">
                        <span
                            class="d-flex flex-row justify-content-start gap-2"
                        >
                            <a
                                class="nav-link pt-0 fs-1"
                                href="https://www.instagram.com/matra.studio/?hl=id"
                            >
                                <font-awesome-icon
                                    :icon="['fab', 'instagram']"
                                />
                            </a>

                            <a
                                class="nav-link pt-0 fs-1"
                                href="https://www.youtube.com/channel/UCqYHJSKMZlQLbZilgYwHTmQ"
                            >
                                <font-awesome-icon :icon="['fab', 'youtube']" />
                            </a>

                            <a
                                class="nav-link pt-0 fs-1"
                                href="https://www.facebook.com/matrastudio/"
                            >
                                <font-awesome-icon
                                    :icon="['fab', 'facebook']"
                                />
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <hr
            class="absolute border border-whiter border-1 opacity-50 my-4 px-20"
        />
        <div class="row d-flex flex-row text-white text-center mx-auto">
            <p class="fs-6">Habibie@{{ year }}</p>
        </div>
    </div>
</template>

<script setup>
const d = new Date();
let year = d.getFullYear();
</script>

<style lang="scss" scoped></style>
