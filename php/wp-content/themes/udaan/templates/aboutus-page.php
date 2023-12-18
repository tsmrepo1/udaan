<?php
/**Template Name: About Us Page
 */
get_header();
while ( have_posts() ) : the_post(); 
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
          <?php if( get_field('about_us_image') ): ?>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
               <div class="im_about__wrapp">
                  <img src="<?php echo the_field('about_us_image'); ?>" alt="" class="w-100" />
               </div>
            </div>
            <?php endif; ?>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
              <?php if( get_field('about_us_caption') ): ?>
              <div class="about__text__wrapp">
              <h2><?php echo the_field('about_us_caption'); ?></h2>
              </div>
              <?php endif; ?>
              <?php if( get_field('about_us_content') ): ?>
                <?php echo the_field('about_us_content'); ?>
              <?php endif; ?>

              <?php
                  while( have_rows('about_us_features') ) : the_row(); 
              ?>

               <div class="book__with">
                <?php if(!empty(get_sub_field('about_us_features_image'))){ ?>
                  <div class="icon__holder">
                     <img src="<?php echo get_sub_field('about_us_features_image'); ?>" alt="" />
                  </div>
                  <?php } ?>
                  <div class="icon__text">
                    <?php if(!empty(get_sub_field('about_us_features_title'))){ ?>
                     <h4><?php echo get_sub_field('about_us_features_title'); ?></h4>
                     <?php } ?>
                     <?php if(!empty(get_sub_field('about_us_features_content'))){ ?>
                     <p><?php echo get_sub_field('about_us_features_content'); ?></p>
                     <?php } ?>
                  </div>
               </div>
              <?php endwhile; ?>

            </div>
         </div>
      </div>
   </div>
   <?php if( get_field('counter_wrap') == 'Yes' ): ?>
   <div class="counter__wrapp">
      <div class="container">
         <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
               <div class="counter__box">
                  <h2>10,000</h2>
                  <h3>Tour Completed</h3>
               </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
               <div class="counter__box">
                  <h2>850</h2>
                  <h3>Repeat Client</h3>
               </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
               <div class="counter__box">
                  <h2>90%</h2>
                  <h3>Happy Client</h3>
               </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
               <div class="counter__box">
                  <h2>500</h2>
                  <h3>Destinations Covered</h3>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <?php if( get_field('our_team_wrapper') == 'Yes' ): ?>
   <div class="ourteam__wrapper">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <h2>Meet Our team</h2>
            </div>
            <div class="slider__bgone">
               <div
                  class="theme_carousel owl-theme owl-carousel"
                  data-options='{"loop": false, "margin": 25, "autoheight":true, "lazyload":true, "nav": false, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "2" } , "767" :{ "items" : "3" } , "1000":{ "items" : "3" }}}'
                  >

                  <?php
                      while( have_rows('our_team') ) : the_row(); 
                        if(!empty(get_sub_field('team_image'))){
                  ?>
                  <div class="slide-item">
                     <div class="cate__boxonetwo">
                        <img src="<?php echo get_sub_field('team_image'); ?>" alt="" />
                     </div>
                  </div>
                <?php } endwhile; ?> 


               </div>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <?php if( get_field('the_founder') == 'Yes' ): ?>
   <div class="the__founder">
      <div class="container">
         <div class="row">
            <div class="col-sm-11 m-auto">
               <?php if( get_field('founder_content') ): ?>
               <div class="feedback__holder">
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/qu.png" class="qu__wrapp" alt="">                  
                    <?php echo the_field('founder_content'); ?>                  
               </div>
               <?php endif; ?>
               <?php if( get_field('founder_image') ): ?>
               <div class="founder__img">
                  <img src="<?php echo the_field('founder_image'); ?>" alt="">
               </div>
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
   <?php endif; ?>
   <?php if( get_field('testimonial_wrap') == 'Yes' ): ?>
   <div class="testimonial__wrap">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <h3>testimonial</h3>
               <h2>What Client Say</h2>
            </div>
            <div class="te__wrapp">
               <div
                  class="theme_carousel owl-theme owl-carousel"
                  data-options='{"loop": true, "margin": 25, "autoheight":true, "lazyload":true, "nav": true, "dots": false, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "450" :{ "items" : "1" } , "767" :{ "items" : "2" } , "1000":{ "items" : "3" }}}'
                  >
                  <?php
                    while( have_rows('testimonial_management', 9) ) : the_row(); 
                    ?>
                      <div class="slide-item">
                        <div class="star__holder">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>
                        <?php if(!empty(get_sub_field('testimonial_content', 9))){ ?>
                        <div class="testimonial__design__wrapp">
                          <?php echo get_sub_field('testimonial_content', 9); ?>
                        </div>
                        <?php } ?>
                        <div class="client__name">
                          <?php if(!empty(get_sub_field('testimonial_title', 9))){ ?>
                          <p><?php echo get_sub_field('testimonial_title'); ?></p>
                          <?php } ?>
                          <?php if(!empty(get_sub_field('testimonial_image', 9))){ ?>
                          <div class="client__holder">
                            <img src="<?php echo get_sub_field('testimonial_image', 9); ?>" alt="" />
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
   <?php endif; ?>
   <?php if( get_field('faq_wrap') == 'Yes' ): ?>
   <div class="faq__wrapp">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <h2>Frequently Asked Question</h2>
            </div>
            <div class="col-sm-12">
               <div class="accordion" id="accordionExample">
                  <?php
                      $i =1;
                      while( have_rows('faq_management') ) : the_row(); 
                  ?>
                  <div class="card">
                     <div class="card-header" id="heading<?php echo $i; ?>">
                        <h2 class="mb-0">
                           <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>"><i class="fa fa-plus"></i> <?php echo get_sub_field('faq_question'); ?></button>
                        </h2>
                     </div>
                     <div id="collapse<?php echo $i; ?>" class="collapse" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordionExample">
                        <div class="card-body">
                           <?php echo get_sub_field('faq_answered_'); ?>
                        </div>
                     </div>
                  </div>
                  <?php $i++; endwhile; ?> 

               </div>
            </div>
            <!-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
               <div class="accordion" id="accordionExample">
                  <div class="card">
                     <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                           <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapse5"><i class="fa fa-plus"></i> First Tab</button>
                        </h2>
                     </div>
                     <div id="collapse5" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                           <p>First Tab Content</p>
                        </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                           <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse6"><i class="fa fa-plus"></i> Second Tab</button>
                        </h2>
                     </div>
                     <div id="collapse6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                           <p>Second Tab Content</p>
                        </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                           <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse7"><i class="fa fa-plus"></i> Third Tab</button>
                        </h2>
                     </div>
                     <div id="collapse7" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                           <p>Third Tab Content</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div> -->
         </div>
      </div>
   </div>
   <?php endif; ?>
</div>

<?php endwhile; // End of the loop.
get_footer();
?>

