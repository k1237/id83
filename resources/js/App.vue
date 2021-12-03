<template>
  <div>
    <div class="mx-auto text-center mt-5">
      <h1 class="mb-5">IdeaList(DB版)</h1>
      <router-link to="/memo" :CSRF="csrf">
        <a><button type="button" class="btn btn-success">メモ帳</button></a>
      </router-link>
      <router-link to="/idea">
        <a
          ><button type="button" class="btn btn-primary ml-2">
            アイデア
          </button></a
        >
      </router-link>
      <router-link to="/schedule">
        <a
          ><button type="button" class="btn btn-warning ml-2">
            実行予定
          </button></a
        >
      </router-link>
      <router-link to="/excuted">
        <a><button type="button" class="btn btn-danger ml-2">実行済</button></a>
      </router-link>
      <router-link to="/home">
        <a><button type="button" class="btn btn-dark ml-2">使用方法</button></a>
      </router-link>
    </div>

    <router-view />
  </div>
</template>

<script>

export default {

  props: {
    csrf: {
      type: String,
      required: true,
    },
  },
};
</script>

