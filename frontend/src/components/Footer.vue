<template>
    <div class="container-fluid bg-dark">
        <div class="row text-center">
            <div class="col-12 text-white py-5">
                <h1>LET’S GET IN TOUCH</h1>
            </div>
        </div>
        <div class="row fs-6">
            <div class="col-md-4 col-sm-12 text-center">
                <img src="../assets/img/logo.png" alt="" class="img-fluid" />
            </div>
            <div class="col-md-4 col-sm-12 text-white text-center fs-6">
                Jakarta Creative Hub-Grha Niaga Thamrin, Lantai 1 <br />
                Jl.Kb.Melati 5 No.20 2, RT.2/RW.8, Kb.Melati
                <br />
                Tanah Abang, Kota Jakarta Pusat, Jakarta - 10230
            </div>
            <div
                class="col-md-4 col-sm-12 text-white text-wrap fs-6 text-break text-center"
            >
                Email: info@matrastudio.com
                <br />
                Phone: +62 882-1239-9197
                <br />
                <div class="d-flex flex-row justify-content-center">
                    <a
                        class="nav-link p-2"
                        href="https://www.instagram.com/matra.studio"
                        target="_blank"
                    >
                        <font-awesome-icon :icon="['fab', 'instagram']" />
                    </a>

                    <a
                        class="nav-link p-2"
                        href="https://www.youtube.com/@matraarchitecturestudio1353"
                        target="_blank"
                    >
                        <font-awesome-icon :icon="['fab', 'youtube']" />
                    </a>

                    <a
                        class="nav-link p-2"
                        href="https://www.facebook.com/matrastudio/?locale=id_ID"
                        target="_blank"
                    >
                        <font-awesome-icon :icon="['fab', 'facebook']" />
                    </a>
                    <a
                        class="nav-link p-2"
                        href="https://www.linkedin.com/company/matrastudio/"
                        target="_blank"
                    >
                        <font-awesome-icon :icon="['fab', 'linkedin']" />
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- <hr class="absolute border border-whiter border-1 opacity-50 my-4 px-20" /> -->
    <div class="row d-flex flex-row text-white text-center mx-auto bg-dark">
        <hr />
        <p class="fs-6">
            <a
                href="https://www.linkedin.com/in/mohamad-habibie-667230165/"
                class="nav-link"
                target="_blank"
                >Habibie@{{ year }}</a
            >
        </p>
    </div>
</template>

<script setup>
const d = new Date();
let year = d.getFullYear();
</script>

<style lang="scss" scoped></style>
