<template>
<div>
<h2 class="text-center">  {{$t('interior')}}</h2>

<div class="links-requests p-descrip-box mb-3">
<router-link :to="{name:'InteriorTenders'}" class="text-dark mr-1 ml-1  mr-3" >{{$t('tenders')}}</router-link>
<router-link :to="{name:'requestInteior'}" class="text-dark mr-1 ml-1 ">{{$t('FollowUp_Request')}}</router-link>
</div>

<div v-if="tenders.length>0">
 <div class="s-blog-sidebar mb-3" v-for="(tendercr,index) in tenders" :key="index">




         <router-link class="font-weight-bold ml-2 text-dark mr-1 ml-1  " :to="{name:'InteriorDetails',params:{id:tendercr.id}}">{{tendercr.title.substr(0,90 )}}

       <status :status="tendercr.status"></status>

         </router-link>
          <sup>({{tendercr.count}}){{$t('Numbers_Offer')}}</sup>
          <small class="float-right"> {{tendercr.added_at}}</small>



       <div class="mt-3"> {{tendercr.notes.substr(0,90 )}}</div>
       <div>
       <span class="badge badge-custom-orange main-color  font-weight-bold mt-4 pt-2 pb-2 pr-2 pl-2" style="border-radius:20px">

         <all-uae :emirates="tendercr.emirates"></all-uae>

</span>


                <button class="  theme-btn float-right" @click="ToredictConsle(tendercr.id)">{{$t('more')}}</button>

       </div>
</div>
</div>

<div v-else>
<b>{{$t('there_is_no_Tender')}}</b>
</div>


</div>




</template>

<script>
import Status from '../admin/status.vue';
import AllUae from '../auth/AllUae.vue';

export default {
  components: { AllUae, Status },

  data(){
        return{
        tenders:null,
        id:null
        }
    },

methods: {
       ToredictConsle(id){
          console.log(id);
           this.$router.push({ path: `/tenders/interior/${id}`});
      },
    getTenders(){

 axios.get('/AllMyinteriorTender').then(response=>{
this.tenders =response.data;
});


},

},
created() {
   this.getTenders();
},
}
</script>


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