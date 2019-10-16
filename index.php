<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
			
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
 <div class="topbanner paint-border  paint-bottom position-relative" style="background-image: url('http://demosrvr.com/wp/theimpossibleco/wp-content/uploads/2019/04/image-1.png');">
    
 
</div>



<section class="home_blog  pb-5   position-relative">
      <div class="container position-relative">

    <div class="row">

       <div class=" w-100 d-table h-100">
    <div class="d-table-cell w-100 h-100 align-middle">
            <div class="container">
        <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="text-white f-56">Blog</h2>
       </div> 
     </div> 
    </div>
    </div>
  </div>
        <?php while ( have_posts() ) : the_post(); ?>
           <div class="col-lg-4 mb-30">
            <div class="blog_box_home">
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
            
           <div class="blog_box_con">
             <div class="top d-flex justify-content-between">
                 <div class="left">
                   <i class="fa fa-user"></i><span><?php echo $author = get_the_author(); ?> </span>
                 </div>
                 <div class="right">
                    <i class="fas fa-clock"></i><span><?php echo get_the_date( 'M d Y' ); ?><?php //echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
                 </div>
              </div>
          
             <p><?php
               //echo wp_trim_words( get_the_content(), 15 ,'' );
               ?>  <!-- <a href="<?php// echo the_permalink(); ?>" class="btn-link-blog text-white">View More</a></p> -->
           
           
           </div>
           </div>
            
         </div>
            <?php endwhile; ?>
    </div>
</div>
<!--  <div class="pt-4 col-12 text-center">
                  <div id="LoadingImage" style="display: none">
          <img src="http://dev.geraldojewellery.com/wp-content/uploads/2019/04/loader.gif" />
          </div> 
          <div class="loadmore btn btn-dark btn-pill-r ">Load More</div>
          </div> -->

</section>



<?php get_footer(); ?>
<script type="text/javascript">
   $(document).ready(function () {
    $("#alltypeartist").change(function () {
        var valv = $("#alltypeartist").val();

  var address = "http://demosrvr.com/wp/theimpossibleco/ja/%E3%83%96%E3%83%AD%E3%82%B0/?blogcategory=" + valv;
      window.location.replace(address);
    });
});

</script>