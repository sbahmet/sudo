
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('cand', require('./components/Candidate.vue'));
Vue.component('cell', require('./components/Cell.vue'));
Vue.component('block3', require('./components/Block3.vue'));
Vue.component('field', require('./components/Field.vue'));

let block = {
    cells: [
        {cands:[1,3,4,7,8]},
        {cands:[2,4,5,6,8], val: null},
        {cands:[7], val:7},
        {cands:[2,4,5,6,8]},
        {cands:[2,4,5,6,8]},
        {cands:[2,4,5,6,8]},
        {cands:[2,4,5,6,8]},
        {cands:[2,4,5,6,8]},
        {cands:[2,4,5,6,8]}
    ],
    id:1
};

let blocks = [
    block,block,block,
    block,block,block,
    block,block,block
];

window.blocks = blocks;

const app = new Vue({
    el: '#app',
    data: {
        blocks
    }
});
