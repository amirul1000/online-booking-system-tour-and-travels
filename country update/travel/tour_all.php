<?php
	session_start();
	ob_start();
	include("common/lib.php");
	include("lib/class.db.php");
	include("common/config.php");
	
	
    $cmd = $_REQUEST['cmd'];
    switch($cmd)
    { 
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
				include("tour_all_view.php");
				break; 
        case "search_tour":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("tour_all_view.php");
				break;  								   
						
	   default:
				include("tour_all_view.php");			
   }
?>	