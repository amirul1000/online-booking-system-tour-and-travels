<?php
 include("../template/header.php");
 include("tinymce.php");
?>
<script language="javascript" src="transfer.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">

<a href="index.php?cmd=list" class="btn green">List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","transfer"))?></b>
          </div>
          <div class="tools">
              <a href="javascript:;" class="reload"></a>
              <a href="javascript:;" class="remove"></a>
          </div>
      </div>
	   <div class="portlet-body">
		         <div class="table-responsive">
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
	               <table class="table">
                        <tr>
                              <td>  
                        
                                 <form name="frm_transfer" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
                                  <div class="portlet-body">
                                   <div class="table-responsive">	
                                     <table class="table">
                                         <!--<tr>
                                             <td>Users (Agent)</td>
                                             <td><?php
													$info['table']    = "users";
													$info['fields']   = array("*");   	   
													$info['where']    =  "1=1 ORDER BY id DESC";
													$resusers  =  $db->select($info);
												?>
												<select  name="users_id" id="users_id"   class="textbox">
													<option value="">--Select--</option>
													<?php
													   foreach($resusers as $key=>$each)
													   { 
													?>
													  <option value="<?=$resusers[$key]['id']?>" <?php if($resusers[$key]['id']==$users_id){ echo "selected"; }?>><?=$resusers[$key]['first_name']?> <?=$resusers[$key]['last_name']?></option>
													<?php
													 }
													?> 
												</select>
                                                </td>
                                         </tr>-->
                                         <tr>
                                             <td>Source</td>
                                             <td>
                                                 <select name="source" id="source" class="form-control" style="width:300px;">
                                                    <option selected="" value="">Select Airport or City</option>
                                                    <optgroup label="Airports">
                                                      <?php
                                                        for($i=0;$i<count($arrairport);$i++)
                                                          {
                                                      ?>
                                                        <option value="<?=$arrairport[$i]['airport_name']?>"  <?php if($arrairport[$i]['airport_name']==$source){ echo "selected"; }?>><?=$arrairport[$i]['airport_name']?></option>
                                                      <?php
                                                          }
                                                      ?>	  
                                                    </optgroup>
                                                    <optgroup label="Cities">
                                                        <?php
                                                        for($i=0;$i<count($arrcity);$i++)
                                                          {
                                                      ?>
                                                        <option value="<?=$arrcity[$i]['city_name']?>"   <?php if($arrairport[$i]['city_name']==$source){ echo "selected"; }?>><?=$arrcity[$i]['city_name']?></option>
                                                      <?php
                                                          }
                                                      ?>	  
                                                    </optgroup>
                                                 </select>
                                             </td>
                                            </tr>
                                            <tr>
                                             <td>Destination</td>
                                             <td>
                                                <select  name="destination" id="destination" class="form-control" style="width:300px;"  onchange="codeAddress();">
                                                 <option selected="" value="">Select Airport or City </option>
                                                    <optgroup label="Airports">
                                                      <?php
                                                        for($i=0;$i<count($arrairport);$i++)
                                                          {
                                                      ?>
                                                        <option value="<?=$arrairport[$i]['airport_name']?>"   <?php if($arrairport[$i]['airport_name']==$destination){ echo "selected"; }?>><?=$arrairport[$i]['airport_name']?></option>
                                                      <?php
                                                          }
                                                      ?>	  
                                                    </optgroup>
                                                    <optgroup label="Cities">
                                                        <?php
                                                        for($i=0;$i<count($arrcity);$i++)
                                                          {
                                                      ?>
                                                        <option value="<?=$arrcity[$i]['city_name']?>"  <?php if($arrcity[$i]['city_name']==$destination){ echo "selected"; }?>><?=$arrcity[$i]['city_name']?></option>
                                                      <?php
                                                          }
                                                      ?>	  
                                                    </optgroup>
                                                 </select>
                                             </td>
                                            </tr>
                                            <tr>
                                             <td>Transfer Type</td>
                                             <td>
                                                <select name="transfer_type" id="transfer_type" class="form-control" style="width:300px;">
                                                <option value="">Select Transfer Type</option>
                                                 <?php
                                                    for($i=0;$i<count($arrtransfer);$i++)
                                                      {
                                                  ?>
                                                    <option value="<?=$arrtransfer[$i]['transfer_name']?>"   <?php if($arrtransfer[$i]['transfer_name']==$transfer_type){ echo "selected"; }?>><?=$arrtransfer[$i]['transfer_name']?></option>
                                                  <?php
                                                      }
                                                  ?>	  
                                               </select> 
                                             </td>
                                            </tr>
                                            <tr>
                                             <td>Driving Time</td>
                                             <td>
                                                <input type="text" name="driving_time" id="driving_time"  value="<?=$driving_time?>" class="textbox">
                                             </td>
                                            </tr>
                                            <tr>
                                             <td>One Way Cost</td>
                                             <td>
                                                <input type="text" name="one_way_cost" id="one_way_cost"  value="<?=$one_way_cost?>" class="textbox">
                                             </td>
                                            </tr>
                                            <tr>
                                             <td>Round Trip Cost</td>
                                             <td>
                                                <input type="text" name="round_trip_cost" id="round_trip_cost"  value="<?=$round_trip_cost?>" class="textbox">
                                             </td>
                                            </tr>
                                            <tr>
                                                 <td>Default Location</td>
                                                 <td>
                                                     <!--Google Map-->
                                                    <link
                                                        href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css"
                                                        rel="stylesheet" type="text/css" />
                                                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcrswHj0tzu7lYsDwFyaxwe3I1zRLIDZQ&callback=initMap" async defer></script>
                                                     <!--<script src="//maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script> -->		
                                                    <script type="text/javascript">
                                                    //clear
                                                     var markersArray = [];
                                                     function clearOverlays() {
                                                          for (var i = 0; i < markersArray.length; i++ ) {
                                                            markersArray[i].setMap(null);
                                                          }
                                                        }
                                                    //lat lng		
                                                      var lat = '<?php echo isset($lat)?$lat:38.41055825094609;?>';
                                                      var lng = '<?php echo isset($lng)?$lng:-4.482421875;?>';
                                                      var geocoder;
                                                      var map;
                                                      function initialize() {
                                                        geocoder = new google.maps.Geocoder();
                                                        var latlng = new google.maps.LatLng(lat,lng);
                                                        var myOptions = {
                                                          zoom: 8,
                                                          center: latlng,
                                                          mapTypeId: google.maps.MapTypeId.ROADMAP
                                                        }
                                                        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                                                         //map.clearOverlays();	
                                                         placeMarker(latlng);
                                                        google.maps.event.addListener(map, 'click', function(event) {							   
                                                            placeMarker(event.latLng);
                                                          });
                                                      }
                                                    
                                                      function codeAddress() {
                                                        //clear
                                                        clearOverlays();
                                                           
                                                        var address = $("#destination").val();
                                                        geocoder.geocode( { 'address': address}, function(results, status) {
                                                                   
                                                          if (status == google.maps.GeocoderStatus.OK) {
                                                            map.setCenter(results[0].geometry.location);
                                                            var marker = new google.maps.Marker({
                                                                map: map, 
                                                                position: results[0].geometry.location
                                                            });
                                                            //store
                                                            markersArray.push(marker);
															
                                                            lat = marker.position.lat();
                                                            lng = marker.position.lng();
															
															 var latlng = new google.maps.LatLng(lat,lng);
		                           							 placeMarker(latlng); 
															
                                                            $("#lat").val(lat);
                                                            $("#lng").val(lng);		
                                                          } else {
                                                            //alert("Geocode was not successful for the following reason: " + status);
                                                          }
                                                        });									
                                                      }
                                                      
                                                      function placeMarker(location) {	
                                                            //clear
                                                            clearOverlays();
                                                                                                                               
                                                            lat = location.lat();        
                                                            lng = location.lng();
                                                            $("#lat").val(lat);
                                                            $("#lng").val(lng);										
                                                          var marker = new google.maps.Marker({
                                                              position: location, 
                                                              map: map
                                                          });
                                                        //store
                                                         markersArray.push(marker);
                                                        
                                                          map.setCenter(location);
                                                        }
                                                    </script>
                                                    <div class="form-group">
                                                        <body onLoad="initialize()">
                                                            <div id="map_canvas" style="width: 800px; height: 600px; margin:10px 0px 10px 0px;"></div>
                                                        </body>
                                                    </div>
                                                 </td>
                                            </tr>
                                            <tr>
                                             <td>Lat</td>
                                             <td>
                                                <input type="text" name="lat" id="lat"  value="<?=$lat?>" class="textbox">
                                             </td>
                                            </tr>
                                            <tr>
                                             <td>Lng</td>
                                             <td>
                                                <input type="text" name="lng" id="lng"  value="<?=$lng?>" class="textbox">
                                             </td>
                                            </tr>
                                            <tr>
                                             <td valign="top">Description</td>
                                             <td>
                                                <textarea name="description" id="description"  class="textbox" style="width:200px;height:100px;"><?=$description?></textarea>
                                             </td>
                                            </tr>
                                            <tr>
                                             <td>Status</td>
                                             <td><?php
                                                    $enumtransfer = getEnumFieldValues('transfer','status');
                                                ?>
                                                <select  name="status" id="status"   class="textbox">
                                                <?php
                                                   foreach($enumtransfer as $key=>$value)
                                                   { 
                                                ?>
                                                  <option value="<?=$value?>" <?php if($value==$status){ echo "selected"; }?>><?=$value?></option>
                                                 <?php
                                                  }
                                                ?> 
                                                </select>
                                                </td>
                                              </tr>
                                             <tr> 
                                                 <td align="right"></td>
                                                 <td>
                                                    <input type="hidden" name="cmd" value="add">
                                                    <input type="hidden" name="id" value="<?=$Id?>">			
                                                    <input type="submit" name="btn_submit" id="btn_submit" value="submit" class="button_blue">
                                                 </td>     
                                             </tr>
                                   </table>
                                 </div>
                                </div>
                            </form>
                          </td>
                         </tr>
                    </table>
			      </div>
			</div>
  </div>			
<?php
 include("../template/footer.php");
?>

