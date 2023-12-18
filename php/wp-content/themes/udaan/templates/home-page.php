<?php
/**Template Name: Home Page
 * The template for displaying all single posts
 *
 *  * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
get_header();
while ( have_posts() ) : the_post(); ?>
<div class="main__body__wrapp">
      <div class="main__banner">
        <div
          class="theme_carousel owl-theme owl-carousel"
          data-options='{"loop": false, "margin": 25, "autoheight":true, "lazyload":true, "nav": true, "dots": false, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "1" } , "767" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'
        >

        <?php
            while( have_rows('banner_management') ) : the_row(); 
        ?>

          <div class="slide-item">
            <?php if(!empty(get_sub_field('banner_image'))){ ?>
            <div class="image__box"><img src="<?php echo get_sub_field('banner_image'); ?>" alt="" /></div>
            <?php } ?>
            <div class="banner__content">
              <div class="container">
                <div class="col-lg-9 col-md-12 col-sm-12 m-auto">
                  <?php if(!empty(get_sub_field('banner_caption_1'))){ ?>
                  <h1><?php echo get_sub_field('banner_caption_1'); ?></h1>
                  <?php } ?>
                  <?php if(!empty(get_sub_field('banner_caption_2'))){ ?>
                  <h2><?php echo get_sub_field('banner_caption_2'); ?></h2>
                  <?php } ?>
                  <div class="search__holder">
                    <div class="search__inner">
                      <a href="https://udaan.thinksurfmedia.in/php/customize/" onclick="on()">
                      <input type="submit" value="Search" disabled />
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <?php endwhile; ?> 

        </div>
      </div>
      <?php if( get_field('counter_section') == 'Yes' ): ?>
      <div class="counter__icon">
        <div class="row">


        <?php
            while( have_rows('counter_section_mangment') ) : the_row(); 
        ?>
          <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3">
            <div class="box__icon">
              <?php if(!empty(get_sub_field('counter_section_image'))){ ?>
              <img src="<?php echo get_sub_field('counter_section_image'); ?>" alt="" />
              <?php } ?>
              <?php if(!empty(get_sub_field('counter_number'))){ ?>
                <h3><?php echo get_sub_field('counter_number'); ?></h3>
              <?php } ?>
              <?php if(!empty(get_sub_field('counter_title'))){ ?>
              <p><?php echo get_sub_field('counter_title'); ?></p>
              <?php } ?>
            </div>
          </div>
        <?php endwhile; ?> 

        </div>
      </div>
      <?php endif; ?>

      <div class="trending__wrapp">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h3>Trending</h3>
              <h2>Tours</h2>
            </div>

            <div class="service__items">
              <div
                class="theme_carousel owl-theme owl-carousel"
                data-options='{"loop": false, "margin": 25, "autoheight":true, "lazyload":true, "nav": true, "dots": false, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "2" } , "767" :{ "items" : "4" } , "1000":{ "items" : "6" }}}'
              >


              <?php
                $argsT = array(
                'post_type' => 'packages',
                'meta_query'=> array(
                    array(
                    'key' => 'trending_package',
                    'value' => 'Yes'
                    )
                ),
                'posts_per_page' => -1
                );
                $loopT = new WP_Query( $argsT );
                if ( $loopT->have_posts() ) {
                while ( $loopT->have_posts() ) : $loopT->the_post();
                  $imageT = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )
                ?>

                <div class="slide-item">
                  <div class="cate__box">
                    <?php if( get_field('single_package_image', $post->ID) ){ ?>
                      <img src="<?php the_field('single_package_image', $post->ID); ?>" class="sing_img">
                    <?php } else { ?>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/no-image.jpg" alt="" >
                    <?php } ?>
                  </div>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>

                <?php                                       
                endwhile;
                } else {
                    echo __( 'No products found' );
                }
                wp_reset_postdata();
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="add__wrapp">
        <div class="container">
          <div class="row">
            <div
              class="theme_carousel owl-theme owl-carousel"
              data-options='{"loop": false, "margin": 25, "autoheight":true, "lazyload":true, "false": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "1" } , "767" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'
            >

              <?php
                  while( have_rows('below_banner_section_management') ) : the_row(); 
                    if(!empty(get_sub_field('upload_package_image'))){
              ?>

              <div class="slide-item">
                <div class="add__img">
                  <img src="<?php echo get_sub_field('upload_package_image'); ?>" alt="" />
                </div>
              </div>

              <?php } endwhile; ?>


            </div>
          </div>
        </div>
      </div>
      <div class="quick__wrapp">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h3>QUICK GETAWAY</h3>
              <h2>Destinations</h2>
            </div>
            <div class="service__itemsone">
              <div
                class="theme_carousel owl-theme owl-carousel"
                data-options='{"loop": false, "margin": 25, "autoheight":true, "lazyload":true, "nav": true, "dots": false, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "2" } , "767" :{ "items" : "2" } , "1000":{ "items" : "4" }}}'
              >

            <?php

            $taxonomyName = "category";
                $parent_terms = get_terms($taxonomyName, array('include' => array(37), 'orderby' => 'slug', 'hide_empty' => false));   

                foreach ($parent_terms as $pterm) {

                  $terms = get_terms($taxonomyName, array('parent' => $pterm->term_id,  'orderby' => 'slug', 'hide_empty' => false));
                    foreach ($terms as $term) {


                  $argsPackages = array(
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
                  $packages = new WP_Query( $argsPackages );




            /*$argsPackages = array (
            'post_type'          => 'packages',
            'post_status'        => 'publish',
            'order'              => 'ASC',
            'posts_per_page'     =>  -1
            );
            $packages = new WP_Query( $argsPackages );*/
            if ( $packages->have_posts() ) {
            while ( $packages->have_posts() ) {
            $packages->the_post();
            $packagesImage1 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            ?>
                <div class="slide-item">
                  <div class="cate__boxone">
                    <?php if( get_field('single_package_image', $post->ID) ){ ?>
                    <img src="<?php the_field('single_package_image', $post->ID); ?>" alt="">
                    <?php } else { ?>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/no-image.jpg" alt="" >
                    <?php } ?>
                  </div>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  <p>₹ <?php the_field("package_price", $post->ID); ?> / <?php the_field('no_of_days', $post->ID); ?> Day's / <?php the_field('no_of_night', $post->ID); ?> Night's</p>
                </div>

            <?php 
            }
            } else {
              ?>
              <?php  echo __( 'No Packages Available' );
            } wp_reset_postdata(); ?>

          <?php  } } ?>   

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="testimonial__wrap">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h3>Testimonial</h3>
              <h2>What Client Say</h2>
            </div>
            <div class="te__wrapp">
              <div
                class="theme_carousel owl-theme owl-carousel"
                data-options='{"loop": true, "margin": 25, "autoheight":true, "lazyload":true, "nav": true, "dots": false, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "1" } , "767" :{ "items" : "2" } , "1000":{ "items" : "3" }}}'
              >

            <?php
              while( have_rows('testimonial_management') ) : the_row(); 
            ?>
                <div class="slide-item">
                  <div class="star__holder">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                  <?php if(!empty(get_sub_field('testimonial_content'))){ ?>
                  <div class="testimonial__design__wrapp">
                    <?php echo get_sub_field('testimonial_content'); ?>
                  </div>
                  <?php } ?>
                  <div class="client__name">
                    <?php if(!empty(get_sub_field('testimonial_title'))){ ?>
                    <p><?php echo get_sub_field('testimonial_title'); ?></p>
                    <?php } ?>
                    <?php if(!empty(get_sub_field('testimonial_image'))){ ?>
                    <div class="client__holder">
                      <img src="<?php echo get_sub_field('testimonial_image'); ?>" alt="" />
                    </div>
                    <?php } ?>
                  </div>
                </div>

              <?php endwhile; ?> 


              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="quick__wrapp">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h3>Find The Perfect</h3>
              <h2>Holiday</h2>


              <?php 


               /* $taxonomyName = "category";
                $parent_terms = get_terms($taxonomyName, array('include' => array(37), 'orderby' => 'slug', 'hide_empty' => false));   

                foreach ($parent_terms as $pterm) {
                    echo '<div class="single_cat col-md-3">';
                        echo '<h3>'.$pterm->name.'</h3>'; 
                    $terms = get_terms($taxonomyName, array('parent' => $pterm->term_id,  'orderby' => 'slug', 'hide_empty' => false));
                    foreach ($terms as $term) {

                        echo "<ul>";
                        echo '<li><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>'; 
                        echo "</ul>";

                    }
                      echo '</div>'; 
                }*/


                 ?>


            </div>
            <div class="service__itemsone two">
              

            <div class="custom-tab" id="topCollegesTab">
            <div class="owl-carousel owl-theme courses-carousel has-nav-vertical-middle pt-md-2 mb-3">

            <?php 
            $i = 1;
            $terms = get_terms(array('taxonomy'=> 'category','hide_empty' => false, ));


            foreach ( $terms as $term ) {
                    if ($term->parent == 0 ) {
            ?>


              <div class="item">
                <button class="custom-tab__btn <?php if($i == 1){ ?>active <?php } ?>" data-target="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></button>
              </div>
            <?php $i++; } } ?>          


            </div>

            <div class="custom-tab__content pt-md-2 mb-4">
            <?php 
            $i = 1;
            $terms = get_terms(array('taxonomy'=> 'category','hide_empty' => false, ));


            foreach ( $terms as $term ) {
                    if ($term->parent == 0 ) {
            ?>
              <div class="custom-tab__pane <?php if($i == 1){ ?>active <?php } ?>" data-id="<?php echo $term->term_id; ?>">
                   <div class="row">

                <?php 
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
                  if ( $loop->have_posts() ) {
                  while ( $loop->have_posts() ) : $loop->the_post();
                  $image1 = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                  $title=get_the_title($post->ID);
                  ?>

                   
                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 service__itemsone">
                      <div class="cate__boxone">
                    <?php if( get_field('single_package_image', $post->ID) ){ ?>
                    <img src="<?php the_field('single_package_image', $post->ID); ?>" alt="">
                    <?php } else { ?>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/no-image.jpg" alt="" >
                    <?php } ?>
                      </div>
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      <?php if( get_field('package_price', $post->ID) ): ?>
                        <h4 class="font-weight-bold">₹ <?php echo the_field('package_price', $post->ID); ?></h4>
                      <?php endif; ?>
                    </div>
                     

                  <?php endwhile; } else { ?>

                    <h1>No Data Found</h1>
                  <?php 
                } 
                    wp_reset_postdata();
                  ?>
                  </div>

              </div>

             <?php $i++; } } ?>   

              


            </div>
          </div>



            </div>
          </div>
        </div>
      </div>
      <div class="blog__wrapp">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h3>Visit Our</h3>
              <h2>Blogs</h2>
            </div>

            <?php

            $args = array (
            'post_type'          => 'post',
            'post_status'        => 'publish',
            'order'              => 'ASC',
            'posts_per_page'     =>  3
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
              <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
              <p><?php echo wp_trim_words( get_the_content(), 8, '...' ); ?></p>
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
<?php endwhile; 
get_footer();
?>


