<?php
/**Template Name: Client Stories Page
 */
get_header();
while ( have_posts() ) : the_post(); 
?>
<div class="main__body__wrapp">
   <div class="main__banner header__inner__banner">
      <div class="image__box__banner">
         <img src="<?php echo get_template_directory_uri();?>/assets/images/inner__banner.jpg" alt="" />
      </div>
      <div class="banner__content">
         <div class="container">
            <div class="banner__content__inner">
               <h1 class="all">Our Client’s Story</h1>
            </div>
         </div>
      </div>
   </div>
   <div class="about__wrapp__inner">
      <div class="container">
         <div class="row">
            <div class="filter__wrapp pb-2">
               <div class="container">
                  <div class="row">
                     <?php echo do_shortcode('[ivory-search id="224" title="Custom Search Form"]');?>
                     <div class="col-sm-1 ml-auto">

                        <div class="filter__right__client text-right">
                           <!-- <a href="#" class="glass"><i class="fa-solid fa-magnifying-glass"></i></a> -->

                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>


            <?php
            $args = array (
            'post_type' => 'tours_management',
            'post_status' => 'publish',
            'order' => 'ASC',
            'posts_per_page'=>-1
            );
            $banner = new WP_Query( $args );
            if ( $banner->have_posts() ) {
            $count = 1;
            while ( $banner->have_posts() ) {
            $banner->the_post();
            $postimage1 = wp_get_attachment_image_src( get_post_thumbnail_id( $banner->ID ), 'full' );
            ?>



            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
               <div class="blog__holder position-relative">
                  <a href="<?php echo get_permalink(); ?>">
                  <img src="<?php echo $postimage1[0];?>" alt="">
                  </a>
                  <span class="position-absolute date__holder"><?php echo the_field("our_tours_planing_date"); ?></span>
                  <h3><a href="#"><?php the_title(); ?></a></h3>
                  <ul>
                     <li><i class="fa-solid fa-star"></i></li>
                     <li><i class="fa-solid fa-star"></i></li>
                     <li><i class="fa-solid fa-star"></i></li>
                     <li><i class="fa-solid fa-star"></i></li>
                     <li><i class="fa-solid fa-star"></i></li>
                  </ul>
                  <div class="client__name d-flex">
                     <a href="<?php echo get_permalink(); ?>">
                        <img src="<?php the_field("client_image"); ?>" alt="" class="client__img"></a>
                     <p><?php the_field("client_name"); ?></p>
                  </div>
                  <a href="<?php echo get_permalink(); ?>" class="book__info__button">Book Now</a>
               </div>
            </div>

            <?php $count++; } } wp_reset_postdata(); ?>




            
         </div>
      </div>
   </div>
</div>
<?php endwhile; // End of the loop.
get_footer();

?>

