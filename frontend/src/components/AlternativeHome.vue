<template>
    <div class="container-fluid bannerhome">
        <div class="row">
            <div
                class="homebannertext rounded-2 col-7 fs-1 position-absolute bottom-0 start-0"
            >
                <p>
                    "We are creating meaningfull spaces with a focus on
                    <span class="text-cycle text-start display-1 text-wrap">
                        {{ textCycle }}"
                    </span>
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
const textCycle = ref();

const changetext = () => {
    const messages = [
        "Sustainibility",
        "Green Building",
        "Energy Efficiency",
        "Community Well-being",
    ];
    let index = 0;
    setInterval(() => {
        textCycle.value = messages[index];
        index = (index + 1) % messages.length;
    }, 2500); // Change the text every 2.5 seconds
};

onMounted(() => {
    changetext();
});
</script>

<style>
.text-cycle {
    animation: textCycle 10s infinite;
    white-space: nowrap;
    font-weight: bold;
}

@keyframes textCycle {
    0% {
        content: "Sustainibility";
    }
    25% {
        content: "Green Building";
    }
    50% {
        content: "Energy Efficiency";
    }
    75% {
        content: "Community Well-being";
    }
    100% {
        content: "Welcome";
    }
}
.bannerhome {
    background-image: url("../assets/img/homepage.jpg");
    background-repeat: no-repeat, repeat;
    /* filter: grayscale(100%); */
    height: 90vh;
}
.homebannertext {
    /*background-color: rgba(255, 255, 255, 0.8);*/
    color: whitesmoke;
    padding: 1%;
}
</style>
