<template>
  <div>
    <h3>{{getMonthName()}} {{date.getFullYear()}}</h3>
  </div>
</template>

<script>
export default {
  data() {
    return {
      date: new Date()
    };
  },
  mounted() {
    // console.log("Component mounted.");
  },
  methods: {
    getMonthName() {
      var months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
      ];
      return months[this.date.getMonth()];
    }
  }
};
</script>
