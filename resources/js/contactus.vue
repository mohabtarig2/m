<template>
<div>
    			<!-- Breadcrumbs Area -->
	<section class="breadcrumbs-area" style="background-image:url('img/breadcrumbs-bg.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Breadcrumbs Content -->

					<div class="breadcrumbs-content">
						<h1 class="b-content-title m-0 ">
								{{$t('contact_us')}}
                               
							 </h1>
						<ul class="breadcrumbs-menu list-none">
						
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
    <div class="container">
        <div class="row">
            
    <div class="terms col-6 col-md-6 col-12 mt-5"  :dir="$t('directions')" :class="$t('text_align')">
      

        <h1 class="">
           {{$t('contact_us')}}
        </h1>
        <p>
            {{$t('contactnumber')}} :  <span dir="ltr">+971 50 363 0050</span>
            <br>
            {{$t('contactemail')}} : info@ambtenders.com

        </p>


        
        
        <h3 class="mt-3">{{$t('timeworks')}}</h3>
        <p class="font-weight-bold font-weight-bold mt-3 mb-3">
            {{$t('hoursworks')}}
        </p>
          <p class="font-weight-bold font-weight-bold mt-3">
            {{$t('hoursweeks')}}
        </p>

		
	

    </div>
    <div class="col-md-6 col-12">
  <img class="img-fluid" src="img/contact-image.jpeg">
    </div>
        </div>

	
    </div>
</div>
</template>

<script>

    export default{

    }

</script>