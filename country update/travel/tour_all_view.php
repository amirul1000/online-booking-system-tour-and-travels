
    <?php
	  include("template/header.php");
	?>
   
   
   <div class="main">
      <div class="container">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Tours</h1>
            <div class="content-page">
              <div class="row" align="right">	
                  <form action="" method="get">
                    Country
					<?php
						$info['table']    = "country";
						$info['fields']   = array("*");   	   
						$info['where']    =  "1=1 ORDER BY country ASC";
						$rescountry  =  $db->select($info);
					?>
					<select  name="field_value" id="field_value"   class="textbox">
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
                     <input type="hidden" name="cmd" value="search_tour"> 
                     <input type="submit" value="Submit" class="btn">
                  </form>
              </div> 
              <div class="row">
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
                    
                            <div class="portlet-body">
                          <div class="table-responsive">	
                              <table class="table">
                             <?php
                                    
                                    if($_SESSION["search"]=="yes")
                                      {
										if($_SESSION['field_name']=='country')
										{
										 $whrstr = " AND ".$_SESSION['field_name']." LIKE '%".$_SESSION["field_value"]."%'";  
										}
                                        $whrstr .= " AND excursion_zone.country LIKE '%".$_SESSION["field_value"]."%'";
                                      }
                                      else
                                      {
                                        $whrstr = "";
                                      }
									  
									if(isset($_REQUEST['excursion_zone']))
									{
									  $whrstr .= " AND excursion_zone='".$_REQUEST['excursion_zone']."'";  	
									}
									
									if(isset($_REQUEST['excursion_city']))
									{
									  $whrstr .= " AND excursion_city='".$_REQUEST['excursion_city']."'";  	
									}
                             
                                    $rowsPerPage = 10;
                                    $pageNum = 1;
                                    if(isset($_REQUEST['page']))
                                    {
                                        $pageNum = $_REQUEST['page'];
                                    }
                                    $offset = ($pageNum - 1) * $rowsPerPage;  
                             
                             
                                                  
                                    $info["table"] = "tour LEFT OUTER JOIN excursion_zone ON(tour.excursion_city=excursion_zone.excursion_name)";
                                    $info["fields"] = array("tour.*"); 
                                    $info["where"]   = "1   $whrstr ORDER BY id DESC  LIMIT $offset, $rowsPerPage";
                                                        
                                    
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
                                <tr bgcolor="<?=$row?>" onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; ">
                                 <td><img src="<?=$arr[$i]['file_picture']?>" style="width:200px">
                                   <?=$arr[$i]['excursion_zone']?>---->
                                   <?=$arr[$i]['excursion_city']?>
                                  
                                  
                                  </td>
                                  <td><?=$arr[$i]['cost']?></td>
                                  <td nowrap >
                                      <a href="tour.php?excursion_zone=<?=$arr[$i]['excursion_zone']?>&excursion_city=<?=$arr[$i]['excursion_city']?>&id=<?=$arr[$i]['id']?>&cmd=tour"  class="btn default btn-xs purple"><i class="fa fa-edit"></i>Detail</a>
                                 </td>
                            
                                </tr>
                            <?php
                                      }
                            ?>
                            
                            <tr>
                               <td colspan="10" align="center">
                                  <?php              
                                          unset($info);
                        
                                           $info["table"] = "tour LEFT OUTER JOIN excursion_zone ON(tour.excursion_city=excursion_zone.excursion_name)";
                                           $info["fields"] = array("count(*) as total_rows"); 
                                           $info["where"]   = "1  $whrstr";
                                          
                                           $res  = $db->select($info);  
                                            
											foreach($_REQUEST as $key=>$value)
											{
											  $list .= "&$key=$value";
											}
                                                    
                                            $numrows = $res[0]['total_rows'];
                                            $maxPage = ceil($numrows/$rowsPerPage);
                                            $self = 'tour_all.php?cmd=list'.$list;
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
          </div>
          <!-- END CONTENT -->
        
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
    
    <?php
	  include("template/footer.php");
	?>
   