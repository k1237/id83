<template>
  <form method="post" action="./add">
    <div class="mb-3 d-flex">
      <input
        type="text"
        class="form-control col-xs-4"
        name="idea_text"
        id="idea_text"
        style="width: 80%"
        value=""
      />
      <button type="submit" name="add" class="btn btn-primary ml-2">
        保存
      </button>
      <button type="reset" class="btn btn-danger ml-2">削除</button>
    </div>
  </form>
</template>

<script>
export default {
  data() {
    return {};
  },
};
</script>