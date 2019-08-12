// libraries
require("./bootstrap");
require("jquery-ui-bundle");

// css imports
import "v-msgx/dist/msg.min.css";
import "jquery-ui/themes/base/all.css";

// for notifications
import Msg from "v-msgx";

// fontawesome
import { library } from "@fortawesome/fontawesome-svg-core";
import { faCircleNotch } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

// axios
import axios from "axios";

window.Vue = require("vue");

library.add(faCircleNotch);

Vue.component("font-awesome-icon", FontAwesomeIcon);

// Global register
Vue.use(Msg);

// use axios globally
Vue.prototype.$http = axios;

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
