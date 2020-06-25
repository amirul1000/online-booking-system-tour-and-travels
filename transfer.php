<?php
	session_start();
	ob_start();
	include("common/lib.php");
	include("lib/class.db.php");
	include("common/config.php");
	
	
    $cmd = $_REQUEST['cmd'];
    switch($cmd)
    {
	    case "transfer_print":
	             // get the HTML
					    ob_start();
					    include(dirname(__FILE__).'/transfer_print_view.php');
					    $html = ob_get_clean();
		           
			       	    include("mpdf60/mpdf.php");					
						$mpdf=new mPDF('','A4'); 
						
						//$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 
						//$mpdf->mirrorMargins = true;

                       $mpdf->SetDisplayMode('fullpage');
						//==============================================================
						$mpdf->autoScriptToLang = true;
						$mpdf->baseScript = 1;	// Use values in classes/ucdn.php  1 = LATIN
						$mpdf->autoVietnamese = true;
						$mpdf->autoArabic = true;
						
						$mpdf->autoLangToFont = true;
						
						$mpdf->setAutoBottomMargin = 'stretch'; 
						
						$stylesheet = file_get_contents('mpdf60/lang2fonts.css');
						$mpdf->WriteHTML($stylesheet,1);
						
						$mpdf->WriteHTML($html);
						//$mpdf->AddPage();
						
											
						$mpdf->Output();
						//$mpdf->Output( $filePath,'S');
						exit;		  
			       break;
			  break;
	   case "paypal_success":
	            if(isset($_COOKIE['transfer_booking'])) 
				  {
					$Id = $_COOKIE['transfer_booking'];
				  }
	            $info['table']    = "transfer_booking";
				$data['txn_id']   = $_REQUEST['txn_id'];
                $data['status']   = 'paid';
				$info['data']     = $data;
				$info['where'] = "id=".$Id;
				$db->update($info);
	           include("transfer_paypal_success.php");		
	         break;
	   case "view_transfer_booking":
	            include("transfer_booking_view.php");		
	         break;
	   case "add_transfer_booking":
	            $info['table']    = "transfer_booking";
				$data['users_id']   = $_SESSION['users_id'];
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
               
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					 $db->insert($info);
					 $Id = mysql_insert_id();
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$db->update($info);
				} 
				
				//setcookie('transfer_booking',$Id,-time() + (86400 * 30));
				setcookie('transfer_booking',$Id,time() + (86400 * 30));
	   
	          Header("Location:transfer.php?cmd=view_transfer_booking");		
	         break;
	   case "transfer_booking_editor":
	           $source  = $_REQUEST['source']; 
	           $destination  = $_REQUEST['destination']; 
			   $transfer_type    = $_REQUEST['transfer_type']; 
			   $passengers    = $_REQUEST['passengers']; 
			   $cost    = $_REQUEST['cost']; 
	           include("transfer_booking_editor.php");			  
	           break;
	  
	   case "transfer":
	            $source  = $_REQUEST['source']; 
	            $destination  = $_REQUEST['destination']; 
			    $_SESSION['transfer_type']     = $_REQUEST['transfer_type']; 
			    $_SESSION['passengers']     = $_REQUEST['passengers']; 
				if(empty($_REQUEST['passengers']))
				{
				  $_SESSION['passengers']     = 1;	 
				}
	            include("transfer_view.php");			  
	          break; 	   
	   default:
				include("transfer_view.php");			
    }
 function getMaxId($db)
 {	  
    $sql    = "SHOW TABLE STATUS LIKE 'ticket'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 }
?>	