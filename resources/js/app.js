/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
"use strict";

import Vue from "vue";

require('./bootstrap');

/* global window */

window.Vue = require('vue');

const $ = require('jquery');
window.$ = $; // We declare it globally

import {Datetime} from 'vue-datetime';
import 'vue-datetime/dist/vue-datetime.css';

Vue.component('datetime', Datetime);

import Toast from "vue-toastification";
// Import the CSS or use your own!
import "vue-toastification/dist/index.css";

const options = {
    position: "bottom-right",
};
Vue.use(Toast, options);


import VuePageTransition from 'vue-page-transition'

Vue.use(VuePageTransition);

import moment from 'moment';

Vue.filter('formatDateIntoNormalFormat', function (value) {
    if (value) {
        return moment(String(value)).format('Do MMMM YYYY');
    }
});
Vue.filter('formatDateIntoAdvanceFormat', function (value) {
    if (value) {
        return moment(String(value)).format('Do MMMM YYYY, h:mm:ss a');
    }
});

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);


Vue.component('app-body', require('./components/AppBody.vue').default);


import router from './Router/router';

import Vuex from 'vuex';

Vue.use(Vuex);
import store from "./store";


const app = new Vue({
    el: '#app',
    store: new Vuex.Store(store),
    router,
});


