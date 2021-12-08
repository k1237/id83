<template>
  <form method="post" action="./add" id="valueForm">
    <input type="hidden" name="_token" :value="data.csrf" />
    <input type="hidden" name="user_id" v-model="data.users.id" />

    <div class="text-danger text-left" v-if="erMessage">
      ※20文字以内で入力してください
    </div>
    <div class="mb-3 d-flex col-xs-12">
      <input
        type="text"
        class="form-control"
        id="idea_text"
        style="width: 80%"
        name="idea_text"
        v-model="data.idea"
        @change="onChanges"
      />

      <button
        type="submit"
        name="add"
        class="btn btn-primary ml-2"
        @click="deleteIdea"
        :disabled="!canSubmit"
      >
        ✓
      </button>

      <button type="button" @click="resetIdea" class="btn btn-danger ml-2">
        ×
      </button>
    </div>
  </form>
</template>

<script>
import axios from "axios";
import {
  defineComponent,
  reactive,
  toRefs,
  watch,
  computed,
  onMounted,
} from "vue";

export default defineComponent({
  props: {
    Number: Number,
    Idea: String,
  },

  setup: (props,context) => {
    const data = reactive({
      idea: "",
      users: [],
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    });

    const erMessage = computed(() => data.idea.length > 20);
    const canSubmit = computed(() => data.idea !== "" && data.idea.length < 20);

    const { Idea } = toRefs(props);
    watch(Idea, (newIdea) => {
      data.idea = newIdea;
    });

    onMounted(() => {
      settingData();
      data.idea = props.Idea; //LSの値をv-modelに代入
      if (!data.csrf) {
        console.warn(
          'The CSRF token is missing. Ensure that the HTML header includes the following: <meta name="csrf-token" content="{{ csrf_token() }}">'
        );
      }
    });

    const User = async function () {
      await axios.get("http://127.0.0.1:8000/api/profile").then((response) => {
        data.users = response.data;
      });
    }

    const settingData = async function () {
      await User();
    }

    const onChanges = () => {
      context.emit("change-event", props.Number, data.idea);
    }

    const deleteIdea = () => {
      setTimeout(() => {
        context.emit("del-event", props.Number);
      }, 50);
    }

    const resetIdea =() => {
     context.emit("del-event", props.Number);
    }

    return { data, erMessage, canSubmit ,onMounted,User,settingData,onChanges,deleteIdea,resetIdea};
  },
});
</script>

<style scoped>
.m-3 {
  margin-top: -5%;
}
</style>