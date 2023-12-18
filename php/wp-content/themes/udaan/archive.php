<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package udaan
 */

get_header();
$term_id = get_queried_object_id();
?>
<div class="main__body__wrapp">
  <div class="main__banner header__inner__banner">
    <div class="image__box__banner">
      <img src="<?php echo get_template_directory_uri();?>/assets/images/innerbanner.jpg" alt="" />
    </div>
    <div class="banner__content">
      <div class="container">
        <div class="banner__content__inner">
          <h1><?php single_cat_title(); ?> Packages</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="about__holder">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 mt-5">
          <div class="filter__leftpanel" id="filtersWrapper">

            <nav class="filter-nav">
                    <ul>
                    <?php
                    $taxonomy     = 'category';
                    $orderby      = 'name';  
                    $show_count   = 0;      // 1 for yes, 0 for no
                    $pad_counts   = 0;      // 1 for yes, 0 for no
                    $hierarchical = 1;      // 1 for yes, 0 for no  
                    $title        = '';  
                    $empty        = 0;
            
                    $args = array(
                        'taxonomy'     => $taxonomy,
                        'orderby'      => $orderby,
                        'show_count'   => $show_count,
                        'pad_counts'   => $pad_counts,
                        'hierarchical' => $hierarchical,
                        'title_li'     => $title,
                        'hide_empty'   => $empty
                    );
                    $all_categories = get_categories( $args );
                    foreach ($all_categories as $cat) {
                    if($cat->category_parent == 0) {
                        $category_id = $cat->term_id;
                        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );   
                        $image = wp_get_attachment_url( $thumbnail_id ); 
                        $linkM = get_term_link( $cat->slug, $cat->taxonomy );
                    ?>
                      <li class="has-dropdown">
                        <a href="<?php echo $linkM; ?>">
                          <span><?php echo $cat->name; ?></span>
                        </a>
                        <?php if($linkM != '') { ?>
                        <button><i class="fa-solid fa-chevron-down"></i></button>
                        <?php } ?>

                        <ul>
                            <?php 
                            $args2 = array(
                                    'taxonomy'     => $taxonomy,
                                    'child_of'     => 0,
                                    'parent'       => $category_id,
                                    'orderby'      => $orderby,
                                    'show_count'   => $show_count,
                                    'pad_counts'   => $pad_counts,
                                    'hierarchical' => $hierarchical,
                                    'title_li'     => $title,
                                    'hide_empty'   => $empty
                            );
                            $sub_cats = get_categories( $args2 );
                            //echo "<pre>";
                            //print_r($sub_cats);
                            //echo "</pre>";
                            if($sub_cats) {
                                foreach($sub_cats as $sub_category) {
                                $link = get_term_link( $sub_category->slug, $sub_category->taxonomy );
            
                            ?>
                            
                              <li>
                                <a href="<?php echo $link; ?>"><?php echo  $sub_category->name ; ?></a>
                              </li>
                            <?php } } ?>
                        </ul>
                      </li>
                      
                    <?php 
                    }       
                    }
                    ?>
                    </ul>
                 </nav>





          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9 mt-5">

		 <?php
            $all_subcat_args = array(
                'post_type' => 'packages',
                
            );
            $all_subcat_query = new WP_Query( $all_subcat_args ); 
            if ( $all_subcat_query->have_posts() ) {
            while ( $all_subcat_query->have_posts() ) {
            $all_subcat_query->the_post();
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

<?php
get_footer();
