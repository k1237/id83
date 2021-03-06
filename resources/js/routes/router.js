import { createRouter, createWebHistory } from 'vue-router'
import Home from '../components/HomeComponent.vue'
import Memo from "../components/MemoComponent.vue";
import Idea from '../Idea.vue';
import Schedule from '../Schedule.vue';
import Excuted from '../Excuted.vue';
import Tos from "../components/TosComponent.vue";
import Privacy from "../components/PrivacyComponent.vue";

export const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/home',
      name: 'home',
      component:Home
    },
    {
      path: '/memo',
      name: 'memo',
      component:Memo
    },
    {
      path: '/idea',
      name: 'idea',
      component:Idea
    },
    {
      path: '/schedule',
      name: 'schedule',
      component:Schedule
    },
    {
      path: '/excuted',
      name: 'excuted',
      component:Excuted
    },
    {
      path: '/tos',
      name: 'tos',
      component:Tos
    },
    {
      path: '/privacy',
      name: 'privacy',
      component:Privacy
    },
  ],
})