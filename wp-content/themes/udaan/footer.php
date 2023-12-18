<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package udaan
 */

?>
<footer class="footer__wrapp">
   <div class="container">
      <div class="bor__wrapp">
         <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
               <div class="footer__logo">
                  <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri();?>/assets/images/logo__footer.png" alt="" /></a>
                  <?php if( get_field('footer_content', 'options') ): ?>
                  <?php endif; ?>
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
               <div class="footer__box">
                  <ul>
                     <li><a href="#">International Holidays</a></li>
                     <li><a href="#">Honeymoon Getaways</a></li>
                     <li><a href="#">Packages by Interest</a></li>
                     <li><a href="#">Packages by City</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
               <div class="footer__box">
                  <?php
                  wp_nav_menu(
                  array(
                  "menu"         => "Footer Menu 1",
                  "menu_class"   => "",
                  "container"    => "ul",
                  )
                  );
                  ?>
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
               <div class="footer__box">
                  <?php
                  wp_nav_menu(
                  array(
                  "menu"         => "Right Menu",
                  "menu_class"   => "",
                  "container"    => "ul",
                  )
                  );
                  ?>
               </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
              <?php if( get_field('phone_no', 'options') ): ?>
               <div class="footer__address">
                  <div class="footer__icon">
                     <i class="fa-solid fa-phone"></i>
                  </div>
                  <div class="phone__footer">
                     <a href="tel:<?php echo str_replace(array(" ","-"),'',get_field('phone_no', 'options')); ?>"><?php the_field('phone_no', 'options'); ?></a>
                  </div>
               </div>
               <?php endif; ?>
               <?php if( get_field('email_address', 'options') ): ?>
               <div class="footer__address">
                  <div class="footer__icon">
                     <i class="fa-solid fa-envelope"></i>
                  </div>
                  <div class="phone__footer">
                     <a href="mailto:<?php echo the_field('email_address', 'options'); ?>"><?php the_field('email_address', 'options'); ?></a>
                  </div>
               </div>
               <?php endif; ?>
               <div class="footer__address">
                  <div class="footer__icon">
                     <i class="fa-solid fa-location-dot"></i>
                  </div>
                  <?php if( get_field('contact_address', 'options') ): ?>
                  <div class="phone__footer">
                     <p><?php the_field('contact_address', 'options'); ?></p>
                  </div>
                  <?php endif; ?>
               </div>
               <div class="footer__social">
                <?php
                 while( have_rows('social_media_link', 'options') ) : the_row(); 
                ?>
                  <a href="<?php echo get_sub_field('media_link', 'options'); ?>"><i class="fa-brands fa-<?php echo get_sub_field('media_icon', 'options'); ?>"></i></a>
                <?php endwhile; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="down__footer">
      <div class="container">
         <div class="row">
            <div class="col-sm-6">
              <?php
              wp_nav_menu(
              array(
              "menu"         => "Footer Menu",
              "menu_class"   => "",
              "container"    => "ul",
              )
              );
              ?>
            </div>
            <div class="col-sm-6">
               <p>© uddan | <span>All Rights Reserved</span> </p>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- <script src="<?php //echo get_template_directory_uri();?>/assets/vendor/jquery/jquery.slim.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/bootstrap-datepicker.min.js"></script>
<script src="https://kit.fontawesome.com/2d537fef4a.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/core.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/owl.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/script.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/swiper.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/core.js"></script>

<script>
   (function () {
     $(".hamburger-menu").on("click", function () {
       $(".bar").toggleClass("animate");
     });
   })();
</script>

<script>
      function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
}
    </script>
<!-- date -->
<script>
  $(function () {
  $('.datepicker').datepicker({
    language: "es",
    autoclose: true,
    format: "dd/mm/yyyy"
  });
});

</script>
    <!-- tabone form -->
    <script>
      $(document).ready(function(){
            $('input[name="showHideTextbox"]').on('click',function(){
                if($(this).val() === 'show'){
                    $('#input1').show();
                }else{
                    $('#input1').val('').hide();
                }
            });
        });
    </script>

<!-- Right Nav -->
<script type="text/javascript">
  $(document).ready(function(){
  // ---> category dropdown filter
  $("#filtersWrapper .filter-nav li.has-dropdown button").click(function () {
    if ($(this).closest("li").hasClass("has-dropdown--active")) {
      $(this).closest("li").removeClass("has-dropdown--active");
      $(this).closest("li").find("ul").slideUp(300);
    } else {
      $("#filtersWrapper .filter-nav li.has-dropdown ul").slideUp(300);
      $("#filtersWrapper .filter-nav li.has-dropdown").removeClass("has-dropdown--active");
      
      $(this).closest("li").addClass("has-dropdown--active");
      $(this).closest("li").find("ul").slideDown(300);
    }
  });
  });
</script>>





<!-- tab js -->
<script>
   $(" .owl_1").owlCarousel({
     loop: false,
     margin: 2,
     responsiveClass: true,
     autoplayHoverPause: false,
     autoplay: false,
     slideSpeed: 400,
     paginationSpeed: 400,
     autoplayTimeout: 3000,
     responsive: {
       0: {
         items: 1,
         nav: true,
         loop: false,
       },
       600: {
         items: 2,
         nav: true,
         loop: false,
       },
       1000: {
         items: 4,
         nav: true,
         loop: false,
       },
     },
   });
   
   $(document).ready(function () {
     var li = $(".owl-item li ");
     $(".owl-item li").click(function () {
       li.removeClass("active");
     });
   });
</script>
<!-- overlay -->
<script>
   function on() {document.getElementById("overlay").style.display = "block";}
</script>

<?php wp_footer(); ?>

</body>
</html>
