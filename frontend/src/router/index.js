import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import LoginView from "../views/LoginView.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            name: "home",
            component: HomeView,
        },
        {
            path: "/login",
            name: "login",
            component: LoginView,
        },
        {
            path: "/about",
            name: "about",
            // route level code-splitting
            // this generates a separate chunk (About.[hash].js) for this route
            // which is lazy-loaded when the route is visited.
            component: () => import("../views/AboutView.vue"),
        },
        {
            path: "/process",
            name: "process",
            component: () => import("../views/ProcessView.vue"),
        },
        {
            path: "/contact",
            name: "contact",
            component: () => import("../views/ContactView.vue"),
        },
        {
            path: "/work",
            name: "work",
            component: () => import("../views/WorkView.vue"),
        },
        {
            path: "/work/detail/:id",
            name: "detail",
            component: () => import("../views/DetailView.vue"),
        },
        {
            path: "/news",
            name: "news",
            component: () => import("../views/NewsView.vue"),
        },
        {
            path: "/news/detail/:id",
            name: "newsdetail",
            component: () => import("../views/NewsDetailView.vue"),
        },
        {
            path: "/blogs",
            name: "blogs",
            component: () => import("../views/BlogsView.vue"),
        },
        {
            path: "/blog/detail/:id",
            name: "blogdetail",
            component: () => import("../views/BlogDetailView.vue"),
        },
        {
            path: "/events",
            name: "events",
            component: () => import("../views/EventsView.vue"),
        },
        {
            path: "/event/detail/:id",
            name: "eventdetail",
            component: () => import("../views/EventDetailView.vue"),
        },

        {
            path: "/admin",
            name: "admin",
            component: () => import("../views/AdminView.vue"),
            meta: {
                isAuth: true,
            },
            children: [
                {
                    path: "",
                    name: "dashboard",
                    component: () => import("../views/HomeAdminView.vue"),
                    props: true,
                },
                {
                    path: "content",
                    component: () => import("../views/ContentView.vue"),
                },
                {
                    path: "inquiry",
                    component: () => import("../views/InquiryView.vue"),
                },
                {
                    path: "user",
                    component: () => import("../views/UsersView.vue"),
                },
            ],
        },
    ],
});

router.beforeEach((to, from, next) => {
    const authorized = JSON.parse(localStorage.getItem("authorized"));

    if (to.meta.isAuth && !authorized) next({ name: "login" });
    if (to.name === "login" && authorized) next({ path: "/admin" });
    else next();
});

export default router;
