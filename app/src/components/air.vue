
<template>
  <div id="air">
    <section v-if="errored">
        <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
    </section>
   
    <section v-else>
      
      <h1 class="text-center text-gray-700 text-4xl pb-5">Air Quality Index</h1>
      <form action="" class="search-form flex justify-center items-center flex-col pb-5 sm:flex-row" v-on:submit.prevent="UserTown">
        <label for="" class="block pr-3 mb-5 sm:mb-px">Enter your city</label>
        <input type="text" v-model="town"  class="mb-5 sm:mb-px pl-3 search-form__input block border-solid border border-gray-700">
        <input type="submit" value="search" class="search-form__btn text-center text-xl block bg-green-500 text-white mx-3">
      </form>
      <div class="town-table mx-auto">
        <div class="town-table-row-title w-full flex border border-gray-700 mb-3  items-stretch">
          <div class="table-td-id p-1 sm:p-3 flex items-center justify-center">
            <span class="flex items-center justify-center text-sm sm:text-lg font-bold">Station id</span>
          </div>
          <div class="table-td-address border-l border-gray-700 text-center p-3 flex items-center justify-center">
            <span class="flex items-center justify-center  text-sm sm:text-lg font-bold">Station address</span>
          </div>
        </div>
        
        <div @click="chooseStation(item.uid, index)" v-bind:class="{ active: showMore === index }"  class="town-table-row  border border-gray-700 mb-3 " v-for="(item, index) in info.data" :key="item.id" >
          <div class="town-table-row__title w-full flex items-center flex-col ssm:flex-row " >
            <div class="table-td-id py-2 border-b ssm:border-0 ssm:border-r  border-gray-700 self-stretch flex items-center justify-center" >
              <span class="text-base text-center"><span class="ssm:hidden block mobile-title flex items-center justify-center text-sm font-bold">Station id</span>{{item.uid}}</span>
            </div>
            <div class="table-td-address  ">
              <span class="flex text-center items-center justify-center text-base p-2 flex-col"><span class="ssm:hidden block mobile-title flex items-center justify-center text-sm font-bold">Station address</span>{{item.station.name}}</span>
            </div>
          </div>
          <detail :infoStation="infoStation" :showMore="showMore" :index="index"></detail>  
        </div> 
      </div>
    </section>
  </div>

  
</template>

<script>
import { bus } from '../index'
import detail from './detail.vue'

const axios = require('axios');
export default {
  name:'air', 
  components:{
    detail
  },
  
  data() {
    return {
      info: {data:[]},
      infoStation: {data:[]},
      town: 'kiev',
      errored: false,
      loading: true,
      showMore : -1,
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
      this.showMore = -1;
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
    },
    
  },
 
}
</script>

<style>

</style>
