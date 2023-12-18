<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package udaan
 */

get_header();
?>

<div class="main__body__wrapp">
   <div class="main__banner header__inner__banner">
      <div class="image__box__banner">
         <img src="<?php echo get_template_directory_uri();?>/assets/images/innerbanner.jpg" alt="" />
      </div>
      <div class="banner__content">
         <div class="container">
            <div class="banner__content__inner">
               <h1><?php the_title(); ?></h1>
            </div>
         </div>
      </div>
   </div>
   <div class="blog__wrapp">
      <div class="container">
         <div class="row">
         	<?php
            $args = array (
            'post_type'          => 'post',
            'post_status'        => 'publish',
            'order'              => 'ASC',
            'posts_per_page'     =>  -1
            );
            $banner = new WP_Query( $args );
            if ( $banner->have_posts() ) {
            while ( $banner->have_posts() ) {
            $banner->the_post();
            $image1 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            ?>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
               <div class="blog__box">
				<?php if($image1 != ''){ ?>
				<img src="<?php echo $image1['0']; ?>" alt="">
				<?php } else { ?>
				<img src="<?php bloginfo('template_directory'); ?>/assets/images/no-image.jpg" alt="" >
				<?php } ?>
               </div>
               <span><?php echo get_the_date('jS M, Y'); ?></span>
               <a href="<?php the_permalink(); ?>" class="heading"><?php the_title(); ?></a>
               <a href="<?php the_permalink(); ?>">Read More <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <?php 
            }
            } else {
              ?>
              <?php  echo __( 'No Blog Available' );
            } wp_reset_postdata(); ?>            
         </div>
      </div>
   </div>
</div>
<?php
get_footer();
