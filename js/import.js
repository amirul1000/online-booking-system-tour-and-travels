// JavaScript Document

<!-- MENU -->
jQuery(function(){
 
  <!-- Responsive Menu -->
  
  /*$("#bnav").click(function () {
	  $("nav").toggle("slow");
	  }); 
  */
	  
	  $('#bnav').on('click', function (e) {
		  $('nav').stop().slideDown('2000', "swing");
		  $('#bnav').addClass('active');
	   e.preventDefault();
	  });
	  $('#closeButton').on('click', function (e) {
		  $('nav').stop().slideUp('2000', "swing");
		  e.preventDefault();
	  });
	  
	/* ==== Flexi Slider Privater Transfers ==== */
	$(window).load(function() {
			$('.flexslider').flexslider();
		});
		
	/* ====   Fancybox ==== */
		$('.fancybox').fancybox();

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			
			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					//href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});  
	  
	  
	  
});
	  
	  
<!-- Live Chat -->
	  
 var __lc = {};
  __lc.license = 1092783;

  (function() {
    var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
    lc.src = ('https://' == document.location.protocol ? 'https://' : 'https://') + 'cdn.livechatinc.com/tracking.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
  })();
	

	  
	  
	  
	



