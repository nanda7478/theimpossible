<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

		 <div class="topbanner paint-border  paint-bottom position-relative" style="background-image: url('https://theimpossibleco.com/wp-content/uploads/2019/04/image-1.png');">
	
  <div class=" w-100 d-table h-100">
    <div class="d-table-cell w-100 h-100 align-middle">
    		<div class="container">
  		<div class="row">
      <div class="col-md-12 text-center">
       
       
        

       </div> 
     </div> 
  	</div>
    </div>
  </div>
</div>




<section class="our_product_home position-relative">
<div class="container"> 
	  
      <div class="row">
      <div class="col-md-12 t-t text-center">
       
 <h2 class="f-56"><?php printf( __( 'Search Results for %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
 
        </div> 
     </div>
 

		   <div class="row" id="loaderpost">
		   
               <?php
				while ( have_posts() ) :
				the_post();
				?>
				<div class="col-lg-4 col-md-6">

            <div class="popular_videos pro-iteam">
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
             <a href="<?php echo the_permalink(); ?>">
               <img class="img" src="<?php echo $image[0]; ?>">
            

            <div class="text">
                 <div class="cen">     
                <h3> <?php the_title();?>  </h3> 
               

                  </div> </div>
    </a>
          <!--   <div class="projuct_section_con">
             
            <p><?php
            echo wp_trim_words( get_the_content(), 15 ,'' );
            ?>
             </p>
                <a href="<?php echo the_permalink(); ?>" class="btn btn-white btn-pill" >View Details</a>
              
           </div>  -->
         </div>
           </div>
           <?php
           endwhile;
           ?>
				

		   </div>
       



						
                 

			    
</div>
</section>


<?php get_footer(); ?>
