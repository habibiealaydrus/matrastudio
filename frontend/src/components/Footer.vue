<template>
    <div class="container-fluid bg-dark">
        <div class="container-fluid">
            <div class="row">
                <hr
                    class="absolute border border-whiter border-1 opacity-50 my-4 px-20"
                />
                <div class="col-6">
                    <img
                        src="../assets/img/logomatra.png"
                        alt=""
                        class="w-25"
                    />
                    <br />
                    <p class="text-white">
                        Jakarta Creative Hub <br />
                        Room 6 <br />
                        Jl. Kb. Melati 5 No.202,RT.2/RW.8 <br />
                        Kb. Melati, Kecamatan Tanah Abang, Kota Jakarta Pusat
                        <br />
                        Daerah Khusus Jakarta 10230
                    </p>
                </div>
                <div class="col-6">
                    <ul
                        class="navbar-nav text-end text-white d-flex flex-column gap-0"
                    >
                        <h3 class="h3">Navigation</h3>
                        <li>
                            <RouterLink
                                style="color: white; text-decoration: none"
                                aria-current="page"
                                to="/"
                            >
                                Home
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink
                                style="color: white; text-decoration: none"
                                aria-current="page"
                                to="/work"
                            >
                                Work
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink
                                style="color: white; text-decoration: none"
                                aria-current="page"
                                to="/about"
                            >
                                About
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink
                                style="color: white; text-decoration: none"
                                aria-current="page"
                                to="/process"
                            >
                                Process
                            </RouterLink>
                        </li>
                        <li>
                            <RouterLink
                                style="color: white; text-decoration: none"
                                aria-current="page"
                                to="/contact"
                            >
                                Contact
                            </RouterLink>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div
                    class="col-12 text-white d-flex justify-content-center flex-row gap-2"
                >
                    <a
                        class="nav-link pt-0"
                        href="https://www.instagram.com/matra.studio/?hl=id"
                    >
                        <font-awesome-icon :icon="['fab', 'instagram']" />
                    </a>

                    <a
                        class="nav-link pt-0"
                        href="https://www.youtube.com/channel/UCqYHJSKMZlQLbZilgYwHTmQ"
                    >
                        <font-awesome-icon :icon="['fab', 'youtube']" />
                    </a>

                    <a
                        class="nav-link pt-0"
                        href="https://www.facebook.com/matrastudio/"
                    >
                        <font-awesome-icon :icon="['fab', 'facebook']" />
                    </a>
                </div>
            </div>
        </div>
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
