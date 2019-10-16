<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 
while ( have_posts() ) :
			the_post();
?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
 <div class="topbanner paint-border  paint-bottom position-relative" style="background-image: url(<?php if($image[0]){ echo $image[0];  }else{ echo 'http://theimpossibleco.com/wp-content/uploads/2019/04/image-1.png';  } ?>);">
	
  <div class=" w-100 d-table h-100">
    <div class="d-table-cell w-100 h-100 align-middle">
    		<div class="container">
  		
  	</div>
    </div>
  </div>
</div>
<div class="p-t-0 py-50-30">
<div class="container ">

  <div class="row top-heads">
      <div class="col-md-12 t-t text-center ">
         <?php
           if(is_wc_endpoint_url('orders')){
            $currentLanguage  = get_bloginfo('language');
            if($currentLanguage == 'ja'){
             ?>
                <h2 class="f-56">注文履歴</h2>
             <?php
            }else{
              ?>
             <h2 class="f-56">ORDER HISTORY</h2>
              <?php
            }
            ?>

           

            <?php
           }elseif(is_wc_endpoint_url('edit-account')){
            $currentLanguage  = get_bloginfo('language');
            if($currentLanguage == 'ja'){
             ?>
                <h2 class="f-56">アカウント詳細</h2>
             <?php
            }else{
              ?>
            <h2 class="f-56">Account Details</h2>
              <?php
            }
            ?>
           
          <?php 
           }
           else{
            ?>
              <h2 class="f-56"><?php  the_title(); ?></h2>
            <?php
           }
         ?>
        <?php if(is_page('thank-you')) { ?>
        <?php the_content(); ?> 
        <?php } ?>
       </div> 
     </div> 
<?php if(is_page('thank-you')) { ?>
<?php //the_content(); ?> 
<?php } else { ?>
<?php the_content(); ?>	
<?php } ?>

</div>
</div>

	


<?php endwhile; ?>
<?php get_footer(); ?>
