<?php
/*
 Template Name: Popular Videos template
 */

get_header(); ?>			
<div id="content">				
<?php $top_banner =  get_field('top_banner');  ?>
<div class="topbanner paint-border  paint-bottom position-relative" style="background-image: url(<?php echo $top_banner['add_banner_images']; ?>);">
  <div class=" w-100 d-table h-100">
    <div class="d-table-cell w-100 h-100 align-middle">
        <div class="container">
   
    </div>
    </div>
  </div>
</div>
<section class="py-50-20 p-t-0">
  <div class="container">

  	   <div class="row">
      <div class="col-md-12 t-t text-center">
        
        <h2 class="f-56"><?php echo $top_banner['add_title']; ?></h2>
        <!-- <p class="lead text-light"><?php echo $top_banner['add_text']; ?></p> -->

       </div> 
     </div> 


     <?php
     $currentLanguage  = get_bloginfo('language');
      if($currentLanguage == 'ja'){
     ?>
    <div class="filter"><h3>フィルタ</h3></div>
    <?php }else{ ?>
    <div class="filter"><h3>Filter</h3></div>
    <?php } ?>
    <div class="row">
  <div class="col-sm-12 col-md-8  mb-30">
     <ul class="m-0 list-inline">
       <li class="list-inline-item"><select name="alltypesearch" class="form-control" id="alltypeartist">
      <option value="">All Type</option>
     <?php
          $metakey = 'artist_type';
          $accredites = $wpdb->get_col($wpdb->prepare("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", $metakey) );
          if ($accredites) {
            foreach ($accredites as $accredite) {
               if(isset($accredite)){

              ?>
             <option value="<?php echo $accredite; ?>" <?php if($accredite == $_GET['alltype']){ echo 'selected'; } ?>><?php echo $accredite; ?></option>
              <?php
            }
            }
          }
          ?>
    </select>
  </li> <li class="list-inline-item">  <select name="alltypesearch"  class="form-control" id="artistname">
      <option value="">All Artists</option>
      <?php
          $metakey = 'artist_name';
          $accredites1 = $wpdb->get_col($wpdb->prepare("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", $metakey) );
          if ($accredites1) {
            foreach ($accredites1 as $accredite) {
               if(isset($accredite)){
             ?>
             <option value="<?php echo $accredite; ?>" <?php if($accredite == $_GET['allatrist']){ echo 'selected'; } ?>><?php echo $accredite; ?></option>
              <?php
            }
            }
          }
          ?>
    </select>
  </li>
      </ul>
  </div>
 
  <div class="col-sm-12 col-md-4 mb-30">
    <form class="woocommerce-ordering" method="get">
  <select name="orderby" class="form-control" id="orderby">
      <!-- <option value="">Order By</option> -->
      <option value="most-recent" <?php if('most-recent' == $_GET['orderby']){ echo 'selected'; } ?>>Most recent</option>
      <!-- <option value="date" <?php if('date' == $_GET['orderby']){ echo 'selected'; } ?>>Upload Date (newest to oldest)</option> -->
      <option value="price" <?php if('price' == $_GET['orderby']){ echo 'selected'; } ?>>Price (low to high)</option>
      <option value="price-desc" <?php if('price-desc' == $_GET['orderby']){ echo 'selected'; } ?>>Price (high to low)</option>
      <!-- <option value="date-asc" <?php if('date-asc' == $_GET['orderby']){ echo 'selected'; } ?>>Upload Date (oldest to newest)</option> -->
     <option value="popularity" <?php if('popularity' == $_GET['orderby']){ echo 'selected'; } ?>>Popularity</option>
      <option value="rating" <?php if('rating' == $_GET['orderby']){ echo 'selected'; } ?>>Highest rated</option>
    </select>
    </form>
  </div>
</div>
    <div class="row" id="loaderpost">
        
   <?php  
      $alltype = $_GET['alltype'];
      $allatrist = $_GET['allatrist'];
      $orderby = $_GET['orderby'];
      
     if($alltype || $allatrist || $orderby){

      
       $meta_query = array('relation'=>'AND');
     ?>

      <?php
     
      if(!empty($alltype)){
      $meta_query[] = array(
       'key' => 'artist_type',
        'value' => $alltype,
        'compare' => '='
        
      );
    }
    if(!empty($allatrist)){
      $meta_query[] = array(
       'key' => 'artist_name',
        'value' => $allatrist,
        'compare' => '='
        
      );
    }

   if($orderby == ''){
$orderby = '';
$meta_key = '';
$order = 'DESC';
}
   if($orderby == 'most-recent'){
$orderby = 'date';
$meta_key = '';
$order = 'DESC';
}
if($orderby == 'price'){
$orderby = 'meta_value_num';
$meta_key = '_price';
$order = 'ASC';
}

if($orderby == 'price-desc'){
$orderby = 'meta_value_num';
$meta_key = '_price';
$order = 'DESC';
}

if($orderby == 'popularity'){
$orderby = 'meta_value_num';
$meta_key = 'total_sales';
$order = 'DESC';
}

if($orderby == 'date'){
$orderby = 'meta_value_num';
$meta_key = '';
$order = 'DESC';
}
if($orderby == 'date-asc'){
$orderby = 'meta_value_num';
$meta_key = '';
$order = 'ASC';
}
if($orderby == 'rating'){
$orderby = 'meta_value_num';
$meta_key = '_wc_average_rating';
$order = 'DESC';
}
    $args = array(
        'post_type'      => 'product',
        'meta_query' => $meta_query,
        'orderby'   => $orderby,
        'meta_key' => $meta_key,
        'order' => $order,
         'product_cat'    => 'videos'
    );
   
    $loop = new WP_Query( $args ); ?> 

    <?php  if ( $loop->have_posts() ) : ?>
      
        <?php while ( $loop->have_posts() ) : $loop->the_post(); 
           global $product; ?>
          <div class="col-lg-4 col-md-6 mb-30 price_box">

      <div class="popular_videos pro-iteam">
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
             <a href="<?php echo the_permalink(); ?>"> 
<img class="img" src="<?php echo $image[0]; ?>" />

                  <div class="text">
                  <div class="cen">  
                 <span class="Video-icon-top"><img src="http://theimpossibleco.com/wp-content/themes/theimpossibleco/images/Video-icon.png"></span>   
                <h3> <?php the_title();?> </h3> 

                </div> </div>
                             </a>
                            
                           
                         </div>


       
          
            

             <?php      wp_reset_postdata(); ?>
          </div>
          

        <?php endwhile; ?>

       
    <?php endif; ?>


     <?php
     }else{



    
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'      => 'product',
        'posts_per_page'=> 9,
        'product_cat'    => 'videos',
        'paged'         => $paged

    );
    $totalcount = 1;

    
    $loop = new WP_Query( $args ); ?> 
   <?php  if ( $loop->have_posts() ) : ?>
       

        <?php while ( $loop->have_posts() ) : $loop->the_post(); 
           global $product; ?>
          <div class="col-lg-4 col-md-6 mb-30 price_box">

      <div class="popular_videos pro-iteam">
             <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
             <a href="<?php echo the_permalink(); ?>"> 
<img class="img" src="<?php echo $image[0]; ?>" />

                  <div class="text">
                  <div class="cen">  
                 <span class="Video-icon-top"><img src="http://theimpossibleco.com/wp-content/themes/theimpossibleco/images/Video-icon.png"></span>   
                <h3> <?php the_title();?> </h3> 

                </div> </div>
                             </a>
                            
                           
                         </div>


       
          
            

             <?php      wp_reset_postdata(); ?>
          </div>

        <?php $totalcount++;endwhile; ?>

       
    <?php endif; ?>
</div>
      <div class="pt-4 col-12 text-center">
                  <div id="LoadingImage" style="display: none">
          <img src="<?php bloginfo('template_url');?>/images/loader-1.gif" />
          </div> 
            

            
        


          </div>

<?php } ?>
    </div>
</div>
</section>

<?php
$args747744 = array(
          'post_type'      => 'product',
          'posts_per_page'=> -1,
          'product_cat'    => 'videos',
          'orderby'   => $orderby,
        'meta_key' => $meta_key,
        'order' => $order,
         

      );
     $my_posts77777 = new WP_Query( $args747744 );

?>
	 
<input type="hidden" id="totalcounts" value="4">
<input type="hidden" id="checkscrolla" value="">

<input type="hidden" id="totalpost" value="<?php echo $my_posts77777->post_count; ?>">

</div>
<?php get_footer(); ?>





<script type="text/javascript">
 jQuery(document).ready(function($) {
jQuery('#totalcounts').val(4);
  
    var totalcounts77 =  jQuery('#totalpost').val();

   var count = 2;
   var total = totalcounts77;
   jQuery(window).scroll(function(){
        
    if (jQuery(window).scrollTop() >= 300){
     

     

        if (typeof(processing) !== "undefined" && processing == true){

 console.log("reach1774");
       return false;
      }else{
     processing = true;
       var totalcounts7777 =  parseInt(jQuery('#totalpost').val());
     var totalcounts11111 =  parseInt(jQuery('#totalcounts').val());

  //  alert(totalcounts7777);
   //  alert(totalcounts11111);
      if (totalcounts7777 >= totalcounts11111){
       // alert("reach");
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
            'action': 'load_posts_by_ajax1',
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

  var address = "http://theimpossibleco.com/videos/?alltype=" + valv;
      window.location.replace(address);
    });
});

</script>

 <script type="text/javascript">
    $(document).ready(function () {
    $("#artistname").change(function () {
        var alltypeartist = $("#alltypeartist").val();
        var artistname = $("#artistname").val();
     var address = "http://theimpossibleco.com/videos?alltype=" + alltypeartist + "&allatrist=" + artistname ;
      window.location.replace(address);

     });
  });

</script>

 <script type="text/javascript">
    $(document).ready(function () {
    $("#artistname").change(function () {
        var alltypeartist = $("#alltypeartist").val();
        var artistname = $("#artistname").val();
     var address = "http://theimpossibleco.com/videos?alltype=" + alltypeartist + "&allatrist=" + artistname ;
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
        
     var address = "http://theimpossibleco.com/videos?orderby=" + orderby;
      window.location.replace(address);
     });
  });

</script>

