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

//$category = wp_get_post_categories( $post->ID );
?>
<div class="main__body__wrapp">
  <div class="about__holder">
    <div class="container">
      <div class="row">
         <?php if( get_field('single_package_image', $post->ID) ): ?>
         <img src="<?php the_field('single_package_image', $post->ID); ?>" class="sing_img">
         <?php endif; ?>
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
          <div class="details__holderwrapp">
            <div class="stay__holder" id="#stay">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="deluxe__all">
                    <h3><?php the_title(); ?></h3>
                    <h6>Package Overview:</h6>
                    <p><?php the_content(); ?></p>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion__wrapp__holder">
            <h3>Day wise Itinerary</h3>
            <div class="accordion" id="accordionExample">

            <?php
               $i = 1; 
               while( have_rows('day_wise_itinerary', $post->ID) ) : the_row(); 
            ?>
              <div class="card">
                <div class="card-header" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="<?php if($i == 1){ ?>true<?php } else{?>false<?php } ?>">
                  <span class="title">
                    <span class="day__holder"><?php echo get_sub_field('day_wise_itinerary_title', $post->ID); ?></span>
                  <span class="accicon">
                    <i class="fas fa-angle-down rotate-icon"></i>
                  </span>
                </div>
                <div id="collapse<?php echo $i; ?>" class="collapse <?php if($i == 1){ ?>show<?php } ?>" data-parent="#accordionExample">
                  <div class="card-body"> 
                     <?php echo get_sub_field('day_wise_itinerary_content', $post->ID); ?>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile; ?>
            </div>
          </div>
          <div class="visa__maldives">
            <?php if( get_field('inclusions', $post->ID) ): ?>
            <div class="row">              
              <div class="col-sm-12">
                <?php echo the_field('inclusions', $post->ID); ?>
              </div>
            </div>
            <?php endif; ?>

            <?php if( get_field('exclusions', $post->ID) ): ?>

            <div class="row">
              <div class="col-sm-12">
                <?php echo the_field('exclusions', $post->ID); ?>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
          <div class="sidebar">
            <div class="holdercheckin border-0">
              <div class="checkin__wrappone__wrapp border-0">
               <?php if( get_field('package_price', $post->ID) ): ?>
                <h3 class="font-weight-bold">₹ <?php echo the_field('package_price', $post->ID); ?></h3>
               <?php endif; ?>
                <p>
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/budget.png" alt=""> Budget | Private Tour Package
                </p>
                <p>
                  <img src="<?php echo get_template_directory_uri();?>/assets/images/location_1.png" alt=""> 
                  <?php 
                     $category_detail=get_the_category($post->ID);//$post->ID
                        foreach($category_detail as $cd){
                        echo $cd->cat_name.", ";
                     } 
                  ?>
                </p>
              </div>
              <div class="checkin__wrappone__wrapp border-0">
                <a href="#" data-toggle="modal" data-target="#exampleModal">Book Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tell Us Your Travel Requirements </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <?php echo do_shortcode('[contact-form-7 id="17ff040" title="Tour Packages"]');?>        
      </div>      
    </div>
  </div>
</div>
<?php
get_footer();
?>
<!-- plus -->
    
