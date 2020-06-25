<?php
 include("../template/header.php");
?>
<script language="javascript" src="tour_picture.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">

<a href="index.php?cmd=list" class="btn green">List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","tour_picture"))?></b>
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

								 <form name="frm_tour_picture" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						         <div class="table-responsive">	
					                <table class="table">
										 <tr>
							 <td>Tour</td>
							 <td><?php
	$info['table']    = "tour";
	$info['fields']   = array("*");   	   
	$info['where']    =  "1=1 ORDER BY id DESC";
	$restour  =  $db->select($info);
?>
<select  name="tour_id" id="tour_id"   class="textbox">
	<option value="">--Select--</option>
	<?php
	   foreach($restour as $key=>$each)
	   { 
	?>
	  <option value="<?=$restour[$key]['id']?>" <?php if($restour[$key]['id']==$tour_id){ echo "selected"; }?>><?=$restour[$key]['description']?></option>
	<?php
	 }
	?> 
</select></td>
					  </tr><tr>
						 <td>File Picture</td>
						 <td><input type="file" name="file_picture" id="file_picture"  value="<?=$file_picture?>" class="textbox">
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

