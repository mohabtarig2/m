<template>
    <div>



Step  = {{step}}
<div class="wrapper-stepper">
        <div class="stepper">
            <div class="stepper-progress">
                <div class="stepper-progress-bar" :style="'width:' + stepperProgress "></div>
            </div>

            <div class="stepper-item" :class="{ 'current': step == item, 'success': step > item }" v-for="item in 4" :key="item">
                <div class="stepper-item-counter">
                    <img class="icon-success" src="https://www.seekpng.com/png/full/1-10353_check-mark-green-png-green-check-mark-svg.png" alt="">
                    <span class="number">
                        {{ item }}
                    </span>
                </div>
                <span class="stepper-item-title">
                    level {{ item }}
                </span>
            </div>
        </div>

     
            <div class="stepper-pane" v-if="step == 1">
                <form class="c-form-inner">

        <div class="form-group">
          <!-- <label for="name">{{$t('User_name')}}</label> -->
          <input
            type="text"
            name="name"
            :placeholder="$t('User_name')"
            class="form-control"
            v-model="business.name"
            :class="[{'is-invalid': errorFor('name')}]"
          />
          <v-errors :errors="errorFor('name')"></v-errors>
        </div>



            <div class="form-group">
          <!-- <label for="email">{{$t('Email')}}</label> -->
          <input
            type="text"
            name="email"
            :placeholder="$t('Email')"
            class="form-control"
            v-model="business.email"
            :class="[{'is-invalid': errorFor('email')}]"
          />
          <v-errors :errors="errorFor('email')"></v-errors>
            </div>

            <div class="form-group">
          <!-- <label for="password">{{$t('mobile')}}</label> -->
          <input
            type="number"
            name="mobile2"
            :placeholder="$t('mobile')"
            class="form-control"
            v-model="business.mobile"
            pattern="^([+]{1}[9]{1}[7]{1}[1]{1}[5]{1}[0-9]{8})$"
            :class="[{'is-invalid': errorFor('mobile')}]"
          />
          <v-errors :errors="errorFor('mobile')"></v-errors>
            </div>



        <div class="form-group">
          <label for="password">{{$t('Categories')}}</label>
      <select class="form-control"  v-model="business.Categories"  :class="[{'is-invalid': errorFor('Categories')}]">
         
          <option value="1">{{$t('consulting_company')}}</option>
          <option value="6">{{$t('construcion_company')}} </option>
          <option value="4">{{$t('HVAC_companies')}}</option>
          <option value="3">{{$t('Stone_companies')}}</option>
          <option value="5">{{$t('interior_decoration')}}</option>
          
      </select>
          <v-errors :errors="errorFor('Categories')"></v-errors>
        </div>

        <div class="form-group">
          <!-- <label for="password">{{$t('Password')}}</label> -->
          <input
            type="password"
            name="password"
            :placeholder="$t('Password')"
            class="form-control"
            v-model="business.password"
            :class="[{'is-invalid': errorFor('password')}]"
          />
          <v-errors :errors="errorFor('password')"></v-errors>
        </div>

        <div class="form-group">
          <!-- <label for="password_confirmation">{{$t('Confirm_Password')}}</label> -->
          <input
            type="password"
            name="password_confirmation"
            :placeholder="$t('Confirm_Password')"
            class="form-control"
            v-model="business.password_confirmation"
            :class="[{'is-invalid': errorFor('confirmed')}]"
          />
          <v-errors :errors="errorFor('confirmed')"></v-errors>
        </div>

        <div class="form-group">
<div :class="alertT" class="alert alert-success"    >{{$t('You_Register_Successfuly')}} - <a href="/#/login"> {{$t('Login_Now')}} </a></div>
        <button
          type="submit"
          class="theme-btn btn-lg text-light btn-block mx-auto"
          :disabled="loading"
          @click.prevent="BusRegister"
          style="padding: 15px 10px;"
        >{{$t('register')}}</button>
        </div>




      </form>
            </div>

            <div class="stepper-pane" v-if="step == 2">
                    level 2

            </div>

             <div class="stepper-pane" v-if="step == 3">
                    level 3

            </div>

               <div class="stepper-pane" v-if="step == 4">
                    level 4

            </div>
        

        <div class="controls">
            <button class="btn" @click="step--" :disabled="step == 1">
                {{$t('previous')}}
            </button>
            <button class="btn btn--green-1" @click="step++" :disabled="step == 4">
                {{$t('next')}}
            </button>
        </div>
    </div>
    



  </div>





    
</template>



<script>
import ValidationErrors from '../shared/components/ValidationErrors.vue';
import validationErrors from "../shared/mixins/validationErrors";
export default {
  components: {  ValidationErrors },
  mixins: [validationErrors],
  data(){
     return{
      
      step: 1,

      
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
   
    }
  },
   
 


    methods:{

	},
  mounted(){
     $('.header-inner').addClass('d-none');
  },

    computed: {
    stepperProgress() {
      return ( 100 / 3 ) * ( this.step - 1 ) + '%'
    },
  },
}
</script>


<style lang="scss" scoped>
$default    :   #C5C5C5;
$green-1    :   #75CC65;
$transiton  :   all 500ms ease;

body{
    background-image: linear-gradient(60deg, #abecd6 0%, #fbed96 100%);
    color: #ffffff;
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: sans-serif;
}

.tx-green-1{
    color:  $green-1;
    font-weight: 600;
}

.wrapper-stepper{
    background-color: #fff;
    padding: 60px;
    border-radius: 32px;
    box-shadow: rgba($color: #000000, $alpha: 0.09);
}

.stepper{
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 660px;
    position: relative;
    z-index: 0;
    margin-bottom: 24px;

    &-progress{
        position: absolute;
        background-color: $default;
        height: 2px;
        z-index: -1;
        left: 0;
        right: 0;
        margin: 0 auto;

        &-bar{
            position: absolute;
            left: 0;
            height: 100%;
            width: 0%;
            background-color: $green-1;
            transition: $transiton;
        }
    }
}

.stepper-item{
    display: flex;
    flex-direction: column;
    align-items: center;
    color: $default;
    transition: $transiton;

    &-counter{
        height: 68px;
        width: 68px;
        display: grid;
        place-items: center;
        background-color: #fff;
        border-radius: 100%;
        border: 2px solid $default;
        position: relative;

        .icon-success{
            position: absolute;
            opacity: 0;
            transform: scale(0);
            width: 24px;
            transition: $transiton;
        }

        .number{
            font-size: 22px;
            transition: $transiton;
        }
    }

    &-title{
        position: absolute;
        font-size: 14px;
        bottom: -24px;
    }
}

.stepper-item.success{
    .stepper-item-counter{
        border-color: $green-1;
        background-color: #c8ebc1;
        color: #fff;
        font-weight: 600;

        .icon-success{
            opacity: 1;
            transform: scale(1);
        }

        .number{
            opacity: 0;
            transform: scale(0);
        }
    }

    .stepper-item-title{
        color: $green-1;
    }
}

.stepper-item.current{
    .stepper-item-counter{
        border-color: $green-1;
        background-color: $green-1;
        color: #fff;
        font-weight: 600;
    }

    .stepper-item-title{
        color: #818181;
    }
}

.stepper-pane{
    color: #333;
    text-align: center;
    padding: 120px 60px;
    box-shadow: 0 8px 12px rgba($color: #000000, $alpha: 0.09);
    margin: 40px 0;
}

.controls{
    display: flex;
}

.btn{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 6px 16px;
    border: 1px solid;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    line-height: 1.5;
    transition: all 150ms;
    border-radius: 4px;
    width: fit-content;
    font-size: 0.75rem;
    color: #333;
    background-color: #f0f0f0;
    border-color: #f0f0f0;

    &:disabled{
        opacity: 0.5;
        pointer-events: none;
    }

    &--green-1{
        background-color: $green-1;
        border-color: $green-1;
        color: #fff;
        margin-left: auto;
    }
}
</style>

