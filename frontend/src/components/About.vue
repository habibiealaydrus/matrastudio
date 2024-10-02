<template>
    <div class="text-center bg-white container-fluid" style="z-index: -100">
        <h1 class="h1 text-uppercase pt-5">About</h1>
        <div class="container">
            <p class="pt-2 px-20 text-start">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Voluptatibus, tempore sunt eligendi itaque nostrum, adipisci
                magni odit distinctio eveniet sint deleniti mollitia? Mollitia
                architecto tenetur et a iusto repudiandae, nihil quaerat
                voluptas quia, ex, soluta enim. Odio laboriosam pariatur fuga
                non totam esse voluptatem omnis quos eum ducimus minus quae
                corrupti accusantium voluptate nemo aspernatur necessitatibus,
                porro id magni laborum repudiandae! Accusamus enim, explicabo
                necessitatibus cumque voluptatem sunt id eum omnis rem possimus
                ab. Sunt eveniet ut quasi at dolore hic qui nobis deserunt
                aliquid. Sit quis amet aliquid, nisi eius voluptatum sed natus
                illo eaque numquam. Expedita veniam eveniet facilis ea error
                veritatis explicabo sunt fugiat, consequatur dicta. Fuga iusto
                consectetur praesentium et nemo fugiat corporis labore
                accusantium, illum eius recusandae nihil, voluptatem iure quo,
                maiores dicta consequatur. Quia consectetur numquam veritatis
                similique modi facilis suscipit ab itaque saepe, voluptate
                asperiores exercitationem dolorum sequi ea id molestiae, dicta
                voluptates magnam. Ab labore dolorem perferendis harum
                dignissimos odio qui? Maiores, neque facilis dolorum odio
                doloremque laudantium voluptatibus totam exercitationem
                dignissimos consequuntur debitis suscipit rerum doloribus
                aperiam. Facilis at suscipit, nobis corrupti ad dolorum animi
                distinctio obcaecati architecto repudiandae, maiores expedita
                neque velit. Illum optio, quasi iste aut repellendus mollitia
                nihil aliquam provident beatae maiores sit recusandae quae ut
                voluptas asperiores error. Cumque nobis atque, veniam similique
                dolore odio inventore iusto, pariatur numquam eveniet beatae?
                Expedita, explicabo vero! Eveniet, placeat nulla amet fugiat est
                repudiandae! Autem illum veniam est, suscipit, minus provident
                distinctio magnam, vero ipsa molestias asperiores architecto
                quasi at. Fuga, debitis delectus incidunt accusamus quae vel
                consectetur asperiores? Sapiente reprehenderit voluptas dolore
                suscipit quisquam aliquam eum sunt voluptates. Sed consectetur
                ex quam id molestiae, impedit repudiandae laboriosam voluptates
                nostrum, facere eaque deserunt libero, cupiditate dolore
                reiciendis. Voluptatibus veniam quis assumenda. Alias magni
                dolore eligendi vero, commodi possimus quod ratione?
            </p>
        </div>

        <div class="profile my-5 row justify-content-center">
            <img
                src="../assets/img/profile/Rizkikay.jpeg"
                class="rounded-circle px-5 col-md-6"
                alt=""
            />

            <img
                src="../assets/img/profile/yasser.jpeg"
                class="rounded-circle px-5 col-md-6"
                alt=""
            />
        </div>
        <p>Rizky Kay Siregar & Yasser Hafidz</p>
        <div class="pb-5">
            <h5 class="h5 fst-italic pb-5">PEOPLE WE’VE WORKED WITH</h5>
            <div class="d-flex justify-content-start gap-5 flex-wrap container">
                <div
                    class="logoclient d-flex align-items-center"
                    v-for="logo in logoclients"
                >
                    <img
                        alt=""
                        class="img-fluid"
                        :src="`https://mantra.matrastudio.com/storage/app/public/projectclients/${logo.projectclient_img}`"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const baseURL = axios.defaults.baseURL;

const urllogoclient = baseURL + "/api/allimageclient";
const logoclients = ref([]);

const getlogoclient = async () => {
    try {
        const response = await axios.get(urllogoclient);
        logoclients.value = response.data.data;
    } catch (error) {}
};
onMounted(() => {
    getlogoclient();
});
</script>

<style lang="scss" scoped></style>
