<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">アイデア</div>
          <div class="card-body">
            <Ideacomponent
              v-for="(idea, index) in idea_ar"
              v-bind:key="index"
              :Number="index"
              :CSRF="csrf"
              :Idea="idea"
              v-on:change-event="changeAction"
              v-on:del-event="delAction"
            ></Ideacomponent>
          </div>
        </div>
      </div>
    </div>
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

  watch: {
    idea_ar: {
      //アイデア帳配列を監視しLSに保存
      handler: function (next) {
        localStorage.setItem("idea_ar", JSON.stringify(next));
      },
      deep: true,
    },
  },

  props: {
    csrf: {
      type: String,
      required: true,
    },
  },

  methods: {
    changeAction(Number, idea) {
      this.idea_ar[Number] = idea;
    },
    delAction(Number) {
      this.idea_ar[Number] = "";
    },
  },

  created: function () {
    const IDEA = localStorage.getItem("idea_ar");
    if (IDEA) {
      this.idea_ar = JSON.parse(IDEA);
    }
  },
};
</script>