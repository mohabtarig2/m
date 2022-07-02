<template>
    <div class=""  >
        
<h2 class="text-center mb-3">  {{$t('consulting')}} </h2>

<div class="links-requests  p-descrip-box mb-3">
<router-link :to="{name:'ConslTenders'}" class="text-dark mr-3" v-if="IsUser==10">  {{$t('tenders')}}</router-link>
<router-link :to="{name:'request_consulte'}" class="text-dark  mr-3"> {{$t('FollowUp_Request')}}</router-link>
<router-link :to="{name:'requestVilla'}" class="text-dark  mr-3">{{$t('Follow_up_on_requests_for_villas')}}</router-link>
</div>
<div v-if="offers.length>0">
<div class="p-descrip-box mt-3" v-for="offer ,index in offers" :key="index">
     <a @click="offerredirct(offer.id)">
<img :src="offer.company.avatar" class="rounded-circle mr-2 ml-2"
 style="width:50px;height:50px" width="50"  height="50"  v-if="IsUser ==10">

 <img :src="offer.user.avatar" class="rounded-circle mr-2 ml-2"
 style="width:50px;height:50px" width="50"  height="50"  v-if="IsUser ==1">

<span class="title text-dark   h5 font-weight-bold " >
{{offer.title}}
</span>
<p>{{offer.Description.substr(0,80)}}
<div class="items mt-3">
<span class=" text-muted "  v-if="IsUser ==10"> <i class="fa fa-user" ></i> {{offer.company.name}}  </span>
<span class=" text-muted "  v-if="IsUser ==1    "> <i class="fa fa-user" ></i> {{offer.user.name}}  </span>
<span class=" text-muted  "><i class="far fa-clock"></i> {{offer.added}}  </span>
</div>
   </a>
    </div>
</div>

<div v-else>
<b>{{$t('there_is_no_Request')}}</b>
</div>


    


    

    </div>
</template>

<script>


export default {

data(){
    return{
        offers:null
    }
},
methods: {
  getOffers(){
      axios.get('/getoffers').then(res=>{
          this.offers= res.data;
      });

  },
    getCompanyoffers(){
      axios.get('/getCompanyoffers').then(res=>{
          this.offers= res.data;
      });
      
  },

offerredirct(id){
     this.$router.push({ name: "requestDetails" ,params:{id}});
}

},

created(){


    if(this.IsUser==1){
        this.getCompanyoffers();
    }

      if(this.IsUser==10){
        this.getOffers();
    }

    

},
   computed: {
 
     IsUser(){
            return this.$store.getters.IsUser
        },

  },
}
</script>

<style scoped>
a{
    text-decoration: none;
}
.items i{
    font-size:10px;
}
.card{
    border:none;
    padding:20px;

    cursor: pointer;
}
</style>

<style lang="scss" scoped>

 a.router-link-exact-active{
    font-weight: bold;
    text-decoration: none;
    color: #3454d1 !important;
 
 }
 @media only screen and (max-width: 767px)
 {

.p-descrip-box {
    padding: 7px !important;
    font-size: 14px;
}
 }
</style>