/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { createApp } from 'vue';

// import Vue from 'vue';
// import VueRouter from 'vue-router';
// import router from "./routes/router";

import App from './App.vue';
import Home from "./components/HomeComponent.vue";
import Memo from "./components/MemoComponent.vue";
import Idea from "./components/IdeaComponent.vue";
import Schedule from "./components/ScheduleComponent.vue";
import Excuted from "./components/ExcutedComponent.vue";

// window.Vue = Vue;
// Vue.use(VueRouter);

// const app = new Vue({
//     el: '#app',
//     router
// });

const app = createApp({})
app.component('app', App);
app.component('home', Home);
app.component('memo', Memo);
app.component('idea', Idea);
app.component('schedule', Schedule);
app.component('excuted', Excuted);
app.mount('#app')
