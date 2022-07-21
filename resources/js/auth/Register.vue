<template>
<div v-if="!isLoggedIn">

<!-- Modal -->
<div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
  

        <terms-conditions></terms-conditions>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{$t('close')}}</button>
        
      </div>
    </div>
  </div>
</div>

<section class="login-area">
		<div class="login-area-bg" style="background-image:url('img/login-bg.jpg');"></div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-auto">
					<!-- Signup Inner -->
					<div class="login-inner" data-aos="fade-right" data-aos-delay="200">
						
						<div class="login-form">
                            <div class="alert alert-success" :class="alert">
                                {{$t('Message_success_sign_up')}}
                            </div>
							<h1 class="login-form-title">{{$t('sign')}} <span>{{$t('in')}}</span></h1>
							<form method="post" action="#" class="login-form-inner">
								<div class="row">
									<div class="col-lg-12 col-12">
										<div class="form-group">
											<input name="name" type="text" :placeholder="$t('FullName')" required="required" v-model="user.name"
            :class="[{'is-invalid': errorFor('name')}]"
          />
          <v-errors :errors="errorFor('name')"></v-errors>
        </div>


									</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-4 ">
			
                         <span class="single-property-details">
     <span class="nice-select" >
       <span class="current" v-if="country">
        <img src="img/ae.svg" width="20" class="pr-1">
        <span class="text-dark">+ 971</span>
                                        </span>

     </span>

   </span>
										
								
                  </div>
									<div class="col-lg-9 col-8">
                    	<div class="form-group">
               	<input name="name" type="text" :placeholder="$t('mobile')" required="required"  v-model="mobile"
            :class="[{'is-invalid': errorFor('mobile')}]"
          />
          <v-errors :errors="errorFor('mobile')"></v-errors>


                      </div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input name="email" type="email" :placeholder="$t('Email')" required="required"
                                             v-model="user.email"
            :class="[{'is-invalid': errorFor('email')}]"
          />
          <v-errors :errors="errorFor('email')"></v-errors>
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="form-group">
											<input name="password" type="password" :placeholder="$t('Password')"  v-model="user.password"
            :class="[{'is-invalid': errorFor('password')}]"
          />
          <v-errors :errors="errorFor('password')"></v-errors>
										</div>
									</div>
										<div class="col-lg-6 col-12">
										<div class="form-group">
											<input name="password" type="password" :placeholder="$t('Confirm_Password')"
                                              v-model="user.password_confirmation"
            :class="[{'is-invalid': errorFor('confirmed')}]"
          />
          <v-errors :errors="errorFor('confirmed')"></v-errors>
										</div>
									</div>
									<div class="col-12" >
										<div class="login-bottom-content">
										
                      	<div class="login-c-right" :dir="$t('directions')">
                        <input class="form-check-input " type="checkbox" v-model="agree" id="flexCheckDefault" >
												<span class="mr-4">
                          
                        {{$t('I_agree')}} <a href="#" data-toggle="modal" data-target="#terms" class="theme-color"> {{$t('termsConditions')}}</a></span>
											</div>
											<div class="login-c-right">
												<p class="m-0">{{$t('do_you_have_an_account')}} <router-link :to="{name:'login'}">{{$t('login')}}</router-link></p>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="">
											<button class="btnSign btn btn-download" :disabled="loading || !agree"
          @click.prevent="register"
        >{{$t('sign')}}</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- End Signup Inner -->
				</div>
			</div>
		</div>
	</section>

</div>
</template>

<script>
import { mapState, mapGetters } from "vuex";
import validationErrors from "../shared/mixins/validationErrors";
import TermsConditions from '../terms-conditions.vue';
import { logIn } from "./../shared/utils/auth";
import Allcountry from './allcountry.vue';
import navbar from './navbar.vue';
export default {
  components: { navbar, Allcountry, TermsConditions },
  mixins: [validationErrors],
  data() {
    return {
         country:'AE',
         open:null,
      user: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
        mobile:null,
        country:null,
     
        
      },
      mobile: null,
       business: {
        name: null,
        email: null,
        Categories: null,
        password: null,
        password_confirmation: null,
        mobile: null
      },
      loading: false,
       activeTab : '1',
       alertT:'d-none',
       alert:'d-none',
       errors:[],
       agree:false,

    };
  },
  computed: {
    ...mapState({

      isLoggedIn: "isLoggedIn"
    }),
    ...mapGetters({

    }),

  },
  watch:{
    
   mobile() {
        var x = this.mobile.replace(/\D/g, '').match(/(\d{0,2})(\d{0,4})(\d{0,3})/);
  this.mobile = !x[2] ? x[1] : '' + x[1] + '' + x[2] + (x[3] ? '' + x[3] : '');
    },
},
  methods: {
      openCountry(){
     
              this.open=="open" ? this.open='' : this.open="open"
		  
    },

countryChoose(event){

  this.country=event


},

    async register() {
      this.loading = true;
      this.errors = null;
    this.user.mobile= this.mobile 
    this.user.country= this.country 

    
      try {
        const response = await axios.post("register", this.user);
        if (201 == response.status) {

                 this.$router.push({name:'login'} );

        this.alert=' ';
        }
      } catch (error) {
        this.errors = error.response && error.response.data.errors;
      }
      this.loading = false;
    },
    //  async BusRegister() {
    //       this.loading = true;
    //  try {
    //     const response = await axios.post("bregister", this.business);
    //     if (201 == response.status) {

    //       this.alertT=' ';
    //     }
    //   } catch (error) {
    //     this.errors = error.response && error.response.data.errors;
    //   }
    //   this.loading = false;

    // }


  }
};
</script>


<style scoped>

.btn-bus {background-image: linear-gradient(to right, #EB3349 0%, #F45C43  51%, #EB3349  100%)}
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
   padding: 12px 20px!important;
   font-size: 14px;
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
 .form-group .form-control{
     border-top:0;
     padding: 0;
     border-left:0;
     border-right:0;
     border-bottom:1px solid #c7c6c6;
         border-bottom-right-radius: 0;
     border-bottom-left-radius: 0;
     font-size: 14px;
 }
textarea:focus,
textarea.form-control:focus,
input.form-control:focus,
input[type=text]:focus,
input[type=password]:focus,
input[type=email]:focus,
input[type=number]:focus,
[type=text].form-control:focus,
[type=password].form-control:focus,
[type=email].form-control:focus,
[type=tel].form-control:focus,
[contenteditable].form-control:focus {
  box-shadow: inset 0 -1px 0 #FFC837;

}
.btnSign{
   
    padding: 15px 40px;
    color: #fff !important;
    font-weight: 500;
    border-radius: 10px !important;
    font-size: 15px;

    line-height: 24px;
  
    margin-right: 15px;
   
    z-index: 1;
   
    font-size: 16px;
}

.single-property-details .nice-select .list{
      overflow-y: scroll !important;
    height: 200 !important;
}


</style>

<style scoped>
.nice-select:after {
  
    display: none;

}
@import url('https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css');
</style>