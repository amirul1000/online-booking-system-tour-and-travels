<?php
       session_start();
       include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
	   
	    if(empty($_SESSION['users_id'])) 
	   {
	     Header("Location: ../login/");
	   }
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "tour_booking";
				$data['title']   = $_REQUEST['title'];
                $data['first_name']   = $_REQUEST['first_name'];
                $data['last_name']   = $_REQUEST['last_name'];
                $data['contact_number']   = $_REQUEST['contact_number'];
                $data['email']   = $_REQUEST['email'];
                $data['password']   = $_REQUEST['password'];
                $data['excursion_zone']   = $_REQUEST['excursion_zone'];
                $data['excursion_city']   = $_REQUEST['excursion_city'];
                $data['excursion_date']   = $_REQUEST['excursion_date'];
                $data['no_of_adults']   = $_REQUEST['no_of_adults'];
                $data['no_of_children']   = $_REQUEST['no_of_children'];
                $data['total_price']   = $_REQUEST['total_price'];
                $data['special_requests']   = $_REQUEST['special_requests'];
                $data['txn_id']   = $_REQUEST['txn_id'];
                $data['status']   = $_REQUEST['status'];
                
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					 $db->insert($info);
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$db->update($info);
				}
				
				include("tour_booking_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "tour_booking";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$title    = $res[0]['title'];
					$first_name    = $res[0]['first_name'];
					$last_name    = $res[0]['last_name'];
					$contact_number    = $res[0]['contact_number'];
					$email    = $res[0]['email'];
					$password    = $res[0]['password'];
					$excursion_zone    = $res[0]['excursion_zone'];
					$excursion_city    = $res[0]['excursion_city'];
					$excursion_date    = $res[0]['excursion_date'];
					$no_of_adults    = $res[0]['no_of_adults'];
					$no_of_children    = $res[0]['no_of_children'];
					$total_price    = $res[0]['total_price'];
					$special_requests    = $res[0]['special_requests'];
					$txn_id    = $res[0]['txn_id'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("tour_booking_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "tour_booking";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("tour_booking_list.php");						   
				break; 
						   
         case "list" :    	 
			  if(!empty($_REQUEST['page'])&&$_SESSION["search"]=="yes")
				{
				  $_SESSION["search"]="yes";
				}
				else
				{
				   $_SESSION["search"]="no";
					unset($_SESSION["search"]);
					unset($_SESSION['field_name']);
					unset($_SESSION["field_value"]); 
				}
				include("tour_booking_list.php");
				break; 
        case "search_tour_booking":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("tour_booking_list.php");
				break;  								   
						
	     default :    
		       include("tour_booking_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'tour_booking'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
