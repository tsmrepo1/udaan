<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package udaan
 */

get_header();
?>
<div class="main__body__wrapp">
   <div class="container">
     
         <div class="registration__holder">
            <?php the_content(); ?>
         </div>         
   
   </div>
</div>
<?php
get_footer();
