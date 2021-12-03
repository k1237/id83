<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">実行したアイデア</div>
          <div class="card-body">
            <Excutedcomponent
              v-for="(idea, index) in ideas"
              v-bind:key="index"
              :Number="index"
              :CSRF="csrf"
              :Idea="idea"
            ></Excutedcomponent>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Excutedcomponent from "./components/ExcutedComponent.vue";
import axios from "axios";

export default {
  name: "App",

  components: {
    Excutedcomponent,
  },

  data() {
    return {
      ideas: [],
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
    Idea2: async function () {
      await axios.get("http://127.0.0.1:8000/api/idea2").then((response) => {
        this.ideas = response.data;
      });
    },
    settingData: async function () {
      await this.Idea2();
    },
  },
};
</script>