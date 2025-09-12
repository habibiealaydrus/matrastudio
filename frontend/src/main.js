import "./assets/main.css";

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import axios from "axios";

axios.defaults.baseURL = "http://127.0.0.1:8000/";

/* import the fontawesome core */
import { library } from "@fortawesome/fontawesome-svg-core";

/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

/* import specific icons */
import {
    faUserSecret,
    faArrowLeft,
    faImage,
    faEnvelope,
    faBolt,
    faTint,
    faCloud,
} from "@fortawesome/free-solid-svg-icons";
import {
    faFacebook,
    faInstagram,
    faYoutube,
    faLinkedin,
} from "@fortawesome/free-brands-svg-icons";
import { Axios } from "axios";

/* add icons to the library */
library.add(
    faUserSecret,
    faInstagram,
    faFacebook,
    faYoutube,
    faLinkedin,
    faArrowLeft,
    faImage,
    faEnvelope,
    faBolt,
    faTint,
    faCloud
);

const app = createApp(App);

app.use(router);
app.component("font-awesome-icon", FontAwesomeIcon);

app.mount("#app");
