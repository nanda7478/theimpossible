<?php
/*
 Template Name: Popular Playing card template
 */

get_header(); 
while ( have_posts() ) : the_post();
?>							
 <?php $top_banner =  get_field('top_banner');  ?>
        
<div class="topbanner paint-border  paint-bottom position-relative" style="background-image: url(<?php echo $top_banner['add_banner_images']; ?>);">
  <div class=" w-100 d-table h-100">
    <div class="d-table-cell w-100 h-100 align-middle">
        <div class="container">
    
    </div>
    </div>
  </div>
</div>

       <section class=" our_product_home py-50-20 p-t-0  position-relative">
<div class="container"> 
    
      <div class="row">
      <div class="col-md-12 text-center t-t">
        
        <h2 class="f-56"><?php echo $top_banner['add_title']; ?></h2>
       <!--  <p class="lead text-light"><?php echo $top_banner['add_text']; ?></p> -->

       </div> 
     </div> 
      <div class="row">
<div class="col-sm-6"> 
   <!--  <div class="filter"><h3>Filter</h3></div> -->
  </div>
 
  <div class="col-sm-6 mb-30">
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
    <!-- <select name="alltypesearch" class="form-control" id="orderby">
      <option value="">Order By</option>
      <option value="ASC" <?php if('ASC' == $_GET['orderby']){ echo 'selected'; } ?>>Order By Ascending</option>
      <option value="DESC" <?php if('DESC' == $_GET['orderby']){ echo 'selected'; } ?>>Order By descending</option>
    </select> -->
  </div>
</div>

   <?php

   //$post_type = get_queried_object();
   // $post_type->rewrite['slug'];
   $orderby = $_GET['orderby'];

   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $is_admin = current_user_can('manage_options'); 
    if ($is_admin) {
    $statusaray[] = "publish";
    $statusaray[] = "private";
    }
    else
    {
    $statusaray[] = "publish";

    }

   if(isset($orderby)){

   if($orderby == ''){
$orderby = '';
$meta_key = '';
$order = 'DESC';

$args = array(
        'post_type'      => 'product',
        'posts_per_page'=> 9,
        'post_status' => $statusaray,
        'product_cat'    => 'playing-cards',
        'orderby'   => $orderby,
        'meta_key' => $meta_key,
        'order' => $order,
        'paged'         => $paged

    );
}
   if($orderby == 'most-recent'){
$orderby = 'date';
$meta_key = '';
$order = 'DESC';

$args = array(
        'post_type'      => 'product',
        'posts_per_page'=> 9,
        'post_status' => $statusaray,
        'product_cat'    => 'playing-cards',
        'orderby'   => $orderby,
        'meta_key' => $meta_key,
        'order' => $order,
        'paged'         => $paged

    );

}
if($orderby == 'price'){
$orderby = 'meta_value_num';
$meta_key = '_price';
$order = 'ASC';

$args = array(
        'post_type'      => 'product',
        'posts_per_page'=> 9,
        'post_status' => $statusaray,
        'product_cat'    => 'playing-cards',
        'orderby'   => $orderby,
        'meta_key' => $meta_key,
        'order' => $order,
        'paged'         => $paged

    );

}

if($orderby == 'price-desc'){
$orderby = 'meta_value_num';
$meta_key = '_price';
$order = 'DESC';

$args = array(
        'post_type'      => 'product',
        'posts_per_page'=> 9,
        'post_status' => $statusaray,
        'product_cat'    => 'playing-cards',
        'orderby'   => $orderby,
        'meta_key' => $meta_key,
        'order' => $order,
        'paged'         => $paged

    );

}

if($orderby == 'popularity'){
$orderby = 'meta_value_num';
$meta_key = 'total_sales';
$order = 'DESC';

$args = array(
        'post_type'      => 'product',
        'posts_per_page'=> 9,
        'post_status' => $statusaray,
        'product_cat'    => 'playing-cards',
        'orderby'   => $orderby,
        'meta_key' => $meta_key,
        'order' => $order,
        'paged'         => $paged

    );

}

if($orderby == 'date'){
$orderby = 'meta_value_num';
$meta_key = '';
$order = 'DESC';

$args = array(
        'post_type'      => 'product',
        'posts_per_page'=> 9,
        'post_status' => $statusaray,
        'product_cat'    => 'playing-cards',
        'orderby'   => $orderby,
        'meta_key' => $meta_key,
        'order' => $order,
        'paged'         => $paged

    );

}
if($orderby == 'date-asc'){
$orderby = 'meta_value_num';
$meta_key = '';
$order = 'ASC';

$args = array(
        'post_type'      => 'product',
        'posts_per_page'=> 9,
        'post_status' => $statusaray,
        'product_cat'    => 'playing-cards',
        'orderby'   => $orderby,
        'meta_key' => $meta_key,
        'order' => $order,
        'paged'         => $paged

    );

}
if($orderby == 'rating'){
$orderby = 'meta_value_num';
$meta_key = '_wc_average_rating';
$order = 'DESC';
$args = array(
        'post_type'      => 'product',
        'posts_per_page'=> 9,
        'post_status' => $statusaray,
        'product_cat'    => 'playing-cards',
        'orderby'   => $orderby,
        'meta_key' => $meta_key,
        'order' => $order,
        'paged'         => $paged

    );

}
}else{
  $args = array(
        'post_type'      => 'product',
        'posts_per_page'=> 9,
        'post_status' => $statusaray,
        'product_cat'    => 'playing-cards',
        'paged'         => $paged

    );

}
    
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
               <?php
                  $product = wc_get_product( $post_id ); 
                  $price = get_post_meta( get_the_ID(), '_sale_price', true);
                  $regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
 
                 if ($price != "") {
               ?>
               <!-- <span>$<?php echo $price; ?></span> -->
             <?php } ?>


                  </div> </div>
             </a>
            
           
         </div>
           </div>

         

        <?php $totalcount++; endwhile; ?>

       </div>
       

    <?php endif; ?>


            
                 <div class="pt-4 col-12 text-center">
                  <div id="LoadingImage" style="display: none">
          <img src="<?php bloginfo('template_url');?>/images/loader-1.gif" />
          </div> 

         
         
          
</div>
</section>

<?php
$args747744 = array(
          'post_type'      => 'product',
          'posts_per_page'=> -1,
          'post_status' => $statusaray,
          'product_cat'    => 'playing-cards',
          
      );
     $my_posts77777 = new WP_Query( $args747744 );

?>


<input type="hidden" id="totalcounts" value="4">
<input type="hidden" id="totalpost" value="<?php echo $my_posts77777->post_count; ?>">

<input type="hidden" id="orderbyvalue" value="<?php echo $orderby; ?>">
<input type="hidden" id="orderby1" value="<?php echo $orderby; ?>">
<input type="hidden" id="metakey1" value="<?php echo $meta_key; ?>">
<input type="hidden" id="ordetype" value="<?php echo $order; ?>">



<?php endwhile;
get_footer(); 
?>




<script type="text/javascript">
 jQuery(document).ready(function($) {
jQuery('#totalcounts').val(4);
  
    var totalcounts77 =  jQuery('#totalpost').val();
     var orderbyvalue =  jQuery('#orderbyvalue').val();
      var orderby1 =  jQuery('#orderby1').val();
      var metakey1 =  jQuery('#metakey1').val();
      var ordetype =  jQuery('#ordetype').val();

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

    

         if(orderbyvalue){

 var data = {
            'action': 'load_posts_by_ajax16',
            'page': pageNumber,
            'totalcount': totalcounts77,
             'ordervalue': orderbyvalue,
             'orderby1': orderby1,
             'metakey1': metakey1,
             'ordetype': ordetype,
            'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
        };


  }else{
    var data = {
            'action': 'load_posts_by_ajax2',
            'page': pageNumber,
            'totalcount': totalcounts77,
            'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
        };
  }

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

  var address = "http://theimpossibleco.com/cards/?alltype=" + valv;
      window.location.replace(address);
    });
});

</script>

<script type="text/javascript">
    $(document).ready(function () {
    $("#artistname").change(function () {
        var alltypeartist = $("#alltypeartist").val();
        var artistname = $("#artistname").val();
     var address = "http://theimpossibleco.com/cards/?alltype=" + alltypeartist + "&allatrist=" + artistname ;
      window.location.replace(address);

     });
  });

</script>

 <script type="text/javascript">
    $(document).ready(function () {
    $("#artistname").change(function () {
        var alltypeartist = $("#alltypeartist").val();
        var artistname = $("#artistname").val();
     var address = "http://theimpossibleco.com/cards/?alltype=" + alltypeartist + "&allatrist=" + artistname ;
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
        
     var address = "http://theimpossibleco.com/cards/?orderby=" + orderby;
      window.location.replace(address);
     });
  });

</script>