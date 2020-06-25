<?php
	session_start();
	ob_start();
	include("common/lib.php");
	include("lib/class.db.php");
	include("common/config.php");
	
	
    $cmd = $_REQUEST['cmd'];
    switch($cmd)
    {	
	
	  case "tour_print":
	             // get the HTML
					    ob_start();
					    include(dirname(__FILE__).'/tour_print_view.php');
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
	            if(isset($_COOKIE['tour_booking'])) 
				  {
					$Id = $_COOKIE['tour_booking'];
				  }
	            $info['table']    = "tour_booking";
				$data['txn_id']   = $_REQUEST['txn_id'];
                $data['status']   = 'paid';
				$info['data']     = $data;
				$info['where'] = "id=".$Id;
				$db->update($info);
	           include("tour_paypal_success.php");		
	         break;
	   case "view_tour_booking":
	            include("tour_booking_view.php");		
	         break;
	   case "add_tour_booking":
	            $info['table']    = "tour_booking";
				$data['users_id']   = $_SESSION['users_id'];
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
				
				//setcookie('tour_booking',$Id,-time() + (86400 * 30));
				setcookie('tour_booking',$Id,time() + (86400 * 30));
	   
	          Header("Location:tour.php?cmd=view_tour_booking");		
	         break;
	   case "tour_booking_editor":
	           $excursion_zone  = $_REQUEST['excursion_zone']; 
	           $excursion_city  = $_REQUEST['excursion_city']; 
			   $total_price     = $_REQUEST['cost']; 
	           include("tour_booking_editor.php");			  
	           break;
	   case "add_review":
	            case 'add': 
				$info['table']    = "tour_reviews";
				$data['tour_id']   = $_REQUEST['tour_id'];
                $data['name']   = $_REQUEST['name'];
                $data['email']   = $_REQUEST['email'];
                $data['feedback']   = $_REQUEST['feedback'];
                $data['service_rating']   = $_REQUEST['service_rating'];
                
				
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
			   Header("Location:tour.php?cmd=tour&excursion_zone=".$_SESSION['excursion_zone']."&excursion_city=".$_SESSION['excursion_city']."");	
	          break; 
	   case "tour":
	            $_SESSION['excursion_zone'] = $_REQUEST['excursion_zone'];
				$_SESSION['excursion_city'] = $_REQUEST['excursion_city'];
	            include("tour_view.php");			  
	          break; 	   
	   default:
				include("tour_view.php");			
   }
 function getMaxId($db)
 {	  
    $sql    = "SHOW TABLE STATUS LIKE 'ticket'";
	$result = $db->execQuery($sql);
	$row    = $db->resultArray();
	return $row[0]['Auto_increment'];	   
 }
?>	