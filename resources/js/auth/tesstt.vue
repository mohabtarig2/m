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







<div class="modal fade bd-example-modal-lg" tabindex="-1" id="password"
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
                    <img class="icon-success" src="https://www.seekpng.com/png/full/1-10353_check-mark-green-png-green-check-mark-svg.png" alt="">
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
                  <div class="mt-5 mx-auto contact-form"  v-if="completeData==''" dir="rtl" >


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
            <div class="row">
              <div class=" col-4 ">
			
                         <span class="single-property-details">
     <span class="nice-select" :class="open" tabindex="0" @click="openCountry">
       <span class="current" v-if="country">
<allcountry :country="country"></allcountry>

                                        </span>
<ul class="list">
    <li  class="option" @click='countryChoose("GB")' value="44" Selected> (+47)</li>
    <li  class="option" @click='countryChoose("US")' value="1"> (+44)</li>
        <li  class="option" @click='countryChoose("DZ")' value="213"> (+213)</li>
        <li  class="option" @click='countryChoose("AD")' value="376"> (+376)</li>
        <li  class="option" @click='countryChoose("AO")' value="244"> (+244)</li>
        <li  class="option" @click='countryChoose("AI")' value="1264"> (+1264)</li>
        <li  class="option" @click='countryChoose("AG")' value="1268">  (+1268)</li>
        <li  class="option" @click='countryChoose("AR")' value="54"> (+54)</li>
        <li  class="option" @click='countryChoose("AM")' value="374"> (+374)</li>
        <li  class="option" @click='countryChoose("AW")' value="297"> (+297)</li>
        <li  class="option" @click='countryChoose("AU")' value="61"> (+61)</li>
        <li  class="option" @click='countryChoose("AT")' value="43"> (+43)</li>
        <li  class="option" @click='countryChoose("AZ")' value="994"> (+994)</li>
        <li  class="option" @click='countryChoose("BS")' value="1242"> (+1242)</li>
        <li  class="option" @click='countryChoose("BH")' value="973"> (+973)</li>
        <li  class="option" @click='countryChoose("BD")' value="880"> (+880)</li>
        <li  class="option" @click='countryChoose("BB")' value="1246"> (+1246)</li>
        <li  class="option" @click='countryChoose("BY")' value="375"> (+375)</li>
        <li  class="option" @click='countryChoose("BE")' value="32"> (+32)</li>
        <li  class="option" @click='countryChoose("BZ")' value="501"> (+501)</li>
        <li  class="option" @click='countryChoose("BJ")' value="229"> (+229)</li>
        <li  class="option" @click='countryChoose("BM")' value="1441"> (+1441)</li>
        <li  class="option" @click='countryChoose("BT")' value="975"> (+975)</li>
        <li  class="option" @click='countryChoose("BO")' value="591"> (+591)</li>
        <li  class="option" @click='countryChoose("BA")' value="387">  (+387)</li>
        <li  class="option" @click='countryChoose("BW")' value="267"> (+267)</li>
        <li  class="option" @click='countryChoose("BR")' value="55"> (+55)</li>
        <li  class="option" @click='countryChoose("BN")' value="673"> (+673)</li>
        <li  class="option" @click='countryChoose("BG")' value="359"> (+359)</li>
        <li  class="option" @click='countryChoose("BF")' value="226">  (+226)</li>
        <li  class="option" @click='countryChoose("BI")' value="257"> (+257)</li>
        <li  class="option" @click='countryChoose("KH" )' value="855"> (+855)</li>
        <li  class="option" @click='countryChoose("CM" )' value="237"> (+237)</li>
        <li  class="option" @click='countryChoose("CA" )' value="1"> (+1)</li>
        <li  class="option" @click='countryChoose("CV" )' value="238"> (+238)</li>
        <li  class="option" @click='countryChoose("KY" )' value="1345"> (+1345)</li>
        <li  class="option" @click='countryChoose("CF" )' value="236"> (+236)</li>
        <li  class="option" @click='countryChoose("CL" )' value="56"> (+56)</li>
        <li  class="option" @click='countryChoose("CN" )' value="86"> (+86)</li>
        <li  class="option" @click='countryChoose("CO" )' value="57"> (+57)</li>
        <li  class="option" @click='countryChoose("KM" )' value="269"> (+269)</li>
        <li  class="option" @click='countryChoose("CG" )' value="242"> (+242)</li>
        <li  class="option" @click='countryChoose("CK" )' value="682">  (+682)</li>
        <li  class="option" @click='countryChoose("CR" )' value="506">  (+506)</li>
        <li  class="option" @click='countryChoose("HR" )' value="385"> (+385)</li>
        <li  class="option" @click='countryChoose("CU" )' value="53"> (+53)</li>
        <li  class="option" @click='countryChoose("CY" )' value="90392">  (+90392)</li>
        <li  class="option" @click='countryChoose("CY" )' value="357">  (+357)</li>
        <li  class="option" @click='countryChoose("CZ" )' value="42">  (+42)</li>
        <li  class="option" @click='countryChoose("DK" )' value="45"> (+45)</li>
        <li  class="option" @click='countryChoose("DJ" )' value="253"> (+253)</li>
        <li  class="option" @click='countryChoose("DM" )' value="1809"> (+1809)</li>
        <li  class="option" @click='countryChoose("DO" )' value="1809">  (+1809)</li>
        <li  class="option" @click='countryChoose("EC" )' value="593"> (+593)</li>
        <li  class="option" @click='countryChoose("EG" )' value="20"> (+20)</li>
        <li  class="option" @click='countryChoose("SV" )' value="503">  (+503)</li>
        <li  class="option" @click='countryChoose("GQ" )' value="240">  (+240)</li>
        <li  class="option" @click='countryChoose("ER" )' value="291"> (+291)</li>
        <li  class="option" @click='countryChoose("EE" )' value="372"> (+372)</li>
        <li  class="option" @click='countryChoose("ET" )' value="251"> (+251)</li>
        <li  class="option" @click='countryChoose("FK" )' value="500">  (+500)</li>
        <li  class="option" @click='countryChoose("FO" )' value="298">  (+298)</li>
        <li  class="option" @click='countryChoose("FJ" )' value="679"> (+679)</li>
        <li  class="option" @click='countryChoose("FI" )' value="358"> (+358)</li>
        <li  class="option" @click='countryChoose("FR" )' value="33"> (+33)</li>
        <li  class="option" @click='countryChoose("GF" )' value="594">  (+594)</li>
        <li  class="option" @click='countryChoose("PF" )' value="689">  (+689)</li>
        <li  class="option" @click='countryChoose("GA" )' value="241"> (+241)</li>
        <li  class="option" @click='countryChoose("GM" )' value="220"> (+220)</li>
        <li  class="option" @click='countryChoose("GE" )' value="7880"> (+7880)</li>
        <li  class="option" @click='countryChoose("DE" )' value="49"> (+49)</li>
        <li  class="option" @click='countryChoose("GH" )' value="233"> (+233)</li>
        <li  class="option" @click='countryChoose("GI" )' value="350"> (+350)</li>
        <li  class="option" @click='countryChoose("GR" )' value="30"> (+30)</li>
        <li  class="option" @click='countryChoose("GL" )' value="299"> (+299)</li>
        <li  class="option" @click='countryChoose("GD" )' value="1473"> (+1473)</li>
        <li  class="option" @click='countryChoose("GP" )' value="590"> (+590)</li>
        <li  class="option" @click='countryChoose("GU" )' value="671"> (+671)</li>
        <li  class="option" @click='countryChoose("GT" )' value="502"> (+502)</li>
        <li  class="option" @click='countryChoose("GN" )' value="224"> (+224)</li>
        <li  class="option" @click='countryChoose("GW" )' value="245"> (+245)</li>
        <li  class="option" @click='countryChoose("GY" )' value="592"> (+592)</li>
        <li  class="option" @click='countryChoose("HT" )' value="509"> (+509)</li>
        <li  class="option" @click='countryChoose("HN" )' value="504"> (+504)</li>
        <li  class="option" @click='countryChoose("HK" )' value="852">  (+852)</li>
        <li  class="option" @click='countryChoose("HU" )' value="36"> (+36)</li>
        <li  class="option" @click='countryChoose("IS" )' value="354"> (+354)</li>
        <li  class="option" @click='countryChoose("IN" )' value="91"> (+91)</li>
        <li  class="option" @click='countryChoose("ID" )' value="62"> (+62)</li>
        <li  class="option" @click='countryChoose("IR" )' value="98"> (+98)</li>
        <li  class="option" @click='countryChoose("IQ" )' value="964"> (+964)</li>
        <li  class="option" @click='countryChoose("IE" )' value="353"> (+353)</li>
        <li  class="option" @click='countryChoose("IT" )' value="39"> (+39)</li>
        <li  class="option" @click='countryChoose("JM" )' value="1876"> (+1876)</li>
        <li  class="option" @click='countryChoose("JP" )' value="81"> (+81)</li>
        <li  class="option" @click='countryChoose("JO" )' value="962"> (+962)</li>
        <li  class="option" @click='countryChoose("KZ" )' value="7"> (+7)</li>
        <li  class="option" @click='countryChoose("KE" )' value="254"> (+254)</li>
        <li  class="option" @click='countryChoose("KI" )' value="686"> (+686)</li>
        <li  class="option" @click='countryChoose("KP" )' value="850">  (+850)</li>
        <li  class="option" @click='countryChoose("KR" )' value="82">  (+82)</li>
        <li  class="option" @click='countryChoose("KW" )' value="965"> (+965)</li>
        <li  class="option" @click='countryChoose("KG" )' value="996"> (+996)</li>
        <li  class="option" @click='countryChoose("LA" )' value="856"> (+856)</li>
        <li  class="option" @click='countryChoose("LV" )' value="371"> (+371)</li>
        <li  class="option" @click='countryChoose("LB" )' value="961"> (+961)</li>
        <li  class="option" @click='countryChoose("LS" )' value="266"> (+266)</li>
        <li  class="option" @click='countryChoose("LR" )' value="231"> (+231)</li>
        <li  class="option" @click='countryChoose("LY" )' value="218"> (+218)</li>
        <li  class="option" @click='countryChoose("LI" )' value="417"> (+417)</li>
        <li  class="option" @click='countryChoose("LT" )' value="370"> (+370)</li>
        <li  class="option" @click='countryChoose("LU" )' value="352"> (+352)</li>
        <li  class="option" @click='countryChoose("MO" )' value="853"> (+853)</li>
        <li  class="option" @click='countryChoose("MK" )' value="389"> (+389)</li>
        <li  class="option" @click='countryChoose("MG" )' value="261"> (+261)</li>
        <li  class="option" @click='countryChoose("MW" )' value="265"> (+265)</li>
        <li  class="option" @click='countryChoose("MY" )' value="60"> (+60)</li>
        <li  class="option" @click='countryChoose("MV" )' value="960"> (+960)</li>
        <li  class="option" @click='countryChoose("ML" )' value="223"> (+223)</li>
        <li  class="option" @click='countryChoose("MT" )' value="356"> (+356)</li>
        <li  class="option" @click='countryChoose("MH" )' value="692">  (+692)</li>
        <li  class="option" @click='countryChoose("MQ" )' value="596"> (+596)</li>
        <li  class="option" @click='countryChoose("MR" )' value="222"> (+222)</li>
        <li  class="option" @click='countryChoose("YT" )' value="269"> (+269)</li>
        <li  class="option" @click='countryChoose("MX" )' value="52"> (+52)</li>
        <li  class="option" @click='countryChoose("FM" )' value="691"> (+691)</li>
        <li  class="option" @click='countryChoose("MD" )' value="373"> (+373)</li>
        <li  class="option" @click='countryChoose("MC" )' value="377"> (+377)</li>
        <li  class="option" @click='countryChoose("MN" )' value="976"> (+976)</li>
        <li  class="option" @click='countryChoose("MS" )' value="1664"> (+1664)</li>
        <li  class="option" @click='countryChoose("MA" )' value="212"> (+212)</li>
        <li  class="option" @click='countryChoose("MZ" )' value="258"> (+258)</li>
        <li  class="option" @click='countryChoose("MN" )' value="95"> (+95)</li>
        <li  class="option" @click='countryChoose("NA" )' value="264"> (+264)</li>
        <li  class="option" @click='countryChoose("NR" )' value="674"> (+674)</li>
        <li  class="option" @click='countryChoose("NP" )' value="977"> (+977)</li>
        <li  class="option" @click='countryChoose("NL" )' value="31"> (+31)</li>
        <li  class="option" @click='countryChoose("NC" )' value="687">  (+687)</li>
        <li  class="option" @click='countryChoose("NZ" )' value="64">  (+64)</li>
        <li  class="option" @click='countryChoose("NI" )' value="505"> (+505)</li>
        <li  class="option" @click='countryChoose("NE" )' value="227"> (+227)</li>
        <li  class="option" @click='countryChoose("NG" )' value="234"> (+234)</li>
        <li  class="option" @click='countryChoose("NU" )' value="683"> (+683)</li>
        <li  class="option" @click='countryChoose("NF" )' value="672">  (+672)</li>
        <li  class="option" @click='countryChoose("NP" )' value="670">  (+670)</li>
        <li  class="option" @click='countryChoose("NO" )' value="47"> (+47)</li>
        <li  class="option" @click='countryChoose("OM" )' value="968"> (+968)</li>
        <li  class="option" @click='countryChoose("PW" )' value="680"> (+680)</li>
        <li  class="option" @click='countryChoose("PA" )' value="507"> (+507)</li>
        <li  class="option" @click='countryChoose("PG" )' value="675">   (+675)</li>
        <li  class="option" @click='countryChoose("PY" )' value="595"> (+595)</li>
        <li  class="option" @click='countryChoose("PE" )' value="51"> (+51)</li>
        <li  class="option" @click='countryChoose("PH" )' value="63"> (+63)</li>
        <li  class="option" @click='countryChoose("PL" )' value="48"> (+48)</li>
        <li  class="option" @click='countryChoose("PT" )' value="351"> (+351)</li>
        <li  class="option" @click='countryChoose("PR" )' value="1787">  (+1787)</li>
        <li  class="option" @click='countryChoose("QA" )' value="974"> (+974)</li>
        <li  class="option" @click='countryChoose("RE" )' value="262"> (+262)</li>
        <li  class="option" @click='countryChoose("RO" )' value="40"> (+40)</li>
        <li  class="option" @click='countryChoose("RU" )' value="7"> (+7)</li>
        <li  class="option" @click='countryChoose("RW" )' value="250"> (+250)</li>
        <li  class="option" @click='countryChoose("SM" )' value="378">  (+378)</li>
        <li  class="option" @click='countryChoose("ST" )' value="239"> (+239)</li>
        <li  class="option" @click='countryChoose("SA" )' value="966"> (+966)</li>
        <li  class="option" @click='countryChoose("SN" )' value="221"> (+221)</li>
        <li  class="option" @click='countryChoose("CS" )' value="381">(+381)</li>
        <li  class="option" @click='countryChoose("SC" )' value="248"> (+248)</li>
        <li  class="option" @click='countryChoose("SL" )' value="232">(+232)</li>
        <li  class="option" @click='countryChoose("SG" )' value="65"> (+65)</li>
        <li  class="option" @click='countryChoose("SK" )' value="421">  (+421)</li>
        <li  class="option" @click='countryChoose("SI" )' value="386"> (+386)</li>
        <li  class="option" @click='countryChoose("SB" )' value="677">  (+677)</li>
        <li  class="option" @click='countryChoose("SO" )' value="252"> (+252)</li>
        <li  class="option" @click='countryChoose("ZA" )' value="27">  (+27)</li>
        <li  class="option" @click='countryChoose("ES" )' value="34"> (+34)</li>
        <li  class="option" @click='countryChoose("LK" )' value="94">  (+94)</li>
        <li  class="option" @click='countryChoose("SH" )' value="290">  (+290)</li>
        <li  class="option" @click='countryChoose("KN" )' value="1869"> (+1869)</li>
        <li  class="option" @click='countryChoose("SC" )' value="1758"> (+1758)</li>
        <li  class="option" @click='countryChoose("SD" )' value="249"> (+249)</li>
        <li  class="option" @click='countryChoose("SR" )' value="597"> (+597)</li>
        <li  class="option" @click='countryChoose("SZ" )' value="268"> (+268)</li>
        <li  class="option" @click='countryChoose("SE" )' value="46"> (+46)</li>
        <li  class="option" @click='countryChoose("CH" )' value="41"> (+41)</li>
        <li  class="option" @click='countryChoose("SI" )' value="963"> (+963)</li>
        <li  class="option" @click='countryChoose("TW" )' value="886"> (+886)</li>
        <li  class="option" @click='countryChoose("TJ" )' value="7"> (+7)</li>
        <li  class="option" @click='countryChoose("TH" )' value="66"> (+66)</li>
        <li  class="option" @click='countryChoose("TG" )' value="228"> (+228)</li>
        <li  class="option" @click='countryChoose("TO" )' value="676"> (+676)</li>
        <li  class="option" @click='countryChoose("TT" )' value="1868">  (+1868)</li>
        <li  class="option" @click='countryChoose("TN" )' value="216"> (+216)</li>
        <li  class="option" @click='countryChoose("TR" )' value="90"> (+90)</li>
        <li  class="option" @click='countryChoose("TM" )' value="7"> (+7)</li>
        <li  class="option" @click='countryChoose("TM" )' value="993"> (+993)</li>
        <li  class="option" @click='countryChoose("TC" )' value="1649">  (+1649)</li>
        <li  class="option" @click='countryChoose("TV" )' value="688"> (+688)</li>
        <li  class="option" @click='countryChoose("UG" )' value="256"> (+256)</li>
     
        <li  class="option" @click='countryChoose("UA" )' value="380"> (+380)</li>
        <li  class="option" @click='countryChoose("AE" )' value="971"> (+971)</li>
        <li  class="option" @click='countryChoose("UY" )' value="598"> (+598)</li>
        <li  class="option" @click='countryChoose("US" )' value="1"> (+1)</li>
        <li  class="option" @click='countryChoose("UZ" )' value="7"> (+7)</li>
        <li  class="option" @click='countryChoose("VU" )' value="678"> (+678)</li>
        <li  class="option" @click='countryChoose("VA" )' value="379"> City (+379)</li>
        <li  class="option" @click='countryChoose("VE" )' value="58"> (+58)</li>
        <li  class="option" @click='countryChoose("VN" )' value="84"> (+84)</li>
        <li  class="option" @click='countryChoose("VG" )' value="84">   (+1284)</li>
        <li  class="option" @click='countryChoose("VI" )' value="84"> (+1340)</li>
        <li  class="option" @click='countryChoose("WF" )' value="681">(+681)</li>
        <li  class="option" @click='countryChoose("YE" )' value="969">(+969)</li>
        <li  class="option" @click='countryChoose("YE" )' value="967">(+967)</li>
        <li  class="option" @click='countryChoose("ZM" )' value="260"> (+260)</li>
        <li  class="option" @click='countryChoose("ZW" )' value="263"> (+263)</li>

</ul>
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
                 fa fa-paperclip"  ></span></span>

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


  <div  v-if="progressAvatar !='100%'" class="progress-bar  progress-bar-striped bg-primary"
   role="progressbar" :style="'width:'+progressAvatar+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progressAvatar=='100%'" class="progress-bar progress-bar-striped  bg-success" role="progressbar"
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





          
<div v-if="business.Categories==1 || business.Categories==6 ">
  <span class="">   تقييم البلدية</span>
                  <div class="form-group container file-style " >
                 <label>

                 <span :class="{'btn btn-light':Munici==null,'btn btn-success':Munici}" @click="$refs.Munici" >
                  <span class=" fa fa-paperclip" ></span></span>

           
        
        
             <small class=" font-weight-bold text-danger" v-if="FileNotMuniciAllowd!=null">{{FileNotMuniciAllowd}}</small>
                <input type="file" class="form-control"  @change="MuniciFile" style="display:none" ref="Munici">



                 </label>

            </div>
<span v-if="progressMunici" class="">{{progressMunici}}</span>
<div class="progress" v-if="progressMunici" style="hieght:10px !important">


  <div  v-if="progressMunici !='100%'" class="progress-bar  progress-bar-striped bg-primary"
   role="progressbar" :style="'width:'+progressMunici+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progressMunici=='100%'" class="progress-bar progress-bar-striped  bg-success" role="progressbar" :style="'width:'+progressMunici+';hieght:10px !important;background-color:#3454d1 !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>

</div>





</div>
</div>
<div class="upload-file file-style">
                             <label class=" ">


                 <span class="btn btn-light" @click="$refs.licence" v-if="file==null"><i class=" fa fa-paperclip" ></i></span>

                <span class="btn btn-primary " @click="$refs.licence" v-else><i class="fa fa-paperclip" ></i></span>
              <span class="float-right">   رخصة  الشركة </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotlicenceAllowd!=null">{{FileNotlicenceAllowd}}</small>
                <input type="file" class="form-control"  @change="licenceFile" style="display:none" ref="licence" >





            </label>
</div>
<div class="container">
<span v-if="progresslicence" class="">{{progresslicence}}</span>
<div class="progress" v-if="progresslicence" style="hieght:10px !important">

  <div  v-if="progresslicence!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progresslicence+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progresslicence=='100%'" class="progress-bar  progress-bar-striped bg-success   " role="progressbar" :style="'width:'+progresslicence+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<i class="fa fa-close btn" v-if="resultSize" @click="RemoveFile('file')"></i>

<span v-if="resultSize!=null" ><i class="fa fa-file" style="color:#ebeef2"  ></i> {{resultName}}</span>
<span v-if="resultSize!=null"  class="float-right"> {{resultSize}}</span>
</div>
                    <div>

                        <div v-if="success != ''" class="alert alert-success">
                            {{success}}
                        </div>

                        <form>
                       
                            <div class="upload-file file-style">
                             <label class="  ">


                 <span class="btn btn-light" @click="$refs.Achive" v-if="Achive==null"><i class=" fa fa-paperclip" ></i></span>

                <span class="btn btn-primary " @click="$refs.Achive" v-else><i class="fa fa-paperclip" ></i></span>
              <span class="float-right">     الانجازات </span>
              <small class=" font-weight-bold text-danger" v-if="FileNotMapAllowd!=null">{{FileNotAchiveAllowd}}</small>
                <input type="file" class="form-control"  @change="AchiveFile" style="display:none" ref="Achive" >





            </label>
</div>
<div class="container">
<span v-if="progressAchive" class="">{{progressAchive}}</span>
<div class="progress" v-if="progressAchive" style="hieght:10px !important">

  <div  v-if="progressAchive!='100%'" class="progress-bar  progress-bar-striped bg-primary" role="progressbar" :style="'width:'+progressAchive+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  <div  v-if="progressAchive=='100%'" class="progress-bar  progress-bar-striped bg-success   " role="progressbar" :style="'width:'+progressAchive+';hieght:10px !important'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>

</div>


                        </form>
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
        

        <div class="controls">
            <button class="btn" @click="stepGo('min')" :disabled="step == 1" v-if="step != 4">
                <!-- "stepGo('min')" -->
                {{$t('previous')}}
            </button>
            <button class="btn btn-success btn--green-1"  @click="stepGo('plus')" :disabled="step == 4"  v-if="step != 4">
                <!-- @click="stepGo('plus')" -->
                {{$t('next')}}
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
              





      loading: false,

       alertT:'d-none',
       alert:'d-none',
   
    }
  },
   
 



        watch:{
  phone() {
        var x = this.phone.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,6})/);
  this.phone = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
  
             let data = new FormData();
data.append('mobile', this.phone);

           axios.post('thisPhoneIsAvailble',data).then(res=>{
                this.isAvailble=res.data;
           })
  
    },
  },
    methods:{
              openCountry(){
     
              this.open=="open" ? this.open='' : this.open="open"
		  
    },

countryChoose(event){

  this.country=event


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
                });


                    

                
                            



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
                  

                        if(this.Achive.size < 1048576){
        let size = Math.floor(this.Achive.size/1024);
        this.resultAchiveName = this.Achive.name   ;
        this.resultAchiveSize = size+' KB' ;


                    }
        if(this.Achive.size > 1048576){
        let size = Math.floor(this.Achive.size/1024);
        this.resultAchiveName = this.Achive.name   ;
        this.resultAchiveSize = size+' MB' ;


        }
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
data.append('mobile',this.complete.mobile);

data.append('emirates',this.complete.emirates);
data.append('about',this.complete.about);
data.append('phone',this.phone);
data.append('date_create',this.complete.date_create);


data.append('AchiveThreeYears',this.AchiveThreeYears);
data.append('AchiveSinceCreate',this.AchiveSinceCreate);

data.append('pathAvatar',this.pathAvatar);
data.append('pathAchive',this.pathAchive);
data.append('pathlicence',this.pathlicence);

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
                     ||this.business.mobile==null){
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
                    || this.complete.Company_ar==''|| this.phone=='' ||this.complete.emirates==''
                     || this.complete.date_create=='' ||this.complete.about==''){
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
$green-1    :   #34d195;
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
</style>

