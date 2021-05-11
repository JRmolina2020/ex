require("./bootstrap");

window.Vue = require("vue");

Vue.component("topics", require("./components/topics.vue").default);
Vue.component("home", require("./components/home.vue").default);
Vue.component("words", require("./components/words.vue").default);
import VueApexCharts from "vue-apexcharts";
Vue.use(VueApexCharts);

Vue.component("apexchart", VueApexCharts);
const app = new Vue({
    el: "#app"
});
