
<template>
  <div id="app">
    <h1 class="main-title py-5 text-3xl text-center text-gray-700">Рівень забруднення атмосферного повітря по городам України.</h1>
    <div class="town-table mx-auto">
      <button class="sort-btn bg-green-600 text-white px-3 mx-auto mb-5">Сортувати за рівнем забруднення</button>
      <div class="town-table-row w-full flex border border-gray-700 mb-1">
          <span class="town-title-name pl-5">Город</span>
          <span class="town-title-level text-center border-l px-1  border-gray-700">Индекс чистоты воздуха</span>
          <span class="town-title-temp text-center border-l  px-1 border-gray-700">Температура</span>
      </div>
      <div class="town-table-row w-full flex border border-gray-700 mb-1" v-for="(item, key) in info" :key="item.id">
          <span class="town-title-name pl-5">{{item.cityName}}</span>
          <span class="town-title-level text-center border-l  border-gray-700">{{item.pollutants[2].value}}</span>
          <span class="town-title-temp text-center border-l  border-gray-700">{{ typeof info[key].pollutants[5].value != 'undefined' }}</span>
      </div>
    </div>

    

  </div>

  
</template>

<script>
//import HelloWorld from './components/HelloWorld.vue'
const axios = require('axios');
export default {
  data() {
    return {
      info: null,
      test: ''
    }
  },
  mounted() {
     axios
      .get('https://cors-anywhere.herokuapp.com/https://api.saveecobot.com/output.json')
      .then(response => (this.info = response.data ))
  },
 
};
</script>

<style>

</style>
