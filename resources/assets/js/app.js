
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

require('../bower/bootstrap-toggle/js/bootstrap-toggle.min.js');
require('../vendor/select2-master/dist/js/select2.min.js');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


$('#flash-message').delay(500).fadeIn(250).delay(5000).fadeOut(500);

$('#review').change(function() {
    // $('#reject_reasons').html('Toggle: ' + $(this).prop('checked'))
    $('#reject_reasons').toggle();
})

$('#review').bootstrapToggle({
      on: 'Approve',
      off: 'Decline'
});

$('#changeAvatar').change(function() {
    // $('#reject_reasons').html('Toggle: ' + $(this).prop('checked'))
    $('#avatarForm').toggle();
})

$('#changeAvatar').bootstrapToggle({
      on: 'Change Avatar',
      off: 'Cancel'
});

$(".collaborators").select2({
    tags:true
});

$(".tags").select2({
  tags: true
})



