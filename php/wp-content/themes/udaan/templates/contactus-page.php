<?php
/**Template Name: Contact Us Page
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
               <h1>Contact Us</h1>
            </div>
         </div>
      </div>
   </div>
   <div class="about__holder">
      <div class="container">
         <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
               <div class="contact__wrapp">
                  <div class="phone__contact__wrapp">
                     <?php if( get_field('phone_no') ): ?>
                     <div class="ph_one">
                        <div class="ph__im">
                           <img src="<?php echo get_template_directory_uri();?>/assets/images/phone.png" alt="">
                        </div>
                        <p>Phone</p>
                     </div>
                     <a href="tel:<?php echo str_replace(array(" ","-"),'',get_field('phone_no')); ?>" class="phone_number"><?php echo the_field('phone_no'); ?></a>
                     <?php endif; ?>
                     <?php if( get_field('email_address') ): ?>
                     <div class="ph_one">
                        <div class="ph__im">
                           <img src="<?php echo get_template_directory_uri();?>/assets/images/email.png" alt="">
                        </div>
                        <p>Email</p>
                     </div>
                     <a href="mailto:<?php echo the_field('email_address'); ?>" class="phone_number"><?php echo the_field('email_address'); ?></a>
                     <?php endif; ?>
                     <?php if( get_field('contact_address') ): ?>
                     <div class="ph_one">
                        <div class="ph__im">
                           <img src="<?php echo get_template_directory_uri();?>/assets/images/map.png" alt="">
                        </div>
                        <p>Adress</p>
                     </div>
                     <a href="#" class="phone_number border-bottom-0"><?php echo the_field('contact_address'); ?></a>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 p-0">
               <div class="form__wrapp">
                  <h2>Get In Touch</h2>
                  <?php echo do_shortcode('[contact-form-7 id="680a482" title="Contact form 1"]');?>              
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php if( get_field('contact_address_map') ): ?>
   <div class="map__wrapp">
      <div class="container">
         <div class="row">
            <div class="map">
               <iframe src="<?php echo the_field('contact_address_map'); ?>" 
                  width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
            </div>
         </div>
      </div>
   </div>
<?php endif; ?>
</div>
<?php endwhile; // End of the loop.
get_footer();

?>

