<?php
/**Template Name: Search Page
 */
get_header();
while ( have_posts() ) : the_post(); 

$current_url = home_url($_SERVER['REQUEST_URI']); 
$str = $current_url;

$category_id = explode("=",$str)[1];
$night_count = explode("&",$str)[1];
$night = explode("=", $night_count)[1];


$day_count = explode("&",$str)[2]; 
$day = explode("=", $day_count)[1];

?> 
<div class="main__body__wrapp">
   <div class="main__banner header__inner__banner">
      <div class="image__box__banner">
         <img src="<?php echo get_template_directory_uri();?>/assets/images/innerbanner.jpg" alt="" />
      </div>
      <div class="banner__content">
         <div class="container">
            <div class="banner__content__inner">
               <h1>Our Packages</h1>
            </div>
         </div>
      </div>
   </div>
   <div class="about__holder">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-5">
               <div class="filter__leftpanel">
                  <h3>Filters</h3>
                  <h4>Destinations</h4>
                  <div class="radio__holder">
                    <?php
                    $terms = get_terms(
                    array(
                    'taxonomy'   => 'category', 
                    'hide_empty' => false,
                    'order'      => 'asc'
                    )
                    );
                    foreach ($terms as $term) {
                    $cat_link = get_category_link($term->term_id);
                    ?>
                     <div class="form-check">
                      <a href="<?php echo $cat_link; ?>">
                        <label class="form-check-label" for="defaultCheck1"> <?php echo $term->name; ?> </label>
                      </a>
                     </div>
                    <?php  } ?> 
                     
                  </div>
                  
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9 mt-5">
          <?php
              /*$all_subcat_args = array(
                  'post_type' => 'packages',

                  'meta_query'=> array(
                      array(
                      'key' => 'holi_special',
                      'value' => 'Yes'
                      )
                  ),
                  
              );
              $all_subcat_query = new WP_Query( $all_subcat_args );*/
        if($category_id == '' || $night == '' || $day == '' ){

            $all_subcat_args = array(
                'post_type' => 'packages',
            );
            $query = new WP_Query( $all_subcat_args );
        }else{


            $query = new WP_Query( array(
                  'post_type' => 'packages', // name of post type. 
                  'tax_query' => array(
                      array(
                          'taxonomy' => 'category',  // taxonomy name
                          'field' => 'term_id',     // term_id, slug or name
                          'terms' => $category_id,  // term id, term slug or term name
                      )
                  ),

                  'meta_query' => array(
                      array(
                          'key'     => 'no_of_night',
                          'value'   => $night,
                      ),
                      array(
                          'key'     => 'no_of_days',
                          'value'   => $day,
                      ),
                  ),

              ) );
        }


              if ( $query->have_posts() ) {
              while ( $query->have_posts() ) {
              $query->the_post();
              $image1 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )
          ?>  


          <div class="details__holder">
            <div class="row m-0">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5 p-0">
                <?php if( get_field('single_package_image', $post->ID) ): ?>
                  <img src="<?php the_field('single_package_image', $post->ID); ?>" class="sing_img">
                <?php endif; ?>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7 p-0">
                <div class="details__wrap__makunudu">
                  <h3><?php the_title(); ?></h3>
                </div>
                <div class="rating__wrapp">

                <?php if( get_field('package_price', $post->ID) ): ?>
                  <h4 class="font-weight-bold">₹ <?php echo the_field('package_price', $post->ID); ?></h4>
                <?php endif; ?>
                  
                <div class="holtel__wrapp">
                    <p>
                      <i class="fa-brands"></i> <?php the_field('no_of_days', $post->ID); ?> Day's / <?php the_field('no_of_night', $post->ID); ?> Night's
                    </p>
                </div>
                
                </div>

                
                <div class="listing__wrapp">
                  <?php //the_field('overview_details', $post->ID); ?>
                  <?php //echo wp_trim_words( the_field('overview_details', $post->ID) , 16, '...' ); ?>
                    <?php
                        echo wp_trim_words(get_the_content(), 40, '...');
                    ?>
                </div>
                
                <a href="<?php the_permalink(); ?>" class="view">View Deal</a>
              </div>
            </div>
          </div>

        <?php } }else{ ?>

          <h1>No Data Found</h1>

        <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>

<?php endwhile; // End of the loop.
get_footer();

?>

