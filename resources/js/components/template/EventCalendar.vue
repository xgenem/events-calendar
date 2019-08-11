<template>
  <div>
    <div>
      <h3 class="calendar-month-year">{{getMonthName()}} {{date.getFullYear()}}</h3>
      <div class="calendar-controls">
        <button @click="prevMonth()" class="btn-circle" :disabled="isPrevButtonDisabled"><</button>
        <button @click="nextMonth()" class="btn-circle">></button>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="calendar-dates" v-bind:style="{height: windowHeight}">
      <div class="calendar-day" v-for="d in daysInMonth" :key="d">
        <div class="col-md-2">
          <p>{{d}} {{getDay(d)}}</p>
        </div>
        <div class="col-md-10">
          <p>{{event.name}}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { constants } from "crypto";
export default {
  data() {
    return {
      date: new Date(),
      daysInMonth: null,
      windowHeight: 300,
      event: {
        name: null
      },
      prevButtonDisabled: true
    };
  },
  created() {
    window.addEventListener("resize", this.handleResize);
    this.handleResize();
  },
  beforeMount() {
    // get number of days in the selected month
    var year = this.date.getFullYear();
    var month = this.date.getMonth();
    this.daysInMonth = new Date(year, month + 1, 0).getDate();
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
    },
    getDay(d) {
      var days = [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday"
      ];

      var year = this.date.getFullYear();
      var month = this.date.getMonth();
      var dt = new Date(year, month, d);
      return dt.toString().split(" ")[0];
    },
    handleResize() {
      this.windowHeight = window.innerHeight - 200 + "px";
    },
    prevMonth() {
      var currentDate = new Date();
      var currentYear = currentDate.getFullYear();
      var currentMonth = currentDate.getMonth();

      var year = this.date.getFullYear();
      var month = this.date.getMonth();

      this.date = new Date(year, month - 1);

      if (
        currentYear == this.date.getFullYear() &&
        currentMonth == this.date.getMonth()
      ) {
        console.log("oof");
        this.prevButtonDisabled = true;
      }
      // update days in month
      this.getDaysInMonth();
    },
    nextMonth() {
      var year = this.date.getFullYear();
      var month = this.date.getMonth();
      this.date = new Date(year, month + 1);

      //   if (this.date.getTime() == new Date().getTime()) {
      this.prevButtonDisabled = false;
      //   }

      // update days in month
      this.getDaysInMonth();
    },
    getDaysInMonth() {
      this.daysInMonth = new Date(
        this.date.getFullYear(),
        this.date.getMonth() + 1,
        0
      ).getDate();
    }
  },
  computed: {
    isPrevButtonDisabled: function() {
      return this.prevButtonDisabled;
    }
  }
};
</script>
