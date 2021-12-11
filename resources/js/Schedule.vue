<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">保存したアイデア</div>
          <div class="card-body">
            <Schedulecomponent
              v-for="(idea, index) in data.ideas"
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
import { defineComponent, reactive, onMounted } from "vue";

export default defineComponent({
  components: {
    Schedulecomponent,
  },

  setup: () => {
    const data = reactive({
      ideas: "",
    });

    onMounted(() => {
      settingData();
    });

    const Idea = async function () {
      await axios.get("https://idealist83.herokuapp.com/api/idea").then((response) => {
        data.ideas = response.data;
      });
    };

    const settingData = async function () {
      await Idea();
    };

    return { data, onMounted, Idea, settingData };
  },
});
</script>