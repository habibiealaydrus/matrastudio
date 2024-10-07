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
                <div class="col-4 text-white text-start fs-5">
                    Jakarta Creative Hub-Grha Niaga Thamrin, Lantai 1 <br />
                    Jl.Kb.Melati 5 No.20 2, RT.2/RW.8, Kb.Melati
                    <br />
                    Tanah Abang, Kota Jakarta Pusat, Jakarta - 10230
                </div>
                <div class="col-4 text-white text-wrap fs-6 text-break">
                    Email: info@matrastudio.com
                    <br />
                    Phone: +62 882-1239-9197
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
