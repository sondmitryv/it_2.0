
<template>
  <div id="air">
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
        <div class="town-table-row-title w-full flex border border-gray-700 mb-3  items-stretch">
          <div class="table-td-id p-3">
            <span class="flex items-center justify-center text-lg font-bold">Station id</span>
          </div>
          <div class="table-td-address border-l border-gray-700 text-center p-3">
            <span class="flex items-center justify-center  text-lg font-bold">Station address</span>
          </div>
        </div>
        
        <div @click="chooseStation(item.uid, index)" v-bind:class="{ active: showMore === index }"  class="town-table-row  border border-gray-700 mb-3 " v-for="(item, index) in info.data" :key="item.id" >
          <div class="town-table-row__title w-full flex items-center" >
            <div class="table-td-id py-2 border-r  border-gray-700 self-stretch" >
              <span class="flex justify-center text-base">{{item.uid}}</span>
            </div>
            <div class="table-td-address  text-center">
              <span class="flex items-center justify-center text-base py-2 ">{{item.station.name}}</span>
            </div>
          </div>
          <transition name="fade">
            <div class="more-info flex items-center " v-show="showMore === index">
              <div class="more-info-col more-info-col_main flex-col flex items-center py-3 border-r border-gray-700 self-stretch">
                <span class="block text-base text-gray-700 text-center pb-3 font-bold">Air Quality Index</span>
                <span v-bind:class="classLevel" class="air-index-main green text-white text-center text-xl">{{infoStation.data.aqi}}</span>
              </div>
              <div class="more-info-col pl-5 py-3 self-stretch">
                <ul class="data-list" v-for="(item, index) in infoStation.data.iaqi" :key="item.id">
                  <li class="data-list__item" >
                    <div v-if="index == 'pm25'">
                      <span class="data-list__title font-bold text-base">PM2.5:</span>
                      <span >{{item.v}} mcg / m³</span>
                    </div>
                  </li>
                  <li class="data-list__item">
                    <div v-if="index == 'pm10'">
                      <span class="data-list__title font-bold text-base">PM10:</span>
                      <span >{{item.v}} mcg / m³</span>
                    </div>
                  </li>
                  <li class="data-list__item">
                    <div v-if="index == 'so2'">
                      <span class="data-list__title font-bold text-base">so2:</span>
                      <span >{{item.v}} mcg / m³</span>
                    </div>
                  </li>
                  <li class="data-list__item" >
                    <div v-if="index == 'o3'">
                      <span class="data-list__title font-bold text-base">o3:</span>
                      <span >{{item.v}} mcg / m³</span>
                    </div>
                  </li>
                  <li class="data-list__item">
                    <div v-if="index == 'no2'">
                      <span class="data-list__title font-bold text-base">no2:</span>
                      <span >{{item.v}} mcg / m³</span>
                    </div>
                  </li>
                  <li class="data-list__item" >
                    <div v-if="index == 'co'">
                      <span class="data-list__title font-bold text-base">co:</span>
                      <span >{{item.v}} mcg / m³</span>
                    </div>
                  </li>
                  <li class="data-list__item" >
                    <div v-if="index == 'p'">
                      <span class="data-list__title font-bold text-base">Atmospheric pressure:</span>
                      <span >{{item.v}} mmHg</span>
                    </div>
                  </li>
                  <li class="data-list__item" >
                    <div v-if="index == 't'">
                      <span class="data-list__title font-bold text-base">Temperature:</span>
                      <span >{{item.v}} °C</span>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </transition>
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
      info: {data:[]},
      infoStation: {data:[]},
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
        console.log(error);
        this.errored = true;
      })
      .finally(() => (this.loading = false));
      console.log('UserTown')
    },
    chooseStation(idStation, index){
      this.showMore = index;
      axios
      .get('//api.waqi.info/feed/@'+idStation+'/?token=1b2d298eea9f46db4c8c92d957909f1b617bdfc0')
      .then(response => (this.infoStation = response.data ))
      .catch(error => {
        console.log(error);
        this.errored = true;
      })
      .finally(() => (this.loading = false));
      console.log('chooseStation')
    },
    
  },
  computed: {
    classLevel: function () {
      let level = this.infoStation.data.aqi
      if(level > 51 && level < 100){
        return {
          yellow: true
        }
      }
      if(level > 101 && level < 150){
        return {
          orange: true
        }
      }
      if(level > 151 && level < 200){
        return {
          red: true
        }
      }
      if(level > 201 && level <300){
        return {
          lilac: true
        }
      }
      if(level > 301){
        return {
          deepred: true
        }
      }
      
    }
  }
}
</script>

<style>

</style>
