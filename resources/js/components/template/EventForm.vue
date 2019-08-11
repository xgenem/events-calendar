<template>
  <form>
    <div class="form-group">
      <label>Event</label>
      <input type="text" class="form-control" placeholder="Title" />
    </div>
    <div class="form-group row">
      <div class="col-md-6">
        <label for="start">From</label>
        <input type="date" class="form-control" id="start" />
      </div>

      <div class="col-md-6">
        <label for="end">To</label>
        <input type="date" class="form-control" id="end" />
      </div>
    </div>

    <div class="form-group">
      <days-selector />
    </div>
  </form>
</template>

<script>
export default {
  mounted() {
    // console.log("Component mounted.");
  }
};
</script>
