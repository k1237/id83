<template>
  <form method="post" action="./delete">
    <div class="mb-3 d-flex">
      <input
        type="text"
        class="form-control col-xs-4"
        name="idea_text"
        style="width: 80%"
        value="test"
        readonly
      />
      <button type="submit" name="delete" class="btn btn-danger ml-2">
        削除
      </button>
    </div>
  </form>
</template>

<script>
</script>