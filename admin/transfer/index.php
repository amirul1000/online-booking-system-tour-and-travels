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
				$info['table']    = "transfer";
				$data['users_id']   = $_REQUEST['users_id'];
				$data['source']   = $_REQUEST['source'];
                $data['destination']   = $_REQUEST['destination'];
                $data['transfer_type']   = $_REQUEST['transfer_type'];
                $data['driving_time']   = $_REQUEST['driving_time'];
                $data['one_way_cost']   = $_REQUEST['one_way_cost'];
                $data['round_trip_cost']   = $_REQUEST['round_trip_cost'];
                $data['lat']   = $_REQUEST['lat'];
                $data['lng']   = $_REQUEST['lng'];
                $data['description']   = $_REQUEST['description'];
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
				
				include("transfer_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "transfer";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$users_id    = $res[0]['users_id'];
					$source    = $res[0]['source'];
					$destination    = $res[0]['destination'];
					$transfer_type    = $res[0]['transfer_type'];
					$driving_time    = $res[0]['driving_time'];
					$one_way_cost    = $res[0]['one_way_cost'];
					$round_trip_cost    = $res[0]['round_trip_cost'];
					$lat    = $res[0]['lat'];
					$lng    = $res[0]['lng'];
					$description    = $res[0]['description'];
					$status    = $res[0]['status'];
					
				 }
						   
				include("transfer_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "transfer";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("transfer_list.php");						   
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
				include("transfer_list.php");
				break; 
        case "search_transfer":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("transfer_list.php");
				break;  								   
						
	     default :    
		       include("transfer_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'transfer'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
