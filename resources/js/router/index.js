import { createRouter,createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "subscribers.index",
        component: () => import("../components/Views/ListSubscribers.vue")
    },
    {
        path: "/subscribers/create",
        name: "subscribers.create",
        component: () => import("../components/Views/CreateSubscriber.vue")
    },
    {
        path: "/subscribers/:id/edit",
        name: "subscribers.edit",
        component: () => import("../components/Views/EditSubscriber.vue"),
        props: true
    }

];

export default createRouter({
    history: createWebHistory(),
    routes
});


