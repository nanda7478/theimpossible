<?php
/*
 Template Name: homepage template
 */
get_header(); ?>
<?php $top_banner =  get_field('top_banner');  ?>
        
<!-- <div class="topbanner paint-border  paint-bottom position-relative" style="background-image: url(<?php echo $top_banner['add_banner_images']; ?>);">
  <div class=" w-100 d-table h-100">
    <div class="d-table-cell w-100 h-100 align-middle">
    		<div class="container">
  		<div class="row">
      <div class="col-md-12 text-center">
        
        <h2 class="text-white f-56"><?php echo $top_banner['add_title']; ?></h2>
        <p class="lead text-light"><?php echo $top_banner['add_text']; ?></p>

       </div> 
     </div> 
  	</div>
    </div>
  </div>
</div> -->

 <section class="popular_videos_section main-slides">
      <div class="position-relative">
 
      <div class="owl-carousel owl-theme" id="secondslider">
          <?php
      
         while ( have_rows('top_banner') ) : the_row();
          ?>
         <div class="item">
          <a href="<?php the_sub_field('add_redirect_link'); ?>"> <img src="<?php  the_sub_field('add_image'); ?>" width="100%" alt="slider"></a>
        <div class="con"> 
          <h2><?php  the_sub_field('add_title'); ?></h2>
          <p> <?php  the_sub_field('add_content'); ?> </p>
          <!--  <a href="<?php  //the_sub_field('add_redirect_link'); ?>">Learn More</a> -->
         </div>
          </div>
         <?php
         endwhile;
        ?>

         
      

      <!-- <ul id='carousel-custom-dots' class='owl-dots'> 
 <?php
        $counterslider = 1;
         while ( have_rows('top_banner') ) : the_row();
          ?>
  <li class='owl-dot<?php if($counterslider==1){ echo "active"; } ?>'><?php // the_sub_field('add_title'); ?></li> 
     <?php
     $counterslider++;
         endwhile;
        ?>
</ul> -->
</div>
</div></section>




   <section class="popular_videos_section py-50-20">
      <div class="container position-relative">
      <?php $popular_videos_section =  get_field('popular_videos_section'); ?>
         <div class="section-title text-center text-color">
          <h2 class=" f-50 font-weight-bold text-capitalize"><?php echo $popular_videos_section['add_title']; ?></h2>
         <p class="lead  f-20 fw-500"><?php echo $popular_videos_section['add_text']; ?></p>
         </div>
         <div class="row">
        <div class="col-md-12">
 <div class="owl-carousel owl-theme" id="popularlider">
         <?php  
            $args = array(
            'post_type'      => 'product',
             'product_cat'    => 'new-releases',
             'showposts'      =>  -1,
            );
            $loopreleases = new WP_Query( $args );
            ?>  
         <?php if ( $loopreleases->have_posts() ) : 
            $count = 0; ?>
             <?php while ( $loopreleases->have_posts() ) : $loopreleases->the_post(); 
               ?>
       
<div class="item">
            <div class="popular_videos pro-iteam">
            

           


           <div class="visible_home_veido">
                         
                        
           


 <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
            
 <a href="<?php echo the_permalink(); ?>">             
<img class="img" src="<?php echo $image[0]; ?>" />

 <div class="text">
                  <div class="cen">
            
           
             <h2> <?php the_title(); ?> </h2>
              
       </div>


     </div> </a></div>




     </div>        
</div>
         <?php wp_reset_postdata(); ?>
            <?php $count++;  endwhile; ?>
            <?php endif; ?> 
      </div>

  </div>
</div>



  </div>
   </section>
   
   <section class="bg-dark our_product_home py-50-20  paint-border paint-top paint-bottom position-relative">
       <div class="container position-relative">
        
    <?php $our_product_section_ =  get_field('our_product_section_'); ?>

         <div class="section-title text-center text-color">
          <h2 class="text-light f-50 font-weight-bold text-capitalize"><?php echo $our_product_section_['add_title']; ?></h2>
         <p class="lead text-light f-20 fw-500"><?php echo $our_product_section_['add_text']; ?></p>
         </div>

      
<div class="row">
        <div class="col-md-12">

       <div class="owl-carousel owl-theme" id="productslider">
         <?php  
            $args = array(
           'post_type'      => 'product',
             'posts_per_page' => -1,
             'product_cat'    => 'popular-videos'
            );
            $loopreleases = new WP_Query( $args );
            ?>  
         <?php if ( $loopreleases->have_posts() ) : 
            $count = 0; ?>
             <?php while ( $loopreleases->have_posts() ) : $loopreleases->the_post(); 
               ?>
         <div class="item">
            <div class="popular_videos pro-iteam">
            

           


           <div class="visible_home_veido">
                         
                        
           


 <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
            
 <a href="<?php echo the_permalink(); ?>">             
<img class="img" src="<?php echo $image[0]; ?>" />

 <div class="text">
                  <div class="cen">
            
           
             <h2> <?php the_title(); ?> </h2>
              
       </div>


     </div> </a></div>




     </div>        
</div>
 <?php wp_reset_postdata(); ?>
            <?php $count++;  endwhile; ?>
            <?php endif; ?> 

      
            </div>
         </div>
       </div>

         </div>

        
      </div>

        
       </div>
      <!-- end  -->
   </section>




<section class="py-50-20 pb-5">
	<div class="container">
<?php $new_releases__videos_section =  get_field('new_releases__videos_section'); ?>

         <div class="section-title text-center text-color">
          <h2 class=" f-50 font-weight-bold text-capitalize"><?php echo $new_releases__videos_section['add_title']; ?></h2>
         <p class="lead  f-20 fw-500"><?php echo $new_releases__videos_section['add_text']; ?></p>
         </div>




<div class="row">
   <div class="col-md-12">
      <div class="owl-carousel owl-theme" id="oneslider">
         <?php  
            $args = array(
            'post_type'      => 'product',
            'product_cat'    => 'popular-products'
            );
            $loopreleases = new WP_Query( $args );
            ?>  
         <?php if ( $loopreleases->have_posts() ) : 
            $count = 0; ?>
             <?php while ( $loopreleases->have_posts() ) : $loopreleases->the_post(); 
               ?>
              <div class="item">
            <div class="popular_videos pro-iteam">
            

           


           <div class="visible_home_veido">
                         
                        
           


 <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
            
 <a href="<?php echo the_permalink(); ?>">             
<img class="img" src="<?php echo $image[0]; ?>" />

 <div class="text">
                  <div class="cen">
            
           
             <h2> <?php the_title(); ?> </h2>
              
       </div>


     </div> </a></div>




     </div>        
</div>

         <?php wp_reset_postdata(); ?>
            <?php $count++;  endwhile; ?>
            <?php endif; ?> 
      </div>
   </div>
</div>


</section>
   <section class="bg-dark home_blog py-50-20  paint-border paint-top paint-bottom position-relative">
      <div class="container position-relative">
        
         <?php $our_blog_section =  get_field('our_blog_section'); ?>

         <div class="section-title text-center text-color">
          <h2 class="text-light f-50 font-weight-bold text-capitalize"><?php echo $our_blog_section['add_title']; ?></h2>
         <p class="lead text-light f-20 fw-500"><?php echo $our_blog_section['add_text']; ?></p>
         </div>
         
      
      <?php   function wpdocs_custom_excerpt_length( $length ) {
         return 15;}
         add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length');
         
         $args = array(
         'showposts'  =>  -1,
         'post_type' => 'post',
         ); 
         $the_query = new WP_Query( $args ); ?>
      <?php if ( $the_query->have_posts() ) : ?>
      <div class="row">
        <div class="col-md-12">
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
     </div> </a>
   </div>

     </div> 




         <?php endwhile; ?>
      </div>
      <?php endif; ?>
      </div>   
      </div>
      </div>
   </section>



<?php get_footer(); ?>