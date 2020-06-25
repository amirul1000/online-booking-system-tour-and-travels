
    <?php
	  include("template/header.php");
	?>
    
  <link rel="stylesheet" href="datepicker/jquery-ui.css">
  <script src="datepicker/jquery-1.10.2.js"></script>
  <script src="datepicker/jquery-ui.js"></script>
  
  <script language="javascript">
      function setTotalPrice()
	  {
		 no_of_adults    = $("#no_of_adults").val();  
		 no_of_children  = $("#no_of_children").val();
		 cost            = $("#cost").val();
		 
		 total_price = cost*no_of_adults+no_of_children*cost; 
		 
		 $("#total_price").val(total_price);  
	  }
  
  </script> 
   
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
                    
                         <form name="frm_tour_booking" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
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
                    <td>Excursion Zone</td>
                    <td>
                    <input type="text" name="excursion_zone" id="excursion_zone"  value="<?=$excursion_zone?>" class="textbox">
                    </td>
                    </tr><tr>
                    <td>Excursion City</td>
                    <td>
                    <input type="text" name="excursion_city" id="excursion_city"  value="<?=$excursion_city?>" class="textbox">
                    </td>
                    </tr><tr>
                    <td>Excursion Date</td>
                    <td>
                    <input type="text" name="excursion_date" id="excursion_date"  value="<?=$excursion_date?>" class="datepicker">
                    </td>
                    </tr><tr>
                    <td>No Of Adults</td>
                    <td>
                    <select type="text" name="no_of_adults" id="no_of_adults" onChange="setTotalPrice();">
                       <?php
					     for($i=1;$i<=20;$i++)
						 {
					   ?>
                         <option value="<?=$i?>"><?=$i?></option>
                       <?php
						 }
					   ?>
                    </select>
                    
                    </td>
                    </tr><tr>
                    <td>No Of Children</td>
                    <td>
                    <select type="text" name="no_of_children" id="no_of_children" onChange="setTotalPrice();">
                      <?php
					     for($i=0;$i<=20;$i++)
						 {
					   ?>
                         <option value="<?=$i?>"><?=$i?></option>
                       <?php
						 }
					   ?>
                    </select>
                    </td>
                    </tr><tr>
                    <td>Total Price</td>
                    <td>
                    <input type="text" name="total_price" id="total_price"  value="<?=$total_price?>" class="textbox">
                    </td>
                    </tr><tr>
                    <td valign="top">Special Requests</td>
                    <td>
                    <textarea name="special_requests" id="special_requests"  class="textbox" style="width:200px;height:100px;"><?=$special_requests?></textarea>
                    </td>
                    </tr>
                                 <tr> 
                                     <td align="right"></td>
                                     <td>
                                        <input type="hidden" name="cost" id="cost" value="<?=$_REQUEST['cost']?>">
                                        <input type="hidden" name="cmd" value="add_tour_booking">
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
   