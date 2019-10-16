<?php
/*
 Template Name:  Products template
 */

get_header(); ?>	

<?php $top_banner =  get_field('top_banner');  ?>
        
<div class="topbanner paint-border  paint-bottom position-relative" style="background-image: url(<?php echo $top_banner['add_banner_images']; ?>);">
  <div class=" w-100 d-table h-100">
    <div class="d-table-cell w-100 h-100 align-middle">
        <div class="container">
     
    </div>
    </div>
  </div>
</div>
<section class=" ">
  <div class="container">

      <div class="row">
      <div class="col-md-12 t-t text-center">
        
        <h2 class="f-56"><?php echo $top_banner['add_title']; ?></h2>
        <!-- <p class="lead text-light"><?php //echo $top_banner['add_text']; ?></p>  -->

       </div> 
     </div>
 
  <!--     <div class="row">
  <div class="col-sm-6"> 
        <?php
       $currentLanguage  = get_bloginfo('language');
        if($currentLanguage == 'ja'){
       ?>
      <div class="filter"><h3>フィルタ</h3></div>
      <?php }else{ ?>
      <div class="filter"><h3>Filter</h3></div>
      <?php } ?>

    </div>
   
    <div class="col-sm-6 mb-30">
      <select name="alltypesearch" class="form-control" id="orderby">
        <option value="">Order By</option>
        <option value="ASC" <?php if('ASC' == $_GET['orderby']){ echo 'selected'; } ?>>Order By Ascending</option>
        <option value="DESC" <?php if('DESC' == $_GET['orderby']){ echo 'selected'; } ?>>Order By descending</option>
      </select>
    </div>
  </div> -->
</div>
</section>
<section class=" our_product_home position-relative">
<div class="container">
  <?php  
      $alltype = $_GET['alltype'];
     // $allatrist = $_GET['allatrist'];
      $orderby = $_GET['orderby'];
      
     
   
     
   //$post_type = get_queried_object();
   // $post_type->rewrite['slug'];
   

   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'      => 'product',
        'posts_per_page'=> 9,
        'order' => $orderby,
        'product_cat'    => 'ourproduct',
        'paged'         => $paged

    );
    $totalcount = 1;
    $loop = new WP_Query( $args ); ?>	

	  <?php  if ( $loop->have_posts() ) : ?>
		   <div class="row" id="loaderpost">
		   

				<?php while ( $loop->have_posts() ) : $loop->the_post(); 
				   global $product; ?>
				<div class="col-lg-4 col-md-6 mb-30 price_box">
           

            <div class="popular_videos pro-iteam">
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
             <a href="<?php echo the_permalink(); ?>"> 
<img class="img" src="<?php echo $image[0]; ?>" />

   <div class="text">
                 <div class="cen">     
                <h3><?php the_title();?> </h3> 
              <!--  <?php
                  $product = wc_get_product( $post_id ); 
                  $price = get_post_meta( get_the_ID(), '_sale_price', true);
                  $regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
 
                 if ($price != "") {
               ?>
               <span>$<?php echo $price; ?></span>
             <?php } ?> -->


                  </div> </div>
             </a>
            
           
         </div>
           </div>

				<?php $totalcount++; endwhile; ?>

		   </div>
       

	  <?php endif; ?>


						
                 <div class="pt-4 col-12 text-center">
                  <div id="LoadingImage" style="display: none">
          <img src="http://dev.geraldojewellery.com/wp-content/themes/geraldojewellery/images/loader-1.gif" />
          </div> 

         
          
           

          </div>

			    
</div>
</section>

<?php
$args747744 = array(
          'post_type'      => 'product',
          'posts_per_page'=> -1,
          'order' => $orderby,
          'product_cat'    => 'ourproduct'
         

      );
     $my_posts77777 = new WP_Query( $args747744 );

?>
   
<input type="hidden" id="totalcounts" value="4">


<input type="hidden" id="totalpost" value="<?php echo $my_posts77777->post_count; ?>">
<?php
get_footer( 'shop' );
?>


<script type="text/javascript">
 jQuery(document).ready(function($) {
jQuery('#totalcounts').val(4);
  
    var totalcounts77 =  jQuery('#totalpost').val();

   var count = 2;
   var total = totalcounts77;
   jQuery(window).scroll(function(){
        
     if (jQuery(window).scrollTop() == jQuery(document).height() - jQuery(window).height()){
     
 var totalcounts7777 =  parseInt(jQuery('#totalpost').val());
     var totalcounts11111 =  parseInt(jQuery('#totalcounts').val());
     

        if (typeof(processing) !== "undefined" && processing == true){

     console.log("reach1774");
       return false;
      }else{
          processing = true;
   

  
      if(totalcounts7777 >= totalcounts11111){
        console.log("reach");
        loadArticle(count);

      }else{

        console.log("reach1");
        return false;
         
      }
      count++;
     }
}

   });

   function loadArticle(pageNumber){

     jQuery('a#inifiniteLoader').show('fast');

      jQuery("#LoadingImage").show();

    var data = {
            'action': 'load_posts_by_ajax',
            'page': pageNumber,
            'totalcount': totalcounts77,
            'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
        };

     $.ajax({
       url: "<?php echo admin_url(); ?>admin-ajax.php",
       type:'POST',
       data: data,
       success: function (html) {
        processing = false;

        var totalcounts =  jQuery('#totalcounts').val();
        var valtwo = 4;
        var totalcountsnew = (+totalcounts) + (+valtwo);
        jQuery('#totalcounts').val(totalcountsnew);


        jQuery('#loaderpost').append(html);
        jQuery("#LoadingImage").hide();
        
       }
     });
     return false;
   }
 });
</script>

<script type="text/javascript">
   $(document).ready(function () {
    $("#alltypeartist").change(function () {
        var valv = $("#alltypeartist").val();

  var address = "http://theimpossibleco.com/events/?alltype=" + valv;
      window.location.replace(address);
    });
});

</script>

<script type="text/javascript">
    $(document).ready(function () {
    $("#artistname").change(function () {
        var alltypeartist = $("#alltypeartist").val();
        var artistname = $("#artistname").val();
     var address = "http://theimpossibleco.com/events/?alltype=" + alltypeartist + "&allatrist=" + artistname ;
      window.location.replace(address);

     });
  });

</script>

 <script type="text/javascript">
    $(document).ready(function () {
    $("#artistname").change(function () {
        var alltypeartist = $("#alltypeartist").val();
        var artistname = $("#artistname").val();
     var address = "http://demosrvr.com/wp/theimpossibleco/events/?alltype=" + alltypeartist + "&allatrist=" + artistname ;
      window.location.replace(address);
     });
  });

</script>
 <script type="text/javascript">
    $(document).ready(function () {
    $("#orderby").change(function () {
        var alltypeartist = $("#alltypeartist").val();
        var artistname = $("#artistname").val();
         var orderby = $("#orderby").val();  
        
     var address = "http://theimpossibleco.com/events/?alltype=" + alltypeartist + "&allatrist=" + artistname + "&orderby=" + orderby;
      window.location.replace(address);
     });
  });

</script>