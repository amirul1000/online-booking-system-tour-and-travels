<?php
 include("../template/header.php");
?>
<script language="javascript" src="tour_booking.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">

<a href="index.php?cmd=list" class="btn green">List</a> <br><br>
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
						    <input type="text" name="excursion_date" id="excursion_date"  value="<?=$excursion_date?>" class="textbox">
							<a href="javascript:void(0);" onclick="displayDatePicker('excursion_date');"><img src="../../images/calendar.gif" width="16" height="16" border="0" /></a>
						 </td>
				     </tr><tr>
						 <td>No Of Adults</td>
						 <td>
						    <input type="text" name="no_of_adults" id="no_of_adults"  value="<?=$no_of_adults?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>No Of Children</td>
						 <td>
						    <input type="text" name="no_of_children" id="no_of_children"  value="<?=$no_of_children?>" class="textbox">
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
				     </tr><tr>
						 <td valign="top">txn_id</td>
						 <td>
						    <input type="text" name="txn_id" id="txn_id"  value="<?=$txn_id?>" class="textbox">
						 </td>
				     </tr><tr>
		           		 <td>Status</td>
				   		 <td><?php
	$enumtour_booking = getEnumFieldValues('tour_booking','status');
?>
<select  name="status" id="status"   class="textbox">
<?php
   foreach($enumtour_booking as $key=>$value)
   { 
?>
  <option value="<?=$value?>" <?php if($value==$status){ echo "selected"; }?>><?=$value?></option>
 <?php
  }
?> 
</select></td>
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

