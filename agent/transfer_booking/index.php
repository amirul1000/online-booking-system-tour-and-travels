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
				$info['table']    = "transfer_booking";
				$data['title']   = $_REQUEST['title'];
                $data['first_name']   = $_REQUEST['first_name'];
                $data['last_name']   = $_REQUEST['last_name'];
                $data['contact_number']   = $_REQUEST['contact_number'];
                $data['email']   = $_REQUEST['email'];
                $data['password']   = $_REQUEST['password'];
                $data['passengers']   = $_REQUEST['passengers'];
                $data['baby_car_seat']   = $_REQUEST['baby_car_seat'];
                $data['number_of_baby_car_seats']   = $_REQUEST['number_of_baby_car_seats'];
                $data['from_to']   = $_REQUEST['from_to'];
                $data['pick_up_location']   = $_REQUEST['pick_up_location'];
                $data['arrival_date']   = $_REQUEST['arrival_date'];
                $data['arrival_hr']   = $_REQUEST['arrival_hr'];
                $data['arrival_min']   = $_REQUEST['arrival_min'];
                $data['arrival_am_pm']   = $_REQUEST['arrival_am_pm'];
                $data['arrival_airline_company']   = $_REQUEST['arrival_airline_company'];
                $data['arrival_flight_number']   = $_REQUEST['arrival_flight_number'];
                $data['departure_date']   = $_REQUEST['departure_date'];
                $data['departure_hr']   = $_REQUEST['departure_hr'];
                $data['departure_min']   = $_REQUEST['departure_min'];
                $data['departure_am_pm']   = $_REQUEST['departure_am_pm'];
                $data['departure_airline_company']   = $_REQUEST['departure_airline_company'];
                $data['departure_flight_number']   = $_REQUEST['departure_flight_number'];
                $data['departure_pick_up_time']   = $_REQUEST['departure_pick_up_time'];
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
				
				include("transfer_booking_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "transfer_booking";
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
					$passengers    = $res[0]['passengers'];
					$baby_car_seat    = $res[0]['baby_car_seat'];
					$number_of_baby_car_seats    = $res[0]['number_of_baby_car_seats'];
					$from_to    = $res[0]['from_to'];
					$pick_up_location    = $res[0]['pick_up_location'];
					$arrival_date    = $res[0]['arrival_date'];
					$arrival_hr    = $res[0]['arrival_hr'];
					$arrival_min    = $res[0]['arrival_min'];
					$arrival_am_pm    = $res[0]['arrival_am_pm'];
					$arrival_airline_company    = $res[0]['arrival_airline_company'];
					$arrival_flight_number    = $res[0]['arrival_flight_number'];
					$departure_date    = $res[0]['departure_date'];
					$departure_hr    = $res[0]['departure_hr'];
					$departure_min    = $res[0]['departure_min'];
					$departure_am_pm    = $res[0]['departure_am_pm'];
					$departure_airline_company    = $res[0]['departure_airline_company'];
					$departure_flight_number    = $res[0]['departure_flight_number'];
					$departure_pick_up_time    = $res[0]['departure_pick_up_time'];
					$total_price    = $res[0]['total_price'];
					$special_requests    = $res[0]['special_requests'];
					$txn_id    = $res[0]['txn_id'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("transfer_booking_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "transfer_booking";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("transfer_booking_list.php");						   
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
				include("transfer_booking_list.php");
				break; 
        case "search_transfer_booking":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("transfer_booking_list.php");
				break;  								   
						
	     default :    
		       include("transfer_booking_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'transfer_booking'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
