
require('./bootstrap');

window.Vue = require('vue').default;
import PortalVue from 'portal-vue';

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';

Vue.use(PortalVue);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

Vue.component('pds-component', require('./views/pds.vue').default);


// pagination
// Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app',
});
