


<template>
  <div>

<h2 class="text-center">{{$t('Flow_Stone_tender')}}</h2>
<div class="links-requests p-descrip-box mb-3">
<router-link :to="{name:'StoneTenders'}" class="text-dark mr-3" > {{$t('stone_Tender')}}</router-link>
<router-link :to="{name:'requestStone'}" class="text-dark">{{$t('FollowUp_Request')}}</router-link>
</div>
<div v-if="data.length">
   <div class="s-blog-sidebar mt-3" v-for="request , index in data" :key="index">

<a @click="requestdirect(request.type,request.id)">


           <div class="h5 main-color">
                <img :src="request.company.avatar" class="rounded-circle mr-2 ml-2" width="50"  height="50"  v-if="IsUser ==10">
                <img :src="request.user.avatar" class="rounded-circle mr-2 ml-2" width="50" height="50"  v-if="IsUser ==4">
           {{request.stone.title}}</div>





           <p class=" mb-2 " >{{request.offer_stone.textOffer.substr(0,80)}}.... </p>
<div class="items container mr-4 ml-4 ">
<span class=" text-muted " v-if="IsUser ==6" > <i class="fa fa-user" ></i> {{request.user.name}}  </span>
<span class=" text-muted " v-else-if="IsUser ==10" > <i class="fa fa-user" ></i> {{request.company.name}}  </span>
<span class=" text-muted  "><i class="far fa-clock"></i> {{request.added_at}}  </span>

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
        data:null,
    }
},
computed:{
   IsUser(){
            return this.$store.getters.IsUser
        },
},
methods:{

    getRequestConfirmed(){
        if(this.IsUser==10){
        axios.get('request/stone').then(res=>{
            this.data = res.data;
        })
        }
         if(this.IsUser==3){
        axios.get('request/StoneCompany').then(res=>{
            this.data = res.data;
        })
        }
    },
    requestdirect(type,id){


        this.$router.push({ path: `/request/${type}/${id}`});



    }

},
created() {
        this.getRequestConfirmed();

    },
}
</script>

<style scoped>
.items i{
    font-size: 14px;
    color: #c5cbdd;
}
.card{
    padding: 20px;
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