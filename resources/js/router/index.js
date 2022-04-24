import { createRouter, createWebHistory } from "vue-router";

import Home from "../components/Home.vue"
import Recent from "../components/Recent.vue"


const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/recent',
        name: 'recent',
        component: Recent
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})