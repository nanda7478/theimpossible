<?php
/*
 Template Name: Blog template
 */

get_header(); ?>
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
         'numberposts' => -1,
         'post_type' => 'post',
         ); 
         $the_query = new WP_Query( $args ); ?>
      <?php if ( $the_query->have_posts() ) : ?>
      <div class="row">
         <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
         <div class="col-lg-4 mb-30">
            <div class="blog_box_home">
              <div class="blog_box_img">
                <?php  echo get_the_post_thumbnail();?>
              </div>
            
           <div class="blog_box_con">
             <div class="top d-flex justify-content-between">
                 <div class="left">
                    <img alt="" class="img-fluid" src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/04/icon.png"><span><?php echo $author = get_the_author(); ?> </span>
                 </div>
                 <div class="right">
                    <img alt="" class="img-fluid"  src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/04/2.png"><span><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
                 </div>
              </div>
              <h4><?php the_title(); ?></h4>
              <?php
               echo wp_trim_words( get_the_content(), 15 ,'' );
               ?> <a href="<?php echo the_permalink(); ?>" class="btn-link-blog text-white">View More</a> 
           
           
           </div>
           </div>
            
         </div>
         <?php endwhile; ?>
      </div>
      <?php endif; ?>   
      </div>
   </section>

<?php get_footer(); ?>