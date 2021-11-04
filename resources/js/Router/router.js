import Vue from 'vue';
import VueRouter from 'vue-router';
import DashboardIndex from "../components/Backend/Dashboard/DashboardIndex";

import AccountSettings from "../components/Backend/Account/AccountSettings";
import CreatePost from "../components/Backend/Dashboard/Supplier/Posts/CreatePost";

Vue.use(VueRouter);


const routes = [
    {path: '/', component: DashboardIndex},
    {path: '/home', component: DashboardIndex},
    {path: '/admin', component: DashboardIndex},
    {path: '/account/settings', component: AccountSettings},
    {path: '/supplier/create/post', name: 'supplier-create-post', component: CreatePost}
];
const router = new VueRouter({
    routes,
    mode: 'history',
    hashbang: true
});

export default router;
