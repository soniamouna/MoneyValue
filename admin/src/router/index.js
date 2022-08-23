import { createRouter, createWebHistory } from "vue-router";
import ConverterView from "../views/ConverterView.vue";
import AdminView from "../views/AdminView.vue";


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "converter",
      component: ConverterView,
    },
    {
      path: "/admin",
      name: "admin",
      component: AdminView,
    },
    
  ],
});

export default router;
