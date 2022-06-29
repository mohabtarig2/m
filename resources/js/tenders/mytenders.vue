<template>
    <div class="container" >
<div class="row mt-5">

<div v-if="IsUser!=10" class="col-md-2 ">



</div>
  <div class="offset-md-2">
     </div>

    <div class="col-md-8">

        <router-view></router-view>

    </div>
      <div class="offset-md-2">
     </div>

</div>
    </div>

</template>

<script>

import FilePondDemo from '../dashboard/FilePondDemo.vue';
import ConslTenders from './ConslTenders.vue'

import consultances from './consultances.vue'
export default {
  components: { consultances, ConslTenders, FilePondDemo },
data() {
    return {
      tenders: [],
      count:null ,
      active:null

    };
    
  },
mounted(){
  $('.header-inner').removeClass('d-block');
  $('.header-inner').addClass('d-none');
},
computed: {

    IsUser(){
            return this.$store.getters.IsUser
        },
},
methods:{
     ToredictConsle(id){
          console.log(id);
           this.$router.push({ path: `/tenders/construction/${id}`});
      },

},

  created() {


if(this.IsUser==10){
    this.active=0
     this.consulte="main-color font-weight-bold";
                this.consr=" ";
}else{
    this.active=0
  if(this.active==0){
                this.consulte="main-color font-weight-bold";
                this.consr=" ";

          }
}
    this.loading = true;

const  request = axios.get('/AllMyTenders').then(response=>{
this.tenders =response.data;
this.loading = false;
});



 axios.get('/CountCtender').then(response=>{
this.count = response.data;

});

  }

}
</script>

<style scoped>

 a.router-link-exact-active{
    background: #3454d1;
    color: #fff;
}
a.router-link-active{
    background: #3454d1;
    color: #fff;
}
</style>
