
<template>
  <div id="app">
    <section v-if="errored">
        <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
    </section>
   
    <section v-else>
      <h1 class="text-center text-gray-700 text-4xl pb-5">Air Quality Index</h1>
      <form action="" class="search-form flex justify-center items-center pb-5" v-on:submit.prevent="UserTown">
        <label for="" class="block pr-3">Enter your city</label>
        <input type="text" v-model="town"  class="pl-3 search-form__input block border-solid border border-gray-700">
        <input type="submit" value="search" class="search-form__btn text-center text-xl block bg-green-500 text-white mx-3">
      </form>
      <div class="town-table mx-auto">
        <!--<button class="sort-btn bg-green-600 text-white px-3 mx-auto mb-5" v-on:click="sortedJson()" >Сортувати за рівнем забруднення</button>-->
        <div class="town-table-row w-full flex border border-gray-700 mb-1  items-stretch">
          <div class="table-td-id p-3">
            <span class="flex items-center justify-center text-lg font-medium">station id</span>
          </div>
          <div class="table-td-address border-l border-gray-700 text-center p-3">
            <span class="flex items-center justify-center  text-lg font-medium">station address</span>
          </div>
        </div>
        
        <div @click="chooseStation(item.uid, index)" v-bind:class="{ active: showMore }" class="town-table-row  border border-gray-700 mb-1 " v-for="(item, index) in info.data" :key="item.id" >
          <div class="w-full flex items-center">
            <div class="table-td-id" >
              <span class="flex justify-center">{{item.uid}}</span>
            </div>
            <div class="table-td-address border-l  border-gray-700 text-center">
              <span class="flex items-center justify-center">{{item.station.name}}</span>
            </div>
          </div>
          <div class="more-info">
            <div class="more-info-col">
              <span>{{infoStation}} </span>
            </div>
          </div>
        </div> 
      </div>
    </section>
  </div>

  
</template>

<script>

const axios = require('axios');
export default {
  name:'air', 
  data() {
    return {
      info: null,
      infoStation: null,
      town: 'kiev',
      errored: false,
      loading: true,
      showMore : false,
      colorLevel: chooseLevel => {
        
      }
    }
  },
  mounted() {
     axios
 
      .get('//api.waqi.info/search/' + '?token=1b2d298eea9f46db4c8c92d957909f1b617bdfc0&keyword=' +this.town)
      .then(response => (this.info = response.data ))
      .catch(error => {
        console.log(error);
        this.errored = true;
      })
      .finally(() => (this.loading = false));
  },
  methods:{
    UserTown(event){
      axios
      .get('//api.waqi.info/search/?token=1b2d298eea9f46db4c8c92d957909f1b617bdfc0&keyword=' + this.town)
      .then(response => (this.info = response.data ))
      .catch(error => {
        //console.log(error);
        this.errored = true;
      })
      .finally(() => (this.loading = false));
    },
    chooseStation(idStation, index){
      console.log(index)
      this.showMore = true;
      axios
      .get('//api.waqi.info/feed/@'+idStation+'/?token=1b2d298eea9f46db4c8c92d957909f1b617bdfc0')
      .then(response => (this.infoStation = response.data ))
      .catch(error => {
        //console.log(error);
        this.errored = true;
      })
      .finally(() => (this.loading = false));
    }
  },
//computed: {
//  sortedJson: function() {
//    this.info.sort(function(a,b) { 
//        return (a.pollutants[1].value) - (b.pollutants[1].value); 
//    })
//  }
//}
 
}
</script>

<style>

</style>
