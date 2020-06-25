 <?php
	  include("template/header.php");
	?>
   <?php
      if(isset($_COOKIE['tour_booking'])) 
	  {
		$Id = $_COOKIE['tour_booking'];
		
		$info["table"] = "tour_booking";
		$info["fields"] = array("tour_booking.*"); 
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
            <h1>Tour</h1>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-12 col-sm-12">
                  <div class="row">
                  
                    
                    <div class="portlet box blue">
                    <div class="portlet-title">
                    <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","tour_booking"))?></b>
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
                                        </tr>
                                        <tr>
                                            <td>First Name</td>
                                            <td>
                                                <?=$first_name?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td>
                                               <?=$last_name?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Contact Number</td>
                                            <td>
                                               <?=$contact_number?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                              <?=$email?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td>
                                              *********
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Excursion Zone</td>
                                            <td>
                                              <?=$excursion_zone?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Excursion City</td>
                                            <td>
                                              <?=$excursion_city?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Excursion Date</td>
                                            <td>
                                              <?=$excursion_date?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No Of Adults</td>
                                            <td>
                                               <?=$no_of_adults?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>No Of Children</td>
                                            <td>
                                              <?=$no_of_children?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Price</td>
                                            <td>
                                              <?=$total_price?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top">Special Requests</td>
                                            <td>
                                              <?=$special_requests?>
                                            </td>
                                        </tr>
                                         <tr> 
                                             <td align="right"></td>
                                             <td>
                                               <form action="" method="post">
                                                    <input type="hidden" name="cmd" value="tour_print">
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
        