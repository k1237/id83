/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { createApp } from 'vue';
import {router} from'./routes/router'
import App from "./App.vue";
let app = createApp(App)
app.use(router)
app.component('app', App);
app.mount('#app')






// import Vue from 'vue';

// import Home from "./components/HomeComponent.vue";
// import Memo from "./components/MemoComponent.vue";
// import Idea from './Idea.vue';
// import IdeaComponent from "./components/IdeaComponent.vue";
// import Schedule from './Schedule.vue';
// import ScheduleComponent from "./components/ScheduleComponent.vue";
// import Excuted  from "./Excuted.vue";
// import ExcutedComponent  from "./components/ExcutedComponent.vue";




// // app.component('home', Home);
// // app.component('memo', Memo);
// // app.component('idea', Idea);
// // app.component('idea-component', IdeaComponent);
// // app.component('schedule', Schedule);
// // app.component('schedule-component', ScheduleComponent);
// // app.component('excuted', Excuted);
// // app.component('excuted-component', ExcutedComponent);




// import VueRouter from 'vue-router';
// import router from "./routes/router";

// window.Vue = Vue 
// Vue.use(VueRouter);

// const app = new Vue({
//     el: '#app',
//     router: new VueRouter(router)
// });