<template>
	<div id="detailinfo">
		<transition name="fade">
	        <div class="more-info flex items-center flex-col ssm:flex-row"  v-if="showMore === index">
	          <div class="more-info-col-left flex-col flex items-center py-3 border-t border-b ssm:border-0  ssm:border-r border-gray-700 self-stretch">
	            <span class="block text-base text-gray-700 text-center pb-3 font-bold">Air Quality Index</span>
	            <span v-bind:class="classLevel" class="air-index-main green text-white text-center text-xl">{{infoStation.data.aqi}}</span>
	          </div>
	          <div class="more-info-col-right ssm:pl-5 py-3 self-stretch">
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
</template>

<script>

export default {
	name:'detailinfo',
	props: {
		infoStation:{
			type: Object,
			required: true,
		},
		showMore:{
			type: Number,
			required: true,
		},
		index:{
			type: Number,
			required: true,	
		}
	},
	data(){
		return {}
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

<style scoped>

</style>
