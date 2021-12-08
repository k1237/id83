<template>
  <form method="post" action="./delete">
    <input type="hidden" name="_token" :value="data.csrf" />
    <input type="hidden" name="id" v-model="data.id" />
    <input type="hidden" name="user_id" v-model="data.users.id" />
    <div class="mb-3 d-flex">
      <input
        type="text"
        class="form-control col-xs-4"
        name="idea_text"
        style="width: 80%"
        v-model="data.value"
        readonly
      />
      <button type="submit" name="delete" class="btn btn-danger ml-2">×</button>
    </div>
  </form>
</template>

<script>
import axios from "axios";
import { defineComponent, reactive, onMounted } from "vue";

export default defineComponent({
  props: {
    Number: Number,
    Idea: Object,
  },

  setup: (props) => {
    const data = reactive({
      value: "",
      users: [],
      id: "",
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    });

    onMounted(() => {
      settingData();
      data.value = props.Idea.idea;
      data.id = props.Idea.id;
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
    };

    const settingData = async function () {
      await User();
    };

    return { data, onMounted, User, settingData };
  },
});
</script>


