<template>
  <div>
    <div class="mx-auto text-center mt-5 mb-5">
      <h1 class="mb-5">IdeaList(DB版)</h1>
      <router-link to="/memo">
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
    </div>

    <router-view />

    <div class="card-footer text-muted mt-5">
      <div class="w-75 d-flex m-auto justify-content-center">
        <router-link to="/tos">
          <a> 利用規約 </a>
        </router-link>
        <router-link to="/privacy">
          <a class="ml-2"> プライバシー </a>
        </router-link>
        <router-link to="/home">
          <a class="ml-2"> 使用方法 </a>
        </router-link>
      </div>
    </div>
  </div>
</template>

<style scoped>
a{
  text-decoration:underline;
}
.m-auto {
  margin: 0 auto;
}

.text-mode {
  writing-mode: vertical-rl;
}
</style>

