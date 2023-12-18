<?php
/**Template Name: FAQ Page
 */
get_header();
while ( have_posts() ) : the_post(); 
?>
<div class="main__body__wrapp">
   <div class="container">
      <div class="row">
         <div class="registration__holder">
            <div class="container">
    <center>
        <h2>Frequently asked questions</h2>
    </center>
    <div class="accordion" id="accordionExample">
        <h1>FAQs</h1>
        <?php
            $i =1;
            while( have_rows('faq_managment') ) : the_row(); 
        ?>
        <div class="card">
            <div class="card-header" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="<?php if($i == 1){?>true<?php } else{ ?>false<?php } ?>">     
                <span class="title"><?php echo get_sub_field('faq_question'); ?> </span>
                <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
            </div>
            <div id="collapse<?php echo $i; ?>" class="collapse <?php if($i == 1){?>show<?php } ?>" data-parent="#accordionExample">
                <div class="card-body"><?php echo get_sub_field('faq_answered_'); ?></div>
            </div>
        </div>
        <?php $i++; endwhile; ?> 
        
        
        <h1>Changes To Itinerary</h1>
        <?php
            $j =1;
            while( have_rows('changes_to_itinerary_managment') ) : the_row(); 
        ?>
        <div class="card">
            <div class="card-header" data-toggle="collapse" data-target="#Itinerary<?php echo $j; ?>" aria-expanded="<?php if($j == 1){?>true<?php } else{ ?>false<?php } ?>">     
                <span class="title"><?php echo get_sub_field('changes_to_itinerary_question'); ?> </span>
                <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
            </div>
            <div id="Itinerary<?php echo $j; ?>" class="collapse <?php if($j == 1){?>show<?php } ?>" data-parent="#accordionExample">
                <div class="card-body"><?php echo get_sub_field('changes_to_itinerary_answered'); ?></div>
            </div>
        </div>
        <?php $j++; endwhile; ?> 
        
        <h1>Before booking</h1>
        <?php
            $k =1;
            while( have_rows('before_booking_management') ) : the_row(); 
        ?>
        <div class="card">
            <div class="card-header" data-toggle="collapse" data-target="#booking<?php echo $k; ?>" aria-expanded="<?php if($k == 1){?>true<?php } else{ ?>false<?php } ?>">     
                <span class="title"><?php echo get_sub_field('before_booking_question'); ?> </span>
                <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
            </div>
            <div id="booking<?php echo $k; ?>" class="collapse <?php if($k == 1){?>show<?php } ?>" data-parent="#accordionExample">
                <div class="card-body"><?php echo get_sub_field('before_booking_answered'); ?></div>
            </div>
        </div>
        <?php $k++; endwhile; ?> 
        
        
        <h1>After booking</h1>
        <?php
            $l =1;
            while( have_rows('after_booking_management') ) : the_row(); 
        ?>
        <div class="card">
            <div class="card-header" data-toggle="collapse" data-target="#booking<?php echo $l; ?>" aria-expanded="<?php if($l == 1){?>true<?php } else{ ?>false<?php } ?>">     
                <span class="title"><?php echo get_sub_field('after_booking_question'); ?> </span>
                <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
            </div>
            <div id="booking<?php echo $l; ?>" class="collapse <?php if($l == 1){?>show<?php } ?>" data-parent="#accordionExample">
                <div class="card-body"><?php echo get_sub_field('after_booking_answered'); ?></div>
            </div>
        </div>
        <?php $l++; endwhile; ?> 
        
        
        <h1>During travel</h1>
        <?php
            $m =1;
            while( have_rows('during_travel_management') ) : the_row(); 
        ?>
        <div class="card">
            <div class="card-header" data-toggle="collapse" data-target="#After<?php echo $m; ?>" aria-expanded="<?php if($m == 1){?>true<?php } else{ ?>false<?php } ?>">     
                <span class="title"><?php echo get_sub_field('during_travel_question'); ?> </span>
                <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
            </div>
            <div id="After<?php echo $m; ?>" class="collapse <?php if($m == 1){?>show<?php } ?>" data-parent="#accordionExample">
                <div class="card-body"><?php echo get_sub_field('during_travel_answered'); ?></div>
            </div>
        </div>
        <?php $m++; endwhile; ?>
        
        
    </div>
</div>
         </div>         
      </div>
   </div>
</div>
<?php endwhile; // End of the loop.
get_footer();

?>

