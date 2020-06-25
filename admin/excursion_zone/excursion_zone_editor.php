<?php
 include("../template/header.php");
?>
<script language="javascript" src="excursion_zone.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">

<a href="index.php?cmd=list" class="btn green">List</a> <br><br>
  <div class="portlet box blue">
      <div class="portlet-title">
          <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","excursion_zone"))?></b>
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

								 <form name="frm_excursion_zone" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
								  <div class="portlet-body">
						           <div class="table-responsive">	
					                <table class="table">
										 <tr>
                                                 <td>Country</td>
                                                 <td><?php
                                                    $info['table']    = "country";
                                                    $info['fields']   = array("*");   	   
                                                    $info['where']    =  "1=1 ORDER BY country ASC";
                                                    $rescountry  =  $db->select($info);
                                                ?>
                                                <select  name="country" id="country"   class="textbox">
                                                    <option value="">--Select--</option>
                                                    <?php
                                                       foreach($rescountry as $key=>$each)
                                                       { 
                                                    ?>
                                                      <option value="<?=$rescountry[$key]['country']?>" <?php if($rescountry[$key]['country']==$country){ echo "selected"; }?>><?=$rescountry[$key]['country']?></option>
                                                    <?php
                                                     }
                                                    ?> 
                                                </select>
                                                </td>
                                         </tr>
                                         <tr>
                                             <td>Zone Name</td>
                                             <td>
                                                <input type="text" name="zone_name" id="zone_name"  value="<?=$zone_name?>" class="textbox">
                                             </td>
                                          </tr>
                                           <tr>
                                             <td>Excursion Name</td>
                                             <td>
                                                <input type="text" name="excursion_name" id="excursion_name"  value="<?=$excursion_name?>" class="textbox">
                                             </td>
                                           </tr>
                                           <tr>
                                             <td>Status</td>
                                             <td><?php
                                                    $enumexcursion_zone = getEnumFieldValues('excursion_zone','status');
                                                ?>
                                                <select  name="status" id="status"   class="textbox">
                                                <?php
                                                   foreach($enumexcursion_zone as $key=>$value)
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

