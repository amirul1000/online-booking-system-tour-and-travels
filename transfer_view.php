
    <?php
	  include("template/header.php");
	?>
   
   
   <style> 
                             .trans-page .tourhead{background-color:#e64f00;
    padding: 15px;
    border-radius: 10px;
    margin-top: -50px;
    color: #ffffff;
    font-weight: 500;
	box-shadow:10px 10px 5px #D1CECE ;}
                             .trans-page .tourhead .fa-globe {padding-right: 10px;font-size: 2em;}
							 .trans-page .pro:hover{
								 background-color:#F1F1F1 ;
							 }
							 .trans-page .pro {
							 transition:all ease-in-out 1s;
							 margin-bottom:15px;position:relative;padding-top:15px ;padding-bottom:15px ;height:400px;
							 border-bottom: 2px solid #F1F1F1;}
							 .trans-page .pro img {
								 transition:all ease-in-out 1s;width:100%;ovelflow:hidden;border-radius:5px !important;margin-bottom:10px;border-bottom:2px solid #68a400 ;height:60%;}
							 .trans-page.pro img:hover {
								 transform: scale(1.1) rotate(4deg);
								 }
								 .trans-page .hvr-bubble-float-bottom::before {border-color:#68a400 transparent transparent transparent;}
								 .trans-page .hvr-bubble-top::before {border-color: transparent transparent #68a400 transparent;
}
.trans-page .pro .tourcity {color:#68a400;font-weight:bold;padding-top:15px !important;}
								 .pro .tourcity i {padding:5px;}
.trans-page .tourzone {background-color:#68a400;position:absolute;top:21px;left:15px; border-radius:10px !important;padding:10px;transition:all ease-in-out 1s;}
.trans-page .tourcost {font-size:18px;font-weight:bold;position:absolute;bottom:15px;}
.trans-page .tourdes {height:70px;overflow:hidden;}

.trans-page h3.caption {border-bottom:3px solid #e64f00;padding: 10px;position:relative;}
.trans-page h3.caption::after {
      content: "";
    width: 0;
    height: 0;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-bottom: 8px solid #e64f00;
    position: absolute;
    top: calc(100% - 8px);
    left: calc(50% - 8px);}
	
	.trans-page .trans-type {width:100%;background-color:#e64f00;padding:10px;font-size:1.5em;border-bottom:3px solid #0CF;color:#ffffff;
	position:relative;}
	.trans-page .trans-type::after{
		content: "";
    width: 0;
    height: 0;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-top: 8px solid #0CF;
    position: absolute;
    top: calc(100% + 3px);
    left: calc(50% - 8px);}
	.trans-page .trans-img {height:300px;position:relative; }
	.trans-page .trans-img img {height:200px;width:100%;}
	
	.trans-page .tras-price {font-size:1.3em;padding-top:20px;}
	
	.trans-page .book-btn {    position: absolute;
    top: calc(100% - 70px);
    left: calc(50% - 65px);
    display: block;
    padding: 15px;
    font-size: 1.3em;
    font-weight: bold;
	background-color:#68a400;color:#ffffff;
	transition:all ease-in-out 1s;
	background: url(http://www.mydominicantransfers.com/images/input_button_bg.jpg) repeat;
    border-radius: 15px !important;}
	
	.trans-page .search-btn {padding: 15px;
    font-size: 1.3em;
    font-weight: bold;
	background-color:#0CF;color:#ffffff;
	transition:all ease-in-out 1s;
	border-radius: 15px !important;}
	
	.trans-page .book-btn:hover{background-color:#0CF}
	.trans-page select.form-control {border-radius: 10px !important;
    padding: 7px 15px;
    margin: 15px 10px;}
	.trans-page .fa-map-marker {font-size:28px;padding-right:7px;color:#0CF}
                             </style>
   
   
   
   
   
   
   
   
   <div class="main trans-page">
      <div class="container">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Travel</h1>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                
                      <?php
						 unset($info);
						$info["table"] = "airport";
						$info["fields"] = array("airport.*"); 
						$info["where"]   = "1 ORDER BY airport_name ASC";
						$arrairport =  $db->select($info);
						
						 unset($info);
						$info["table"] = "city";
						$info["fields"] = array("city.*"); 
						$info["where"]   = "1 ORDER BY city_name ASC";
						$arrcity =  $db->select($info);
						
						 unset($info);
						$info["table"] = "transfer_type";
						$info["fields"] = array("transfer_type.*"); 
						$info["where"]   = "1 ORDER BY transfer_name ASC";
						$arrtransfer =  $db->select($info);
						
					 ?>
                      <div class="col-md-12 col-sm-12">
                        <form action="transfer.php" method="get">
                        <div class="col-md-4 col-sm-4">
                         <div class="form-group">
                             <i class="fa fa-map-marker"></i> 
                             <label><b>Leaving from:</b></label><br>
                             <select name="source" id="source" class="form-control">
                                <option selected="" value="">Select Airport or City</option>
                                <optgroup label="Airports">
                                  <?php
                                    for($i=0;$i<count($arrairport);$i++)
                                      {
                                  ?>
                                    <option value="<?=$arrairport[$i]['airport_name']?>" <?php if($arrairport[$i]['airport_name']==$_REQUEST['source']){ echo "selected"; }?>><?=$arrairport[$i]['airport_name']?></option>
                                  <?php
                                      }
                                  ?>	  
                                </optgroup>
                                <optgroup label="Cities">
                                    <?php
                                    for($i=0;$i<count($arrcity);$i++)
                                      {
                                  ?>
                                    <option value="<?=$arrcity[$i]['city_name']?>" <?php if($arrairport[$i]['city_name']==$_REQUEST['source']){ echo "selected"; }?>><?=$arrcity[$i]['city_name']?></option>
                                  <?php
                                      }
                                  ?>	  
                                </optgroup>
                             </select>
                         </div>
                        </div> 
                        <div class="col-md-4 col-sm-4">
                         <div class="form-group">   
                             <i class="fa fa-map-marker"></i> 
                             <label><b> Going To: </b></label><br>
                             <select  name="destination" id="destination" class="form-control">
                             <option selected="" value="">Select Airport or City </option>
                                <optgroup label="Airports">
                                  <?php
                                    for($i=0;$i<count($arrairport);$i++)
                                      {
                                  ?>
                                    <option value="<?=$arrairport[$i]['airport_name']?>" <?php if($arrairport[$i]['airport_name']==$_REQUEST['destination']){ echo "selected"; }?>><?=$arrairport[$i]['airport_name']?></option>
                                  <?php
                                      }
                                  ?>	  
                                </optgroup>
                                <optgroup label="Cities">
                                    <?php
                                    for($i=0;$i<count($arrcity);$i++)
                                      {
                                  ?>
                                    <option value="<?=$arrcity[$i]['city_name']?>" <?php if($arrairport[$i]['city_name']==$_REQUEST['destination']){ echo "selected"; }?>><?=$arrcity[$i]['city_name']?></option>
                                  <?php
                                      }
                                  ?>	  
                                </optgroup>
                             </select>
                         </div> 
                        </div> 
                        <div class="col-md-4 col-sm-4" style="top:23px;">
                          <div class="form-group" >   
                          <input type="hidden" name="transfer_type" value="<?=$_REQUEST['transfer_type']?>"> 
                          <input type="hidden" name="passengers" value="<?=$_REQUEST['passengers']?>">
                          <input type="submit" class="search-btn" value="search">
                          </div>
                        </div>
                        </form>
                      </div>
                    
                      <div class="col-md-12 col-sm-12">
                        <div class="col-md-4 col-sm-4">
                       <label><b> FROM :</b></label>
                              <h3 class="caption" style="color:#0CF"><b><?=$_REQUEST['source']?></b></h3>
                        </div> 
                        <div class="col-md-4 col-sm-4 " >
                          <i class="fa fa-arrow-right transicon" aria-hidden="true"></i>
                          <i class="fa fa-arrow-right transicon" aria-hidden="true"></i>
                          <i class="fa fa-arrow-right transicon" aria-hidden="true"></i>

                        </div>
                        <div class="col-md-4 col-sm-4">
                        <label><b>TO : </b></label>
                          <h3 class="caption" style="color:#0CF"><b><?=$_REQUEST['destination']?></b></h3>
                        </div>
                      </div> 
                      
                      <?php
					    if(!empty($_REQUEST['id']))
						{
						  $whrstr = " AND id='".$_REQUEST['id']."'";  	
						}
						else
						{
					      $whrstr = " AND source='".$_REQUEST['source']."' 
						                      AND destination='".$_REQUEST['destination']."'";
							if(!empty($_REQUEST['transfer_type']))
						      {
								$whrstr .= " AND transfer_type='".$_REQUEST['transfer_type']."'";  				  
							  }			  
						}
					     unset($info);
					    $info["table"] = "transfer";
						$info["fields"] = array("transfer.*"); 
						$info["where"]   = "1 $whrstr";
						$arrtransfer =  $db->select($info);
						
						
						//////////////////SESSION//////////////
						$_SESSION['users_id'] = $arrtransfer[0]['users_id'];
						$_SESSION['transfer_id'] = $arrtransfer[0]['id'];
						
						$info["table"] = "payment_method";
						$info["fields"] = array("payment_method.*"); 
						$info["where"]   = "1  AND users_id='".$_SESSION['users_id']."'";
						$arr =  $db->select($info);
						$_SESSION['paypalid']= $arr[0]['paypalid'];
						
						
					  ?> 
                      <div class="col-md-12 col-sm-12">
                         <br><br>
                      </div>
                      <?php
					    if(count($arrtransfer)>0)
						{
					  ?>
                      <div class="col-md-12 col-sm-12">
                         <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 trans-img">
                             <?php
							    $info["table"] = "transfer_type";
								$info["fields"] = array("transfer_type.*"); 
								$info["where"]   = "1  AND transfer_name='".$arrtransfer[0]['transfer_type']."'";
								$arrtransferpic =  $db->select($info);
							   ?>
                               <p class="trans-type"><!--Transfer type :--> <?=$arrtransfer[0]['transfer_type']?></p> 
                              <img src="<?=$arrtransferpic[0]['file_picture']?>" > <br>
                           
                              
						                         
                         </div>
                         <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 trans-img">
                          <form action="" method="get"> 
                           <p class="trans-type">One way : </p> 
						   <p class="tras-price text-center">$<?=$arrtransfer[0]['one_way_cost']?></p> <br>
                           <input type="hidden" name="source" value="<?=$arrtransfer[0]['source']?>">
                           <input type="hidden" name="destination" value="<?=$arrtransfer[0]['destination']?>">
                           <input type="hidden" name="transfer_type" value="<?=$_SESSION['transfer_type']?>">
                           <input type="hidden" name="passengers" value="<?=$_SESSION['passengers']?>">
                            <input type="hidden" name="way" value="one_way">
                           <input type="hidden" name="cost" value="<?=$arrtransfer[0]['one_way_cost']?>">
                           <input type="hidden" name="cmd" value="transfer_booking_editor">
                           <input type="submit" class="book-btn hvr-bubble-float-bottom" value="Book Now">
                          </form> 
                         </div>
                         <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 trans-img" >
                           <form action="" method="get"> 
                           <p class="trans-type">Round trip cost : </p> 
                          <p class="tras-price text-center">$<?=$arrtransfer[0]['round_trip_cost']?></p>
                            <input type="hidden" name="source" value="<?=$arrtransfer[0]['source']?>">
                           <input type="hidden" name="destination" value="<?=$arrtransfer[0]['destination']?>">
                           <input type="hidden" name="transfer_type" value="<?=$arrtransfer[0]['transfer_type']?>">
                           <input type="hidden" name="passengers" value="<?=$_SESSION['passengers']?>">
                            <input type="hidden" name="way" value="round_trip">
                           <input type="hidden" name="cost" value="<?=$arrtransfer[0]['round_trip_cost']?>">
                           <input type="hidden" name="cmd" value="transfer_booking_editor">
                            <input type="submit" class="book-btn hvr-bubble-float-bottom" value="Book Now" >
                          </form> 
                         </div>
                         <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 trans-img">
                           <p class="trans-type">Driving time :</p><p class="tras-price text-center"><?=$arrtransfer[0]['driving_time']?> min</p>
                           
                           <br>
                           <a href="#product-pop-up" class="btn btn-default fancybox-fast-view book-btn " style="background: url(http://www.mydominicantransfers.com/images/input_button_bg.jpg) repeat !important;">View</a>
                           
                           <div id="product-pop-up" style="display: none;width: 851px; height: 481px;overflow:hidden;">
                                    <div class="product-page product-pop-up">
                                      <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12" align="center">
                                        
                                        <iframe src="map.php?lat=<?=$arrtransfer[0]['lat']?>&lng=<?=$arrtransfer[0]['lng']?>&source=<?=$arrtransfer[0]['source']?>&destination=<?=$arrtransfer[0]['destination']?>" style="width:850px;height:480px;overflow:hidden;border:none;" scrolling="no"></iframe>
                                          
                                        </div>
                                        <div class="sticker sticker-sale"></div>
                                      </div>
                                    </div>
                          </div>
                           
                           
                           <!--<a href="http://maps.google.com/maps?&z=8&mrt=yp&q=<?=$arrtransfer[0]['lat']?>+<?=$arrtransfer[0]['lng']?>" target="_blank">View on Map</a>-->
                         </div>
                      </div>
                      <?php
						}
						else
						{
					  ?>
                      <div class="col-md-12 col-sm-12" align="center">
                          <h3>No data available</h3>
                      </div>
                      <?php
						}
					  ?>	
                       
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
          <?php
		    //if($arrtransfer[0]['id']>0)
			//{
		  ?> 
         
          <?php
			//}
		  ?>	
        
        <!-- END SIDEBAR & CONTENT -->
      </div>
      
      
            <!-- start similar more by ramy -->

        <div class="container toursec" >
      
                       <div style="border-bottom:3px solid #e64f00;margin:15px;"><span style="background-color:#e64f00;color:#ffffff;padding:15px;font-size:1.7em;">Similar Mores</span></div>     

       <div class="row">
             <div class="pro-outer" >

                                <?php
						        
							    $whrstr = " AND source='".$_REQUEST['source']."' 
						                      AND destination='".$_REQUEST['destination']."'
											  AND transfer_type='".$_REQUEST['transfer_type']."'"; 		
						 
										unset($info);
								$info["table"] = "transfer";
								$info["fields"] = array("transfer.*"); 
								$info["where"]   = "1 $whrstr";
								$arrtransfer =  $db->select($info);
								if(count($arrtransfer)==0)
								{
									  $whrstr = " AND source='".$_REQUEST['source']."' 
						                      AND destination='".$_REQUEST['destination']."'";
								}
								else
								{
								      $whrstr = " AND source='".$_REQUEST['source']."' 
						                      AND destination='".$_REQUEST['destination']."'
											  AND transfer_type='".$_REQUEST['transfer_type']."'"; 		
								}
								
								if($arrtransfer[0]['id']>0)
			                     {
							     	$whrstr .= " AND id NOT IN (".$arrtransfer[0]['id'].")";
								 }
						 	  
								$info["table"] = "transfer";
								$info["fields"] = array("transfer.*"); 
								$info["where"]   = "1   $whrstr  ORDER BY id DESC";
													
								
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
                             
                             
                             
                                             <div class="pro col-lg-3 col-sm-6 col-xs-12" >
                                          <?php
									$info["table"] = "transfer_type";
									$info["fields"] = array("transfer_type.*"); 
									$info["where"]   = "1  AND transfer_name='".$arr[$i]['transfer_type']."'";
									$arrtransferpic =  $db->select($info);
								   ?>
                                    
                                    
                                 <img src="<?=$arrtransferpic[0]['file_picture']?>"  class="thumbnail" align="left" <!--style="width:200px"-->
                     <span class="label label-important hvr-bubble-float-bottom tourzone"  > <?=$arr[$i]['transfer_type']?></span><br>
                     <p style="color:#68a400;font-weight:bold;padding-top:15px !important;">  <?=$arr[$i]['excursion_city']?></p>
                     
                                <div class="tourdes"> <p> <?=$arr[$i]['description']?></p></div>
                        
                                  <p class="tourcity" >  <?=$arr[$i]['source']?><br>
                 TO<i class="fa fa-arrow-circle-right" aria-hidden="true"></i><?=$arr[$i]['destination']?></p>
                                  
                                 <span class="tourcost"><?=$arr[$i]['cost']?></span>
                                  
                                  <span>
                                      <a class="label label-important hvr-bubble-top" style="background-color:#68a400;float:right;position:absolute;top:50%;right:15px;border-radius:10px !important;padding:10px;transition:all ease-in-out 1s;" href="transfer.php?source=<?=$arr[$i]['source']?>&destination=<?=$arr[$i]['destination']?>&transfer_type=<?=$arr[$i]['transfer_type']?>&passengers=1&id=<?=$arr[$i]['id']?>cmd=transfer"  ><span class="btn-label"><i class="fa fa-search"></i></span> Detail</a>
                                 </span>
                           </div>
                              
                            <?php
                                      }
                            ?>
                            
                  
               
             </div>        <!-- END pro -->

       </div>        <!-- END row -->

    
    
    </div>
    
      <!-- END similar more by ramy -->
      
    </div>
    
    <?php
	  include("template/footer.php");
	?>
   