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


import Home from "./components/HomeComponent.vue";
import Memo from "./components/MemoComponent.vue";
import Idea from './Idea.vue';
import IdeaComponent from "./components/IdeaComponent.vue";
import Schedule from './Schedule.vue';
import ScheduleComponent from "./components/ScheduleComponent.vue";
import Excuted from "./components/ExcutedComponent.vue";

// window.Vue = Vue;
// Vue.use(VueRouter);

// const app = new Vue({
//     el: '#app',
//     router
// });

const app = createApp({})
app.component('home', Home);
app.component('memo', Memo);
app.component('idea', Idea);
app.component('idea-component', IdeaComponent);
app.component('schedule', Schedule);
app.component('schedule-component', ScheduleComponent);
app.component('excuted', Excuted);
app.mount('#app')
