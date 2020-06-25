<?php
       session_start();
       include("common/lib.php");
	   include("lib/class.db.php");
	   include("common/config.php");
	   
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "contact";
				$data['first_name']   = $_REQUEST['first_name'];
                $data['last_name']   = $_REQUEST['last_name'];
                $data['area_code']   = $_REQUEST['area_code'];
                $data['contact_number']   = $_REQUEST['contact_number'];
                $data['email']   = $_REQUEST['email'];
                
				
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
				$message = "Your contact has been sent successfully";
				include("contact_editor.php");						   
				break;    
	
	     default :    
		       include("contact_editor.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {	  
   $sql    = "SHOW TABLE STATUS LIKE 'contact'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 } 	 
?>
