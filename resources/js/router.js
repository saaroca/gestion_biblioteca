import { createRouter, createWebHistory } from "vue-router";
import BookList from "@/components/BookList.vue";
import Registro from "@/components/Registro.vue";
import Login from "@/components/Login.vue";
import Profile from "@/components/Profile.vue";

const routes = [
    {
        path: "/books",
        component: BookList,
    },
    {
        path: "/registro",
        name: "Registro",
        component: Registro,
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
    },
    {
        path: "/profile",
        name: "Profile",
        component: Profile,
        meta: {
            requiresAuth: true,
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;
