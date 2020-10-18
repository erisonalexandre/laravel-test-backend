require('./bootstrap');

import Vue from 'vue';

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';
import VueIziToast from 'vue-izitoast';
import PageOptions from './Mixins/PageOptions';
import VueMask from 'v-mask'

Vue.mixin({ methods: { route } });
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(VueIziToast);
Vue.use(VueMask);

const app = document.getElementById('app');

new Vue({
    mixins: [PageOptions],
    watch: {
        flash() {
            if(this.$page.flash) {
                this.$toast[this.$page.flash.type](this.$page.flash.message, this.$page.flash.tittle, {position: 'topRight'})
            }
        }
    },
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
