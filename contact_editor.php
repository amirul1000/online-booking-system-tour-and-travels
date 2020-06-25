
    <?php
	  include("template/header.php");
	?>
    
  <link rel="stylesheet" href="datepicker/jquery-ui.css">
  <script src="datepicker/jquery-1.10.2.js"></script>
  <script src="datepicker/jquery-ui.js"></script>
  
   
   <div class="main">
      <div class="container">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Contact</h1>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-12 col-sm-12">
                  <div class="row">
                  
                    
                    <div class="portlet box blue">
                    <div class="portlet-title">
                    <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","Contact Us"))?></b>
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
                                              <?php
											    if(isset($message))
												{
												  echo $message;	
												}
											  ?>
                                             <form name="frm_contact" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
                                              <div class="portlet-body">
                                             <div class="table-responsive">	
                                                <table class="table">
                                                     <tr>
                                                         <td>First Name</td>
                                                         <td>
                                                            <input type="text" name="first_name" id="first_name"  value="<?=$first_name?>" class="textbox" required>
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <td>Last Name</td>
                                                         <td>
                                                            <input type="text" name="last_name" id="last_name"  value="<?=$last_name?>" class="textbox" required>
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <td>Area Code</td>
                                                         <td>
                                                            <input type="text" name="area_code" id="area_code"  value="<?=$area_code?>" class="textbox" required>
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <td>Contact Number</td>
                                                         <td>
                                                            <input type="text" name="contact_number" id="contact_number"  value="<?=$contact_number?>" class="textbox" required>
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <td>Email</td>
                                                         <td>
                                                            <input type="email" name="email" id="email"  value="<?=$email?>" class="textbox" required>
                                                         </td>
                                                     </tr>
                                                     <tr> 
                                                         <td align="right"></td>
                                                         <td>
                                                            <input type="hidden" name="cmd" value="add">
                                                            <input type="hidden" name="id" value="<?=$Id?>">			
                                                            <input type="submit" name="btn_submit" id="btn_submit" value="submit" class="btn submit">
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
   