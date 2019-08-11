<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <event-form />
      </div>
      <div class="col-md-8">
        <event-calendar />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    // console.log("Component mounted.");
    // this.$Msg.success("This is a notification", { position: "top-right" });
  }
};
</script>
