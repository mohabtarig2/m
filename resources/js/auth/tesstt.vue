<template>
    <div class="container">

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="falid"
 role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert alert-danger text-danger">
     {{$t('You_must_enter_all_fields')}}
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="password"
 role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert alert-danger text-danger">
     {{$t('password_does_not_match')}}
    </div>
  </div>
</div>
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
          <option value="7">{{$t('other')}}</option>
          
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

   




      </form>
            </div>

            <div class="stepper-pane" v-if="step == 2">
                  <div class="mt-5 mx-auto contact-form" style="width:50rem" v-if="completeData==''" dir="rtl" >


    <h2 class="text-center mb-4 " >اكمل حسابك  </h2>
          <!-- <ul class="progressbar" dir="">
              <li class="active">تم تسجيل حساب</li>
              <li>اكمال الحساب </li>
              <li>رخصة الشركة </li>
              <li >الانجازات </li>


      </ul>  -->
    <form class="c-form-inner" >






  <div class="row">
             <div class="col-6 form-group  mt-3">
                 <div class=" h5" :class="$t('text_align')">اسم المدير <sup class="text-muted"> (باللغة العربية)</sup> </div>
            <input type="text"
             name="manger_ar"

              class="form-control"
              pattern="[a-z]"
              v-model="complete.manger_ar"
             :class="[{'is-invalid': errorFor('manger_ar')},{'is-valid':limitMangerAr>=5}]"

             @input="ontype('mgrAr')"
          />
<div class="invalid-feedback" v-for="(error, index) in this.errorFor('manger_ar')" :key="'manger_ar' + index" >{{ error }}</div>

        </div>

        <div class="col-6  form-group mt-3">
                 <div class=" h5" :class="$t('text_align')">اسم المدير <sup class="text-muted"> (باللغة الانجليزية)</sup> </div>
            <input type="text"
             name="manger_en"

              class="form-control"
              v-model="complete.manger_en"
             :class="[{'is-invalid': errorFor('manger_en')},{'is-valid':limitMangerEn>=5}]"
             @input="ontype('mgrEn')"
          />
<div class="invalid-feedback" v-for="(error, index) in this.errorFor('manger_en')" :key="'manger_en' + index" >{{ error }}</div>
        </div>

  </div>
  <div class="row">
        <div class="col-6  form-group mt-3">
                 <div class=" h5" :class="$t('text_align')">اسم الشركة <sup class="text-muted"> (باللغة العربية)</sup> </div>
            <input type="text"
             name="Company_ar"
              class="form-control"
              v-model="complete.Company_ar"
             :class="[{'is-invalid': errorFor('Company_ar')}]"
          />
<div class="invalid-feedback" v-for="(error, index) in this.errorFor('Company_ar')" 
:key="'Company_ar' + index" >{{ error }}</div>
        </div>
        <div class="col-6 form-group mt-3">
            <div class="h5" :class="$t('text_align')"> اسم الشركة باللغة الانجليزية</div>
            <input type="Company_en"
             name="Company_en"

              class="form-control"
              v-model="complete.Company_en"
             :class="[{'is-invalid': errorFor('Company_en')}]"
          />
          <v-errors :errors="errorFor('Company_en')"></v-errors>
        </div>

  </div>

  <div class="form-group  mt-3">
            <div class="h5" :class="$t('text_align')">تاريخ تأسيس الشركة
            </div>
            <input type="date"
             name="date_create"

              class="form-control"
              v-model="complete.date_create"
             :class="[{'is-invalid': errorFor('date_create')}]"
          />
          <v-errors :errors="errorFor('date_create')"></v-errors>
          <div
          class="invalid-feedback"
          v-for="(error, index) in this.errorFor('date')"
          :key="'date' + index"
        >{{ error }}</div>
        </div>
        <div class="form-group mt-3">
            <div class="h5" :class="$t('text_align')">رقم الجوال</div>
            <input type="text"
            name="phone"
              class="form-control"
              v-model="phone"
              dir="ltr"


             :class="[{'is-invalid': this.errorFor('phone')},{'is-invalid':isAvailble==1}]"

          />
           <small >{{ error_phone}} </small>
           <div v-if="isAvailble==1" class="text-danger text-right">هذا الرقم مسجل باسم شركة اخرى</div>

          <v-errors :errors="errorFor('phone')"></v-errors>


        </div>
         <div class="form-group mt-3">
                        <div class="h5" :class="$t('text_align')">الامارة </div>

        <select class="form-control " v-model="complete.emirates " :class="$t('text_align')">
  <option value="1">dubai</option>
  <option value="2">Fujira</option>
  <option value="3">Ras Alkhima</option>
  <option value="4">um alqwain</option>
  <option value="5">sharjah</option>
  <option value="6">ajman</option>
  <option value="7">Abudabhi</option>

</select>
         </div>
             <div   class="h5 text-right form-group mt-3"><span class="font-weight-bold">حول الشركة </span>
    <small class="text-muted">
    <span v-if="complete.about">{{complete.about.length }}</span>
    <span v-else>0</span>/100
    </small>
    <textarea class="form-control "  id="exampleFormControlTextarea1" rows="6" style="font-size:18px" v-model="complete.about"
    :class="[{'is-valid':limitComplete>=100}]" @input="ontype('About')" ></textarea>
    </div>



        <button type="submit" class="   mt-3 theme-btn" :disabled="complete.about.length == '' || complete.manger_ar==''
        || complete.manger_en=='' ||  complete.Company_ar == '' || complete.Company_en == ''
        || phone == '' ||complete.emirates == '' || complete.date_create=='' || isAvailble==1 || limitComplete<=100
        " @click.prevent="continues">
          <b>التالي </b>   <img  src="assets/img/right.svg" class="pl-2 pr-2" style="width: 2rem;"></button>

 </form>
</div>

            </div>

             <div class="stepper-pane" v-if="step == 3">
                      <div class="c-form-inner mt-5 mb-5" >
                     <h2 class="text-center mb-5 ">ارفق شعار و  رخصة التجارية للشركة </h2>
          <!-- <ul class="progressbar">
              <li class="active">تم تسجيل حساب</li>
              <li class="active"> اكمال الحساب </li>
              <li>رخصة الشركة </li>
              <li >الانجازات </li>


      </ul> -->


                    <div>


                        <form @submit="formSubmit" enctype="multipart/form-data">
                        <div class="form-group">
        <small class="text-muted">(pdf, jpg , png )</small>
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>


             <div class="form-group container file-style ">
                 <label>

                 <span class="btn btn-light" @click="$refs.threeD" v-if="threeD==null"><span class=" 
                 fa fa-paperclip" ></span></span>

                <span class="btn btn-light " @click="$refs.threeD" v-else><span class="fa fa-paperclip" ></span></span>
          <span class="">   صورة بروفايل</span>
        
             <small class=" font-weight-bold text-danger" v-if="FileNotthreeDAllowd!=null">{{FileNotthreeDAllowd}}</small>
                <input type="file" class="form-control"  @change="threedFile" style="display:none" ref="threeD">



                 </label>

            </div>
<span v-if="progress11" class="">{{progress11}}</span>
<div class="progress" v-if="progress11" style="hieght:10px !important">


  <div  v-if="progress11 !='100%'" class="progress-bar  progress-bar-striped bg-primary"
   role="progressbar" :style="'width:'+progress11+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress11=='100%'" class="progress-bar progress-bar-striped  bg-success" role="progressbar" :style="'width:'+progress11+';hieght:10px !important;background-color:#3454d1 !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>

<span class="fa fa-close" v-if="resultthreeDSize" @click="RemoveFile('threeD')"></span>

<span v-if="resultthreeDSize!=null"  class="float-right"><img :src="url1" style="width:50px;height:50px"></span>
<div v-if="resultthreeDSize!=null"  class="float-right">{{resultthreeDSize}}</div>


</div>
<div class="upload-file">
                             <label class="d-block  ">


                 <span class="btn btn-light" @click="$refs.fileinput2" v-if="file==null"><i class=" fa fa-paperclip" ></i></span>

                <span class="btn btn-primary " @click="$refs.fileinput2" v-else><i class="fa fa-paperclip" ></i></span>
              <span class="float-right">   رخصة  الشركة </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotMapAllowd!=null">{{FileNotMapAllowd}}</small>
                <input type="file" class="form-control"  @change="onChange" style="display:none" ref="fileinput2" >





            </label>
</div>
<div class="container">
<span v-if="progress2" class="">{{progress2}}</span>
<div class="progress" v-if="progress2" style="hieght:10px !important">

  <div  v-if="progress2!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress2+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress2=='100%'" class="progress-bar  progress-bar-striped bg-success   " role="progressbar" :style="'width:'+progress2+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<i class="fa fa-close btn" v-if="resultSize" @click="RemoveFile('file')"></i>

<span v-if="resultSize!=null" ><i class="fa fa-file" style="color:#ebeef2"  ></i> {{resultName}}</span>
<span v-if="resultSize!=null"  class="float-right"> {{resultSize}}</span>
</div><div class="row mb-3">
    <div class="col-6">
        <h5 class="text-right">عدد الأنجازات اخر 3 سنين  </h5>
<input type="number" v-model="AchiveThreeYears" class="form-control">
    </div>
        <div class="col-6">
                    <h5 class="text-right">عدد الأنجازات منذ التأسيس </h5>

<input type="number" v-model="AchiveSinceCreate" class="form-control">
    </div>

</div>
                    <div>

                        <div v-if="success != ''" class="alert alert-success">
                            {{success}}
                        </div>

                        <form @submit="formSubmit" enctype="multipart/form-data">
                        <h5 class="text-right">  ملف الانجازات  </h5>
                            <div class="upload-file">
                             <label class="d-block  ">


                 <span class="btn btn-light" @click="$refs.fileinput2" v-if="file==null"><i class=" fa fa-paperclip" ></i></span>

                <span class="btn btn-primary " @click="$refs.fileinput2" v-else><i class="fa fa-paperclip" ></i></span>
              <span class="float-right">     الانجازات </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotMapAllowd!=null">{{FileNotMapAllowd}}</small>
                <input type="file" class="form-control"  @change="onChange" style="display:none" ref="fileinput2" >





            </label>
</div>
<div class="container">
<span v-if="progress2" class="">{{progress2}}</span>
<div class="progress" v-if="progress2" style="hieght:10px !important">

  <div  v-if="progress2!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progress2+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progress2=='100%'" class="progress-bar  progress-bar-striped bg-success   " role="progressbar" :style="'width:'+progress2+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<i class="fa fa-close btn" v-if="resultSize" @click="RemoveFile('file')"></i>

<span v-if="resultSize!=null" ><i class="fa fa-file" style="color:#ebeef2"  ></i> {{resultName}}</span>
<span v-if="resultSize!=null"  class="float-right"> {{resultSize}}</span>
</div>

        <button type="submit" class="   mt-3 btn btn-download" :disabled="loading" ><img  src="assets/img/right.svg" class="pl-2 pr-2" style="width: 2rem;"><b>التالي </b> </button>

                        </form>
                    </div>


                        </form>
                    </div>
                </div>

            </div>

               <div class="stepper-pane" v-if="step == 4">
                 
                <div class="c-form-inner mt-5">
                      <h2 class="text-center mb-5 ">   تم التسجيل بنجاح </h2>
          <!-- <ul class="progressbar">
              <li class="active">تم تسجيل حساب</li>
              <li class="active"> اكمال الحساب </li>
              <li class="active">رخصة الشركة </li>
              <li >الانجازات </li>
          </ul> -->


                </div>
            </div>
        

        <div class="controls">
            <button class="btn" @click="stepGo('min')" :disabled="step == 1">
                {{$t('previous')}}
            </button>
            <button class="btn btn-success btn--green-1" @click="stepGo('plus')" :disabled="step == 4">
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
              complete:{
      about: '',
      phone: '',
      Company_ar:'',
      Company_en: '',
      manger_ar: '',
      manger_en: '',
      date_create: '',
      emirates: '',
      
        },
        phone: '',
    loading : false,
    status:null,
    errors:null,
    error_phone : "",
    res:null,
    status_text:null,
    limitComplete:null,
    limitMangerAr:null,
    limitMangerEn:null,
    completeData:"",
    statusVisible:'d-flex ',
    isAvailble:null,

            // 3d file vraible
         FileNotthreeDAllowd:null,
         threeD:null,
         resultthreeDSize:null,
        resultthreeDName:null,
        progress11:null,
        url1:null,

                        file:null,
                success: '',
                FileNotMapAllowd:null,
                resultSize:null,
                resultName:null,
                progress2:null,
                datas:'',


                    FileNotthreeDAllowd:null,
         threeD:null,
         resultthreeDSize:null,
        resultthreeDName:null,
        progress11:null,
        url1:null,

           file:null,
                success: '',
                FileNotMapAllowd:null,
                resultSize:null,
                resultName:null,
                progress2:null,
                AchiveThreeYears:null,
                AchiveSinceCreate:null,





      loading: false,

       alertT:'d-none',
       alert:'d-none',
   
    }
  },
   
 
    business: {
        name: null,
        email: null,
        Categories: null,
        password: null,
        password_confirmation: null,
        mobile: null
      },

    methods:{
        stepGo(event){
            if(event=='min'){
                this.step--
            }
            // this.step++
            if(event=='plus'){
                if(this.step==1){
                    if(this.business.name==null ||  this.business.email==null || this.business.Categories==null
                     || this.business.password==null ||this.business.password_confirmation==null
                     ||this.business.mobile==null){
                           $('#falid').modal('show');
                     }else if(this.business.password!=this.business.password_confirmation){
                        $('#password').modal('show');
                        }else{
                        this.step++
                     }
                }

                    else if(this.step==2){

                    if(this.complete.manger_ar=='' || this.complete.manger_en=='' || this.complete.Company_en==''
                    || this.complete.Company_ar==''|| this.phone=='' ||this.complete.emirates==''
                     || this.date_create=='' ||this.complete.about==''){
                           $('#falid').modal('show');
                     }else{
                        this.step++
                     }
                }
            }
        }
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

// .stepper-pane{
//     color: #333;
//     text-align: center;
//     padding: 120px 60px;
//     box-shadow: 0 8px 12px rgba($color: #000000, $alpha: 0.09);
//     margin: 40px 0;
// }

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

