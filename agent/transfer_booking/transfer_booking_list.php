<?php
 include("../template/header.php");
?>
<a href="index.php?cmd=edit" class="btn green">Add a transfer booking</a> <br><br>
 <div class="portlet box blue">
           <div class="portlet-title">
                <div class="caption"><i class="fa fa-globe"></i><b><?=ucwords(str_replace("_"," ","transfer_booking"))?></b>
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
						<td align="center" valign="top">
						  <form name="search_frm" id="search_frm" method="post">
							<div class="portlet-body">
					         <div class="table-responsive">	
				                <table class="table">
									  <TR>
										<TD  nowrap="nowrap">
										  <?php
											  $hash    =  getTableFieldsName("transfer_booking");
											  $hash    = array_diff($hash,array("id"));
										  ?>
										  Search Key:
										  <select   name="field_name" id="field_name"  class="textbox">
											<option value="">--Select--</option>
											<?php
											foreach($hash as $key=>$value)
											{
										    ?>
											<option value="<?=$key?>" <?php if($_SESSION['field_name']==$key) echo "selected"; ?>><?=str_replace("_"," ",$value)?></option>
											<?php
										    }
										  ?>
										  </select>
										</TD>
										<TD  nowrap="nowrap" align="right"><label for="searchbar"><img src="../../images/icon_searchbox.png" alt="Search"></label>
										   <input type="text"    name="field_value" id="field_value" value="<?=$_SESSION["field_value"]?>" class="textbox"></TD>
										<td nowrap="nowrap" align="right">
										  <input type="hidden" name="cmd" id="cmd" value="search_transfer_booking" >
										  <input type="submit" name="btn_submit" id="btn_submit"  value="Search" class="button" />
										</td>
									  </TR>
									</table>
							</div>
							</div>
						  </form>
						</td>
				   </tr>
				   <tr>
				   <td> 
				
						<div class="portlet-body">
				      <div class="table-responsive">	
				          <table class="table">
							<tr bgcolor="#ABCAE0">
							  <td>Title</td>
                              <td>First Name</td>
                              <td>Last Name</td>
                              <td>Contact Number</td>
                              <td>Email</td>
                              <td>Password</td>
                              <td>Passengers</td>
                              <td>Baby Car Seat</td>
                              <td>Number Of Baby Car Seats</td>
                              <td>From To</td>
                              <td>Pick Up Location</td>
                              <td>Arrival Date</td>
                              <td>Arrival Hr</td>
                              <td>Arrival Min</td>
                              <td>Arrival Am Pm</td>
                              <td>Arrival Airline Company</td>
                              <td>Arrival Flight Number</td>
                              <td>Departure Date</td>
                              <td>Departure Hr</td>
                              <td>Departure Min</td>
                              <td>Departure Am Pm</td>
                              <td>Departure Airline Company</td>
                              <td>Departure Flight Number</td>
                              <td>Departure Pick Up Time</td>
                              <td>Total Price</td>
                              <td>Special Requests</td>
                              <td>Txn Id</td>
                              <td>Status</td>
			                  <td>Action</td>
							</tr>
						 <?php
								
								if($_SESSION["search"]=="yes")
								  {
									$whrstr = " AND ".$_SESSION['field_name']." LIKE '%".$_SESSION["field_value"]."%'";
								  }
								  else
								  {
									$whrstr = "";
								  }
								  
						        $whrstr .= " AND users_id='".$_SESSION["users_id"]."'";
								
								$rowsPerPage = 10;
								$pageNum = 1;
								if(isset($_REQUEST['page']))
								{
									$pageNum = $_REQUEST['page'];
								}
								$offset = ($pageNum - 1) * $rowsPerPage;  
						 
						 
											  
								$info["table"] = "transfer_booking";
								$info["fields"] = array("transfer_booking.*"); 
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
							  <td><?=$arr[$i]['title']?></td>
			  <td><?=$arr[$i]['first_name']?></td>
			  <td><?=$arr[$i]['last_name']?></td>
			  <td><?=$arr[$i]['contact_number']?></td>
			  <td><?=$arr[$i]['email']?></td>
			  <td><?=$arr[$i]['password']?></td>
			  <td><?=$arr[$i]['passengers']?></td>
			  <td><?=$arr[$i]['baby_car_seat']?></td>
			  <td><?=$arr[$i]['number_of_baby_car_seats']?></td>
			  <td><?=$arr[$i]['from_to']?></td>
			  <td><?=$arr[$i]['pick_up_location']?></td>
			  <td><?=$arr[$i]['arrival_date']?></td>
			  <td><?=$arr[$i]['arrival_hr']?></td>
			  <td><?=$arr[$i]['arrival_min']?></td>
			  <td><?=$arr[$i]['arrival_am_pm']?></td>
			  <td><?=$arr[$i]['arrival_airline_company']?></td>
			  <td><?=$arr[$i]['arrival_flight_number']?></td>
			  <td><?=$arr[$i]['departure_date']?></td>
			  <td><?=$arr[$i]['departure_hr']?></td>
			  <td><?=$arr[$i]['departure_min']?></td>
			  <td><?=$arr[$i]['departure_am_pm']?></td>
			  <td><?=$arr[$i]['departure_airline_company']?></td>
			  <td><?=$arr[$i]['departure_flight_number']?></td>
			  <td><?=$arr[$i]['departure_pick_up_time']?></td>
			  <td><?=$arr[$i]['total_price']?></td>
			  <td><?=$arr[$i]['special_requests']?></td>
			  <td><?=$arr[$i]['txn_id']?></td>
			  <td><?=$arr[$i]['status']?></td>
			  
							  <td nowrap >
								  <a href="index.php?cmd=edit&id=<?=$arr[$i]['id']?>"  class="btn default btn-xs purple"><i class="fa fa-edit"></i>Edit</a>
								  <a href="index.php?cmd=delete&id=<?=$arr[$i]['id']?>" class="btn btn-sm red filter-cancel"  onClick=" return confirm('Are you sure to delete this item ?');"><i class="fa fa-times"></i>Delete</a> 
							 </td>
						
							</tr>
						<?php
								  }
						?>
						
						<tr>
						   <td colspan="10" align="center">
							  <?php              
									  unset($info);
					
									   $info["table"] = "transfer_booking";
									   $info["fields"] = array("count(*) as total_rows"); 
									   $info["where"]   = "1  $whrstr ORDER BY id DESC";
									  
									   $res  = $db->select($info);  
					
												
										$numrows = $res[0]['total_rows'];
										$maxPage = ceil($numrows/$rowsPerPage);
										$self = 'index.php?cmd=list';
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
<?php
include("../template/footer.php");
?>









