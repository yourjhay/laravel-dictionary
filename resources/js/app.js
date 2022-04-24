import { createApp } from "vue";

import Home from "./components/Home.vue"
import router from "./router";

createApp({
    components: {
        Home
    }
}).use(router).mount("#app");

require('./bootstrap');
