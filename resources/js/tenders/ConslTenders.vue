<template>
    <div :dir="$t('directions')" :class="$t('text_align')">







<h2 class="text-center">{{$t('consulting')}}</h2>
<div class="links-requests p-descrip-box mb-3" >
<router-link :to="{name:'ConslTenders'}" class="text-dark mr-3" v-if="IsUser==10">  {{$t('tenders')}}</router-link>
<router-link :to="{name:'request_consulte'}" class="text-dark  mr-3"> {{$t('FollowUp_Request')}}</router-link>
<router-link :to="{name:'requestVilla'}" class="text-dark  mr-3">{{$t('Follow_up_on_requests_for_villas')}}</router-link>


</div>
<!-- 
<div v-if="tenders.length==0">
<img src="https://jerickson.net/img/loading%20icon.png">
</div> -->


<div v-if="tenders.length>0">
        <div class="" v-for="(tender,index) in tenders" :key="index" >

    <div class="s-blog-sidebar   mb-3">





         <router-link class="font-weight-bold text-dark ml-2" :to="'/Projects/'+tender.id+''" >
        {{$t('Tender_Num')}} :  {{tender.id}} 
                 <status :status="tender.status"></status>
       
          <sup>({{tender.all_offers.length>0 ? tender.all_offers.length :0}}){{$t('Numbers_Offer')}}</sup>



 
 
               <p> {{tender.note.substr(0,90 )}}.. </p>

<span class="badge badge-custom-orange main-color  font-weight-bold mt-0 pt-2 pb-2 pr-2 pl-2" style="border-radius:20px">

             <all-uae :emirates="tender.emirats"></all-uae>
</span>

<span class="badge badge-custom-orange main-color  font-weight-bold mt-0 pt-2 pb-2 pr-2 pl-2" style="border-radius:20px">
{{$t('bathroom')}} :{{tender.bathroom}}
</span>
<span class="badge badge-custom-orange main-color  font-weight-bold mt-0 pt-2 pb-2 pr-2 pl-2" style="border-radius:20px">
{{$t('rooms')}} :{{tender.bedroom}}
</span>
{{id}} </router-link>

   <small  :class="{'float-right':lang=='en', 'float-left':lang=='ar',}"> {{tender.added_at}}</small>

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
import offerTender from './offerTender.vue';

export default {
     components: { offerTender ,Status, AllUae},
    data(){
         const lang = localStorage.getItem('lang') || localStorage.setItem('lang','ar') ;

return{
         lang:lang,
        tenders:null,
        id:null,
        searchType:null,
        }
    },
     watch:{
             searchType(query){
                 console.log('This Log')

                 if(query =='all'){
 let opldpost = JSON.parse(localStorage.getItem('ProjectConsle'));

                        this.tenders = opldpost;

         } else{
                 if(query.length > 0 && query.length !=='' &&  query.length !==null){

                     console.log(query);
                     axios.get('/AllMyconslCtender/type/'+query).then(res=>{

                        this.tenders = res.data;




                       // setInterval(function(){ this.issearch = true ;}, 200);


                     });


                 }


                 }


             }
        },

    computed:{
         IsUser(){
            return this.$store.getters.IsUser
        },
    },

     mounted() {

            console.log(this.title);
            
     $('.header-inner').addClass('d-none');
               
 
        },
        methods: {
               GetTenderId(event){
        this.id=event;
        console.log(this.id)
         },
               Toredict(id){
          console.log(id);

           this.$router.push({ path: `/Projects/${id}`});
      },
        },
        created() {

            if(this.IsUser==1){
             this.$router.push({ name: 'request_consulte'});

}
const  request = axios.get('/AllMyconslCtender').then(response=>{
this.tenders =response.data;
this.loading = false;

             localStorage.setItem('ProjectConsle',JSON.stringify(this.tenders))
            //  this.page = this.allOffershow.length
});

//  this.GetTenderId();
        },

};
</script>

<style scoped>
.badge-warning {
    background-color: #ffae4a
}
.card{
    padding:20px;
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
