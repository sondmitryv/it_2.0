
<template>
  <div id="app">
    <section v-if="errored">
        <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
    </section>
    <section v-else>
      <h1 class="main-title py-5 text-3xl text-center text-gray-700">Рівень забруднення атмосферного повітря по городам України.</h1>
      <div class="town-table mx-auto">
        <button class="sort-btn bg-green-600 text-white px-3 mx-auto mb-5" v-on:click="sortedJson()" >Сортувати за рівнем забруднення</button>
        <div class="town-table-row w-full flex border border-gray-700 mb-1  items-stretch">
          <div class="table-td pl-5">
            <span class="flex items-center">Город</span>
          </div>
          <div class="table-td border-l  border-gray-700 text-center">
            <span class="flex items-center justify-center ">PM2.5 частицы, мкг/м³</span>
          </div>
           <div class="table-td  border-l  border-gray-700 text-center">
            <span class="flex items-center justify-center ">PM10 частицы, мкг/м³</span>
          </div>
          <div class="table-td border-l border-gray-700 text-center ">
            <span class="flex items-center justify-center px-1">Индекс чистоты воздуха</span>
          </div>
        </div>
        <div class="town-table-row w-full flex border border-gray-700 mb-1 items-center" v-for="(item, key) in info" :key="item.id">
          <div class="table-td pl-5">
            <span>{{item.cityName}}</span>
          </div>
          <div class="table-td border-l  border-gray-700 text-center">
            <span class="flex items-center justify-center">{{item.pollutants[0].value}}</span>
          </div>
           <div class="table-td  border-l  border-gray-700 text-center">
            <span class="flex items-center justify-center">{{item.pollutants[1].value}}</span>
          </div>
          <div class="table-td text-center border-l  border-gray-700">
            <span>{{(info[key].pollutants[5] != null && info[key].pollutants[5].value != null)?info[key].pollutants[5].value:'Нет данных'}}</span>
          </div>

        </div>
      </div>
    </section>
  </div>

  
</template>

<script>
//import HelloWorld from './components/HelloWorld.vue'
const axios = require('axios');
export default {
  data() {
    return {
      info: null,
      errored: false,
      loading: true,
      colorLevel: chooseLevel => {
        
      }
    }
  },
  mounted() {
     axios
      .get('https://cors-anywhere.herokuapp.com/https://api.saveecobot.com/output.json')
      .then(response => (this.info = response.data ))
      .catch(error => {
        console.log(error);
        this.errored = true;
      })
      .finally(() => (this.loading = false));
  },
  computed: {
    sortedJson: function() {
      this.info.sort(function(a,b) { 
          return (a.pollutants[1].value) - (b.pollutants[1].value); 
      })
    }
  }
 
}
</script>

<style>

</style>
