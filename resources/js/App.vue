<template>
  <div>
    <Ideacomponent
      v-for="(idea, index) in idea_ar"
      v-bind:key="index"
    ></Ideacomponent>
  </div>
</template>

<script>
import Ideacomponent from "./components/IdeaComponent.vue";

export default {
  name: "App",

  components: {
    Ideacomponent,
  },

  data() {
    return {
      idea_ar: Array(10).fill(""), //アイデア用配列
    };
  },
};
</script>