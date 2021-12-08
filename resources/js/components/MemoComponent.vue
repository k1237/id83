<template>
  <div class="container-sm">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">メモ帳</div>
          <div class="card-body">
            <form method="post" action="./save">
              <input type="hidden" name="_token" :value="data.csrf" />
              <input type="hidden" name="user_id" v-model="data.users.id" />
              <textarea
                class="form-control"
                name="memo"
                id="textarea1"
                rows="20"
                v-model="data.memo"
              ></textarea>
              <button
                type="submit"
                name="save"
                class="btn btn-primary"
                v-show="canUsesave"
              >
                保存
              </button>
              <button type="submit" name="update" class="btn btn-warning">
                更新
              </button>
              <button type="submit" name="delete" class="btn btn-danger">
                削除
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { defineComponent, computed, reactive, onMounted } from "vue";

export default defineComponent({
  setup: () => {
    const data = reactive({
      users: [],
      memo: "",
      init: "",
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    });

    const canUsesave = computed(() => data.init == "");

    onMounted(() => {
      settingData();
      settingMemo();
      if (!data.csrf) {
        console.warn(
          'The CSRF token is missing. Ensure that the HTML header includes the following: <meta name="csrf-token" content="{{ csrf_token() }}">'
        );
      }
    });

    //エラー処理追記必要
    const User = async function () {
      await axios.get("http://127.0.0.1:8000/api/profile").then((response) => {
        data.users = response.data;
      });
    };

    const settingData = async function () {
      await User();
    };

    const Memo = async function () {
      await axios.get("http://127.0.0.1:8000/api/memo").then((response) => {
        data.memo = response.data;
        data.init = response.data;
      });
    };

    const settingMemo = async function () {
      await Memo();
    };

    return { data, canUsesave, onMounted,settingData,settingMemo};
  },
});
</script>
