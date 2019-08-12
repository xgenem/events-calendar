<template>
  <div>
    <div class="form-group">
      <label>Event</label>
      <input type="text" class="form-control" placeholder="Title" v-model="event.title" />
    </div>

    <div class="form-group row">
      <div class="col-md-6">
        <label for="start">From</label>
        <!-- <date-input :name="'start'" v-model="event.start" /> -->
        <input type="text" class="form-control dtpicker" ref="start" v-model="event.start" />
      </div>

      <div class="col-md-6">
        <label for="end">To</label>
        <!-- <date-input :name="'end'" v-model="event.end" /> -->
        <input type="text" class="form-control dtpicker" ref="end" v-model="event.end" />
      </div>
    </div>

    <div class="form-group">
      <days-selector v-on:set-days="setDays" />
    </div>

    <button class="btn btn-primary" @click="saveEvent()">
      <span v-if="!isSaving">Save</span>
      <span v-else>
        <font-awesome-icon class="fa-spin" icon="circle-notch" />
      </span>
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      event: {
        title: "test",
        start: "",
        end: "",
        days: "01102030405060"
      },
      title: "",
      start: "",
      end: "",
      isSaving: false
    };
  },
  created() {
    $(document).ready(() => {
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();

      dd = dd < 10 ? "0" + dd : dd;
      mm = mm < 10 ? "0" + mm : mm;
      today = yyyy + "-" + mm + "-" + dd;

      $(".dtpicker").datepicker({
        dateFormat: "yy-mm-dd",
        minDate: today,
        type: "text"
      });
    });
  },
  methods: {
    setDays(days) {
      this.event.days = days;
    },
    saveEvent() {
      //   e.preventDefault();
      this.isSaving = true;

      let { start, end } = this.$refs;

      this.event.start = start.value;
      this.event.end = end.value;

      this.$http
        .post("./api/events/new", this.event)
        .then(result => {
          this.$Msg.success("Successfully Saved", {
            position: "bottom-right"
          });
          this.$emit("set-event", this.event);
        })
        .catch(result => {
          this.$Msg.error(result, {
            position: "bottom-right"
          });
        })
        .finally(() => {
          this.isSaving = false;
        });
    }
  }
};
</script>
