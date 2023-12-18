<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package udaan
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<link href="<?php echo get_template_directory_uri();?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo get_template_directory_uri();?>/assets/css/custom-style.css" rel="stylesheet" />
<link href="<?php echo get_template_directory_uri();?>/assets/css/owl.css" rel="stylesheet" />
<link href="<?php echo get_template_directory_uri();?>/assets/css/responsive.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/bootstrap-datepicker3.min.css">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- search -->
<div id="overlay">
   <div class="container">
      <div class="col-lg-9 col-md-12 col-sm-12 m-auto">
         <!--<form action="">
            <div class="search__holder box-shadowone">
               <div class="search__inner box-shadowone">
                  <input type="text" placeholder="Search Destination Tours Activities"/> 
                  <input type="submit" value="Search" />
               </div>
            </div>
         </form>-->
         <div class="tour__holder">
            <ul>
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
                <li>
                  <a href="<?php echo $cat_link; ?>"><?php echo $term->name; ?></a>
                </li>
                <?php  } ?> 
            </ul>
         </div>
      </div>
   </div>
</div>
<header>
   <nav class="navbar navbar-expand-lg static-top">
      <div class="container-fluid main__header__content">
        <a class="navbar-brand" href="<?php echo home_url(); ?>">
          <?php
              $custom_logo_id = get_theme_mod( 'custom_logo' );
              $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
              if ( has_custom_logo() ) {
                  echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '" alt="logo" class="header__logo">';
              } else {
                  echo '<h1>' . get_bloginfo('name') . '</h1>';
              }
            ?>
        </a>
         <button
            class="navbar-toggler navbar-toggler-right hamburger-menu order-2"
            type="button"
            data-toggle="collapse"
            data-target="#navbarResponsive"
            aria-controls="navbarResponsive"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
         <span class="bar"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
            <?php
                  wp_nav_menu( array(
                  'theme_location'  => 'menu-1',
                  'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                  'container'       => '',
                  'container_class' => '',
                  'container_id'    => '',
                  'menu_class'      => 'navbar-nav',
                  'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'          => new WP_Bootstrap_Navwalker(),
                  ) );
              ?>
         </div>
         <div class="nav__holder">
            <div class="socialicon__header">
               <nav class="menu--right" role="navigation">
                  <div class="menuToggle">
                     <input type="checkbox" />
                     <span></span>
                     <span></span>
                     <span></span>
                     <?php
                     wp_nav_menu(
                     array(
                     "menu"         => "Right Menu",
                     "menu_class"   => "menuItem",
                     "container"    => "ul",
                     )
                     );
                     ?>
                  </div>
               </nav>
            </div>
            <!-- <div class="contact__info">
               <div class="phone__wrapp">
                  <a href="#">
                  <img src="<?php //echo get_template_directory_uri();?>/assets/images/account.png" alt="" />
                  </a>
               </div>
            </div> -->
         </div>
      </div>
   </nav>
</header>

