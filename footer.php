<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->


<div class="footer">
  <div class="container">
   <?php 
           $currentLanguage  = get_bloginfo('language');
           if($currentLanguage == 'ja'){
           ?>

    <div class="row">
        <div class="col-md-4 mb-30 col-lg-4">
            <?php dynamic_sidebar( 'footer-11' ); ?>
        </div>
        <div class="col-md-4 col-lg-2 mb-30 footermenu">
            <?php dynamic_sidebar( 'footer-12' ); ?>
        </div>
        <div class="col-md-4 mb-30 col-lg-6">
            <?php //dynamic_sidebar( 'footer-13' ); ?>

      <section id="text-3" class="widget widget_text"><h2 class="widget-title">メルマガに登録する</h2>      <div class="textwidget"><p></p><div class="tnp tnp-subscription-minimal "><form action="<?php echo site_url();?>/ja/?na=s" method="post"><input type="hidden" name="nr" value="minimal"><input type="hidden" name="nlang" value="en">
      <input class="tnp-email" type="email" required="" name="ne" value="" placeholder="メールアドレスを入力してください"><input class="tnp-submit" type="submit" value="提出する"></form></div>
      <br>
      メールマガジンにご登録いただくと、新商品情報や無料コンテンツの案内をお届けいたします。<p></p>
      <ul class="socials">
      <li><a target="_blank" href="https://www.facebook.com/The-Impossible-Co-332303457466209"><i class="fab fa-facebook-f"></i></a></li>
      <li><a target="_blank" href="https://www.instagram.com/impossiblecompany"><i class="fab fa-instagram"></i></a></li>
      <li><a target="_blank" href="https://www.youtube.com/channel/UC-yBvY-tthcFqBHNfqkml4Q"><i class="fab fa-youtube"></i></a></li>
      <li><a target="_blank" href="https://twitter.com/impossible2019"><i class="fab fa-twitter"></i></a></li>
      </ul>
      </div>
      </section> 

        </div>
    </div>

  <?php }else{ ?>

 <div class="row">
        <div class="col-md-4 mb-30 col-lg-4">
            <?php dynamic_sidebar( 'footer-1' ); ?>
        </div>
        <div class="col-md-4 col-lg-3 mb-30 footermenu">
            <?php dynamic_sidebar( 'footer-2' ); ?>
        </div>
        <div class="col-md-4 mb-30 col-lg-5">
            <?php //dynamic_sidebar( 'footer-3' ); ?>
            <section id="text-3" class="widget widget_text"><h2 class="widget-title">SIGN UP FOR OUR NEWSLETTER</h2>
          <div class="textwidget"><div class="tnp tnp-subscription-minimal "><form action="http://theimpossibleco.com/?na=s" method="post"><input type="hidden" name="nr" value="minimal"><input type="hidden" name="nlang" value="">
       <input class="tnp-email" type="email" required="" name="ne" value="" placeholder="Enter your email address"><input class="tnp-submit" type="submit" value="Submit"></form></div>
<br>
Learn about new products, reviews, magic theory, special offers and more!
<ul class="socials">
      <li><a target="_blank" href="https://www.facebook.com/The-Impossible-Co-332303457466209"><i class="fab fa-facebook-f"></i></a></li>
      <li><a target="_blank" href="https://www.instagram.com/impossiblecompany"><i class="fab fa-instagram"></i></a></li>
      <li><a target="_blank" href="https://www.youtube.com/channel/UC-yBvY-tthcFqBHNfqkml4Q"><i class="fab fa-youtube"></i></a></li>
      <li><a target="_blank" href="https://twitter.com/impossible2019"><i class="fab fa-twitter"></i></a></li>
      </ul>
</div>
    </section>
        </div>
    </div>


  <?php } ?>

  </div>
</div>

<?php if(!is_page('video-play')){ ?>
<script type="text/javascript">
	// Instantiate the Bootstrap carousel
$('.multi-item-carousel').carousel({
  interval: false
});

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
$('.multi-item-carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  } else {
  	$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});




$(function () {
    x=3;
    $('.mb-link div').slice(0, 3).show();
    $('#loadMore').on('click', function (e) {
        e.preventDefault();
        x = x+5;
        $('.mb-link div').slice(0, x).slideDown();
    });
});

$(function () {
    x=6;
    $('.suf-link div').slice(0, 6).show();
    $('#loadMore2').on('click', function (e) {
        e.preventDefault();
        x = x+5;
        $('.suf-link div').slice(0, x).slideDown();
    });
});
</script>
<script type="text/javascript">

$(function(){
  $('.modal').on('hidden.bs.modal', function (e) {
    $iframe = $(this).find("iframe");
    $iframe.attr("src", $iframe.attr("src"));
  });
});
var videoid =  $('#videoid').val();
if(videoid == 1){
    $(".quantity").addClass("removequan");

}

</script>


<script>
jQuery(document).ready(function(){
jQuery('.searchid').on('click', function(){
jQuery('.searchform').toggleClass( "highlight" );
});
});

jQuery(document).mouseup(function(e) 
{
    var container = jQuery(".cart_header");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {

    // alert("Reach"); 	
      jQuery('.searchform').removeClass( "highlight" );
    }
});

</script>




<style type="text/css">
  .quantity.removequan{
    display: none;
  }
  .searchform{
    display: none;
  }
  .searchform.highlight{
     display: block;
  }
.tabs.wc-tabs {
  display: none;
}
.woocommerce-cart .shipping{
   display: none;
}

.popular_videos h2 a {
  color: #fff;
  font-size: 20px;
  font-weight: bold;
  position: relative;
  text-decoration: none;
  text-transform: uppercase;
}
.projuct_section_con h2 a {
  color: #fff;
  font-size: 20px;
  font-weight: bold;
  text-decoration: none;
  text-transform: uppercase;
}
.visible_home_contant h2 a {
  color: #fff;
  font-size: 20px;
  font-weight: 700;
  margin: 0 0 5px;
  text-decoration: none;
  text-transform: uppercase;
}
.blog_box_con h4 a {
  color: #fff;
  font-size: 24px;
  text-decoration: none;
}

</style>
<!-- <a class="fileDownloadLink" href="javascript:;">Download</a> -->
<?php wp_footer(); ?>
   
  
<script src="http://jqueryfiledownload.apphb.com/Scripts/jquery.fileDownload.js"></script>
 <script src="<?php bloginfo('template_url'); ?>/js/owl.carousel.js"></script>
 
 <script type="text/javascript">


   jQuery('#GetFile').on('click', function () {
var iframedata =  jQuery("#GetFile").attr("rel");

    jQuery.fileDownload(iframedata);

});

        jQuery('#oneslider').owlCarousel({
        loop:true,
        margin:10,
        dots:false,
        autoplay:false,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
        jQuery('#popularlider').owlCarousel({
        loop:true,
        margin:10,
        dots:false,
        autoplay:false,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

jQuery('#productslider').owlCarousel({
        loop:true,
        margin:10,
        dots:false,
        autoplay:false,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
jQuery('#blogslider').owlCarousel({
        loop:true,
        margin:10,
        dots:false,
        autoplay:false,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });



        jQuery('#secondslider').owlCarousel({
        loop:true,
        margin:0,
        dots:false,
            loop:true,
        autoplayTimeout:6000,
        autoplay:true,
        nav:true,
         //dotsContainer: '#carousel-custom-dots',
         dots: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
  /*jQuery('.owl-dot').click(function () {
 jQuery('#secondslider').owlCarousel().trigger('to.owl.carousel', [$(this).index(), 300]);

});*/

        /* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
        </script>
      

      <?php

   
    wp_enqueue_script( 'jquery-ui-autocomplete' );
    wp_enqueue_style('search-style');
    ?>
    <script type="text/javascript" >
        jQuery(document).ready(function($) {
        jQuery('#auto-suggest-front').attr('autocomplete','off');

        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    var xhr = null;
    jQuery( "#auto-suggest-front" ).keyup(function() {

        var search_key_var2 = jQuery('#auto-suggest-front').val();

        if(search_key_var2.length > 1){

            jQuery("#auto-suggest-front").addClass('ui-autocomplete-loading');
               var data = {
              'action': 'auto_suggest_front',
              'whatever': search_key_var2

          };

        
         if( xhr != null ) {
                xhr.abort();
                xhr = null;
        }
        jQuery('#asr-container').hide();
        xhr = $.post(ajaxurl, data, function(response) {

            jQuery('#asr-container').show();
            if(response == 'No records found'){
                jQuery('.more-res').hide();
                jQuery('#asr-container').addClass('no-result');
            }else{
                jQuery('.more-res').show();
                jQuery('#asr-container').removeClass('no-result');
                jQuery('.more-res a').attr('href','<?php echo site_url();?>/?s='+search_key_var2);

            }
            jQuery('#result-section').html(response);
            jQuery("#auto-suggest-front").removeClass('ui-autocomplete-loading');


        });





       }else{
            jQuery('#asr-container').hide();
            jQuery('#result-section').html('');
       }   
        
         


        });
    });
    </script>


     <script type="text/javascript" >
        jQuery(document).ready(function($) {
        jQuery('#auto-suggest-front1').attr('autocomplete','off');

        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    var xhr = null;
    jQuery( "#auto-suggest-front1" ).keyup(function() {

        var search_key_var2 = jQuery('#auto-suggest-front1').val();

        if(search_key_var2.length > 1){

            jQuery("#auto-suggest-front1").addClass('ui-autocomplete-loading');
               var data = {
              'action': 'auto_suggest_front',
              'whatever': search_key_var2

          };

        
         if( xhr != null ) {
                xhr.abort();
                xhr = null;
        }
        jQuery('#asr-container1').hide();
        xhr = $.post(ajaxurl, data, function(response) {

            jQuery('#asr-container1').show();
            if(response == 'No records found'){
                jQuery('.more-res').hide();
                jQuery('#asr-container1').addClass('no-result');
            }else{
                jQuery('.more-res').show();
                jQuery('#asr-container1').removeClass('no-result');
                jQuery('.more-res a').attr('href','<?php echo site_url();?>/?s='+search_key_var2);

            }
            jQuery('#result-section1').html(response);
            jQuery("#auto-suggest-front1").removeClass('ui-autocomplete-loading');


        });





       }else{
            jQuery('#asr-container').hide();
            jQuery('#result-section1').html('');
       }   
        
         


        });
    });
    </script>
    <style>
    .ui-autocomplete-loading {
    background: url('http://theimpossibleco.com/wp-content/uploads/2019/05/ajax-loader.gif') right center no-repeat !important;
    }

    </style>

    
    
 <script>


jQuery("#videoplaylist").click(function(){
  jQuery("#video").toggle();
});
jQuery("#openvideop").click(function(){
   jQuery("#video").toggle();
  
var  loc = jQuery("#frame177444").attr("src");
   var startloc = loc + "?autoplay=1";

   jQuery('#frame177444').attr('src',startloc)

               
  
});
</script>

<?php if(!is_cart()){ ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
    	//alert("hello");
        // Stop acting like a button
        //e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
});


</script>
 <script type="text/javascript">
    jQuery(function() {
   
    jQuery(window).scroll(function() {    
        var scroll = jQuery(window).scrollTop();

        if (scroll >= 100) {
            jQuery(".moblie_header").addClass("intro");
            jQuery("#menudesktop").removeClass("intro");

             jQuery("body").addClass("menuintro");
           
            

        } else {
            jQuery(".moblie_header").removeClass("intro");
            jQuery("#menudesktop").addClass("intro");


             jQuery("body").removeClass("menuintro");
            
              

            
        }
    });
});
  </script>
<?php } ?>
<?php if(is_cart()){ ?>
	<script type="text/javascript">
     jQuery(document).ready(function() {
	jQuery('<div class="quantity-nav cart_without"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
jQuery('.quantity').each(function() {
var spinner = jQuery(this),
input = spinner.find('input[type="number"]'),
btnUp = spinner.find('.quantity-up'),
btnDown = spinner.find('.quantity-down'),
min = input.attr('min'),
max = input.attr('max');
btnUp.click(function() {
var oldValue = parseFloat(input.val());
if (oldValue >= max) {
var newVal = oldValue;
} else {
var newVal = oldValue + 1;
}
spinner.find("input").val(newVal);
spinner.find("input").trigger("change");
});
btnDown.click(function() {
var oldValue = parseFloat(input.val());
if (oldValue <= min) {
var newVal = oldValue;
} else {
var newVal = oldValue - 1;
}
spinner.find("input").val(newVal);
spinner.find("input").trigger("change");
});
});
});
	</script>
 <script type="text/javascript">
    jQuery(function() {
   
    jQuery(window).scroll(function() {    
        var scroll = jQuery(window).scrollTop();

        if (scroll >= 100) {
            jQuery(".moblie_header").addClass("intro");
            jQuery("#menudesktop").removeClass("intro");

             jQuery("body").addClass("menuintro");
           
            

        } else {
            jQuery(".moblie_header").removeClass("intro");
            jQuery("#menudesktop").addClass("intro");


             jQuery("body").removeClass("menuintro");
            
              

            
        }
    });
});
  </script>

<?php } ?>


    <?php } ?>

    <div class="menu-shade"> </div>


</body>
</html>

<script type="text/javascript">
function openNav() {
  document.getElementById("mySidenav").style.width = "260px";
jQuery('body').addClass('addsidebar');


}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  jQuery('body').removeClass('addsidebar');
 
}
</script>
