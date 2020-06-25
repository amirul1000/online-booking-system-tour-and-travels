<?php
 include("../template/header.php");
 include("tinymce.php");
?>
<script language="javascript" src="tour.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">
<script language="javascript">
	function filleEcursion(value)
	{
		objselect = document.getElementById("excursion_city");
		objselect.options.length = 0;
		$("#spinner2").html('<img src="images/indicator.gif" alt="Wait" />');
		$.ajax({  
		  url: 'index.php?cmd=excursion&zone_name='+value,
		  success: function(data) {
				  var obj = eval(data);
				  if(value=="all")
				  {
					objselect.add(new Option('-- Select Excursion  --',''), null);
				  }
				  for(var i=0;i<obj.length;i++)
				  {
					 objselect.add(new Option(obj[i].excursion_name,obj[i].excursion_name), null);
				  }
				$("#spinner2").html('');
			  }
			});
	}
</script>
<a href="index.php?cmd=list" class="btn green">List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","tour"))?></b>
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

								 <form name="frm_tour" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
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
                                             <td>Excursion Zone</td>
                                             <td>
                                                   <?php
													 unset($info);
													$info["table"] = "excursion_zone";
													$info["fields"] = array("distinct(excursion_zone.zone_name) as zone_name"); 
													$info["where"]   = "1 ORDER BY excursion_name ASC";
													$arrzone =  $db->select($info);
													
													 unset($info);
													$info["table"] = "excursion_zone";
													$info["fields"] = array("excursion_zone.excursion_name"); 
													$info["where"]   = "1 ORDER BY excursion_name ASC";
													$arrexcursion =  $db->select($info);
												  ?> 	
                                                  
                                                  <select name="excursion_zone" id="excursion_zone" class="form-control" onChange="filleEcursion(this.value);" style="width:300px;">
                                                    <option value="all">All our Tours</option>
                                                     <?php
                                                        for($i=0;$i<count($arrzone);$i++)
                                                          {
                                                      ?>
                                                        <option value="<?=$arrzone[$i]['zone_name']?>"  <?php if($arrzone[$i]['zone_name']==$excursion_zone){ echo "selected"; }?>><?=$arrzone[$i]['zone_name']?></option>
                                                      <?php
                                                          }
                                                      ?>	  
                                                      </select> 
                                                      <div id="spinner2"></div>
                                             </td>
                                         </tr>
                                         
                                         <tr>
                                             <td>Excursion Name</td>
                                             <td>
                                                  <select name="excursion_city" id="excursion_city" class="form-control" style="width:300px;">
                                                    <option value="">-- Select Excursion  --</option>
                                                     <?php
                                                        for($i=0;$i<count($arrexcursion);$i++)
                                                          {
                                                      ?>
                                                        <option value="<?=$arrexcursion[$i]['excursion_name']?>" <?php if($arrexcursion[$i]['excursion_name']==$excursion_city){ echo "selected"; }?>><?=$arrexcursion[$i]['excursion_name']?></option>
                                                      <?php
                                                          }
                                                      ?>	  
                                                  </select> 
                                             </td>
                                         </tr>
										 <tr>
                                             <td valign="top">Description</td>
                                             <td>
                                                <textarea name="description" id="description"  class="textbox" style="width:200px;height:100px;"><?=$description?></textarea>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>File Picture</td>
                                             <td><input type="file" name="file_picture" id="file_picture"  value="<?=$file_picture?>" class="textbox">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Cost</td>
                                             <td>
                                                <input type="text" name="cost" id="cost"  value="<?=$cost?>" class="textbox">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td valign="top">Meeting Point</td>
                                             <td>
                                                <textarea name="meeting_point" id="meeting_point"  class="textbox" style="width:200px;height:100px;"><?=$meeting_point?></textarea>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td valign="top">Included In Tour</td>
                                             <td>
                                                <textarea name="included_in_tour" id="included_in_tour"  class="textbox" style="width:200px;height:100px;"><?=$included_in_tour?></textarea>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td valign="top">What To Bring</td>
                                             <td>
                                                <textarea name="what_to_bring" id="what_to_bring"  class="textbox" style="width:200px;height:100px;"><?=$what_to_bring?></textarea>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>Days The Tour Runs</td>
                                             <td>
                                                <input type="text" name="days_the_tour_runs" id="days_the_tour_runs"  value="<?=$days_the_tour_runs?>" class="textbox">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td valign="top">Additional Information</td>
                                             <td>
                                                <textarea name="additional_information" id="additional_information"  class="textbox" style="width:200px;height:100px;"><?=$additional_information?></textarea>
                                             </td>
                                         </tr>
                                         <tr>
                                              <td>More Files</td>
                                              <td>
                                                <div class="form-group">
                                                    <div class="input_fields_wrap">
                                                        <div>
                                                        
                                                        <input type="file" name="file_picture2[]" class="form-control"></div>
                                                        <script>
                                                          $(document).ready(function() {
                                                            var max_fields      = 10; //maximum input boxes allowed
                                                            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
                                                            var add_button      = $(".add_field_button"); //Add button ID
                                                            
                                                            var x = 1; //initlal text box count
                                                            $(add_button).click(function(e){ //on add input button click
                                                                e.preventDefault();
                                                                if(x < max_fields){ //max input box allowed
                                                                    x++; //text box increment
                                                                    $(wrapper).append('<div><input type="file" name="file_picture2[]"/ class="form-control"><a href="#" class="remove_field">Remove</a></div>'); //add input box
                                                                }
                                                            });
                                                            
                                                            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                                                                e.preventDefault(); $(this).parent('div').remove(); x--;
                                                            })
                                                        });
                                                        </script>
                                                    </div>
                                               
                                                    <button class="add_field_button md-btn md-raised m-b btn-fw brown-200 waves-effect">Add More Files</button>
                                                </div>
                                              </td>
                                         </tr>
                                         <tr>
                                             <td valign="top">Video link</td>
                                             <td>
                                                <input type="text" name="video_link" id="video_link"  value="<?=$video_link?>" class="textbox" style="width:500px;">
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

