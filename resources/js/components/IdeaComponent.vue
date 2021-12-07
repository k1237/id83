<template>
  <form method="post" action="./add" id="valueForm">
    <input type="hidden" name="_token" :value="csrf" />
    <input type="hidden" name="user_id" v-model="users.id" />

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
        v-model="idea"
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
export default {
  data() {
    return {
      idea: "",
      users: [],
      csrf: document.head.querySelector('meta[name="csrf-token"]')
        ? document.head.querySelector('meta[name="csrf-token"]').content
        : "",
    };
  },

  computed: {
    erMessage: function () {
      return this.idea.length > 20;
    },
    canSubmit: function () {
      return this.idea !== "" && this.idea.length < 20;
    },
  },

  watch: {
    //アイデア欄の削除ボタン
    Idea: function (newIdea) {
      this.idea = newIdea;
    },
  },

  mounted() {
    this.settingData();
    this.idea = this.Idea; //LSの値をv-modelに代入
  },

  created() {
    if (!this.csrf) {
      console.warn(
        'The CSRF token is missing. Ensure that the HTML header includes the following: <meta name="csrf-token" content="{{ csrf_token() }}">'
      );
    }
  },

  props: {
    Number: Number,
    Idea: String,
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

    onChanges() {
      this.$emit("change-event", this.Number, this.idea);
      // document.getElementById("valueForm").submit()
    },

    deleteIdea() {
      setTimeout(() => {
        this.$emit("del-event", this.Number);
      }, 50);
    },

    resetIdea() {
      this.$emit("del-event", this.Number);
    },
  },
};
</script>

<style scoped>
.m-3 {
  margin-top: -5%;
}
</style>