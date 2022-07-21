

<template>
<div>
  


  
<div v-if="!isLoggedIn"  class="mt-5">


<loading v-show="loading"></loading>
<!-- <div class="d-flex w-100 mx-auto align-items-center" >
  

<div class="card card-body">
    <h1 class="text-center font-weight-bold " style="font-size:2rem">تسجيل دخول </h1>
    <form >


        <div class="form-group">

            <input type="text"
             name="email"
             placeholder="ادخل البريد الاكتروني"
              class="form-control"
              v-model="email"
             :class="[{'is-invalid': errorFor('email')},{'is-invalid': errorFor('mobile')}]"
          />
          <v-errors :errors="errorFor('email')"></v-errors>
          <v-errors :errors="errorFor('mobile')"></v-errors>

        </div>
        <div class="form-group">

            <input type="password"
             name="password"
             placeholder="إدخل كلمة السر"
              class="form-control"
              v-model="password"
             :class="[{'is-invalid': errorFor('password')}]"
          />
           <v-errors :errors="errorFor('password')"></v-errors>

        </div>
        <a class="text-muted font-weight-bold forgot-your-password mt-3 mb-3 mr-2 float-right" href="/password/reset">

                                               Forgot Your Password?



                                            </a>

        <button type="submit" class="btn get-start d-bloc mx-auto btn-lg" :disabled="loading" @click="login">دخول</button>

        <p class=" container mt-5 mx-auto text-center font-weight-bold">Don't have an account? <a href="/register" class="main-color"> Create an account</a></p>

 </form>
</div>
</div> -->
	<!-- Login Area -->
	<section class="login-area">

		<div class="">
			<div class="row">
				<div class="col-12">
					<!-- Login Inner -->
					<div class="" data-aos="fade-right" data-aos-delay="200">
				
						<div class="login-form">
							<h1 class="login-form-title">{{$t('log')}} <span>{{$t('in')}}</span></h1>

                            <div class="text-center alert alert-success" v-show="$route.query.redirect" >
                                       {{$t('You_are_not_authorized')}}
                            </div>
							<form  class="login-form-inner">
								<div class="row">
									<div class="col-10">
										<div class="form-group">
							<input name="email" class="form-control" type="email" :placeholder="$t('Email')" v-model="email"
             :class="[{'is-invalid': errorFor('email')},{'is-invalid': errorFor('mobile')}]"
          />
          <v-errors :errors="errorFor('email')"></v-errors>
          <v-errors :errors="errorFor('mobile')" class="d-block"></v-errors>
										</div>
									</div>
									<div class="col-10">
										<div class="form-group">
											<input name="password" class="form-control" type="password" :placeholder="$t('Password')"
                                             v-model="password"
             :class="[{'is-invalid': errorFor('password')}]"
          />
           <v-errors :errors="errorFor('password')"></v-errors>

										</div>
									</div>
									<div class="col-10" :dir="$t('directions')" >
										<div class="login-bottom-content login-c">
											<div class="login-c-left">
												<!-- <span><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">Remember Me</span> -->
												<p class="m-0">{{$t('Dont_have_an_account')}}
                           <router-link :to="{name:'Register'}" class="font-weight-bold">{{$t('register')}}</router-link></p>

                      </div>
											<div class="login-c-right">
												<a href="/password/reset">{{$t('Forgot_Account')}}</a>
                     
											</div>
										</div>
									</div>
									<div class="col-10">
										<div class="login-form-btn">
											<button class="theme-btn" :disabled="loading" @click="login">{{$t('login')}}</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- End Login Inner -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Login Area -->
</div>
</div>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import ValidationErrors from '../shared/components/ValidationErrors.vue';
import validationErrors from "../shared/mixins/validationErrors";
import { logIn } from "./../shared/utils/auth";
import Loading from './loading.vue';
import navbar from './navbar.vue';
import Toast from './toast.vue';




export default {
  components: { navbar, ValidationErrors, Loading, Toast },
    mixins:[validationErrors],

data() {

    return {
      email: null,
      password:null,
      loading: false,
      errors:'',
      linkPath : this.$route.query.redirect

    };

  },
  computed: {
   
    user(){
             return this.$store.getters.user
        },
     user_ID(){
                return this.$store.getters.userid
    },
       role_id(){
            return this.$store.state.role_id
        },
    ...mapState({

      isLoggedIn: "isLoggedIn"
    }),
    ...mapGetters({

    }),

  },
      mounted() {

            this.getUnreadNotificatons();

    
        },
   methods: {
    async login() {
      this.loading = true;
      this.errors = null;
      try {

         await axios.get("/sanctum/csrf-cookie");
       await axios.post("login", {
                 identify: this.email,
                  password: this.password


        });


        logIn();
        this.$store.dispatch("loadUser");
        this.$store.dispatch("loadStoredState");

       
         $('#LoginMini').modal('hide');
                $('.modal-backdrop').css('display','none');
                 $('.PageLogin').removeClass('d-none');
                		setInterval(function ()
				 {
					 $('.PageLogin').addClass('d-none');
					 },
				  3000);
    // console.log('User Details  '+this.user())

      // if(this.$store.state.role_id==10){
        // this.$router.push(this.$route.query.redirect || '/');
      //   console.log('go /')
      // }else{
      //    console.log('go Dashboard')
      // }
        
        
    

     
        
     


        // location.reload()
      } catch (error) {

        this.errors = error.response && error.response.data.errors;
      }
      this.loading = false;
    }
  },

};


</script>

<style scoped>

.btn-bus {background-color:#1E5DA8}
.btn-bus {
   margin: 10px;
   padding: 12px 20px!important;
   text-align: center;
    font-size: 14px;
   text-transform: uppercase;
   transition: 0.5s;
   background-size: 200% auto;
   color: white;
   box-shadow: 0 0 20px #eee;
       margin-top: 1.5rem!important;
   border-radius: 10px;
   display: block;
 }

 .btn-bus:hover {
   background-position: right center; /* change the direction of the change here */
   color: #fff;
   text-decoration: none;
 }


.btn-user {background-image: linear-gradient(to right, #FF8008 0%, #FFC837  51%, #FF8008  100%)}
.btn-user {
   margin: 10px;
   padding: 15px 45px;
   text-align: center;
   text-transform: uppercase;
   transition: 0.5s;
   background-size: 200% auto;
   color: white;
   box-shadow: 0 0 20px #eee;
   border-radius: 10px;
   display: block;
 }

 .btn-user:hover {
   background-position: right center; /* change the direction of the change here */
   color: #fff;
   text-decoration: none;
 }


</style>
