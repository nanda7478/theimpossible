<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 
while ( have_posts() ) :
			the_post();
?>


 <div class="topbanner paint-border  paint-bottom position-relative" style="background-image: url('http://demosrvr.com/wp/theimpossibleco/wp-content/uploads/2019/04/image-1.png');">
	
  <div class=" w-100 d-table h-100">
    <div class="d-table-cell w-100 h-100 align-middle">
    		 
    </div>
  </div>
</div>
<div class="py-50-30 pb-0">
<div class="container ">
<!-- <div class="row">
<div class="col-md-12 t-t text-center">
         <h2 class="f-56"><?php // the_title(); ?></h2>
        </div>
</div> -->

<div class="row">
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

<div class="col-md-12  mb-30">
   <div class="single_page_con">
     <h2><?php  the_title(); ?></h2>
     <br />
    <div class="left_images_box">
  <img src="<?php echo $image[0]; ?>" alt="">
    <!-- <div class="top d-flex justify-content-between">
                 <div class="left">
                   <i class="fa fa-user"></i><span><?php echo $author = get_the_author(); ?> </span>
                 </div>
                 <div class="right">
                    <i class="fas fa-clock"></i><span><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
                 </div>
              </div> -->
</div>
<div class="left_con_box">
 
  <p><?php  the_content(); ?></p>
</div>
   </div>
</div>


</div>


</div>
</div>



<!-- <div class="py-50-30">
      <div class="container position-relative">
        
      <div class="row">
<div class="col-md-12 t-t text-center">
         <h2 class="f-56"> Related blog</h2>
        </div>
</div>  
         
      
      <?php   function wpdocs_custom_excerpt_length( $length ) {
         return 15;}
         add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length');
         
         $args = array(
         'numberposts' => 3,
         'post_type' => 'post',
         ); 
         $the_query = new WP_Query( $args ); ?>
      <?php if ( $the_query->have_posts() ) : ?>
      <div class="row">
         <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
         <div class="col-lg-4 col-md-6 mb-30">
            <div class="blog_box_home">
              <div class="blog_box_img">
                <a href="<?php the_permalink();?>">
                <?php  echo get_the_post_thumbnail();?>
              </a>
              </div>
            
           <div class="blog_box_con">
              <div class="top d-flex justify-content-between">
                 <div class="left">
                   <i class="fa fa-user"></i><span><?php echo $author = get_the_author(); ?> </span>
                 </div>
                 <div class="right">
                    <i class="fas fa-clock"></i><span><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
                 </div>
              </div>
              <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
             <p><?php
               echo wp_trim_words( get_the_content(), 15 ,'' );
               ?> <a href="<?php echo the_permalink(); ?>" class="btn-link-blog text-white">View More</a></p>
           
           
           </div>
           </div>
            
         </div>
         <?php endwhile; ?>
      </div>
      <?php endif; ?>   
      </div>
</div> -->

<section class="home_blog py-50-30 py-50-20  paint-border paint-top paint-bottom position-relative">
      <div class="container position-relative">
        
         <div class="row">
<div class="col-md-12 t-t text-center">
         <h2 class="f-56"> Related blog</h2>
        </div>
</div>  
         
      
      <?php   /*function wpdocs_custom_excerpt_length( $length ) {
         return 15;}
         add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length');*/
         
         $args = array(
         'showposts'  =>  -1,
         'post_type' => 'post',
         ); 
         $the_query = new WP_Query( $args ); ?>
      <?php if ( $the_query->have_posts() ) : ?>
      <div class="row">
        <div class="owl-carousel owl-theme" id="blogslider">
         <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
       <div class="popular_videos pro-iteam">
           <div class="visible_home_veido">
 <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
 <a href="<?php echo the_permalink(); ?>">             
<img class="img" src="<?php echo $image[0]; ?>" />
<div class="top d-flex justify-content-between">
                 <div class="left">
                   <i class="fa fa-user"></i><span><?php echo $author = get_the_author(); ?> </span>
                 </div>
                 <div class="right">
                    <i class="fas fa-clock"></i><span><?php echo get_the_date( 'M d Y' ); ?></span>
                 </div>
              </div>
 <div class="text">
<div class="cen">
 <h2> <?php the_title(); ?> </h2>
</div>
</div> </a></div>

     </div> 




         <?php endwhile; ?>
      </div>
      <?php endif; ?>   
      </div>
      </div>
   </section>



<?php endwhile; ?>
<?php get_footer(); ?>
<style type="text/css">
  .single-post .blog_box_con h4 a {color: #2d2d2d}
  .single-post .blog_box_con p a {color: #2d2d2d !important}
  .single-post .home_blog.paint-border.paint-bottom {
    background: #fff !important;
}
.single-post .owl-nav.disabled {
    display: none;
}
</style>