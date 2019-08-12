<template>
  <div>
    <div v-for="d in days" :key="d.day" class="days-selector-item">
      <input type="checkbox" v-model="d.checked" @change="selectDay()" />
      {{d.day}}
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      days: [
        { day: "Mon", checked: false },
        { day: "Tue", checked: false },
        { day: "Wed", checked: false },
        { day: "Thu", checked: false },
        { day: "Fri", checked: false },
        { day: "Sat", checked: false },
        { day: "Sun", checked: false }
      ]
    };
  },
  methods: {
    selectDay() {
      let daysStr = "";
      this.days.forEach((e, i) => {
        daysStr += `${i}${e.checked ? 'x' : ''}`;
      });
      this.$emit("set-days", daysStr);
    }
  }
};
</script>
