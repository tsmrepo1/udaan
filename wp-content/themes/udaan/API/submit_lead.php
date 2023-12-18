<?php
$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$url = $_SERVER['REQUEST_URI'];
$my_url = explode('wp-content' , $url); 
$path = $_SERVER['DOCUMENT_ROOT']."/".$my_url[0];
include_once $path . '/wp-config.php';
//include_once $path . '/wp-includes/wp-db.php';
include_once $path . '/wp-includes/pluggable.php';

$obj=new stdClass();
$admin_email = get_option('admin_email');

if(!empty($_POST))
{
	$category_id = $_POST['category_id'];
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_phone = $_POST['user_phone'];
	$user_category = $_POST['user_category'];
	$date_range = $_POST['date_range'];
	$partner = $_POST['partner'];
	$season = $_POST['season'];
	$airport = $_POST['airport'];
	$travelling_date = $_POST['travelling_date'];

	
    if(empty($user_name)){
		$response=array('status'=>array('error_code'=>1,'message'=>'First Name field is required'),'result'=>$obj);
		displayOutput($response);
	}
		
	if(empty($user_email)){
		$response=array('status'=>array('error_code'=>1,'message'=>'Email field is required'),'result'=>$obj);
		displayOutput($response);
	}
	if(empty(trim($user_email))){
		$response=array('status'=>array('error_code'=>1,'message'=>'Invalid email id'),'result'=>$obj);
		displayOutput($response);
	}

	if(empty($user_phone)){
		$response=array('status'=>array('error_code'=>1,'message'=>'Phone field is required'),'result'=>$obj);
		displayOutput($response);
	}
	
	if(empty(trim($user_phone))){
		$response=array('status'=>array('error_code'=>1,'message'=>'Invalid phone number'),'result'=>$obj);
		displayOutput($response);
	}

	if(empty($user_category)){
		$response=array('status'=>array('error_code'=>1,'message'=>'Category field is required'),'result'=>$obj);
		displayOutput($response);
	}
	if(empty($date_range)){
		$response=array('status'=>array('error_code'=>1,'message'=>'Date Range field is required'),'result'=>$obj);
		displayOutput($response);
	}
	if(empty($partner)){
		$response=array('status'=>array('error_code'=>1,'message'=>'Partner field is required'),'result'=>$obj);
		displayOutput($response);
	}
	if(empty($season)){
		$response=array('status'=>array('error_code'=>1,'message'=>'Season field is required'),'result'=>$obj);
		displayOutput($response);
	}
	if(empty($category_id)){
		$response=array('status'=>array('error_code'=>1,'message'=>' Category Id field is required'),'result'=>$obj);
		displayOutput($response);
	}
	if(empty($airport)){
		$response=array('status'=>array('error_code'=>1,'message'=>'Airport name field is required'),'result'=>$obj);
		displayOutput($response);
	}
	if(empty($travelling_date)){
		$response=array('status'=>array('error_code'=>1,'message'=>'Travelling Date field is required'),'result'=>$obj);
		displayOutput($response);
	}

	$insert_post = array(
		  'post_title'    => wp_strip_all_tags( $user_name." (".$user_email.")" ),
		  'post_content'  => '',
		  'post_status'   => 'publish',
		  'post_type' => 'manage_bookings'
	);
	$insert_post_id = wp_insert_post( $insert_post );
	
	if(!empty($insert_post_id)){
		update_post_meta( $insert_post_id, 'user_name', $user_name );
		update_post_meta( $insert_post_id, 'user_email', $user_email );
		update_post_meta( $insert_post_id, 'user_phone', $user_phone );
		update_post_meta( $insert_post_id, 'user_category', $user_category );
		update_post_meta( $insert_post_id, 'date_range', $date_range );
		update_post_meta( $insert_post_id, 'partner', $partner );
		update_post_meta( $insert_post_id, 'season', $season );	
		
		update_post_meta( $insert_post_id, 'category_id', $category_id );
		update_post_meta( $insert_post_id, 'airport', $airport );
		update_post_meta( $insert_post_id, 'travelling_date', $travelling_date );
		//echo "ok";

		$response=array('status'=>array('error_code'=>0,'message'=>'Successfully submitted'),'result'=>$obj);
		displayOutput($response);
	}
		
		
}else{
	$response=array('status'=>array('error_code'=>1,'message'=>'Error! please try again later'),'result'=>array('result'=>$obj));
	displayOutput($response);
}

function displayOutput($response){
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type'); 
	header('Content-Type: application/json');
    echo json_encode($response);
    exit(0);
}