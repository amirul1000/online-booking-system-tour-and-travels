
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
                                                <form  method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr"> <!--https://www.paypal.com/cgi-bin/webscr-->
                                                <input class="wp_cart_checkout_button" type="image" alt="Make payments with PayPal - it's fast, free and secure!" name="submit" src="images/btn_xpressCheckout.gif">
                                                <input type="hidden" value="<?=$_SESSION['paypalid']?>" name="business">
                                                <input type="hidden" value="2" name="rm">
                                                <input type="hidden" value="<?=$excursion_zone?>-<?=$excursion_city?>" name="on0_1">
                                                <input type="hidden" value=" Date:<?=$excursion_date?> adults:<?=$no_of_adults?> children:<?=$no_of_children?>" name="on1_1">
                                                <input type="hidden" value="<?=$excursion_zone?>-<?=$excursion_city?>" name="item_name_1">
                                                <input type="hidden" value="<?=$_COOKIE['tour_booking']?>" name="item_number_1">
                                                <input type="hidden" value="<?=$total_price?>" name="amount_1">
                                                <input type="hidden" value="1" name="quantity_1">
                                                <input type="hidden" value="0" name="tax_1">
                                                <input type="hidden" value="0" name="shipping_1">
                                                <input type="hidden" value="USD" name="currency_code">
                                                <input type="hidden" value="_cart" name="cmd">
                                                <input type="hidden" value="1" name="upload">
                                                <input type="hidden" value="3FWGC6LFTMTUG" name="mrb">
                                                <input type="hidden" value="http://budgetsearchenginemarketing.com/tour.php?cmd=paypal_success" name="return">
                                                <input type="hidden" value="" name="shopping_url">
                                                <input type="hidden" value="http://budgetsearchenginemarketing.com/paypal_notify.php" name="notify_url">
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
        
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
    
    <?php
	  include("template/footer.php");
	?>
   