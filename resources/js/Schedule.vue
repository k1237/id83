<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">保存したアイデア</div>
          <div class="card-body">
            <Schedulecomponent
              v-for="(idea, index) in ideas"
              v-bind:key="index"
              :Number="index"
              :Idea="idea"
            ></Schedulecomponent>
          </div>
        </div>
      </div>
    </div>
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