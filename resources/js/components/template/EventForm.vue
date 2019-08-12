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
        <input type="text" class="form-control dtpicker" ref="start" @change="display()" />
      </div>

      <div class="col-md-6">
        <label for="end">To</label>
        <!-- <date-input :name="'end'" v-model="event.end" /> -->
        <input type="text" class="form-control dtpicker" ref="end" />
      </div>
    </div>

    <div class="form-group">
      <days-selector />
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
      console.log("hello");

      $(".dtpicker").datepicker({
        dateFormat: "yy-mm-dd",
        type: "text"
      });
    });
  },
  methods: {
    display() {
      console.log(this.start);
    },
    saveEvent() {
      //   e.preventDefault();
      this.isSaving = true;

      let { start, end } = this.$refs;

      this.event.start = start.value;
      this.event.end = end.value;

      console.log(JSON.stringify(this.event));

      this.$http
        .post("./api/events/new", this.event)
        .then(result => {
          console.log(result);
          this.$Msg.success("Successfully Saved", {
            position: "bottom-right"
          });
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
