<?php
$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$url = $_SERVER['REQUEST_URI'];
$my_url = explode('wp-content' , $url); 
$path = $_SERVER['DOCUMENT_ROOT']."/".$my_url[0];
include_once $path . '/wp-config.php';
//include_once $path . '/wp-includes/wp-db.php';
include_once $path . '/wp-includes/pluggable.php';
global $woocommerce;
$obj = new stdClass();
//$user_id = $_REQUEST['user_id'];
//$post_id = 92;

//countries
$countries = [];


$terms = get_terms(
array(
'taxonomy'   => 'category', // Custom Post Type Taxonomy Slug
'hide_empty' =>  false,
'order'      =>  'asc'
)
);
foreach ($terms as $term) :

        $country= [
            "id" => "",
            "name" => "",
        	"seasons" => [],
        	"date_ranges" => [],
        	"partners" => []
        ];
        
	    $country["id"] = $term->term_id;
	    $country["name"] = $term->name;
	
        $taxonomy = $term->taxonomy;
        $term_id = $term->term_id; 
        
        if( have_rows('seasons', $taxonomy . '_' . $term_id) ):
        while(have_rows('seasons', $taxonomy . '_' . $term_id)): 
        the_row(); 

		$month = get_sub_field('month', $taxonomy . '_' . $term_id);
		$type = get_sub_field('type', $taxonomy . '_' . $term_id);
		$high_temp = get_sub_field('high_temp', $cat_id);
		$low_temp = get_sub_field('low_temp', $cat_id);

    	$country["seasons"][] = [
    		"month" => $month,
    		"type" => $type,
    		"high_temp" => $high_temp,
    		"low_temp" => $low_temp
    	];
    	
    	endwhile; endif;



		$args = array(
		'post_type' => 'packages', 
		'order' => 'ASC',
		'tax_query' => array(
		array(
		    'taxonomy' => 'category',
		    'field' => 'slug',
		    'terms' => $term->slug,
		)
		),
		'posts_per_page' => -1
		);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
		

		$day_count = get_field("no_of_days", $post->ID);
		$night_count = get_field("no_of_night", $post->ID);

		$country["date_ranges"][] = [
    		"day_count" => $day_count,
    		"night_count" => $night_count
    	];


    	while( have_rows('partner', $post->ID) ) : the_row(); 

    		$partner = get_sub_field('type_of_partner_name', $post->ID);

    		$country["partners"][] = $partner;

    	endwhile;

		endwhile; //wp_reset_postdata();
    	
    	
    	
    	
    	
    	// After Ready the Country's Date
    	$countries[] = $country;

endforeach;




 



$final_arr=array('status'=>array('error_code'=>0,'message'=>'Success'),'countries'=>$countries, );

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type'); 
header('Content-Type: application/json');
echo json_encode($final_arr);

?>