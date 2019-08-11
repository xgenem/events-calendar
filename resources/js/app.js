// libraries
require("./bootstrap");
import "v-msgx/dist/msg.min.css";

window.Vue = require("vue");

import Msg from "v-msgx";

// Global register
Vue.use(Msg);

// Manually add component? Should I automatically add it too? hmm
Vue.component(
    "new-events-component",
    require("./components/NewEventsComponent.vue").default
);

// Add Template files
const files = require.context("./components/template/", true, /\.vue$/i);
files.keys().map(key =>
    Vue.component(
        key
            .split("/")
            .pop()
            .split(".")[0],
        files(key).default
    )
);

// create app
const app = new Vue({
    el: "#app"
});
