<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <event-form v-on:set-event="setEvent" />
      </div>
      <div class="col-md-8">
        <event-calendar :event="event" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      event: {
        title: "",
        days: "",
        start: "",
        end: ""
      }
    };
  },
  methods: {
    setEvent(event) {
      this.event = event;
    }
  }
};
</script>
