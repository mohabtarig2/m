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


<div class="modal fade bd-example-modal-lg" tabindex="-1" id="emailfalid"
 role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert alert-danger text-danger">
     {{$t('You_must_email_all_fields')}}
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="passwordLength"
 role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert alert-danger text-danger">
     {{$t('passwordLength')}}
    </div>
  </div>
</div>




<div class="modal fade bd-example-modal-lg" tabindex="-1" id="passwordLength100"
 role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert alert-danger text-danger">
     {{$t('passwordLength100')}}
    </div>
  </div>
</div>







<div class="modal fade bd-example-modal-lg" tabindex="-1" id="password "
 role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert alert-danger text-danger">
     {{$t('password_does_not_match')}}
    </div>
  </div>
</div>
<div class="row">
    <div class="offset-md-2 ">

    </div>
      <div class="col-lg-8 col-12">
<div class="wrapper-stepper">

                       <div class="stepper">
            <div class="stepper-progress">
                <div class="stepper-progress-bar" :style="'width:' + stepperProgress "></div>
            </div>

            <div class="stepper-item" :class="{ 'current': step == item, 'success': step > item }" v-for="item in 4" :key="item">
                <div class="stepper-item-counter">
                  
                    <i class='bx bx-check text-primary icon-success' style="font-size: 30px;"></i>
                    <span class="number">
                        {{ item }}
                    </span>
                </div>
                <span class="stepper-item-title">
                    level
                     {{ item }}
                </span>
            </div>
        </div>
     
            <div class="stepper-pane mt-3" v-if="step == 1">
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
  <div class="form-group mt-3">
             <div class="h5" :class="$t('text_align')">رقم الجوال</div>
            <div class="row" dir="ltr">
              <div class=" col-4 ">
			
                     <span class="single-property-details">
     <span class="nice-select" >
       <span class="current" v-if="country">
        <img src="img/ae.svg" width="20" class="pr-1">
        <span class="text-dark">+ 971</span>
                                        </span>

     </span>

   </span>
										
								
                  </div>
<div class="col-8">
           
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
            </div>
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
                  <div class="mt-5 mx-auto contact-form"  v-if="completeData==''" :dir="$t('directions')" >



          <!-- <ul class="progressbar" dir="">
              <li class="active">تم تسجيل حساب</li>
              <li>اكمال الحساب </li>
              <li>رخصة الشركة </li>
              <li >الانجازات </li>


      </ul>  -->
    <form class="c-form-inner" >






  <div class="row">
             <div class="col-6 form-group  mt-3">
                 <div class=" h5" :class="$t('text_align')">{{$t('Manager_Name')}}<sup class="text-muted"> ({{$t('arabic')}})</sup> </div>
            <input type="text"
             name="manger_ar"

              class="form-control"
              pattern="[a-z]"
              v-model="complete.manger_ar"
               @keyup.delete="console.log(1)"
              @keypress="isArabicChars($event)"
              dir="rtl"
              
             :class="[{'is-invalid': errorFor('manger_ar')},{'is-valid':limitMangerAr>=5}]"
             

             @input="ontype('mgrAr')"
          />
<div class="invalid-feedback" v-for="(error, index) in this.errorFor('manger_ar')" :key="'manger_ar' + index" >{{ error }}</div>

        </div>

        <div class="col-6  form-group mt-3">
                 <div class=" h5" :class="$t('text_align')">{{$t('Manager_Name')}}<sup class="text-muted"> ({{$t('english')}})</sup> </div>
            <input type="text"
             name="manger_en"
             dir="ltr"
              class="form-control"
              v-model="complete.manger_en"
             :class="[{'is-invalid': errorFor('manger_en')},{'is-valid':limitMangerEn>=5}]"
             @input="ontype('mgrEn')"
               @keyup.delete="console.log(1)"
              @keypress="isLetter($event)"
          />
<div class="invalid-feedback" v-for="(error, index) in this.errorFor('manger_en')" :key="'manger_en' + index" >{{ error }}</div>
        </div>

  </div>
  <div class="row">
        <div class="col-6  form-group mt-3">
                 <div class=" h5" :class="$t('text_align')">{{$t('Company_name')}} <sup class="text-muted"> ({{$t('arabic')}})</sup> </div>
            <input type="text"
             name="Company_ar"
              class="form-control"
              dir="rtl"
               v-model="complete.Company_ar"
                @keyup.delete="console.log(1)"
              @keypress="isArabicChars($event)"
             :class="[{'is-invalid': errorFor('Company_ar')}]"
          />
<div class="invalid-feedback" v-for="(error, index) in this.errorFor('Company_ar')" 
:key="'Company_ar' + index" >{{ error }}</div>
        </div>
        <div class="col-6 form-group mt-3">
                 <div class=" h5" :class="$t('text_align')">{{$t('Company_name')}} <sup class="text-muted"> ({{$t('english')}})</sup> </div>
            <input type="Company_en"
             name="Company_en"
              dir="ltr"
              class="form-control"
              v-model="complete.Company_en"
               @keyup.delete="console.log(1)"
              @keypress="isLetter($event)"

              isArabicChars
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

                  <div class="form-group">
          <!-- <label for="password">{{$t('mobile')}}</label> -->
          <input
            type="number"
            name="mobile2"
            :placeholder="$t('office_number')"
            class="form-control"
            v-model="business.mobile"
            pattern="^([+]{1}[9]{1}[7]{1}[1]{1}[5]{1}[0-9]{8})$"
            :class="[{'is-invalid': errorFor('mobile')}]"
          />
          <v-errors :errors="errorFor('mobile')"></v-errors>
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



    

 </form>
</div>

            </div>

             <div class="stepper-pane" v-if="step == 3">
                      <div class="c-form-inner mt-5 mb-5" >
                    
          <!-- <ul class="progressbar">
              <li class="active">تم تسجيل حساب</li>
              <li class="active"> اكمال الحساب </li>
              <li>رخصة الشركة </li>
              <li >الانجازات </li>


      </ul> -->


                    <div>


                        <form  >
                        <div class="form-group">


      <div class="form-group container  mx-auto d-block">
                 <label style="    display: grid; justify-content: center;">
                    
                 <span class="file-style-avatar" @click="$refs.Avatar" v-if="Avatar==null"> <span class=" 
                 bx bxs-cloud-upload"  ></span></span>

                <span   @click="$refs.Avatar" v-else>
                    <img :src="pathAvatar" class="file-style-avatar-after mx-auto">
                </span>

          <div class="text-center">  
            <span v-if="progressAvatar" class="badge badge-success">{{progressAvatar}}</span>
             صورة بروفايل</div>
           
        
             <small class=" font-weight-bold text-danger" v-if="FileNotAvatarAllowd!=null">{{FileNotAvatarAllowd}}</small>
                <input type="file" class="form-control"  @change="AvatarFile" style="display:none" ref="Avatar">
            



                 </label>

            </div>
           
<!-- <div class="progress" v-if="progressAvatar" style="hieght:10px !important">


  <div  v-if="progressAvatar !='100%'" class="progress-bar   bg-success"
   role="progressbar" :style="'width:'+progressAvatar+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progressAvatar=='100%'" class="progress-bar   bg-success" role="progressbar"
   :style="'width:'+progressAvatar+';hieght:10px !important;background-color:#3454d1 !important'"
   
 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div> -->
                    <small class=" float-right text-danger font-weight-bold">إجباري</small>

                    <div class="row mb-3">
    <div class="col-6">
        <h5 class="text-right">عدد الأنجازات اخر 3 سنين  </h5>
<input type="number" v-model="AchiveThreeYears" class="form-control">
    </div>
        <div class="col-6">
                    <h5 class="text-right">عدد الأنجازات منذ التأسيس </h5>

<input type="number" v-model="AchiveSinceCreate" class="form-control">
    </div>

</div>





          

</div>

<div class="container-file" v-if="business.Categories==1 || business.Categories==6 "  >
<!-- <div v-if="business.Categories==1 || business.Categories==6 "> -->
 
 







<div class="upload-file file-style">
                             <label class="dd-flex ">


                 <span class="btn" :class="{' btn-light':Munici==null , 'btn-download':Munici}" @click="$refs.Munici" v-if="file==null">
                  <i class=" bx bxs-cloud-upload" ></i></span>

                <span class="btn btn-primary " @click="$refs.Munici" v-else><i class="bx bxs-cloud-upload" ></i></span>
              <span class="float-right mr-2 ml-2">   تقييم البلدية</span>
              <small class=" font-weight-bold text-danger" v-if="FileNotMuniciAllowd!=null">{{FileNotMuniciAllowd}}</small>
                <input type="file" class="form-control"  @change="MuniciFile" style="display:none" ref="Munici" >





            </label>
</div>

<span v-if="progressMunici" class="">{{progressMunici}}</span>
<div class="progress" v-if="progressMunici" style="hieght:10px !important">


  <div  v-if="progressMunici !='100%'" class="progress-bar   bg-success"
   role="progressbar" :style="'width:'+progressMunici+';hieght:10px !important'"
    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>



    
  <div  v-if="progressMunici =='100%'" class="progress-bar   bg-success"
   role="progressbar" :style="'width:'+progressMunici+';hieght:10px !important'"
    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>
 
<div class="mt-2">
   <span v-if="progressMunici" class="text-dark">{{Munici.name}}</span>
<span v-if="progressMunici">{{bytesToSize(Munici.size)}}</span>
 <span v-if="progressMunici=='100%'">
  
    <i class='bx bx-check-circle text-success'></i>
   

   </span>
</div>

</div>
<div class="container-file">
<div class="upload-file file-style">
                             <label class="dd-flex ">


                 <span :class="{'btn btn-light':licence==null,'btn btn-download':licence}" @click="$refs.licence" v-if="file==null"><i class=" bx bxs-cloud-upload" ></i></span>

                <span class="btn btn-primary " @click="$refs.licence" v-else><i class="bx bxs-cloud-upload" ></i></span>
              <span class="float-right mr-2 ml-2">   رخصة  الشركة </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotlicenceAllowd!=null">{{FileNotlicenceAllowd}}</small>
                <input type="file" class="form-control"  @change="licenceFile" style="display:none" ref="licence" >





            </label>
</div>
<div class="container">
<span v-if="progresslicence" class="">{{progresslicence}}</span>
<div class="progress" v-if="progresslicence" style="hieght:10px !important">

  <div  v-if="progresslicence!='100%'" class="progress-bar   bg-success" role="progressbar" :style="'width:'+progresslicence+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progresslicence=='100%'" class="progress-bar   bg-success   " role="progressbar" :style="'width:'+progresslicence+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>


</div>

<div class="mt-2">
  <span v-if="progresslicence" class="text-dark">{{licence.name}}</span>
<span v-if="progresslicence" class="">{{bytesToSize(licence.size)}}</span>
 <span v-if="progresslicence=='100%'">
  
    <i class='bx bx-check-circle text-success'></i>
   

   </span>
</div>

                    </div>

                       

                        <div class="container-file">
                       
                            <div class="upload-file file-style">
                             <label class=" dd-flex ">


                 <span :class="{'btn btn-light':Achive==null,'btn btn-download':Achive}" @click="$refs.Achive" v-if="Achive==null">
                  <i class=" bx bxs-cloud-upload" ></i></span>

                <span class="btn btn-primary " @click="$refs.Achive" v-else><i class="bx bxs-cloud-upload" ></i></span>
              <span class="mr-2 ml-2">     الانجازات </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotMapAllowd!=null">{{FileNotAchiveAllowd}}</small>
                <input type="file" class="form-control"  @change="AchiveFile" style="display:none" ref="Achive" >





            </label>
</div>
<div class="container">
<span v-if="progressAchive" class="">{{progressAchive}}</span>
<div class="progress" v-if="progressAchive" style="hieght:10px !important">

  <div  v-if="progressAchive!='100%'" class="progress-bar  bg-success" role="progressbar"
   :style="'width:'+progressAchive+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>


 <div  v-if="progressAchive=='100%'" class="progress-bar  bg-success" role="progressbar"
   :style="'width:'+progressAchive+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

  

</div>
<div class="mt-2">
<span v-if="progressAchive">{{Achive.name}}</span>
<span v-if="progressAchive">{{resultAchiveSize}}</span>
 <span v-if="progressAchive=='100%'">
  
    <i class='bx bx-check-circle text-success'></i>
   

   </span>
</div>

</div>


                        </div>

                        <div class="container-file">
          <div class="form-group container file-style" >

              <label class=" mt-2 dd-flex ">

            <span :class="{'btn btn-light':files=='' , 'btn btn-download':files!=''} " @click="$refs.ete"  >
                  <span class='bx bx-plus-medical'></span>
                  
                </span>
                 <span class="mr-2 ml-2">     ملفات اضافية </span>
                


          <input  class="form-control" type="file"   style="display:none" ref="ete" @change.prevent="onImageChanged"
           id="file" multiple>






      </label>

                           

                </div>

<div class="form-group">
     <strong v-if="FileNotAllowd" class="text-danger">{{FileNotAllowd}}</strong>
        <div class="image-preview" v-show="images.length">
            <div class="image-wrapper mt-3 " v-for="(image,i) in images" :key="i">
                <span v-if="files[i].name!=null">

                <span v-if="progressbar" class="">
                   <span class=""> {{progressbar}}</span>
                    </span>
<div class="progress" v-if="progressbar" style="hieght:10px !important">
  <div v-if="progressbar!='100%'" class="progress-bar  progress-bar-striped bg-success"
   role="progressbar" :style="'width:'+progressbar+';hieght:10px !important; '" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div v-if="progressbar=='100%'" class="progress-bar   bg-success" role="progressbar"
   :style="'width:'+progressbar+';hieght:10px !important;background-color:#3454d1 !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>


<span v-if="progressbar!=null"  class="main-color"> {{files[i].name}}
    <small class="text-muted  " v-if="files[i].size"> {{bytesToSize(files[i].size)}}</small>
</span>
<span class="btn btn-light float-left"  v-if="progressbar">

<span class="fa fa-close    " @click.prevent='removeImage(i)'></span>
</span>


                </span>



            </div>
            <!-- <div v-for="file , index in filename" :key="index">
              {{file}}

            </div> -->
        </div>

</div>
                        </div>
                   


                        </form>
                    </div>
                </div>

            </div>

               <div class="stepper-pane" v-if="step == 4">
                 
                <div class="c-form-inner mt-5">
                <h2 class="text-center">
                    <i class="fas fa-check-circle text-success"></i>
                </h2>
                      <h2 class="text-center mb-5 ">  
                         تم التسجيل بنجاح </h2>
          <!-- <ul class="progressbar">
              <li class="active">تم تسجيل حساب</li>
              <li class="active"> اكمال الحساب </li>
              <li class="active">رخصة الشركة </li>
              <li >الانجازات </li>
          </ul> -->


                </div>
            </div>
        

        <div class="controls mt-4 mb-4">
            <button class="btn" @click="stepGo('min')" :disabled="step == 1" v-if="step != 4">
                <!-- "stepGo('min')" -->
                 <i class='bx bx-left-arrow-alt mr-2'></i>
                {{$t('previous')}}
            </button>
            <button class="btn btn-download btn--green-1"  @click="stepGo('plus')" :disabled="step == 4"  v-if="step != 4">
                <!-- @click="stepGo('plus')" -->
                {{$t('next')}}
                <i class='bx bx-right-arrow-alt mr-2'></i>
            </button>
        </div>
    </div>
    
    </div>
    <div class="offset-md-2 ">

    </div>
    

</div>




  </div>





    
</template>



<script>
import ValidationErrors from '../shared/components/ValidationErrors.vue';
import validationErrors from "../shared/mixins/validationErrors";
import Allcountry from './allcountry.vue';
export default {
  components: {  ValidationErrors, Allcountry },
  mixins: [validationErrors],
  data(){
     return{

     
      isAvailble:null,

         country:'AE',
         open:null,
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

    AchiveThreeYears:null,
    AchiveSinceCreate:null,
    pathAvatar:null,
    pathAchive:null,
    pathMunici:null,
    pathlicence:null,


              Avatar:null,
              FileNotAvatarAllowd:null,
              resultAvatarSize:null,
              resultAvatarName:null,
              progressAvatar:null,


                        file:null,
                success: '',
                FileNotMapAllowd:null,
                resultSize:null,
                resultName:null,
                progress2:null,
                datas:'',


                  FileNotlicenceAllowd:null,
                resultSizelicence:null,
                resultNamelicence:null,
                licence:null,
                progresslicence:null,



         FileNotMuniciAllowd:null,
         Munici:null,
         resultMuniciSize:null,
         resultMuniciName:null,
         progressMunici:null,

                    FileNotAchiveAllowd:null,
         Achive:null,
         resultAchiveSize:null,
        resultAchiveName:null,
        progressAchive:null,
        url1:null,

           file:null,
                success: '',
                FileNotMapAllowd:null,
                resultSize:null,
                resultName:null,
                progress2:null,



                FileNotAllowd:'',
                files:[],
                filename:[],
                images:[],
                progressbar:[],
                
              





      loading: false,

       alertT:'d-none',
       alert:'d-none',
   
    }
  },
   
 



        watch:{

    
  phone() {
        var x = this.phone.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,6})/);
  this.phone = !x[2] ? x[1] : '' + x[1] + '' + x[2] + (x[3] ? '' + x[3] : '');
  
             let data = new FormData();
data.append('mobile', this.phone);

           axios.post('thisPhoneIsAvailble',data).then(res=>{
                this.isAvailble=res.data;
           })
  
    },
  },
    methods:{
         isArabicChars(e) {
      // var arregex = /[\u0600-\u06FF]/;
      // return arregex.test(text);

          let text = String.fromCharCode(e.keyCode);
      if (/[\u0600-\u06FF]/.test(text)) return true;
      else e.preventDefault();
    },
         isLetter(e) {
      let char = String.fromCharCode(e.keyCode);
      if (/^[A-Za-z]+$/.test(char)) return true;
      else e.preventDefault();
    },
              openCountry(){
     
              this.open=="open" ? this.open='' : this.open="open"
		  
    },
     bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Byte';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
},

countryChoose(event){

  this.country=event


},
       onImageChanged(event){
               const files = event.target.files;


               Array.from(files).forEach(file => this.addImage(file))


            },
            addImage(file){





    function getFileExtension(filename){

    // get file extension
    const extension = filename.split('.').pop();
    return extension;
}

// passing the filename
const result1 = getFileExtension(file.name);
console.log(result1);



                if(!file.type.match('image.*')){
                   this.FileNotAllowd =`should be jpg , png `;
                    return ;
                }

                


  
                this.files.push(file); //upload
    let  index = this.files.indexOf(file);
    console.log(this.files[index].name);
                
                //preview of image
                const reader = new FileReader();
                reader.onload = (e)=>this.images.push(e.target.result)

          
          // data.append("index",index);
                reader.readAsDataURL(file);
            
                 this.FileNotAllowd ='';

                    let data = new FormData();
          data.append("file",file,file.name);
          data.append("index",index);

                // console.log('this file lenght '+i)
                     const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progressbar =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }

                }


                axios.post('/imagesSign',data,config).then(res=>{
                    this.FileNotAllowd=null
                    this.filename[index]=res.data;
                 
                });
            },
               removeImage(i){
  let files = this.files;
  files.splice(i,1,'');
    console.log(files);




            },


                   onChange(event){
           this.file=event.target.files[0];


const result1 = getFileExtension(this.file.name);

             if(!this.file.type.match('application/pdf') ){
                   this.FileNotMapAllowd =`should be Pdf  `;
                    return ;
                }

                if(this.file.size < 1048576){
let size = Math.floor(this.file.size/1024);
this.resultName = this.file.name   ;
this.resultSize = size+' KB' ;


             }
if(this.file.size > 1048576){
let size = Math.floor(this.file.size/1024);
this.resultName = this.file.name   ;
this.resultSize = size+' MB' ;


}
                     function getFileExtension(filename){
    const extension = filename.split('.').pop();
    return extension;
    }

// passing the filename


           this.url2 = URL.createObjectURL(this.file);

                 let data = new FormData();
          data.append("file",this.file,this.file.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }

  
                axios.post('sucess',data,config).then(res=>{
                    this.FileNotMapAllowd=null
                     
                });




       },
       
                 licenceFile(event){ //check

              //         Avatar:null,
              // FileNotAvatarAllowd:null,
              // resultAvatarSize:null,
              // resultAvatarName:null,
              // progressAvatar:null,
  console.log('hello licence')
          
            this.licence=event.target.files[0];


        const result3 = getFileExtension(this.licence.name);
                 
                 
                    if(!this.licence.type.match('application/pdf') ){
             
                        this.FileNotlicenceAllowd =`Should Be Pdf`;
                            return ;
                       
                  }
                  

                        if(this.licence.size < 1048576){
        let size = Math.floor(this.licence.size/1024);
        this.resultlicenceName = this.licence.name   ;
        this.resultlicenceSize = size+' KB' ;


                    }
        if(this.licence.size > 1048576){
        let size = Math.floor(this.licence.size/1024);
        this.resultlicenceName = this.licence.name   ;
        this.resultlicenceSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }
                            // this.url1 = URL.createObjectURL(this.licence);

                                             let data = new FormData();
          data.append("licence",this.licence,this.licence.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progresslicence =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }

                        axios.post('UploadCompanylicence',data,config).then(res=>{
                    this.FileNotlicenceAllowd=null
                    this.pathlicence = res.data;
                }).catch(function (error) {
                    console.log('error');
                });;


                    

                
                            



            },

                 AvatarFile(event){ //check

              //         Avatar:null,
              // FileNotAvatarAllowd:null,
              // resultAvatarSize:null,
              // resultAvatarName:null,
              // progressAvatar:null,
  console.log('hello Avatar')
          
            this.Avatar=event.target.files[0];


        const result3 = getFileExtension(this.Avatar.name);
                 
                 
                    if(!this.Avatar.type.match('image.*')){
                        this.FileNotAvatarAllowd =`jpg or png`;
                            return ;
                       
                  }
                  

                        if(this.Avatar.size < 1048576){
        let size = Math.floor(this.Avatar.size/1024);
        this.resultAvatarName = this.Avatar.name   ;
        this.resultAvatarSize = size+' KB' ;


                    }
        if(this.Avatar.size > 1048576){
        let size = Math.floor(this.Avatar.size/1024);
        this.resultAvatarName = this.Avatar.name   ;
        this.resultAvatarSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }
                            // this.url1 = URL.createObjectURL(this.Avatar);

                                             let data = new FormData();
          data.append("avatar",this.Avatar,this.Avatar.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progressAvatar =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }

                        axios.post('UploadCompanyAvatar',data,config).then(res=>{
                    this.FileNotAvatarAllowd=null
                    this.pathAvatar = res.data;
                });


                    

                
                            



            },
                    MuniciFile(event){ //check

              //         Avatar:null,
              // FileNotAvatarAllowd:null,
              // resultAvatarSize:null,
              // resultAvatarName:null,
              // progressAvatar:null,
  console.log('hello Munici')
          
            this.Munici=event.target.files[0];


        const result3 = getFileExtension(this.Munici.name);
                 
                 
                    if(!this.Munici.type.match('application/pdf')){
                        this.FileNotMuniciAllowd =`Should Be PDF`;
                            return ;
                       
                  }
                  

                        if(this.Munici.size < 1048576){
        let size = Math.floor(this.Munici.size/1024);
        this.resultMuniciName = this.Munici.name   ;
        this.resultMuniciSize = size+' KB' ;


                    }
        if(this.Munici.size > 1048576){
        let size = Math.floor(this.Munici.size/1024);
        this.resultMuniciName = this.Munici.name   ;
        this.resultMuniciSize = size+' MB' ;


        }
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }
                            // this.url1 = URL.createObjectURL(this.Munici);

                                             let data = new FormData();
          data.append("Munici",this.Munici,this.Munici.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progressMunici =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }

                        axios.post('UploadCompanyMunici',data,config).then(res=>{
                    this.FileNotMuniciAllowd=null
                    this.pathMunici = res.data;
                });


                    

                
                            



            },
                    AchiveFile(event){ //check

          console.log('hi achive');
            this.Achive=event.target.files[0];


        const result3 = getFileExtension(this.Achive.name);
                 
                 
                    if(!this.Achive.type.match('application/pdf')){
                        this.FileNotAchiveAllowd =`Should Be PDF`;
                            return ;
                       
                  }
                  console.log('hi achive 2');
                  

        //                 if(this.Achive.size < 1048576){
        // let size = Math.floor(this.Achive.size/1024);
        // this.resultAchiveName = this.Achive.name   ;
        // this.resultAchiveSize = size+' KB' ;


        //             }
        // if(this.Achive.size > 1048576){
        // let size = Math.floor(this.Achive.size/1024);
        // this.resultAchiveName = this.Achive.name   ;
        // this.resultAchiveSize = size+' MB' ;


        // }
        this.resultAchiveSize = this.bytesToSize(this.Achive.size);
                            function getFileExtension(filename){
            const extension = filename.split('.').pop();
            return extension;
            }
                            let data = new FormData();
data.append("Achive",this.Achive,this.Achive.name);

  const config = {
                    onUploadProgress:uploadEvent=>{
                    this.progressAchive =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';
                    // this.progress2 =  Math.round(uploadEvent.loaded / uploadEvent.total * 100 )+ '%';

                 }
                }

                        axios.post('UploadCompanyAchive',data,config).then(res=>{
                    this.FileNotpathAchiveAllowd=null
                    this.pathAchive = res.data;
                });


                    

                
                            



            },
            submitForms(){
                let data = new FormData();



data.append('name',this.business.name);
data.append('email',this.business.email);
data.append('Categories',this.business.Categories);
data.append('password',this.business.password);
data.append('password_confirmation',this.business.password_confirmation);


data.append('manger_ar',this.complete.manger_ar);
data.append('manger_en',this.complete.manger_en);
data.append('Company_en',this.complete.Company_en);
data.append('Company_ar',this.complete.Company_ar);
data.append('mobile',this.business.mobile);

data.append('emirates',this.complete.emirates);
data.append('about',this.complete.about);
data.append('phone',this.phone);
data.append('date_create',this.complete.date_create);


data.append('AchiveThreeYears',this.AchiveThreeYears);
data.append('AchiveSinceCreate',this.AchiveSinceCreate);

data.append('pathAvatar',this.pathAvatar);
data.append('pathAchive',this.pathAchive);
data.append('pathlicence',this.pathlicence);


   this.filename.forEach((file) => {
        data.append("filename[]", file);
      });

 if(this.business.Categories==1 || this.business.Categories==6){
data.append('pathMunici',this.pathMunici);
 }

axios.post("bregister", data).then(res=>{
                    this.step++
                });

            },
        stepGo(event){
            if(event=='min'){
                this.step--
            }
            // this.step++
            if(event=='plus'){
                if(this.step==1){

                    if(this.business.name==null ||  this.business.email==null || this.business.Categories==null
                     || this.business.password==null ||this.business.password_confirmation==null
                     ||  this.phone=='' ){
                           $('#falid').modal('show');
                     }
                      else if(this.business.password.length <= 7){

                             $('#passwordLength').modal('show');
                             
                      }
                     
                     else if(this.business.password!=this.business.password_confirmation){
                        $('#password').modal('show');
                    }
                    
                   else{
                            let data = new FormData();
                            data.append('email', this.business.email);

                             axios.post('thisEmailIsAvailble',data).then(res=>{
                               if(res.data ==1){

                        $('#emailfalid').modal('show');
                    }else{
                                
                                 this.step++
                                 $(window).scrollTop(0);
                               }
                               
           })
                       
                     }
                }

                    else if(this.step==2){

                    if(this.complete.manger_ar=='' || this.complete.manger_en=='' || this.complete.Company_en==''
                    || this.complete.Company_ar==''||this.complete.emirates==''
                     || this.complete.date_create=='' ||this.complete.about==''|| this.business.mobile==null){
                           $('#falid').modal('show');
                           
                   }else if(this.complete.about.length<= 99){

                             $('#passwordLength100').modal('show');
                             
                      }else{
                        this.step++
                        $(window).scrollTop(0);
                     }
                }  else if(this.step==3){

                        if(this.business.Categories==1 || this.business.Categories==6){
                            if(this.pathMunici==null || this.AchiveThreeYears==null || 
                            this.AchiveSinceCreate==null || this.pathAvatar==null || this.pathAchive==null|| this.pathlicence==null ){
                         $('#falid').modal('show');
                    }else{
                        this.submitForms();
                      
                        $(window).scrollTop(0);
                        
                     }
                        }else  if(this.business.Categories!=1 || this.business.Categories!=6){
                        if(this.AchiveThreeYears==null || this.AchiveSinceCreate==null || 
                       this.pathAvatar==null || this.pathAchive==null
                    || this.pathlicence==null ){
                        $('#falid').modal('show');

                    }
                    else{
                           this.submitForms();
                     
                     }
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
$green-1    :   #1d67cb ;
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
        background-color: #c1cbeb;
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
.file-style-avatar {
    border: 2px dotted;
    width: 100px;
    height: 100px;
    display: block;
    text-align: center;
    place-items: inherit;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}
.file-style{
  border: none;
}
.container-file{
  position: relative;

    display: block;
    padding: 10px 15px;
    margin-bottom: 5px;
    background-color: #fff;
    border: 1px solid #eaeaea;
}
.file-style {
    border: 2px dotted #eee;
    background: #fff;
    padding: 10px;
   
}
.file-style-avatar-after{
        
    width: 100px;
    height: 100px !important;
    display: block;
    text-align: center;
    place-items: inherit;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}
.file-style-avatar:hover {
 color:#34d195;
 cursor: pointer;
}
.progress .bg-success{
 color:#34d195 !important;

}
.progress{
   height: 7px !important;
}
.nice-select:after {
  
    display: none;

}
.bxs-cloud-upload , .bx-plus-medical{
  font-size: 30px; 
}
.dd-flex{
    display: flex;
    align-items: center;
}
</style>

