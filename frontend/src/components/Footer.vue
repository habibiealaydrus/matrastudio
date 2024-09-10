<template>
    <div class="bg-dark m-0 d-flex flex-column text-center">
        <div class="container">
            <hr />
            <hr
                class="absolute border border-whiter border-1 opacity-50 px-20"
            />
        </div>
        <ul
            class="navbar-nav mb-2 mb-lg-0 text-white d-flex flex-row gap-4 mx-auto"
        >
            <li class="nav-item">
                <RouterLink class="nav-link" aria-current="page" to="/">
                    Home
                </RouterLink>
            </li>
            <li class="nav-item">
                <RouterLink class="nav-link" aria-current="page" to="/work">
                    Work
                </RouterLink>
            </li>
            <li class="nav-item">
                <RouterLink class="nav-link" aria-current="page" to="/about">
                    About
                </RouterLink>
            </li>
            <li class="nav-item">
                <RouterLink class="nav-link" aria-current="page" to="/process">
                    Process
                </RouterLink>
            </li>
            <li class="nav-item">
                <RouterLink class="nav-link" aria-current="page" to="/contact">
                    Contact
                </RouterLink>
            </li>
        </ul>
        <div class="d-flex flex-row m-0 text-white text-center mx-auto">
            <h3>Matra Studio</h3>
        </div>
        <div class="d-flex flex-row mb-4 text-white text-center mx-auto gap-1">
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
        <div class="d-flex flex-row text-white text-center mx-auto">
            <p class="fs-6">Habibie@{{ year }}</p>
        </div>
    </div>
</template>

<script setup>
const d = new Date();
let year = d.getFullYear();
</script>

<style lang="scss" scoped></style>
