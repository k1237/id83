<template>
  <div>
    <Schedulecomponent
      v-for="(idea, index) in ideas"
      v-bind:key="index"
      :Number="index"
      :CSRF="csrf"
      :Idea="idea"
    ></Schedulecomponent>
  </div>
</template>

<script>
import Schedulecomponent from "./components/ScheduleComponent.vue";
import axios from "axios";

export default {
  name: "App",

  components: {
    Schedulecomponent,
  },

  data() {
    return {
      ideas: "",
    };
  },

  mounted() {
    this.settingData();
  },

  props: {
    csrf: {
      type: String,
      required: true,
    },
  },

  methods: {
    Idea: async function () {
      await axios.get("http://127.0.0.1:8000/api/idea").then((response) => {
        this.ideas = response.data;
      });
    },
    settingData: async function () {
      await this.Idea();
    },
  },
};
</script>