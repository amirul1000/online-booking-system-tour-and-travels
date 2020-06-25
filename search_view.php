
    <?php
	  include("template/header.php");
	?>
   
   
   <div class="main">
      <div class="container">
      
      
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
             <input type="hidden" name="cmd" value="search"> 
             <input type="submit" value="Submit" class="btn">
          </form>
      </div>
      
      <!-- BEGIN ramy CONTENT -->
      <div class="container toursec" style="
    ">
                       <h2 class="tourhead"><i class="fa fa-globe fa-spin" aria-hidden="true"></i>tours</h2>      

       <div class="row">
             <div class="pro-outer" >

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
									
									if(!empty($_SESSION["searchKey"]))
									{
									  $whrstr .= " AND  (
									                        tour.excursion_zone LIKE '%".$_SESSION['searchKey']."%'
															OR tour.excursion_city LIKE '%".$_SESSION['searchKey']."%'
															OR tour.description LIKE '%".$_SESSION['searchKey']."%'
															OR tour.cost LIKE '%".$_SESSION['searchKey']."%'
															OR tour.meeting_point LIKE '%".$_SESSION['searchKey']."%'
															OR tour.included_in_tour LIKE '%".$_SESSION['searchKey']."%'
															OR tour.what_to_bring LIKE '%".$_SESSION['searchKey']."%'
															OR tour.days_the_tour_runs LIKE '%".$_SESSION['searchKey']."%'
															OR tour.additional_information LIKE '%".$_SESSION['searchKey']."%'
									                     )";  	   	
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
                                            
                                            $row="#ffffff";
                                        }
                                        else
                                        {
                                            
                                            $row="#FFFFFF";
                                        }
                                    
                             ?>
                             
                             <style> 
							 .toursec {border: 2px solid #e64f00;}
                             .tourhead{background-color:#e64f00;
						      padding: 15px;
							  border-radius: 10px;
							  margin-top: -50px;
						      color: #ffffff;
							  font-weight: 500;
						      box-shadow:10px 10px 5px #D1CECE ;}
                             .tourhead .fa-globe {padding-right: 10px;font-size: 2em;}
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
								 .pro .tourlink {background-color:#68a400;float:right;position:absolute;top:50%;right:15px;border-radius:10px !important;padding:10px;transition:all ease-in-out 1s;}
								 .hvr-bubble-float-bottom::before {border-color:#68a400 transparent transparent transparent;}
								 .hvr-bubble-top::before {border-color: transparent transparent #68a400 transparent;
}
.tourzone {background-color:#68a400;position:absolute;top:21px;left:15px; border-radius:10px !important;padding:10px;transition:all ease-in-out 1s;}
.tourcost {font-size:18px;font-weight:bold;position:absolute;bottom:15px;}
.tourdes {height:70px;overflow:hidden;}
                             </style>
                             
         <div class="pro col-lg-4 col-sm-6 col-xs-12" >
                                           

              <img src="<?=$arr[$i]['file_picture']?>" align="left" <!--style="width:200px"-->
                          
                 <span class="label label-important hvr-bubble-float-bottom tourzone"  > <?=$arr[$i]['excursion_zone']?>
                 </span><br>
                      
                 <p class="tourcity" >  <?=$arr[$i]['excursion_city']?></p>
                 
                 <div class="tourdes"> <p> <?=$arr[$i]['description']?></p></div>
                         
                 <span class="tourcost"><?=$arr[$i]['cost']?></span>
                                  
                                  
            <a class="label label-important hvr-bubble-top tourlink" style="" href="tour.php?excursion_zone=<?=$arr[$i]['excursion_zone']?>&excursion_city=<?=$arr[$i]['excursion_city']?>&id=<?=$arr[$i]['id']?>&cmd=tour"  >
            
            <span class="btn-label">
            <i class="fa fa-search"></i>
            </span> Detail
            
            </a>
                                 
                          
                          
           </div>
                              
                            <?php
                                      }
                            ?>
                            
                  
               
             </div>        <!-- END pro -->

       </div>        <!-- END row -->

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


       </div>        <!-- END container -->
       
       </div><!--end container-->
    </div><!--end main-->

        <!-- END ramy CONTENT -->


 
    
    <?php
	  include("template/footer.php");
	?>
   