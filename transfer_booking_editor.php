
    <?php
	  include("template/header.php");
	?>
    
  <link rel="stylesheet" href="datepicker/jquery-ui.css">
  <script src="datepicker/jquery-1.10.2.js"></script>
  <script src="datepicker/jquery-ui.js"></script>
  
  <script language="javascript">
      function setTotalPrice()
	  {
		 passengers    = $("#passengers").val();  
		 cost            = $("#cost").val();
		 
		 total_price = passengers*cost; 
		 
		 $("#total_price").val(total_price);  
	  }
  
  </script> 
   
   <div class="main">
      <div class="container">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>transfer</h1>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-12 col-sm-12">
                  <div class="row">
                  
                    
                    <div class="portlet box blue">
                    <div class="portlet-title">
                    <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","transfer_booking"))?></b>
                    </div>
                    <div class="tools">
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                    </div>
                    </div>
                    <div class="portlet-body">
                    <div class="table-responsive">	
                    <table class="table">
							 <tr>
							  <td>  

								 <form name="frm_transfer_booking" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
                                         <td>Title</td>
                                         <td>
                                            <input type="text" name="title" id="title"  value="<?=$title?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>First Name</td>
                                         <td>
                                            <input type="text" name="first_name" id="first_name"  value="<?=$first_name?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Last Name</td>
                                         <td>
                                            <input type="text" name="last_name" id="last_name"  value="<?=$last_name?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Contact Number</td>
                                         <td>
                                            <input type="text" name="contact_number" id="contact_number"  value="<?=$contact_number?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Email</td>
                                         <td>
                                            <input type="text" name="email" id="email"  value="<?=$email?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Password</td>
                                         <td>
                                            <input type="text" name="password" id="password"  value="<?=$password?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Passengers</td>
                                         <td>
                                            <select type="text" name="passengers" id="passengers" onChange="setTotalPrice();">
											  <?php
                                                 for($i=0;$i<=20;$i++)
                                                 {
                                               ?>
                                                 <option value="<?=$i?>" <?php if($i==$passengers){ echo "selected";} ?>><?=$i?></option>
                                               <?php
                                                 }
                                               ?>
                                            </select>
                                         </td>
                                        </tr><tr>
                                         <td>Baby Car Seat</td>
                                         <td><?php
                                                $enumtransfer_booking = getEnumFieldValues('transfer_booking','baby_car_seat');
                                            ?>
                                            <select  name="baby_car_seat" id="baby_car_seat"   class="textbox">
                                            <?php
                                               foreach($enumtransfer_booking as $key=>$value)
                                               { 
                                            ?>
                                              <option value="<?=$value?>" <?php if($value==$baby_car_seat){ echo "selected"; }?>><?=$value?></option>
                                             <?php
                                              }
                                            ?> 
                                            </select></td>
                                        </tr><tr>
                                         <td>Number Of Baby Car Seats</td>
                                         <td>
                                            <input type="text" name="number_of_baby_car_seats" id="number_of_baby_car_seats"  value="<?=$number_of_baby_car_seats?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>From To</td>
                                         <td>
                                            <input type="text" name="from_to" id="from_to"  value="<?=$source?>-<?=$destination?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Pick Up Location</td>
                                         <td>
                                            <input type="text" name="pick_up_location" id="pick_up_location"  value="<?=$pick_up_location?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Arrival Date</td>
                                         <td>
                                            <input type="text" name="arrival_date" id="arrival_date"  value="<?=$arrival_date?>" class="datepicker">
                                         </td>
                                        </tr><tr>
                                         <td>Arrival Hr</td>
                                         <td>
                                            <input type="text" name="arrival_hr" id="arrival_hr"  value="<?=$arrival_hr?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Arrival Min</td>
                                         <td>
                                            <input type="text" name="arrival_min" id="arrival_min"  value="<?=$arrival_min?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Arrival Am Pm</td>
                                         <td><?php
                                                $enumtransfer_booking = getEnumFieldValues('transfer_booking','arrival_am_pm');
                                            ?>
                                            <select  name="arrival_am_pm" id="arrival_am_pm"   class="textbox">
                                            <?php
                                               foreach($enumtransfer_booking as $key=>$value)
                                               { 
                                            ?>
                                              <option value="<?=$value?>" <?php if($value==$arrival_am_pm){ echo "selected"; }?>><?=$value?></option>
                                             <?php
                                              }
                                            ?> 
                                            </select></td>
                                        </tr><tr>
                                         <td>Arrival Airline Company</td>
                                         <td>
                                            <input type="text" name="arrival_airline_company" id="arrival_airline_company"  value="<?=$arrival_airline_company?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Arrival Flight Number</td>
                                         <td>
                                            <input type="text" name="arrival_flight_number" id="arrival_flight_number"  value="<?=$arrival_flight_number?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Departure Date</td>
                                         <td>
                                            <input type="text" name="departure_date" id="departure_date"  value="<?=$departure_date?>" class="datepicker">
                                         </td>
                                        </tr><tr>
                                         <td>Departure Hr</td>
                                         <td>
                                            <input type="text" name="departure_hr" id="departure_hr"  value="<?=$departure_hr?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Departure Min</td>
                                         <td>
                                            <input type="text" name="departure_min" id="departure_min"  value="<?=$departure_min?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Departure Am Pm</td>
                                         <td>
                                            <input type="text" name="departure_am_pm" id="departure_am_pm"  value="<?=$departure_am_pm?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Departure Airline Company</td>
                                         <td>
                                            <input type="text" name="departure_airline_company" id="departure_airline_company"  value="<?=$departure_airline_company?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Departure Flight Number</td>
                                         <td>
                                            <input type="text" name="departure_flight_number" id="departure_flight_number"  value="<?=$departure_flight_number?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Departure Pick Up Time</td>
                                         <td>
                                            <input type="text" name="departure_pick_up_time" id="departure_pick_up_time"  value="<?=$departure_pick_up_time?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td>Total Price</td>
                                         <td>
                                            <input type="text" name="total_price" id="total_price"  value="<?php echo $passengers*$cost;?>" class="textbox">
                                         </td>
                                        </tr><tr>
                                         <td valign="top">Special Requests</td>
                                         <td>
                                            <textarea name="special_requests" id="special_requests"  class="textbox" style="width:200px;height:100px;"><?=$special_requests?></textarea>
                                         </td>
                                        </tr>
											 <td align="right"></td>
											 <td>
                                                <input type="hidden" name="cost" id="cost" value="<?=$_REQUEST['cost']?>">
												<input type="hidden" name="cmd" value="add_transfer_booking">
												<input type="hidden" name="id" value="<?=$Id?>">			
												<input type="submit" name="btn_submit" id="btn_submit" value="submit" class="btn blue">
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
                     <script>
								$( ".datepicker" ).datepicker({
									dateFormat: "yy-mm-dd", 
									changeYear: true,
									changeMonth: true,
									showOn: 'button',
									buttonText: 'Show Date',
									buttonImageOnly: true,
									buttonImage: 'images/calendar.gif',
								});
					 </script>

                    
                    
                    
                  </div>
                         
                </div>
                <!-- END LEFT SIDEBAR -->
                         
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
    
    <?php
	  include("template/footer.php");
	?>
   