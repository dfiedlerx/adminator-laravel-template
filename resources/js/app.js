
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

Vue.component('example-component', require('./components/ExampleComponent.vue'));

console.log('ok');

console.log('é lei minimizar todo o js');
console.log('é lei minimizar todo o js');

$(document).ready(function(){
    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var itemid = button.data('itemid')
        var modal = $(this)
        modal.find('.modal-body #itemid').val(itemid);
    });
})