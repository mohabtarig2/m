<template>
<div >

<nav class="nav-part" style="background:">
            <div class="container">
                <div class="logo   ">
<a href="/"><img src="img/websiteLogo2.svg" style="width:185px" alt="#"></a>

                </div>
                <div class="main_list " id="mainListDiv">
                    <ul class="text-right" style="direction: rtl ">


                        <li><a href="" class="text-light">

                            <span >
                                <i class="fa fa-sign-in"></i>
                                {{$t('login')}}
                            </span>
                            </a></li>

                    </ul>
                </div>
                <div class="media_button">
                    <button class="main_media_button" id="mediaButton">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>



                </div>

            </div>
        </nav>  
        <section class="home-part  " id="home" style="background-image:url('/assets/img/partnership.jpg');" :class="$t('text_align')" :dir="$t('directions')">
            <div id="overlay"></div>
            <div class="container ">

                <div class="row " dir="rtl">


                <div class="col-md-8 text-partner hidden-xs">
                   <h1 class="text-light"> {{$t('Grow_your_business')}}</h1>
                   <p class="h2 mt-4 text-light">{{$t('Get_New_Project_and_Client')}}</p>

                    <router-link :to="{name:'test'}" class="theme-btn mt-4 ">{{$t('join')}}</router-link>
                    <router-link  :to="{name:'login'}"  
                    class="theme-btn primary mt-4 ">{{$t('Login_Now')}}</router-link>
                </div>


     




                    </div>
                </div>



        </section>

        <section style="padding-top: 80px; padding-bottom: 80px;" >
            <div class="container " >
            <h1 class="text-center text-dark font-weight-bold"> {{$t('how_its_work')}} </h1>
            <p class=" h5 text-center text-muted" style="line-height:2;">
             {{$t('content_its_work')}}
            </p>
            </div>

        </section>

        <section style="padding-top: 80px; padding-bottom: 40px; background:#eee" :class="$t('text_align')" :dir="$t('directions')">
            <h1 class="text-center text-dark font-weight-bold"> {{$t('what_you_will_get')}} </h1>
            <div class="container">
            <div class="row mt-5 text-center">
                <div class="col-md-4 col-sm-12">
                        <div class="mx-auto bus-icon mt-5 mb-2" style="height: 100px; width: 100px; border-radius:50%">
                    <img src="assets/img/customer.svg" class="img-fluid mx-auto d-block" width="50%">
                        </div>
                    <h2>{{$t('New_Customers')}}</h2>

                    <p class="text-muted mt-3"> {{$t('subtitle_New_Customers')}}</p>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mx-auto bus-icon mt-5 mb-2" style="height: 100px; width: 100px; border-radius:50%">
                <img src="assets/img/increased-revenue.svg" class="img-fluid mx-auto d-block" width="50%">
                    </div>
                    <h2>{{$t('extra_revenue')}}</h2>
                    <p class="text-muted mt-3"> {{$t('Get_More_projects')}} </p>

                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mx-auto bus-icon mt-5 mb-2" style="height: 100px; width: 100px; border-radius:50%">
                <img src="assets/img/charging-circle.svg" class="img-fluid mx-auto d-block" width="50%">
                    </div>
                    <h2>{{$t('project_status')}}</h2>
                    <p class="text-muted mt-3"> {{$t('Ease_of_follow')}} </p>

                </div>
            </div>
            </div>

        </section>



        <section style="padding-top: 80px; padding-bottom: 40px" class="container text-center">
            <div class="mx-auto d-block" >
            <h1 class="text-center">{{$t('Ready_To_Join_us')}} </h1>
            <router-link :to="{name:'test'}" class="theme-btn text-center mt-3 
              " style="padding:20px 50px" ><b>{{$t('join_now')}}</b></router-link>
            </div>
        </section>


  </div>

</template>

<script>
import { mapState, mapGetters } from "vuex";
import { logIn } from "./../shared/utils/auth";
import navbar from './navbar.vue';
import ValidationErrors from '../shared/components/ValidationErrors.vue';
import validationErrors from "../shared/mixins/validationErrors";
import Tesstt from './tesstt.vue';
export default {
  components: { navbar, ValidationErrors, Tesstt },
  mixins: [validationErrors],
  data() {
    return {

       business: {
        name: null,
        email: null,
        Categories: null,
        password: null,
        password_confirmation: null,
        mobile: null
      },
      loading: false,

       alertT:'d-none',
       alert:'d-none',


    };
  },
  computed: {
    ...mapState({

      isLoggedIn: "isLoggedIn"
    }),
    ...mapGetters({

    }),

  },
  mounted(){
    // $('.header-area').addClass('is-sticky');
    $('.header-inner').addClass('d-none');
  },
  methods: {

     async BusRegister() {
         this.errors = null;
          this.loading = true;
     try {
        const response = await axios.post("bregister", this.business);
        if (201 == response.status) {

          this.alertT=' ';
        }
      } catch (error) {
        this.errors = error.response && error.response.data.errors;
      }
      this.loading = false;

    }


  }
};
</script>

<style  scoped>



.the-line-input{
    border: 2px solid;
}

.none-abs{
    position: unset;
   }
.page-bg {

    /* background-image: url("../img/bg.jpg") ; */
    background-size: cover;
    background-position: center center;
    z-index: 0;

}
.page-banner {
    position: relative;
    margin: -54px;
    padding: 0;

}
.page-heading {
    position: absolute;
    font-family: 'Montserrat', sans-serif;
    left: 50%;
    top: 50%;
    
    transform: translate(-50%, -50%);
    text-align: center;
}
.page-heading h1{
    text-transform:none;
    text-align: center;
}
.home-part{
    width: 100%;
    height: 100%;
    /* padding-bottom: 150px; */
    padding-bottom: 40px !important;
    
    background-size: cover;
display: block;
position: relative;


}

.home-part .form-partner{
margin-top: 5rem ;
}
.home-part .text-partner{
    margin-top: 5rem ;



    }
    .home-part .text-partner h1{
        margin-top: 10rem ;
        font-size: 3.3rem;

        line-height: 1.3;
        }





    #overlay {
        position: absolute; /* Sit on top of the page content */
        width: 100%; /* Full width (cover the whole page) */
        height: 100%;/* Full height (cover the whole page) */
        padding-bottom: 40px;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.5); /* Black background with opacity */
        z-index: 0; /* Specify a stack order in case you're using a different order for other elements */
 /* Add a pointer on hover */
      }

          #overlaywhite {
        position: absolute; /* Sit on top of the page content */
        width: 100%; /* Full width (cover the whole page) */
        height: 100%;/* Full height (cover the whole page) */
        padding-bottom: 40px;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255, 255, 255, 0.625); /* Black background with opacity */
        z-index: 0; /* Specify a stack order in case you're using a different order for other elements */
 /* Add a pointer on hover */
      }

      @media screen and (min-width: 350px) and (max-width: 768px) {

    .visible-xs{
       display: none !important;
    }

}


@media screen and (min-width: 350px) and (max-width: 768px) {

    .hidden-xs{
       display: block;
    }

}


.bus-icon{
background-color:#1d67cb  ;
width:2rem;
height: 60px;
width: 60px;
border-radius: 20px;
display: flex;
justify-content: center;
align-items: center;
}

.partner{
    display: flex;
    border-radius: 8px;
    margin: 0 11px;
    margin-bottom: 32px;
    height: 100%;
    border: 1px solid #ddd;



}

.nav-part{
    width: 100%;
    height:72px;
    position: absolute;
    line-height: 65px;
    text-align: center;
    background-color: transparent;
    /* box-shadow: 1px 3px 16px -10px; */
    z-index: 99;
}

.nav-part div.logo{
    width: 180px;
    height: 10px;
    position: absolute;
}

.nav-part div.logo a{
    text-decoration: none;
    color: #fff;
    font-size: 1.8em;
    text-transform: uppercase;
}

.nav-part div.logo a:hover {
    color: #c0c0c0;
}

.nav-part div.main_list{
    width: 700px;
    height: 65px;
    float: right;
}

.nav-part div.main_list ul{
    width:100%;
    height: 65px;
    display: flex;
    list-style: none;
}

.nav-part div.main_list ul li{
    width: 130px;
    height: 65px;

}

.nav-part div.main_list ul li a{
    text-decoration: none;
    line-height: 65px;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 12px;
    color:rgb(37, 37, 37);
}

.nav-part div.main_list ul li a:hover{
    color: #2c2c2c;

}

.nav-part div.media_button {
    width: 40px;
    height: 40px;
    background-color: transparent;
    position: absolute;
    right: 15px;
    top: 12px;
    display: none;
}

.nav-part div.media_button button.main_media_button {
    width: 100%;
    height: 100%;
    background-color: transparent;;
    outline: 0;
    border: none;
    cursor: pointer;
}

.nav-part div.media_button button.main_media_button span{
    width: 98%;
    height: 3px;
    border-radius: 5px;
    display: block;
    background-color: #2e2d2d;
    margin-top: 9px;
    margin-bottom: 10px;

}

.nav-part div.media_button button.main_media_button:hover span:nth-of-type(1){
    transform: rotateY(180deg);
    transition: all 0.5s;
    background-color: #2e2d2d;
    height: 2px;
}

.nav-part div.media_button button.main_media_button:hover span:nth-of-type(2){
    transform: rotateY(180deg);
    transition: all 0.4s;
    height: 2px;
    background-color: #2e2d2d;
}

.nav-part div.media_button button.main_media_button:hover span:nth-of-type(3){
    transform: rotateY(180deg);
    transition: all 0.3s;
    height: 2px;
    background-color: #2e2d2d;
}

.nav-part div.media_button button.active span:nth-of-type(1) {
    transform: rotate3d(0, 0, 1, 45deg);
    position: absolute;
    margin: 0;
}

.nav-part div.media_button button.active span:nth-of-type(2) {
    display: none;
}

.nav-part div.media_button button.active span:nth-of-type(3) {
    transform: rotate3d(0, 0, 1, -45deg);
    position: absolute;
    margin: 0;
}

.nav-part div.media_button button.active:hover span:nth-of-type(1) {
    transform: rotate3d(0, 0, 1, 20deg);
}

.nav-part div.media_button button.active:hover span:nth-of-type(3) {
    transform: rotate3d(0, 0, 1, -20deg);
}



/* Navbar section */


/* Home section */


.theme-btn{
    background: #1d67cb !important;
}

.theme-btn.primary
{
    border: 1px solid #1d67cb !important;
    background: transparent !important;
    color: #1d67cb !important;
}

.theme-btn::before {
    position: absolute;
    content: "";
    width: 0;
    height: 100%;
    background: #0b6442;
    right: 0;
    top: 0;
    border-radius: 12px;
    z-index: -1;
    transition: all 0.4s ease;
}


</style>