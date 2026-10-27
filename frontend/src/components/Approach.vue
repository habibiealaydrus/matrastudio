<template>
    <section class="approach-section" aria-labelledby="approach-title">
        <div class="approach-inner">
            <header class="approach-heading">
                <p class="eyebrow">How we work</p>
                <h2 id="approach-title">OUR APPROACH</h2>
                <p>
                    We bring culture, environmental performance, and design
                    technology together to create places that work beautifully
                    for the people who use them.
                </p>
            </header>

            <div class="approach-grid">
                <article v-for="item in approaches" :key="item.number" class="approach-card">
                    <span class="approach-number">{{ item.number }}</span>
                    <h3>{{ item.title }}</h3>
                    <p>{{ item.description }}</p>
                </article>
            </div>

            <div class="approach-feature">
                <img
                    src="../assets/img/SUT_Sustainabilty.jpg"
                    alt="Sustainable architecture integrated with its landscape"
                    loading="lazy"
                />
                <div class="approach-feature-copy">
                    <p class="eyebrow">Design with context</p>
                    <h3>Better performance, grounded in place.</h3>
                    <p>
                        Every project responds to its climate, local character,
                        and the everyday needs of its community.
                    </p>
                </div>
            </div>

            <section class="impact-section" aria-labelledby="impact-title">
                <div class="impact-heading">
                    <div>
                        <p class="eyebrow">Measured outcomes</p>
                        <h3 id="impact-title">Design that makes a difference.</h3>
                    </div>
                    <p>Selected environmental impact across our work.</p>
                </div>
                <div ref="impactSection" class="impact-grid">
                    <article v-for="(item, index) in impacts" :key="item.label" class="impact-card">
                        <div class="impact-card-top">
                            <img class="impact-icon" :src="item.icon" alt="" aria-hidden="true" loading="lazy" />
                            <div
                                class="impact-number"
                                role="img"
                                :aria-label="item.value.toLocaleString() + ' ' + item.unit"
                            >{{ displayedValues[index].toLocaleString("en-US") }}</div>
                        </div>
                        <p class="impact-unit">{{ item.unit }}</p>
                        <h4>{{ item.label }}</h4>
                    </article>
                </div>
            </section>
        </div>
    </section>
</template>

<script setup>
import { onBeforeUnmount, onMounted, ref } from "vue";
import energyIcon from "../assets/img/lightning.png";
import carbonIcon from "../assets/img/co2.png";
import waterIcon from "../assets/img/water.png";
import embodiedIcon from "../assets/img/EEtt.png";

const approaches = [
    {
        number: "01",
        title: "Data-led design",
        description:
            "We use local insight, computational tools, and performance data to shape architecture that is efficient and meaningful to its community.",
    },
    {
        number: "02",
        title: "Environmental care",
        description:
            "We consider climate, resources, and long-term impact at every stage, creating buildings that work in harmony with their surroundings.",
    },
    {
        number: "03",
        title: "Design technology",
        description:
            "Digital workflows help us explore more possibilities, refine each idea, and turn complex design challenges into buildable solutions.",
    },
];

const impacts = [
    { value: 745656, unit: "kWh / year", label: "Energy savings", icon: energyIcon },
    { value: 145656, unit: "tCO₂e / year", label: "Carbon reduction", icon: carbonIcon },
    { value: 22745, unit: "litres / year", label: "Water savings", icon: waterIcon },
    { value: 145656, unit: "GJ", label: "Embodied energy", icon: embodiedIcon },
];

const impactSection = ref(null);
const displayedValues = ref(impacts.map(() => 0));
let observer;

onMounted(() => {
    const animate = () => {
        const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
        if (reducedMotion) {
            displayedValues.value = impacts.map(({ value }) => value);
            return;
        }

        const duration = 4000;
        const start = performance.now();
        const tick = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            displayedValues.value = impacts.map(({ value }) => Math.round(value * eased));
            if (progress < 1) requestAnimationFrame(tick);
        };
        requestAnimationFrame(tick);
    };

    if (!("IntersectionObserver" in window) || !impactSection.value) {
        animate();
        return;
    }

    observer = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting) {
            animate();
            observer.disconnect();
        }
    }, { threshold: 0.2 });
    observer.observe(impactSection.value);
});

onBeforeUnmount(() => observer?.disconnect());
</script>
