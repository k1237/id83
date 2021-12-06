<template>
  <form method="post" action="./delete">
    <input type="hidden" name="_token" :value="csrf" />
    <input type="hidden" name="id" v-model="id" />
    <input type="hidden" name="user_id" v-model="users.id" />
    <div class="mb-3 d-flex">
      <input
        type="text"
        class="form-control col-xs-4"
        name="idea_text"
        style="width: 80%"
        v-model="value"
        readonly
      />
      <button type="submit" name="delete" class="btn btn-danger ml-2">
        削除
      </button>
    </div>
  </form>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      value: "",
      users: [],
      id: "",
      csrf: document.head.querySelector('meta[name="csrf-token"]')
        ? document.head.querySelector('meta[name="csrf-token"]').content
        : "",
    };
  },

  mounted() {
    this.settingData();
    this.value = this.Idea.idea;
    this.id = this.Idea.id;
    if (!this.csrf) {
      console.warn(
        'The CSRF token is missing. Ensure that the HTML header includes the following: <meta name="csrf-token" content="{{ csrf_token() }}">'
      );
    }
  },

  props: {
    Number: Number,
    Idea: Object,
  },

  methods: {
    User: async function () {
      await axios.get("http://127.0.0.1:8000/api/profile").then((response) => {
        this.users = response.data;
      });
    },
    settingData: async function () {
      await this.User();
    },
  },
};
</script>
