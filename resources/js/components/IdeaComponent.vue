<template>
  <form method="post" action="./add" id="valueForm">
    <input type="hidden" name="_token" v-bind:value="CSRF" />
    <input type="hidden" name="user_id" v-model="users.id" />
    <div class="mb-3 d-flex">
      <input
        type="text"
        class="form-control col-xs-4"
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
      >
        保存
      </button>

      <button @click="deleteIdea" class="btn btn-danger ml-2">削除</button>
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
    };
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

  props: {
    CSRF: {
      type: String,
      required: true,
    },
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
      // 現状LSで値を保存しているが後々DBに自動保存したい
      // document.getElementById("valueForm").submit()
    },
    deleteIdea() {
      this.$emit("del-event", this.Number);
    },
  },
};
</script>