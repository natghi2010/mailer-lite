require("./bootstrap");

import {createApp} from "vue";

import router from './router/index';

import App from "./components/App.vue";


import 'materialize-css/dist/css/materialize.min.css'

createApp({
    components:{
        App
    },
}).use(router).mount("#app");


