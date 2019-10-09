/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import mail from './components/mail.vue';
require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('product', require('./components/Product.vue').default);
Vue.component('our-footer', require('./components/our-footer.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data() {
        return {
            count : 1,
        }
    },
    components : {mail},
    methods : {
        add() {
            this.count++;
            console.log(this.count)
        },
        add1() {
            this.count++;
            console.log(this.count)
        },
        remove() {
            if (this.count <= 1) {
                return
            }
            this.count--;
            console.log(this.count)
        },
    }
});
