
    <?php
	  include("template/header.php");
	?>
    
     <style> 
							 .toursec {border: 2px solid #e64f00;margin-bottom:30px;}
                             .tourhead{background-color:#e64f00;
    padding: 15px;
    border-radius: 10px;
    margin-top: -50px;
    color: #ffffff;
    font-weight: 500;
	box-shadow:10px 10px 5px #D1CECE ;}
                             .tourhead .fa-globe, .tourhead .fa-taxi {padding-right: 10px;font-size: 2em;}
							 .pro:hover{
								 background-color:#F1F1F1 ;
							 }
							 .pro {
							 transition:all ease-in-out 1s;
							 margin-bottom:15px;position:relative;padding-top:15px ;padding-bottom:15px ;height:400px;
							 border-bottom: 2px solid #F1F1F1;}
							 .pro img {
								 transition:all ease-in-out 1s;width:100%;ovelflow:hidden;border-radius:5px !important;margin-bottom:10px;border-bottom:2px solid #68a400 ;height:60%;}
							 .pro img:hover {
								 transform: scale(1.1) rotate(4deg);
								 }
								 
								 .pro .tourcity {color:#68a400;font-weight:bold;padding-top:15px !important;}
								 .pro .tourcity i {padding:5px;}
								 .pro .tourlink {background-color:#68a400;float:right;position:absolute;top:50%;right:15px;border-radius:10px !important;padding:10px;transition:all ease-in-out 1s;}
								 .hvr-bubble-float-bottom::before {border-color:#68a400 transparent transparent transparent;}
								 .hvr-bubble-top::before {border-color: transparent transparent #68a400 transparent;
}
.tourzone {background-color:#68a400;position:absolute;top:21px;left:15px; border-radius:10px !important;padding:10px;transition:all ease-in-out 1s;}
.tourcost {font-size:18px;font-weight:bold;position:absolute;bottom:15px;}
.tourdes {height:70px;overflow:hidden;}
                             </style>
                             
                             
                             
                              
   <!--start transfers ramy-->
   
   <section>
   <div class="container toursec" >
   <div class="row" align="right">	
          <form action="" method="get">
            <label>Country</label>
            <?php
                $info['table']    = "country";
                $info['fields']   = array("*");   	   
                $info['where']    =  "1=1 ORDER BY country ASC";
                $rescountry  =  $db->select($info);
            ?>
            <select  name="field_value" id="field_value" class="form-control-static">
                <option value="">--Select--</option>
                <?php
                   foreach($rescountry as $key=>$each)
                   { 
                ?>
                  <option value="<?=$rescountry[$key]['country']?>" <?php if($rescountry[$key]['country']==$_SESSION["field_value"]){ echo "selected"; }?>><?=$rescountry[$key]['country']?></option>
                <?php
                 }
                ?> 
            </select>
             <input type="hidden" name="field_name" value="country">
             <input type="hidden" name="cmd" value="search_transfer"> 
             <input type="submit" value="Submit" class="btn">
          </form>
   </div>
   </div>
   <div class="container toursec" >
                       <h2 class="tourhead"><i class="fa fa-taxi fa-2x" aria-hidden="true"></i>Transfers</h2>      
      
       <div class="row">
             <div class="pro-outer" >

                                <?php
								
								if($_SESSION["search"]=="yes")
								  {
									//$whrstr = " AND ".$_SESSION['field_name']." LIKE '%".$_SESSION["field_value"]."%'";
									$whrstr = " AND (airport.country LIKE '%".$_SESSION["field_value"]."%'
									                 OR city.country LIKE '%".$_SESSION["field_value"]."%')";
								  }
								  else
								  {
									$whrstr = "";
								  }
						 
								$rowsPerPage = 10;
								$pageNum = 1;
								if(isset($_REQUEST['page']))
								{
									$pageNum = $_REQUEST['page'];
								}
								$offset = ($pageNum - 1) * $rowsPerPage;  
						 
						 
											  
								$info["table"] = "transfer LEFT OUTER JOIN airport ON(transfer.destination=airport.airport_name)
								                           LEFT OUTER JOIN city ON(transfer.destination=city.city_name)";
								$info["fields"] = array("transfer.*,airport.*,city.*"); 
								$info["where"]   = "1   $whrstr ORDER BY transfer.id DESC  LIMIT $offset, $rowsPerPage";
													
								
								$arr =  $db->select($info);
								
								for($i=0;$i<count($arr);$i++)
								{
								
								   $rowColor;
						
									if($i % 2 == 0)
									{
										
										$row="#C8C8C8";
									}
									else
									{
										
										$row="#FFFFFF";
									}
						 ?>
                             
                            
                             
         <div class="pro col-lg-3 col-lg-4 col-sm-6 col-xs-12" >
                                           <?php
									$info["table"] = "transfer_type";
									$info["fields"] = array("transfer_type.*"); 
									$info["where"]   = "1  AND transfer_name='".$arr[$i]['transfer_type']."'";
									$arrtransferpic =  $db->select($info);
								   ?>

              <img src="<?=$arrtransferpic[0]['file_picture']?>" align="left" <!--style="width:200px"-->
                          
                 <span class="label label-important hvr-bubble-float-bottom tourzone"  > <?=$arr[$i]['transfer_type']?>
                 </span><br>
                      
                 <p class="tourcity" >  <?=$arr[$i]['source']?><br>
                 TO<i class="fa fa-arrow-circle-right" aria-hidden="true"></i><?=$arr[$i]['destination']?></p>
                 
                 <div class="tourdes"> <p> <?=$arr[$i]['description']?></p></div>
                         
                 <span class="tourcost"><?=$arr[$i]['cost']?></span>
                                  
                                  
            <a class="label label-important hvr-bubble-top tourlink" href="transfer.php?source=<?=$arr[$i]['source']?>&destination=<?=$arr[$i]['destination']?>&transfer_type=<?=$arr[$i]['transfer_type']?>&passengers=1&id=<?=$arr[$i]['id']?>&cmd=transfer"  >
            
            <span class="btn-label">
            <i class="fa fa-edit"></i>
            </span> VIEW
            
            </a>
                                 
                          
                          
           </div>
          
                              
                            <?php
                                      }
                            ?>
                            
                  
             </div>        <!-- END pro -->
 
       </div>        <!-- END row -->

<?php              
									  unset($info);
					
									   $info["table"] = "transfer LEFT OUTER JOIN airport ON(transfer.destination=airport.airport_name)
								                           LEFT OUTER JOIN city ON(transfer.destination=city.city_name)";
                                       $info["fields"] = array("count(*) as total_rows"); 
									   $info["where"]   = "1  $whrstr";
									  
									   $res  = $db->select($info);  
					
										foreach($_REQUEST as $key=>$value)
										{
										  $list .= "&$key=$value";
										}
										
										$numrows = $res[0]['total_rows'];
										$maxPage = ceil($numrows/$rowsPerPage);
										$self = 'transfer_all.php?cmd=list';
										$nav  = '';
										
										$start    = ceil($pageNum/5)*5-5+1;
										$end      = ceil($pageNum/5)*5;
										
										if($maxPage<$end)
										{
										  $end  = $maxPage;
										}
										
										for($page = $start; $page <= $end; $page++)
										//for($page = 1; $page <= $maxPage; $page++)
										{
											if ($page == $pageNum)
											{
												$nav .= "<li>$page</li>"; 
											}
											else
											{
												$nav .= "<li><a href=\"$self&&page=$page\" class=\"nav\">$page</a></li>";
											} 
										}
										if ($pageNum > 1)
										{
											$page  = $pageNum - 1;
											$prev  = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Prev]</a></li>";
									
										   $first = "<li><a href=\"$self&&page=1\" class=\"nav\">[First Page]</a></li>";
										} 
										else
										{
											$prev  = '<li>&nbsp;</li>'; 
											$first = '<li>&nbsp;</li>'; 
										}
									
										if ($pageNum < $maxPage)
										{
											$page = $pageNum + 1;
											$next = "<li><a href=\"$self&&page=$page\" class=\"nav\">[Next]</a></li>";
									
											$last = "<li><a href=\"$self&&page=$maxPage\" class=\"nav\">[Last Page]</a></li>";
										} 
										else
										{
											$next = '<li>&nbsp;</li>'; 
											$last = '<li>&nbsp;</li>'; 
										}
										
										if($numrows>1)
										{
										  echo '<ul id="navlist">';
										   echo $first . $prev . $nav . $next . $last;
										  echo '</ul>';
										}
									?>    


       </div>        <!-- END container -->
       
      
   
   
   </section>
  
   <!--end transfers ramy-->




   
   
      </div>
    </div>
    
    <?php
	  include("template/footer.php");
	?>
   





