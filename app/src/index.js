// JS

import './js/'


import air from './components/air.vue'


// SCSS
import './assets/scss/main.scss'

// Vue.js
window.Vue = require('vue')

const app = new Vue({
  el: '#app',
  components:{
    air
  }
})
