<template>
  <form @submit="saveEvent">
    <div class="form-group">
      <label>Event</label>
      <input type="text" class="form-control" placeholder="Title" v-model="title" />
    </div>

    <div class="form-group row">
      <div class="col-md-6">
        <label for="start">From</label>
        <date-input :name="'start'" />
      </div>

      <div class="col-md-6">
        <label for="end">To</label>
        <date-input :name="'end'" />
      </div>
    </div>

    <div class="form-group">
      <days-selector />
    </div>

    <button class="btn btn-primary">
      <span v-if="!isSaving">Save</span>
      <span v-else>
        <!-- <Icon name="time" /> -->

        <font-awesome-icon icon="user-secret" />
      </span>
    </button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      title: "",
      start: null,
      end: null,
      isSaving: true
    };
  },
  methods: {
    saveEvent(e) {
      e.preventDefault();
      console.log("test");
    }
  }
};
</script>
