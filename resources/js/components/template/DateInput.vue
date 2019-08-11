<template>
  <input type="date" ref="dateInput" class="form-control" />
</template>

<script>
export default {
  props: ["name"],
  mounted() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();

    dd = dd < 10 ? "0" + dd : dd;
    mm = mm < 10 ? "0" + mm : mm;
    today = yyyy + "-" + mm + "-" + dd;

    // cause why would you create an event in the past? ^^.
    this.$refs.dateInput.setAttribute("min", today);
  }
};
</script>
