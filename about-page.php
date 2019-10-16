<?php
/*
 Display Template Name: About Us
*/
get_header();
?>
<?php while(have_posts()): the_post();?>
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
<div class="row">
      <div class="col-md-12 t-t text-center">
       <h2 class="f-56"><?php the_title();?></h2>
      </div> 
     </div>
<?php $image = get_field('about_image');?>
<?php if($image){?>
<p style="text-align: center;"><img width="825" height="550" class="aligncenter wp-image-782" src="<?php echo $image['url'];?>"></p>
<?php } ?>
<div class="about_content">
<?php the_content();?>
</div>
</div>
</div>
<?php endwhile;?>

<?php
get_footer();
?>