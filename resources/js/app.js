require('./bootstrap')

import { createApp } from 'vue';
import * as VueRouter from 'vue-router';


import App from './app.vue';



import Register from './Components/register.vue';
import Login from './Components/login.vue';
import Dashboard from './Components/dashboard.vue';
import ProductAdd from './Components/productAdd.vue';
import ProductShow from './Components/productShow.vue';


const routes = [

    {path: "/register",name: "Register",component: Register, meta: { guestOnly: true }},
    {path: "/login",name: "Login",component: Login,meta: { guestOnly: true }},
    {path: "/dashboard",name: "Dashboard",component: Dashboard,meta: { authOnly: true }},
    {path: "/dashboard/product/add",name: "Product Add",component: ProductAdd,meta: { authOnly: true }},
    {path: "/dashboard/product/show",name: "Product Show",component: ProductShow,meta: { authOnly: true }},


  ];






const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    linkActiveClass: "active",
    linkExactActiveClass: 'exact-active-link',
    routes,
  });



  function isAuthenticate() {

    return localStorage.getItem("token");

  }

  router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.authOnly)) {

      if (!isAuthenticate()) {
        next({
          path: "/login",
        });
      } else {
        next();
      }
    } else if (to.matched.some(record => record.meta.guestOnly)) {


      if (isAuthenticate()) {
        next({
          path: "/dashboard"
        });
      } else {
        next();
      }
    } else {
      next();
    }
  });

const app = createApp(App)

app.use(router).mount('#app')
