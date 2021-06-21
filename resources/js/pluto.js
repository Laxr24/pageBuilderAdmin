
// Importing All assets 
window.Vue = require('vue');
import Vuex from 'vuex'
import storeData from "./store/index"


// Support for Vuex 

Vue.use(Vuex)
const store = new Vuex.Store(
   storeData
)









//  Vue.component('admin', require('./components/Admin.vue').default);
 
// Import components 
import admin from './components/Admin.vue'

 const adminApp = new Vue({
     el: '#admin_container',
     components: {
         admin
     },
     store
 });
 


// Implimenting Other JS and JQuery functionality


// For main tabs 
 $( function() {
    var tabs = $( "#menu" ).tabs();
    tabs.find( ".ui-tabs-nav" ).sortable({
      axis: "x",
      stop: function() {
        tabs.tabs( "refresh" );
      }
    });
  } );


