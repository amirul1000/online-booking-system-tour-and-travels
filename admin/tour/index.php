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
				$info['table']    = "tour";
				$data['users_id']   = $_REQUEST['users_id'];
				$data['excursion_zone']   = $_REQUEST['excursion_zone'];
                $data['excursion_city']   = $_REQUEST['excursion_city'];
				$data['description']   = $_REQUEST['description'];
                     
				if(strlen($_FILES['file_picture']['name'])>0 && $_FILES['file_picture']['size']>0)
				{
					
					if(!file_exists("../../tour_images"))
					{ 
					   mkdir("../../tour_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_picture']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_picture']['name'])));
					}
					$filePath="../../tour_images/".$file;
					move_uploaded_file($_FILES['file_picture']['tmp_name'],$filePath);
					$data['file_picture']="tour_images/".trim($file);
				}
                $data['cost']   = $_REQUEST['cost'];
                $data['meeting_point']   = $_REQUEST['meeting_point'];
                $data['included_in_tour']   = $_REQUEST['included_in_tour'];
                $data['what_to_bring']   = $_REQUEST['what_to_bring'];
                $data['days_the_tour_runs']   = $_REQUEST['days_the_tour_runs'];
                $data['additional_information']   = $_REQUEST['additional_information'];
                $data['video_link']   = $_REQUEST['video_link'];
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					 $db->insert($info);
					 $Id = $db->lastInsert(true);
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$db->update($info);
				}
				save_submitted_more_files($db,$Id);
				include("tour_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "tour";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$users_id    = $res[0]['users_id'];
					$excursion_zone    = $res[0]['excursion_zone'];
					$excursion_city    = $res[0]['excursion_city'];
					$description    = $res[0]['description'];
					$file_picture    = $res[0]['file_picture'];
					$cost    = $res[0]['cost'];
					$meeting_point    = $res[0]['meeting_point'];
					$included_in_tour    = $res[0]['included_in_tour'];
					$what_to_bring    = $res[0]['what_to_bring'];
					$days_the_tour_runs    = $res[0]['days_the_tour_runs'];
					$additional_information    = $res[0]['additional_information'];
					$video_link            = $res[0]['video_link'];
				 }
						   
				include("tour_editor.php");						  
				break;
						   
         case 'delete': 
				$Id      = $_REQUEST['id'];
				
				//delete file
				 unset($info);
				$info['table']    = "tour";
				$info['fields']   = array("*");   	   
				$info['where'] = "id='".$Id."'";
				$res2  =  $db->select($info);
				 
				 $file_equpment_info    = '../'.$res2[0]['file_picture'];
				  unlink($file_equpment_info);
				
				//delete data
				  unset($info);
				$info['table']    = "tour";
				$info['where']    = "id='$Id'";
				if($Id)
				{
					$db->delete($info);
					
					//delete file
					  unset($info);
					$info['table']    = "tour_picture";
					$info['fields']   = array("*");   	   
					$info['where'] = "tour_id='".$Id."'";
					$res2  =  $db->select($info);
					for($i=0;$i<count($res2);$i++)
					{
					    $attach    = '../'.$res2[$i]['file_picture'];
						unlink($attach);
						
						//delete data 
						 unset($info);
						$info['table']    = "tour_picture";
				        $info['where']    = "tour_id='$Id'";
					    $db->delete($info);
					}
				}
				//delete data 
				 unset($info);
				$info['table']    = "tour_reviews";
				$info['where']    = "tour_id='$Id'";
				$db->delete($info);
				
				
				include("tour_list.php");						   
				break; 
		 case "excursion":
	          if($_REQUEST['zone_name']!='all')
			  {
	            $whrstr = " AND zone_name='".$_REQUEST['zone_name']."'";
			  }
	          $info["table"] = "excursion_zone";
			  $info["fields"] = array("excursion_zone.*"); 
			  $info["where"]   = "1 $whrstr  ORDER BY excursion_name ASC";
			  $arr =  $db->select($info);
	          echo json_encode($arr);
	         break;
		case "delete_pic":
		        $Id  = $_REQUEST['id'];
		         unset($info);
				$info['table']    = "tour_picture";
				$info['fields']   = array("*");   	   
				$info['where'] = "id='".$Id."'";
				$res2  =  $db->select($info);
				for($i=0;$i<count($res2);$i++)
				{
					$attach    = '../../'.$res2[$i]['file_picture'];
					unlink($attach);
					
					//delete data 
					 unset($info);
					$info['table']    = "tour_picture";
					$info['where']    = "id='$Id'";
					$db->delete($info);
				}
		      include("tour_list.php");
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
				include("tour_list.php");
				break; 
        case "search_tour":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("tour_list.php");
				break;  								   
						
	     default :    
		       include("tour_list.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'tour'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 
 
function save_submitted_more_files($db,$Id)
 {
	  //save add more chalan 
	  for($i=0;$i<count($_FILES['file_picture2']);$i++)
	  {
		 // echo $_FILES[$arrData[$i]['bank_challen_no']]['size'];
		if(strlen($_FILES['file_picture2']['name'][$i])>0 && $_FILES['file_picture2']['size'][$i]>0)
		{  
				unset($info);
				unset($data);
		   $info['table'] = "tour_picture";
		   $data['tour_id'] = $Id;
		
			if(!file_exists("../../tour_picture_images"))
			{ 
			   mkdir("../../tour_picture_images",0755);	
			}
			
			$file = trim($Id)."_".str_replace(" ","_",strtolower(trim($_FILES['file_picture2']['name'][$i])));
			
			$filePath="../../tour_picture_images/".$file;
			move_uploaded_file($_FILES['file_picture2']['tmp_name'][$i],$filePath);
			$data['file_picture']="tour_picture_images/".trim($file);
			$info['data'] = $data;
		   $db->insert($info);
		 }  
		  
	  }
				
 }	 
?>
