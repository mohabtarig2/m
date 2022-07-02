<template>
<div >


<div v-if=" isLoggedIn">



    <div v-if="user.roles.name !='user'">
     <div v-if="user.company == null || user.companyfile==null || user.achivement_file==null">
            <complete  ></complete>

        </div>
        <div v-else-if="user.companyfile.branchstatus==0">
            <branch>
            </branch>
        

        </div>
        <div v-else >

       
          
         <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" @click="slide()"
        role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
       <a class="nav-link" href="\"><i class="fa fa-eye"></i> {{$t('home')}}</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

     

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
         
 <a v-if="IsUser==10" class="font-weight-bold" >
<i class='bx bx-grid-alt'></i>     
    <span class="links_name font18">{{$t('MY_Project')}}</span>
         </a>        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="overflow:revert;    height: 0;">
      
          
               <div  class="">
	<div class="s-blog-sidebar sidebar-categories">
						
							<ul class="s-categories-list list-none">
								<li><router-link :to="{name:'ConslTenders'}"><i class="fa fa-angle-right"></i>
                      {{$t('consulting_company')}}
  </router-link></li>
								<li><router-link :to="{name:'constrtenders'}"><i class="fa fa-angle-right"></i>{{$t('construcion_company')}}</router-link></li>
							<li><router-link :to="{name:'HvacTenders'}"><i class="fa fa-angle-right"></i>{{$t('HVAC_companies')}}</router-link></li>
	<li><router-link :to="{name:'InteriorTenders'}"><i class="fa fa-angle-right"></i>
  {{$t('interior_companies')}}></router-link></li>
						
  <li><router-link :to="{name:'StoneTenders'}"><i class="fa fa-angle-right"></i>{{$t('Stone_companies')}}</router-link></li>


              </ul>
  </div>


</div>
        </div>
      </li>

          <li class="nav-item ">
        <router-link :to="{name:'AllNotification'}"  class="nav-link" >
          <i class="far fa-bell font18"></i>
          <span class="badge badge-warning navbar-badge">
            
            <span v-if="notificationlist.length>0"> {{notificationlist.length}}</span></span>
           
         </router-link>
      </li>

              
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" >
          <!-- <i class="far fa-bell"></i> -->
         <div class="badge badge-secondary text-uppercase rounded-circle " style="font-size:15px; padding:5px">
          {{user.name.substr(0,1 )}}
         </div>
           
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
         style="    height: auto; padding: 15px; overflow-y: auto !important;" 
         :dir="$t('directions')" :class="$t('text_align')">
          <a class="dropdown-item">
            {{user.name}}
          </a>
           <div class="dropdown-divider"></div>
         
         <router-link :to="{name:'Settings'}" class="dropdown-item">
            {{$t('Settings')}}
         </router-link>
          <div class="dropdown-divider"></div>
        <router-link :to="{name:'saved'}"   class="dropdown-item">
         <i class='bx bx-heart' ></i>
         <span class="links_name">{{$t('watchlist')}}</span>
        </router-link>
          <div class="dropdown-divider"></div>
          <a @click="logout()"   class="dropdown-item">
         <i class='bx bx-log-out' ></i>
         <span class="links_name">{{$t('logout')}}</span>
        </a>
      
        </div>
      </li>
 
    </ul>
  </nav>
  <!-- /.navbar -->
     
            <div class="sidebar MainSidebar " :class="open" v-show="$route.name!=='home'" >
    <div class="logo-details">
      <!-- <i class='bx bx-user'></i> -->
        <div class="logo_name">{{user.name}}</div>
        <i class='bx bx-menu' id="btn" @click="slide"></i>
    </div>
    <ul class="nav-list">

      <li>
         <router-link to="/dashboard"  href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">{{$t('dashboard')}}</span>
         </router-link>
         <span class="tooltip">{{$t('dashboard')}}</span>
      </li>


      <li>
         <router-link :to="{name:'Projects'}" v-if="IsUser!=10" >
         <i class='bx bx-home-smile' ></i>
         <span class="links_name">{{$t('Projects')}}</span>
         </router-link>
       <span class="tooltip">{{$t('Projects')}}</span>
     </li>
        <li>
         <router-link :to="{name:'AllNotification'}" >
         <i class='bx bx-bell'></i>
         <span class="badge badge-danger" v-if="notificationlist.length>0"> {{notificationlist.length}}</span>
         <span class="links_name">{{$t('notification')}}</span>
         </router-link>
       <span class="tooltip">{{$t('notification')}}</span>
     </li>
     <li>
               <router-link :to="{name:'alloffers'}" v-if="IsUser!=10" >
    <i class='bx bx-purchase-tag-alt'></i>
         <span class="links_name">{{$t('my_ads')}}</span>
               </router-link>
       <span class="tooltip">{{$t('my_ads')}}</span>
     </li>

 

       <li>
            <router-link :to="{name:'constrtenders'}" class="visible-xs" v-if="IsUser==1">
         <i class='fas fa-hard-hat' ></i>
         <span class="links_name"> {{$t('consr_tender')}}</span>
            </router-link>
       <span class="tooltip">{{$t('consr_tender')}}</span>
     </li>

         <li>
            <router-link :to="{name:'TenderRequest'}" >
       <i class='bx bx-collection'></i>
         <span class="links_name">{{$t('Requests')}}</span>
            </router-link>
       <span class="tooltip">{{$t('Requests')}}</span>
     </li>


     <li>
       <router-link :to="{name:'Settings'}">
         <i class='bx bx-cog' ></i>
         <span class="links_name">{{$t('settings')}}</span>
       </router-link>
       <span class="tooltip">{{$t('settings')}}</span>
     </li>
  <li >
         <a @click="logout()">
    <i class='bx bx-log-out' id="log_out" ></i>
             <span class="links_name">{{$t('logout')}}</span>
         </a>
         <span class="tooltip">{{$t('logout')}}</span>
     </li>
    </ul>
  </div>
<div class="home-section">

<!-- 
       <span class="mt-5 ">
                         <small> <a class="" @click="switchLang('ar')" v-show="lang=='en'">
                         <img src="https://img.icons8.com/color/20/000000/united-arab-emirates.png"/>عربي</a></small>
                                        <small><a @click="switchLang('en')" v-show="lang=='ar'">
                                           <img src="https://img.icons8.com/color/20/000000/usa.png"/> English
                                            </a></small>
                    </span> -->


<router-view :dir="$t('directions')" :class="$t('text_align')"></router-view>
</div>

    </div>

    </div>




    <!-- For User -->
       <div v-if="user.roles.name =='user'">

         <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light navbar-light" style="    padding: 20px;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" @click="slide()"
        role="button"><i class="fas fa-bars"></i></a>
      </li> -->
    
      <li class="nav-item d-none d-sm-inline-block">
        <div class="logo">
							<a href="/"><img src="img/websiteLogo.svg" style="width:185px" alt="#"></a>
						</div>
      </li>
        <li class="nav-item  d-md-none">
        <div class="logo">
							<a href="/"><img src="img/websiteLogo3.svg" style="width:50px" alt="#"></a>
						</div>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

     
     <li class="nav-item ">
        <router-link :to="{name:'AllNotification'}"  class="nav-link" >
          <i class="far fa-bell font18"></i>
          <span class="badge badge-warning navbar-badge">
            
            <span v-if="notificationlist.length>0"> {{notificationlist.length}}</span></span>
           
         </router-link>
      </li>
      
      <li class="nav-item ">
       <a class="nav-link" href="\"><i class="fa fa-home"></i> <span class="visible-xs">{{$t('home')}}</span></a>
      </li>

    
      
      <!-- Messages Dropdown Menu -->
      
      <li class="nav-item dropdown">
    <router-link :to="{name:'tenders'}"  class="font-weight-bold nav-link " >
<i class='fa fa-plus font18'></i>
   <span class="links_name visible-xs font18">{{$t('Add_tender')}}</span>
        </router-link>
      </li>

  

      <li class="nav-item dropdown">
        
         
 <a v-if="IsUser==10" class="font-weight-bold nav-link" data-toggle="dropdown" >
   
    <span class="links_name font18">{{$t('MY_Project')}}</span>
         </a>        
      
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="overflow:revert;    height: 0;">
      
          
               <div  class="">
	<div class="s-blog-sidebar sidebar-categories">
						
							<ul class="s-categories-list list-none">
								<li><router-link :to="{name:'ConslTenders'}"><i class="fa fa-angle-right"></i>
                      {{$t('consulting_company')}}
  </router-link></li>
								<li><router-link :to="{name:'constrtenders'}"><i class="fa fa-angle-right"></i>{{$t('construcion_company')}}</router-link></li>
								<li><router-link :to="{name:'HvacTenders'}"><i class="fa fa-angle-right"></i>
                {{$t('HVAC_companies')}}</router-link></li>
	<li><router-link :to="{name:'InteriorTenders'}"><i class="fa fa-angle-right"></i>
  {{$t('interior_companies')}}></router-link></li>
						
  <li><router-link :to="{name:'StoneTenders'}"><i class="fa fa-angle-right"></i>{{$t('Stone_companies')}}</router-link></li>


              </ul>
  </div>


</div>
        </div>
      </li>

      

     

              
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" >
          <!-- <i class="far fa-bell"></i> -->
         <div class=" text-uppercase rounded-circle " style="font-size:18px; width:36px; height:36px; 
            display: flex;
    align-items: center;
    justify-content: center;">
          <span class="mb-2"><img src="img/user.png" style="width:100%" alt="#"></span>
         </div>
           
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
         style="    height: auto; padding: 15px; overflow-y: auto !important;" 
         :dir="$t('directions')" :class="$t('text_align')">
          <a class="dropdown-item">
            {{user.name}}
          </a>
           <div class="dropdown-divider"></div>
         
         <router-link :to="{name:'Settings'}" class="dropdown-item">
            {{$t('Settings')}}
         </router-link>
          <div class="dropdown-divider"></div>
        <router-link :to="{name:'saved'}"   class="dropdown-item">
         <i class='bx bx-heart' ></i>
         <span class="links_name">{{$t('watchlist')}}</span>
        </router-link>
          <div class="dropdown-divider"></div>
          <a @click="logout()"   class="dropdown-item">
         <i class='bx bx-log-out' ></i>
         <span class="links_name">{{$t('logout')}}</span>
        </a>
      
        </div>
      </li>
 
    </ul>
  </nav>
  <!-- /.navbar -->


          <div class="  sidebar " :class="open" v-show="$route.name!=='home' || show" >
    <div class="logo-details">

        <div class="h6 logo_name">{{user.name}}</div>
        <!-- <i class='bx bx-menu' id="btn" @click="slide()"></i> -->
    </div>
    <ul class="nav-list">
  

      <li>
         <router-link :to="{name:'mytenders'}"  href="#">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">{{$t('dashboard')}}</span>
         </router-link>
         <span class="tooltip">{{$t('dashboard')}}</span>
      </li>
 







      

     <li>
        <router-link :to="{name:'tenders'}" >
<i class='bx bx-message-alt-add'></i>
   <span class="links_name">{{$t('Add_tender')}}</span>
        </router-link>
       <span class="tooltip">{{$t('Add_tender')}}</span>
     </li>

     <!-- <li>
       <a href="#">
         <i class='bx bx-folder' ></i>
         <span class="links_name">File Manager</span>
       </a>
       <span class="tooltip">Files</span>
     </li> -->


    </ul>
  </div>










<div class="home-section">




  <!-- {{windowWidth}}
   <span class="mt-5 ">
                         <small> <a class="" @click="switchLang('ar')" v-show="lang=='en'">
                         <img src="https://img.icons8.com/color/20/000000/united-arab-emirates.png"/>عربي</a></small>
                                        <small><a @click="switchLang('en')" v-show="lang=='ar'">
                                           <img src="https://img.icons8.com/color/20/000000/usa.png"/> English
                                            </a></small>
                    </span> -->

<router-view :dir="$t('directions')" :class="$t('text_align')" class="mt-3"></router-view>
</div>



    </div>






</div>


</div>
</template>


<script>
import {mapState ,mapGetters} from 'vuex';
import Achive from '../auth/achive.vue'
import complete from '../auth/complete.vue'
import FileUpload from '../auth/FileUpload.vue'
import Login from '../auth/login.vue';
import NotificationBar from '../notificationBar.vue'
import StatsticUser from './statsticUser.vue'
import branch from './branch.vue'
import mytenders from '../tenders/mytenders.vue';
export default {
  
  components: { complete, Achive, FileUpload, StatsticUser, NotificationBar, Login ,branch,mytenders},
    data(){
       const lang = localStorage.getItem('lang') || localStorage.setItem('lang','ar') ;
        return{
        users:null,
        seen:false,
        sidebarCollapse:null,
        show:true,
        lang:lang,
        status_upload:0,
        ContentWrapper:'content-wrapper',
        open:'',
        windowWidth: window.innerWidth,
        txt:'', 
        }
    },
    watch:{
    windowWidth(newHeight, oldHeight) {
            this.txt = `it changed to ${newHeight} from ${oldHeight}`;
        }
    },
      mounted() {

            this.getUnreadNotificatons();

                $('.header-inner').addClass('d-none');
                $('.footer-area').addClass('d-none');
                 this.$nextTick(() => {
            window.addEventListener('resize', this.onResize);
        })
        },
           beforeDestroy() { 
        window.removeEventListener('resize', this.onResize); 
    },
      computed:{
  IsUser(){
            return this.$store.getters.IsUser
        },
        user(){
             return this.$store.getters.user
        },
         ...mapState({

      isLoggedIn: "isLoggedIn",

    }),
    ...mapGetters({

    }),
    notificationlist(){
        return this.$store.state.notificationlist
    },

    },
  

    methods: {
      
       switchLang(event){
           localStorage.setItem('lang',event)
           location.reload();
       },
        onResize() {
            this.windowWidth = window.innerWidth
                 if(this.windowWidth >=1000)
            {
              // this.open='open'
              this.open=''
              this.ContentWrapper='content-wrapper';
                $('body').addClass('sidebar-collapse');
            }else  if(this.windowWidth <=1000){
              this.open=''
            }
        },
            getUnreadNotificatons(){

            axios.get('/getLastTenNotifications').then(res=>{
                console.log(res.data);
               this.$store.state.notificationlist = res.data;


            }).catch(err=>{
                console.log(err);
            })

        },
         slide(){
        

           if(this.open=='open'){
             this.open=''
             this.ContentWrapper='';
            //  this.sidebarCollapse="sidebar-collapse",
             $('body').addClass('sidebar-collapse');
            
           }else{
              this.open='open'
              this.ContentWrapper='content-wrapper';
               $('body').removeClass('sidebar-collapse');

           }



    },
     logout() {
     

        axios.post("/logout").then((response) => {
             this.$store.dispatch("logout");
           this.$router.push({ name: "login"});
        })
        .catch((error) => {
        this.$store.dispatch("logout");
          // location.reload();
        })
       
    },
    
 

      
    

    },
    created(){
    this.onResize();
  
  if(this.$route.from.name=="login"){
    location.reload();
  }

    
    }

}
</script>



<style scoped>
a i:hover {
color: #e43a15 ;
cursor: pointer;
}
.dropdown{
    padding: 0 5px;
    font-size: 12px;




}


.dropdown .dropdown-item  {
color: #e43a15 ;
cursor: pointer;
    font-size: 12px;



}
.dropdown-menu.show{
    width: 20rem;
    height: 31rem;
    overflow-y: scroll;
}
.badge-danger {
      color: #fff;
    background-color: #e3342f;
    position: absolute;
    left: 25px;
    top: 7px;
    border-radius: 16px;
    font-size: 9px;
}
.scrollbar
{
	margin-left: 30px;
	float: left;
	height: 300px;
	width: 65px;
	background: #fff;
	overflow-y: scroll;
	margin-bottom: 25px;
}


/*
 *  STYLE 2
 */

#style-4::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #fff;
}

#style-4::-webkit-scrollbar
{
	width: 12px;
	background-color: #fff;
}

#style-4::-webkit-scrollbar-thumb
{
	border-radius: 10px;

	background-color: #ced0d4;
}

/*
 *  STYLE 3
 */
</style>

<style scoped>
.MainSidebar{
  position: fixed  !important;
}
:root{
    --sidebar-bg-color:#ffffff;
    --sidebar-item-hover:#38a169;
    --sidebar-item-active:#276749;
}
.btn-oranger{
    background: #5192fc;
    color: #fff;
    border-radius: 20px;
}
.btn-outline-oranger{
    border: #5192fc;
    color: #5192fc;
    border-radius: 20px;
}

</style>

<style lang="scss" scoped>

.sidebarHome {
    color:rgb(34, 34, 34);
    /* background-color: var(--sidebar-bg-color); */
    float: left;
    position: fixed;
    z-index: 1;
    top:86px;
    left: 0;
    bottom: 0;
        padding: 1.5em;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
}
.sidebarHome > a{
    padding: 10px;
     color: rgb(42, 41, 41);
     margin-top:12px;
      text-decoration:none;
}
.sidebarHome > a:hover{
    background: #eee;
    border-radius: 20px;
    cursor: pointer;

}



 a.router-link-exact-active{
     font-weight: bold;
     background: #fff !important;
      border-radius: 20px;
     text-decoration:none;
     color: rgb(42, 41, 41) !important;


   i{
         color: rgb(12, 12, 12) !important;
 }
 .links_name{
    color: rgb(12, 12, 12) !important;
 }
}

.sidebarHome .drop-menu{

    -webkit-box-shadow: 0 0 20px 0 rgb(62 28 131 / 10%) !important;
}
</style>


<style scoped>
/* Google Font Link */

.sidebar{
  position: fixed;
left: -100;
  top: 0;
  height: 100%;
  width: 78px;
  background: #899be4;
  padding: 6px 14px;
  z-index: 99;
  transition: all 0.5s ease;
}
.sidebar.open{
  width: 250px;
  left: 0;
}
.sidebar .logo-details{
  height: 60px;
  display: flex;
  align-items: center;
  position: relative;
}
.sidebar .logo-details .icon{
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar .logo-details .logo_name{
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details .icon,
.sidebar.open .logo-details .logo_name{
  opacity: 1;
}
.sidebar .logo-details #btn{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  font-size: 22px;
  transition: all 0.4s ease;
  font-size: 23px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details #btn{
  text-align: right;
}
.sidebar i{
  color: #fff;
  height: 60px;
  min-width: 50px;
  font-size: 28px;
  text-align: center;
  line-height: 60px;
}
.sidebar .nav-list{
  margin-top: 20px;
  height: 100%;
}
.sidebar li{
  position: relative;
  margin: 8px 0;
  list-style: none;
}
.sidebar li .tooltip{
  position: absolute;
  top: -20px;
  left: calc(100% + 15px);
  z-index: 3;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 15px;
  font-weight: 400;
  opacity: 0;
  white-space: nowrap;
  pointer-events: none;
  transition: 0s;
}
.sidebar li:hover .tooltip{
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
  top: 50%;
  transform: translateY(-50%);
}
.sidebar.open li .tooltip{
  display: none;
}
.sidebar input{
  font-size: 15px;
  color: #FFF;
  font-weight: 400;
  outline: none;
  height: 50px;
  width: 100%;
  width: 50px;
  border: none;
  border-radius: 12px;
  transition: all 0.5s ease;
  background: #1d1b31;
}
.sidebar.open input{
  padding: 0 20px 0 50px;
  width: 100%;
}
.sidebar .bx-search{
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  font-size: 22px;
  background: #1d1b31;
  color: #FFF;
}
.sidebar.open .bx-search:hover{
  background: #1d1b31;
  color: #FFF;
}
.sidebar .bx-search:hover{
  background: #FFF;
  color: #3454d1;
}

.sidebar li a{
  display: flex;
  width: 100%;
  border-radius: 12px;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
  background: #3454d1;
  color: #fff;
}
.sidebar li a:hover{
  background: #FFF;
}
.sidebar li a .links_name{
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: 0.4s;
}
.sidebar.open li a .links_name{
  opacity: 1;
  pointer-events: auto;
}
.sidebar li a:hover .links_name,
.sidebar li a:hover i{
  transition: all 0.5s ease;
  color: #435dc8;
}
.sidebar li i{
  height: 50px;
  line-height: 50px;
  font-size: 18px;
  border-radius: 12px;
}
.sidebar li.profile{
  position: fixed;
  height: 60px;
  width: 78px;
  left: 0;
  bottom: -8px;
  padding: 10px 14px;
  background: #1d1b31;
  transition: all 0.5s ease;
  overflow: hidden;
}
.sidebar.open li.profile{
  width: 250px;
}
.sidebar li .profile-details{
  display: flex;
  align-items: center;
  flex-wrap: nowrap;
}
.sidebar li img{
  height: 45px;
  width: 45px;
  object-fit: cover;
  border-radius: 6px;
  margin-right: 10px;
}
.sidebar li.profile .name,
.sidebar li.profile .job{
  font-size: 15px;
  font-weight: 400;
  color: #fff;
  white-space: nowrap;
}
.sidebar li.profile .job{
  font-size: 12px;
}
.sidebar .profile #log_out{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  background: #1d1b31;
  width: 100%;
  height: 60px;
  line-height: 60px;
  border-radius: 0px;
  transition: all 0.5s ease;
}
.sidebar.open .profile #log_out{
  width: 50px;
  background: none;
}



.home-section .text{
  display: inline-block;
  color: #3454d1;
  font-size: 25px;
  font-weight: 500;
  margin: 18px
}

.dropdown .dropdown-item {
    color: #242424;
    cursor: pointer;
    font-weight:bold;
    font-size: 14px;
}


@media (max-width: 420px) {
  .sidebar li .tooltip{
    display: none;
  }
  
 

}
.font18{
      font-size: 18px;
}


</style>


<style scoped>
@import 'https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css';


</style>
