import VueRouter from "vue-router";
import Vue from "vue";

import Linkadd from "./components/Linkadd.vue";
import XRay from "./components/XRay.vue";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: "/",
            name: "XRay",
            component: XRay
        },
        {
            path: "/linkadd",
            name: "linkadd",
            component: Linkadd
        }
    ],
    mode: "history"
});