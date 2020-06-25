
    <?php
	  include("template/header.php");
	?>
   
   
   <div class="main tour-page ">
      <div class="container">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Tour</h1>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->      
                <?php
				    if(isset($_REQUEST['id']))
					{
					   $whrstr = " AND id='".$_REQUEST['id']."'"; 	 
					}
					else
					{
				    	$whrstr = "AND excursion_zone='".$_REQUEST['excursion_zone']."' 
					                       AND excursion_city='".$_REQUEST['excursion_city']."'";
					}
					$info["table"] = "tour";
					$info["fields"] = array("tour.*"); 
					$info["where"]   = "1  $whrstr";
					$arrtour =  $db->select($info);
					
					$info["table"] = "tour_picture";
					$info["fields"] = array("tour_picture.*"); 
					$info["where"]   = "1 AND tour_id='".$arrtour[0]['id']."'";
					$arrpic =  $db->select($info);
					
					
					
					//////////////////SESSION//////////////
					$_SESSION['users_id'] = $arrtour[0]['users_id'];
					$_SESSION['tour_id'] = $arrtour[0]['id'];
					
					$info["table"] = "payment_method";
					$info["fields"] = array("payment_method.*"); 
					$info["where"]   = "1  AND users_id='".$_SESSION['users_id']."'";
					$arr =  $db->select($info);
					$_SESSION['paypalid']= $arr[0]['paypalid'];
					
					
				?>
                <div class="col-md-12 col-sm-12">
                  <div class="row">
                     <?php
					   if(count($arrtour)>0)
					   {
					 ?>
                     
                    <div class="col-md-12 col-sm-12">
                      <!--Carosel-->
                      
                    
					<style>
                    .slider-navigation {
                      height:100%;
                      padding: 10px 10px;
                      text-align: center;
                    }
                    .slider-navigation img {height:100%;width:100%;border-bottom:3px solid #68a400;border-radius:10px !important;}
                    #slider-thumbs {background-color: #f5f5f5;
                                    border: 1px solid #e3e3e3;  }
                    
					#slider-thumbs .list-inline { margin-top: -75px;}
                    #slider-thumbs .list-inline li {
                      width: 25%;
                      padding: 0px;
                      margin-right: -4px;
                      cursor: pointer;
					  height: 150px;
					  
                    }
                    
                    #slider-thumbs .list-inline li:first-child { padding-left: 5px; }
                    
                    .slider-nav-arrow {
                      text-align: center;
                      margin-bottom: 0px;
                      visibility: hidden;
                    }
                    
                    .selected .slider-nav-arrow { visibility: visible; }
                    
                    .selected .slider-navigation { opacity: 0.5; }
					.carousel-inner {height:400px !important;}
					.carousel-inner img {width:100%;height:100%;
					}
					.tourinside h3, .tourinside b {color:#68a400;}
					
					.ramycarousal {width:100%;}
					
					.tour-page .tour-des {word-wrap: break-word;}
                    </style>
                   <link href="carousel/jquerysctipttop.css" rel="stylesheet" type="text/css">



                  
                  
                  
                      <!-- main slider carousel -->
                      <div class="ramycarousal col-md-12">
                        <div  id="slider">
                          <div  id="carousel-bounding-box">
                            <div id="myCarousel" class="carousel slide"> 
                              <!-- main slider carousel items -->
                              <div class="carousel-inner">
                                <div class="active item" data-slide-number="1"> <img src="<?=$arrtour[0]['file_picture']?>" class="img-responsive"> </div>
                                 <?php 
								 for($j=0;$j<count($arrpic);$j++)
								  {
								?>
                                <div class="item" data-slide-number="<?=$j+2?>"> <img src="<?=$arrpic[$j]['file_picture']?>" class="img-responsive"> </div>
                                <?php
								 }
							    ?>
                              </div>
                              <!-- main slider carousel nav controls --> <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a> <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a> </div>
                          </div>
                        </div>
                      
                      <!--/main slider carousel--> 
                      <!-- thumb navigation carousel -->
                      <div class="col-md-12 hidden-sm hidden-xs" id="slider-thumbs"> 
                        <!-- thumb navigation carousel items -->
                        <ul class="list-inline">
                          <li> <a id="carousel-selector-1" class="selected">
                            <div class="slider-navigation"> <img src="<?=$arrtour[0]['file_picture']?>" class="img-responsive"> </div>
                            </a></li>
                           <?php 
							 for($j=0;$j<count($arrpic);$j++)
							  {
							?>     
                          <li> <a id="carousel-selector-<?=$j+2?>">
                            <div class="slider-navigation" > 
                            <img src="<?=$arrpic[$j]['file_picture']?>"  class="img-responsive"> </div>
                            </a></li>
                          <?php
							 }
							?>
                        </ul>
                      </div>
                      </div><!--end carousal container-->
                  <script src="carousel/jquery-1.11.3.min.js"></script> 
                    <script src="carousel/bootstrap.min.js"></script>                   

                    <script>
                        $('#myCarousel').carousel({
                          interval: 3000
                        });
                    
                        // handles the carousel thumbnails
                        $('[id^=carousel-selector-]').hover(function() {
                          var id_selector = $(this).attr("id");
                          //console.log(id_selector);
                          var id = id_selector.substr(id_selector.length - 1);
                          //console.log(id);
                          id = parseInt(id);
                          $('#myCarousel').carousel(id - 1);
                          $('[id^=carousel-selector-]').removeClass('selected');
                          $(this).addClass('selected');
                          //console.log(this);
                        });
                    
                        // when the carousel slides, auto update
                        $('#myCarousel').on('slid.bs.carousel', function(e) {
                          var id = $('.item.active').data('slide-number');
                          id = parseInt(id);
                          $('[id^=carousel-selector-]').removeClass('selected');
                          $('[id=carousel-selector-' + id + ']').addClass('selected');
                        });
                    </script>
                    
                    





                    <div class="well col-md-6 col-sm-10 " embed-responsive embed-responsive-4by3" align="center">
                       
                       <?php                          
                            $url = trim($arrtour[0]['video_link']);//'https://www.youtube.com/watch?v=qfUcKIfTtwM';
							if(strlen($url)>0)
							{
                            if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match))
                            {
                                $id = $match[1];
                            
                         /*   $width = '100%';
                            $height = '270px'; */
                             ?>
<style>
.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
</style>
<div class='embed-container'>
                             <iframe class="embed-responsive-item" id="ytplayer" type="text/html" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                            frameborder="0" allowfullscreen></iframe> 
                           <?php
							}
							}
                          
							?>         
                       </div>
                      <!--Carosel-->
                      
                      </div>

                     
                    
                    
                    
                    <div class="col-md-6 col-sm-12 tourinside">
                      
                      
                       <!--Book-->
                <div class="text-center"style="margin:0 auto;font-size:2em;padding-top:10px;">
                        <form action="" method="get"> 
                         <b>$<?=$arrtour[0]['cost']?></b> <br>
                         <input type="hidden" name="excursion_zone" value="<?=$_REQUEST['excursion_zone']?>">
                         <input type="hidden" name="excursion_city" value="<?=$_REQUEST['excursion_city']?>">
                         <input type="hidden" name="cost" value="<?=$arrtour[0]['cost']?>">
                         <input type="hidden" name="cmd" value="tour_booking_editor">
                         <input type="submit" class="text-center hvr-bubble-float-left" value="Book Now" style="padding:10px 55px;margin:20px auto;color:#ffffff;background-color:#68a400;">
                        </form> 
                 </div>    
                      <!--Book/-->
                     <p class="text-center"> <?=$_REQUEST['excursion_zone']?> - <?=$_REQUEST['excursion_city']?></p>
                     <div class="col-md-6 col-sm-6 tour-des">
                        <h3>About this Tour</h3>
                        <?=$arrtour[0]['description']?>
                      
                      </div>
                      
                      <div class="col-md-6 col-sm-6">
                          <b>Meeting point</b> <br>
                          <?=$arrtour[0]['meeting_point']?>
                          <b>Included in the tour</b> <br>
                          <?=$arrtour[0]['included_in_tour']?>
                          <b>what to bring</b> <br>
                          <?=$arrtour[0]['what_to_bring']?>
                          <b>Days the tour runs</b> <br>
                          <?=$arrtour[0]['days_the_tour_runs']?> <br>
                          <b>Additional information</b> <br>
                          <?=$arrtour[0]['additional_information']?> <br>
                                      
                   </div>
                    </div>
                    
                    
                    <div class="col-md-12 tab-style-1">
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab-1" data-toggle="tab">Reviews</a></li>
                          <li><a href="#tab-2" data-toggle="tab">Add Review</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane row fade in active" id="tab-1">
                          </div>
                          <div class="tab-pane row fade" id="tab-2">
                              <form name="frm_tour_reviews" method="get"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
                                             <tr>
                                                 <td>Name</td>
                                                 <td>
                                                    <input type="text" name="name" id="name"  value="<?=$name?>" class="textbox">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Email</td>
                                                 <td>
                                                    <input type="text" name="email" id="email"  value="<?=$email?>" class="textbox">
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td valign="top">Feedback</td>
                                                 <td>
                                                    <textarea name="feedback" id="feedback"  class="textbox" style="width:200px;height:100px;"><?=$feedback?></textarea>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>Service Rating</td>
                                                 <td><?php
                                                        $enumtour_reviews = getEnumFieldValues('tour_reviews','service_rating');
                                                    ?>
                                                    <select  name="service_rating" id="service_rating"   class="textbox">
                                                    <?php
                                                       foreach($enumtour_reviews as $key=>$value)
                                                       { 
                                                    ?>
                                                      <option value="<?=$value?>" <?php if($value==$service_rating){ echo "selected"; }?>><?=$value?></option>
                                                     <?php
                                                      }
                                                    ?> 
                                                    </select></td>
                                          </tr>
                                          <tr> 
                                             <td align="right"></td>
                                             <td>
                                                <input type="hidden" name="cmd" value="add_review">
                                                <input type="hidden" name="tour_id" value="<?=$arrtour[0]['id']?>">			
                                                <input type="submit" name="btn_submit" id="btn_submit" value="submit" class="button_blue">
                                             </td>     
                                          </tr>
										</table>
										</div>
										</div>
								</form>
                          
                          </div>
                        </div>
                    
                    </div>
                    <?php
					   }
					   else
					   {
					?>  
                     <div class="col-md-12 col-sm-12">
                      <h3> No data available </h3>
                     </div>
                    <?php
					   }
					?> 
                  </div>
                </div>
                <!-- END LEFT SIDEBAR -->
                         
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
          
          
    
    
    <!-- BEGIN ramy CONTENT -->
    
    
    
      <div class="container toursec" >
      
                       <div style="border-bottom:3px solid #e64f00;margin:15px;"><span style="background-color:#e64f00;color:#ffffff;padding:15px;font-size:1.7em;">Similar Mores</span></div>     
       <?php
		    if($arrtour[0]['id']>0)
			{
		  ?> 
       <div class="row">
             <div class="pro-outer" >

                                <?php
                                  
									$whrstr = "AND excursion_zone='".$_REQUEST['excursion_zone']."' 
					                       AND excursion_city='".$_REQUEST['excursion_city']."'";
                                      
                                    $info["table"] = "tour";
                                    $info["fields"] = array("tour.*"); 
                                    $info["where"]   = "1   $whrstr  AND id NOT IN (".$arrtour[0]['id'].")  ORDER BY id DESC";
                                                        
                                    
                                    $arr =  $db->select($info);
                                    
                                    for($i=0;$i<count($arr);$i++)
                                    {
                                    
                                       $rowColor;
                            
                                        if($i % 2 == 0)
                                        {
                                            
                                            $row="#C8C8C8";
                                        }
                                        else
                                        {
                                            
                                            $row="#FFFFFF";
                                        }
                                    
                             ?>
                             
                             <style> 
                             .tourhead{background-color:#e64f00;
    padding: 15px;
    border-radius: 10px;
    margin-top: -50px;
    color: #ffffff;
    font-weight: 500;
	box-shadow:10px 10px 5px #D1CECE ;}
                             .tourhead .fa-globe {padding-right: 10px;font-size: 2em;}
							 .pro:hover{
								 background-color:#F1F1F1 ;
							 }
							 .pro {
							 transition:all ease-in-out 1s;
							 margin-bottom:15px;position:relative;padding-top:15px ;padding-bottom:15px ;height:400px;
							 border-bottom: 2px solid #F1F1F1;}
							 .pro img {
								 transition:all ease-in-out 1s;width:100%;ovelflow:hidden;border-radius:5px !important;margin-bottom:10px;border-bottom:2px solid #68a400 ;height:60%;}
							 .pro img:hover {
								 transform: scale(1.1) rotate(4deg);
								 }
								 .hvr-bubble-float-bottom::before {border-color:#68a400 transparent transparent transparent;}
								 .hvr-bubble-top::before {border-color: transparent transparent #68a400 transparent;
}
.tourzone {background-color:#68a400;position:absolute;top:21px;left:15px; border-radius:10px !important;padding:10px;transition:all ease-in-out 1s;}
.tourcost {font-size:18px;font-weight:bold;position:absolute;bottom:15px;}
.tourdes {height:70px;overflow:hidden;}
                             </style>
                             
                                             <div class="pro col-lg-3 col-sm-6 col-xs-12" >
                                           

                                 <img src="<?=$arr[$i]['file_picture']?>"  class="thumbnail" align="left" <!--style="width:200px"-->
                               <span class="label label-important hvr-bubble-float-bottom tourzone"  > <?=$arr[$i]['excursion_zone']?></span><br>
                                 <p style="color:#68a400;font-weight:bold;padding-top:15px !important;">  <?=$arr[$i]['excursion_city']?></p>
                                <div class="tourdes"> <p> <?=$arr[$i]['description']?></p></div>
                        
                                  
                                  
                                 <span class="tourcost"><?=$arr[$i]['cost']?></span>
                                  
                                  <span>
                                      <a class="label label-important hvr-bubble-top" style="background-color:#68a400;float:right;position:absolute;top:50%;right:15px;border-radius:10px !important;padding:10px;transition:all ease-in-out 1s;" href="tour.php?excursion_zone=<?=$arr[$i]['excursion_zone']?>&excursion_city=<?=$arr[$i]['excursion_city']?>&id=<?=$arr[$i]['id']?>&cmd=tour"  ><span class="btn-label"><i class="fa fa-search"></i></span> Detail</a>
                                 </span>
                           </div>
                              
                            <?php
                                      }
                            ?>
                            
                  
               
             </div>        <!-- END pro -->

       </div>        <!-- END row -->

        <?php
				  }
		?>
    
    </div>
    
    
  
    </div>
    
    </div>
    
    
    <?php
	  include("template/footer.php");
	?>
   