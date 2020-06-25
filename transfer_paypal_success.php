 <?php
	  include("template/header.php");
	?>
   <?php
      if(isset($_COOKIE['transfer_booking'])) 
	  {
		$Id = $_COOKIE['transfer_booking'];
		
		$info["table"] = "transfer_booking";
		$info["fields"] = array("transfer_booking.*"); 
		$info["where"]   = "1  AND id='".$Id."'";
		$arr =  $db->select($info);  
		foreach($arr[0] as $key=>$value)
		{
			 $$key = $value;
		}
	  }
   ?>
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

								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
                                         <td>Title</td>
                                         <td>
                                            <?=$title?>
                                         </td>
                                        </tr><tr>
                                         <td>First Name</td>
                                         <td>
                                            <?=$first_name?>
                                         </td>
                                        </tr><tr>
                                         <td>Last Name</td>
                                         <td>
                                             <?=$last_name?>
                                         </td>
                                        </tr><tr>
                                         <td>Contact Number</td>
                                         <td>
                                             <?=$contact_number?>
                                         </td>
                                        </tr><tr>
                                         <td>Email</td>
                                         <td>
                                            <?=$email?>
                                         </td>
                                        </tr><tr>
                                         <td>Password</td>
                                         <td>
                                            ************
                                         </td>
                                        </tr><tr>
                                         <td>Passengers</td>
                                         <td>
                                            <?=$passengers?> 
                                         </td>
                                        </tr><tr>
                                         <td>Baby Car Seat</td>
                                         <td> <?=$baby_car_seat?></td>
                                        </tr><tr>
                                         <td>Number Of Baby Car Seats</td>
                                         <td>
                                            <?=$number_of_baby_car_seats?>
                                         </td>
                                        </tr><tr>
                                         <td>From To</td>
                                         <td>
                                            <?=$from_to?>
                                         </td>
                                        </tr><tr>
                                         <td>Pick Up Location</td>
                                         <td>
                                            <?=$pick_up_location?>
                                         </td>
                                        </tr><tr>
                                         <td>Arrival Date</td>
                                         <td>
                                            <?=$arrival_date?>
                                         </td>
                                        </tr><tr>
                                         <td>Arrival Hr</td>
                                         <td>
                                            <?=$arrival_hr?>
                                         </td>
                                        </tr><tr>
                                         <td>Arrival Min</td>
                                         <td>
                                            <?=$arrival_min?>
                                         </td>
                                        </tr><tr>
                                         <td>Arrival Am Pm</td>
                                         <td><?=$arrival_am_pm?></td>
                                        </tr><tr>
                                         <td>Arrival Airline Company</td>
                                         <td>
                                            <?=$arrival_airline_company?>
                                         </td>
                                        </tr><tr>
                                         <td>Arrival Flight Number</td>
                                         <td>
                                            <?=$arrival_flight_number?>
                                         </td>
                                        </tr><tr>
                                         <td>Departure Date</td>
                                         <td>
                                            <?=$departure_date?>
                                         </td>
                                        </tr><tr>
                                         <td>Departure Hr</td>
                                         <td>
                                            <?=$departure_hr?>
                                         </td>
                                        </tr><tr>
                                         <td>Departure Min</td>
                                         <td>
                                            <?=$departure_min?>
                                         </td>
                                        </tr><tr>
                                         <td>Departure Am Pm</td>
                                         <td>
                                            <?=$departure_am_pm?>
                                         </td>
                                        </tr><tr>
                                         <td>Departure Airline Company</td>
                                         <td>
                                            <?=$departure_airline_company?>
                                         </td>
                                        </tr><tr>
                                         <td>Departure Flight Number</td>
                                         <td>
                                            <?=$departure_flight_number?>
                                         </td>
                                        </tr><tr>
                                         <td>Departure Pick Up Time</td>
                                         <td>
                                            <?=$departure_pick_up_time?>
                                         </td>
                                        </tr><tr>
                                         <td>Total Price</td>
                                         <td>
                                            <?php echo $total_price;?>
                                         </td>
                                        </tr><tr>
                                         <td valign="top">Special Requests</td>
                                         <td>
                                            <?=$special_requests?>
                                         </td>
                                        </tr>
                                         <tr> 
                                             <td align="right"></td>
                                             <td>
                                               <form action="" method="post">
                                                    <input type="hidden" name="cmd" value="transfer_print">
                                                    <input type="submit" name="btn_submit" id="btn_submit"  value="Print" class="button"/>
                                               </form> 
                                             </td>     
                                         </tr>
                                </table>
                                </div>
                                </div>
                      </td>
                     </tr>
                    </table>
                    </div>
                    </div>
                    </div>
                    
                    
                  </div>
                         
                </div>
                <!-- END LEFT SIDEBAR -->
                         
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        
    <?php
	  include("template/footer.php");
	?>
        