<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package National_Achiever
 */

get_header();
$image1 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
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
   <div class="about__holder">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
               <div class="details__holderwrapp">
                  <?php if (has_post_thumbnail( $post->ID ) ): ?>
                  <img src="<?php echo $image1[0]; ?>" alt="" class="w-100 big_im" />
                  <?php endif; ?>

                  <div class="tab__holder">
                     <ul>
                        <?php
                            $i=1;
                            while( have_rows('amenities', $post->ID) ) : the_row(); 
                        ?>
                        <li><a href="#<?php echo $i; ?>"><?php echo get_sub_field('amenities_title', $post->ID); ?> </a></li>|
                        <?php $i++; endwhile; ?>
                     </ul>
                  </div>

                  <?php
                   $i=1;
                   while( have_rows('amenities', $post->ID) ) : the_row(); 
                  ?>
                  <div class="stay__holder" id="#<?php echo $i; ?>">
                     <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                           <img src="<?php echo get_sub_field('amenities_image', $post->ID); ?>" alt="" class="w-100 he__all">
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                           <div class="deluxe__all">
                              <h3><?php echo get_sub_field('amenities_title', $post->ID); ?></h3>
                              <?php echo get_sub_field('amenities_description', $post->ID); ?>
                              <h6>Amenities</h6>
                              <div class="im_one">
                              <?php
                                 while( have_rows('amenities_gallery', $post->ID) ) : the_row(); 
                              ?>
                                 <img src="<?php echo get_sub_field('amenities_photo', $post->ID); ?>" alt="">
                              <?php endwhile; ?>
                              </div>
                              <!-- <a href="#">Know More</a> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php $i++; endwhile; ?>



                  
               </div>
               <div class="visa__maldives">
                  <div class="row">

                  <?php
                     while( have_rows('visa_holder', $post->ID) ) : the_row(); 
                  ?>
                     <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="visa__holder">
                           <h6><?php echo get_sub_field('visa_title', $post->ID); ?></h6>
                           <?php echo get_sub_field('visa_description', $post->ID); ?>
                        </div>
                     </div>
                  <?php endwhile; ?>

                  </div>
               </div>
               <div class="visa__maldives">
                  <h3>Nearby Water Sports Activities</h3>
                  <div
                     class="theme_carousel owl-theme owl-carousel"
                     data-options='{"loop": false, "margin": 25, "autoheight":true, "lazyload":true, "nav": true, "dots": false, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "1" } , "767" :{ "items" : "2" } , "1000":{ "items" : "3" }}}'
                     >

                     <?php
                     $i=1;
                     while( have_rows('sightseeing', $post->ID) ) : the_row(); 
                     ?>

                     <div class="slide-item">
                        <div class="cate__box">
                           <img src="<?php echo get_sub_field('sightseeing_image', $post->ID); ?>" alt="" />
                        </div>
                        <a href="#"><?php echo get_sub_field('sightseeing_name', $post->ID); ?></a>
                     </div>
                     <?php $i++; endwhile; ?>

                     
                  </div>
               </div>
               <div class="visa__maldives border-0">
                  <h3 class="mb-4">Additional Property Highlights</h3>
                  <div class="row">
                    <?php
                    $i = 1; 
                    while( have_rows('additional_property_highlights', $post->ID) ) : the_row(); 
                    ?>
                     <div class="col-sm-3">
                        <div class="wifi__holder">
                           <img src="<?php echo get_sub_field('additional_property_icon_image', $post->ID); ?>" alt="">
                           <h5><?php echo get_sub_field('additional_property_name', $post->ID); ?></h5>
                        </div>
                     </div>
                     <?php $i++; endwhile; ?>                     
                  </div>
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
               <div class="sidebar">
                  <div class="heading__wrapp">
                     <p><i class="fa-regular fa-pen-to-square"></i> <?php the_field('planing_date', $post->ID); ?> . <?php single_cat_title(); ?> .<?php the_field('no_of_days', $post->ID); ?> Day's / <?php the_field('no_of_night', $post->ID); ?> Night's</p>
                  </div>
                  <div class="holdercheckin d-flex">
                     <div class="checkin__wrapp">
                        <p>Check-in:</p>
                        <h4><?php the_field('planing_date', $post->ID); ?></h4>
                     </div>
                    <!--  <div class="checkin__wrapp border-0">
                        <p>Check-in:</p>
                        <h4>Sun, 19 Nov</h4>
                        <p>14:00, afternoon</p>
                     </div> -->
                  </div>
                  <div class="holdercheckin d-flex border-0">
                     <div class="checkin__wrapp border-0">
                        <p>Total :</p>
                        <h4>Trip Cost:- ₹ <?php the_field('trip_cost', $post->ID); ?></h4>
                        <h4>Tcs Price:- ₹ <?php the_field('tcs_price', $post->ID); ?></h4>
                     </div>
                     <div class="checkin__wrapp border-0">
                        <a href="#">Book Now</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
get_footer();
