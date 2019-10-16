<?php
   /**
    * The template name:contact
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
<div class="py-50-30 p-t-0">
   <div class="container ">
      <div class="row con-tittles">
         <div class="col-md-12 text-center">
            <h2 class="f-56"><?php  the_title(); ?></h2>
            <!-- <p class="lead"><?php //echo get_the_excerpt(); ?></p> -->
         </div>
      </div>
      <div class="row align-items-center">
         <div class="col-md-6">
            <div class="card_box shadow p-4">
               <?php $contact_address =  get_field('contact_address');  ?>
               <div class="mb-4">
                  <div class="media align-items-top">
                     <i class="fas fa-phone"></i>
                     <div class="media-body pl-2">
                        <p> <?php echo $contact_address['add_phone_number']; ?></p>
                     </div>
                  </div>
               </div>
               <div class="mb-4">
                  <div class="media align-items-top">
                     <i class="fas fa-envelope"></i>
                     <div class="media-body pl-2">
                        <p> <?php echo $contact_address['add_email_id']; ?></p>
                     </div>
                  </div>
               </div>
               <div class="mb-0">
                  <div class="media align-items-top">
                     <i class="fas fa-map-marker-alt"></i>
                     <div class="media-body pl-2">
                        <p> <?php echo $contact_address['add_address']; ?></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card_box map">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5018.658439646642!2d135.49667973383282!3d34.73736796368697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e447045ef645%3A0x6fe63d8cf02e9ece!2z44CSNTMyLTAwMDMg5aSn6Ziq5bqc5aSn6Ziq5biC5reA5bed5Yy65a6u5Y6f77yS5LiB55uu77yR77yR4oiS77yZIOeZvemzs-ODk-ODqw!5e0!3m2!1sja!2sjp!4v1565089540412!5m2!1sja!2sjp" frameborder="0" style="border:0; width: 100%; height: 360px" allowfullscreen></iframe>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="bg-dark our_contact py-50-20  paint-border paint-top paint-bottom position-relative">
   <div class="container ">
      <div class="row">
         <div class="col-md-12">
            <div class="card_box">
               <div class="mb-5">
                  <h2 class="text-center text-white"><?php echo get_field('contact_form_title'); ?></h2>
                  <!-- <p class="text-center text-white"><?php //echo get_field('contact_form_text'); ?></p> -->
               </div>
               <?php echo do_shortcode('[contact-form-7 id="379" title="Contact form 1"]'); ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>