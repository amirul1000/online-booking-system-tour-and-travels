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
					unset($_SESSION["searchKey"]); 
				}
				include("search_view.php");
				break; 
        case "search":
				$_REQUEST['page']         = 1;  
				$_SESSION["search"]       = "yes";
				$_SESSION['field_name']   = $_REQUEST['field_name'];
				$_SESSION["field_value"]  = $_REQUEST['field_value'];
				$_SESSION["searchKey"]    = $_REQUEST['searchKey'];
				include("search_view.php");
				break;  								   
						
	   default:
				include("search_view.php");			
   }
?>	