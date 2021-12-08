<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">実行したアイデア</div>
          <div class="card-body">
            <Excutedcomponent
              v-for="(idea, index) in data.ideas"
              v-bind:key="index"
              :Number="index"
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
import { defineComponent, reactive, onMounted } from "vue";

export default defineComponent({
  components: {
    Excutedcomponent,
  },

  setup: () => {
    const data = reactive({
      ideas: [],
    });

    onMounted(() => {
      settingData();
    });

    const Idea2 = async function () {
      await axios.get("http://127.0.0.1:8000/api/idea2").then((response) => {
        data.ideas = response.data;
      });
    };

    const settingData = async function () {
      await Idea2();
    };

    return { data, onMounted, settingData };
  },
});
</script>