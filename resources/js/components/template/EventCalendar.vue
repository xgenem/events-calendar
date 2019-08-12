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
      <div v-for="d in daysInMonth" :key="d">
        <div class="calendar-day row" v-bind:class="{'selected': isSelected(d)}">
          <div class="col-md-2">
            <p>{{d}} {{getDay(d)}}</p>
          </div>
          <div class="col-md-9">
            <p>{{isSelected(d) ? event.title: ""}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Moment from "moment";
import { extendMoment } from "moment-range";

const moment = extendMoment(Moment);

export default {
  data() {
    return {
      date: new Date(),
      daysInMonth: null,
      windowHeight: 300,
      prevButtonDisabled: true
    };
  },
  props: ["event"],
  created() {
    window.addEventListener("resize", this.handleResize);
    this.handleResize();
  },
  beforeMount() {
    // get number of days in the selected month
    let year = this.date.getFullYear();
    let month = this.date.getMonth();
    this.daysInMonth = new Date(year, month + 1, 0).getDate();
  },
  mounted() {
    // console.log("Component mounted.");
  },
  methods: {
    getMonthName() {
      let months = [
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
      let year = this.date.getFullYear();
      let month = this.date.getMonth();
      let dt = new Date(year, month, d);
      return dt.toString().split(" ")[0];
    },
    handleResize() {
      this.windowHeight = window.innerHeight - 200 + "px";
    },
    prevMonth() {
      let currentDate = new Date();
      let currentYear = currentDate.getFullYear();
      let currentMonth = currentDate.getMonth();

      let year = this.date.getFullYear();
      let month = this.date.getMonth();

      this.date = new Date(year, month - 1);

      if (
        currentYear == this.date.getFullYear() &&
        currentMonth == this.date.getMonth()
      ) {
        console.log("oof");
        this.prevButtonDisabled = true;
      }
      // update days in month
      this.setDaysInMount();
    },
    nextMonth() {
      let year = this.date.getFullYear();
      let month = this.date.getMonth();
      this.date = new Date(year, month + 1);

      //   if (this.date.getTime() == new Date().getTime()) {
      this.prevButtonDisabled = false;
      //   }

      // update days in month
      this.setDaysInMount();
    },
    setDaysInMount() {
      this.daysInMonth = new Date(
        this.date.getFullYear(),
        this.date.getMonth() + 1,
        0
      ).getDate();
    },
    isSelected(dd) {
      let yy = this.date.getFullYear();
      let mm = this.date.getMonth();
      let dt = new Date(yy, mm, dd);
      let dname = dt.toString().split(" ")[0];
      let dnum = this.dayInNumber(dname);

      // get index of day with marker if selected
      let idx = this.event.days.indexOf(`${dnum}x`);

      // - 1 if not found means day's not selected
      if (idx !== -1) {
        // check if within range
        let range = moment.range(this.event.start, this.event.end);
        if (range.contains(dt)) return true;
      }
      return false;
    },
    dayInNumber(dayName) {
      let days = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
      return days.indexOf(dayName);
    }
  },
  computed: {
    isPrevButtonDisabled: function() {
      return this.prevButtonDisabled;
    }
  }
};
</script>
