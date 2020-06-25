<?php
	session_start();
	ob_start();
	include("common/lib.php");
	include("lib/class.db.php");
	include("common/config.php");
	
	
	
    $cmd = $_REQUEST['cmd'];
    switch($cmd)
    {	
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
	   default:
				$ticket_no = getMaxId($db); 
				include("home_view.php");			
   }
 function getMaxId($db)
 {	  
    $sql    = "SHOW TABLE STATUS LIKE 'ticket'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 }
?>	