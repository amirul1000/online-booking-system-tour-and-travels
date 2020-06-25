 

    <!-- BEGIN PRE-FOOTER -->           

       <!--BEGIN LAST AND NEW FOOTER -->
    
<!-- FOOTER -->
<footer>
 <div class="container">
 	<div class="colm-3">
    	<img src="images/mdt-logof.png" alt="My Transfers & Tours Portal">
		<p>Phone: &nbsp; 1-829-254-1979<br />
        Mobile: &nbsp; 1-849-318-7581<br />
       Mail: &nbsp;daphnismultinivel@gmail.com</p>
    </div>
    
    <div class="colm-9">
    	<ul>
        	<li><a href=https://www.facebook.com/Dutestecnologiasrl?ref=hl target="_blank"><img src="images/facebookf-img.png" alt="Facebook"></a></li>
           <!-- <li><a href="http://www.tripadvisor.in/Attraction_Review-g967189-d3653837-Reviews-Dominican_Quest_Tours-Boca_Chica_Santo_Domingo_Province_Dominican_Republic.html" target="_blank"><img src="images/tripadviserf-img.png" alt="Trip Adviser"></a></li>-->
            <li><a href="https://twitter.com/Daphsoft" target="_blank"><img src="images/twitterf-img.png" alt="Twitter"></a></li>
            <li><a href="http://dutesapps.com/" target="_blank"><img src="images/blogf-img.png" alt="Blog"></a></li>
            <li><img src="images/gauranteef.png" alt="Gaurantee"></li>
        </ul>
    </div>  
    
    <div class="secure-payment">
   	  <aside>
        <ul>
        <li> <a href="faq.php" title="FAQ"> FAQ </a> </li>
            <li> <a href="contact.php" title="Contact Us">Contact us   </a> </li>
            <li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
            <li><a href="#" title="Website Trems & Conditions">Website Trems & Conditions</a></li>
            <li><a href="affiliate.php" title="Become an affiliate">Become an affiliate</a></li>
        </ul>
        </aside>
    </div>
     
 </div>
</footer>

<div class="copyrights">
 <div class="container">
 <div class="leftwrap">&copy; Copyright -<script type="text/javascript">document.write(new Date().getFullYear())</script> Daphnis DUTES</div>
<div class="col-md-6 col-sm-6">

            <ul class="social-footer list-unstyled list-inline pull-right">
              <img src="images/paypal.png" class="img-responsive" alt="Secure Payment">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-skype"></i></a></li>
              <li><a href="#"><i class="fa fa-github"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              <li><a href="#"><i class="fa fa-dropbox"></i></a></li>
            </ul>  
          </div>

 </div>
</div>
<script src="js/jquery.flexslider-min.js"></script> 
<script src="js/jquery.fancybox.js?v=2.1.5"></script> 
<script src="js/owl.carousel.js"></script>
<script src="js/import.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
      $("#owl-demo").owlCarousel({
        navigation : true
      });
	  
	   $("#owl-demo1").owlCarousel({
        navigation : true
      });
    });
    </script><script type="text/javascript" src="../js/tabcontent.js"></script> 
<script src="../js/owl.carousel.js"></script> 
<!--<script src="../js/slides.min.jquery.js"></script>-->
<!-- SlidesJS Required: Link to jquery.slides.js --> 
<script src="../js/jquery.slides.min.js"></script> 
<script type="text/javascript">
      jQuery(function(){
        
	 <!-- SLIDER -->
	/* $('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 3000,
				pause: 3500,
				hoverPause: true,
				generateNextPrev: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
	 setInterval( "slideSwitch()", 3000 );
	 $('.slidesjs-control').find('slidesjs-slide').each(function(i, obj){
  		if (obj.clientHeight <= 0){
      obj.style.height = obj.offsetParent.clientHeight + 'px';
 		 }
	});*/
	
	
	<!-- SLIDER -->
	
	 /***  Mobile Transfers Slide ***/
	$('#slidestrans').slidesjs({
        width: 400,
		autoHeight: true,
		 play: {
		  auto: true,
		  interval: 5000,
		  swap: true,
		  pauseOnHover: true,
		  restartDelay: 500,
   		},
        pagination: false,
        effect: {
          fade: {
            speed: 500
          }
        }
      });
	  
	/* Mobile slide Paaxes */
   $('#slidepaxes').slidesjs({
        width: 400,
		autoHeight: false,
		 play: {
		  auto: true,
		  interval: 5000,
		  swap: true,
		  pauseOnHover: true,
		  restartDelay: 100, effect: "fade",
   		},
		navigation: false,
        pagination: false,
        effect: {
          fade: {
            speed: 500
          }
        }
      });
	
	/* Web Transfers slides */
   $('#mainslides').slidesjs({
        width: 400,
		height: 300,
		 play: {
		  auto: true,
		  interval: 5000,
		  swap: true,
		  pauseOnHover: true,
		  restartDelay: 100, effect: "slide",
   		},
		navigation: false,
        pagination: false,
        effect: {
          fade: {
            speed: 5000
          }
        }
      });	
	
	
	/* Web Crucial Sliders */
	 $("#owl-demo").owlCarousel({
		  items : 4,
    itemsCustom : false,
    itemsDesktop : [1199,3],
    itemsDesktopSmall : [980,2],
    itemsTablet: [768,2],
    itemsTabletSmall: false,
    itemsMobile : [479,1],
    singleItem : false,
    itemsScaleUp : false,
	
	  autoPlay : true,
    stopOnHover : false,
    });
	  
	   $("#owl-demo1").owlCarousel({
        navigation : true,
		pagination:true
      });
	  
	   $("#owl-demo2").owlCarousel({
        navigation : true,
		pagination:true
      });
	
   	
		
			
      });
	  
	  
	  
	  
	  


/* ---- TABS ---- */
var myflowers=new ddtabcontent("flowertabs11")
myflowers.setpersist(true)
myflowers.setselectedClassTarget("link") //"link" or "linkparent"
myflowers.init()


/* ---- TABS ---- */
var myflowers=new ddtabcontent("flowertabs12")
myflowers.setpersist(true)
myflowers.setselectedClassTarget("link") //"link" or "linkparent"
myflowers.init()
/* ---- TOURS SLIDER --*/


</script>

    <!--END LAST AND NEW FOOTER-->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="<?=$asset_url;?>/assets/global/plugins/respond.min.js"></script>
    <![endif]-->
    <script src="<?=$asset_url;?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?=$asset_url;?>/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?=$asset_url;?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?=$asset_url;?>/assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?=$asset_url;?>/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->

    <script src="<?=$asset_url;?>/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
        });
    </script>
    
<script>	
	/* menu */
	$(document).ready(function() {
    $('a[href="#navbar-more-show"], .navbar-more-overlay').on('click', function(event) {
		event.preventDefault();
		$('body').toggleClass('navbar-more-show');
		if ($('body').hasClass('navbar-more-show'))	{
			$('a[href="#navbar-more-show"]').closest('li').addClass('active');
		}else{
			$('a[href="#navbar-more-show"]').closest('li').removeClass('active');
		}
		return false;
		
	});
});







	</script>
   <script src="../js/jquery.flexslider-min.js"/>
<script src="../js/jquery.fancybox.js?v=2.1.5"/>
<script src="../js/owl.carousel.js"/>
<script src="../js/import.js" type="text/javascript"/>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
                   

</body>
<!-- END BODY -->
</html>