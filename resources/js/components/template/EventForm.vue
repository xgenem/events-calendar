<template>
  <div>
    <div class="form-group">
      <label>Event</label>
      <input type="text" class="form-control" placeholder="Title" ref="title" />
    </div>

    <div class="form-group row">
      <div class="col-md-6">
        <label for="start">From</label>
        <input type="text" class="form-control dtpicker" ref="start" />
      </div>

      <div class="col-md-6">
        <label for="end">To</label>
        <input type="text" class="form-control dtpicker" ref="end" />
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
        title: "",
        start: "",
        end: "",
        days: ""
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

      let { title, start, end } = this.$refs;

      this.event.title = title.value;
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
        .catch(error => {
          let e = error.response.data;
          for (var k in e) {
            this.$Msg.error(e[k], {
              position: "bottom-right"
            });
          }
        })
        .finally(() => {
          this.isSaving = false;
        });
    }
  }
};
</script>
