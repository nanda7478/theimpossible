<?php
$slug_name = $_GET['slug_name'];
if(isset($slug_name) && is_user_logged_in() ){
  wp_redirect ( home_url("/product/'".$slug_name."'") );
}
?>
<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
  <link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
  <link rel="shortcut icon" type="image/png" href="http://theimpossibleco.com/wp-content/themes/theimpossibleco/images/logo.png"/>

  <?php endif; ?>
  <!-- new add april-2 -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fontawesome/css/all.min.css">

  <!-- and-->
  <?php
  if(!is_user_logged_in()){
  ?>
  <style type="text/css">
   .page-id-90 h2.f-56 {
    display: none;
   }
  </style>

  <?php
  }
  ?>

  

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<style type="text/css">
    .size-large.wp-image-730.aligncenter {
  text-align: center;
  margin: 0 auto;
  display: block;
}
  .homelogo  a{
    background-image: url(<?php echo get_template_directory_uri(); ?>/images/logo-5.svg);
  }

  #menu-item-333:hover ul.sub-menu {
    display: block;
    width: 150px;
}
.single-product .product_meta {
  display: none;
}
</style>
<div class="header hidden_mobile">
 <div class="container position-relative">
  <div class="hrader_right">
  <?php //dynamic_sidebar('footer-10'); ?>
<section id="polylang-2" class="widget widget_polylang"><ul class="languagetrans11">
  <li class="lang-item lang-item-25 lang-item-en lang-item-first no-translation"><a class="woocs_auto_switcher_link" lang="en-GB"  href="http://theimpossibleco.com/"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAflJREFUeNpinDRzn5qN3uFDt16+YWBg+Pv339+KGN0rbVP+//2rW5tf0Hfy/2+mr99+yKpyOl3Ydt8njEWIn8f9zj639NC7j78eP//8739GVUUhNUNuhl8//ysKeZrJ/v7z10Zb2PTQTIY1XZO2Xmfad+f7XgkXxuUrVB6cjPVXef78JyMjA8PFuwyX7gAZj97+T2e9o3d4BWNp84K1NzubTjAB3fH0+fv6N3qP/ir9bW6ozNQCijB8/8zw/TuQ7r4/ndvN5mZgkpPXiis3Pv34+ZPh5t23//79Rwehof/9/NDEgMrOXHvJcrllgpoRN8PFOwy/fzP8+gUlgZI/f/5xcPj/69e/37//AUX+/mXRkN555gsOG2xt/5hZQMwF4r9///75++f3nz8nr75gSms82jfvQnT6zqvXPjC8e/srJQHo9P9fvwNtAHmG4f8zZ6dDc3bIyM2LTNlsbtfM9OPHH3FhtqUz3eXX9H+cOy9ZMB2o6t/Pn0DHMPz/b+2wXGTvPlPGFxdcD+mZyjP8+8MUE6sa7a/xo6Pykn1s4zdzIZ6///8zMGpKM2pKAB0jqy4UE7/msKat6Jw5mafrsxNtWZ6/fjvNLW29qv25pQd///n+5+/fxDDVbcc//P/zx/36m5Ub9zL8+7t66yEROcHK7q5bldMBAgwADcRBCuVLfoEAAAAASUVORK5CYII=" title="EN" alt="EN"><span style="margin-left:0.3em;">EN</span></a></li>
  <li class="lang-item lang-item-28 lang-item-ja current-lang"><a class="woocs_auto_switcher_link" lang="ja"  href="http://theimpossibleco.com/ja/"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAE2SURBVHjaYvz69SsDEvj37x+ERGbAwZ9//wACiAUoysXFBST///8P0QOm//+HU0jgxYsXAAHEAlP0H8HYt+//4SP/f//6b2b238sLrpqRkRFoCUAAsaCrXrv2/8KF///8+f/r9//Dh/8/ffI/OQWiAeJCgABigrseJPT27f/Vq////v3/1y8oWrzk/+PHcEv+/PkDEEBMEM/B3fj/40eo0t9g8suX/w8f/odZAVQMEEAsQAzj/2cQFf3PxARWCrYEaBXQLCkpqB/+/wcqBgggJrjxQPX/hYX/+/v///kLqhpIBgf/l5ODhxiQBAggFriToDoTEv5zcf3ftQuk2s7uf0wM3MdAAPQDQAAxvn37lo+PDy4KZUDcycj4/z9CBojv3r0LEEAgG969eweLSBDEBSCWAAQYACaTbJ/kuok9AAAAAElFTkSuQmCC" title="JA" alt="JA"><span style="margin-left:0.3em;">JA</span></a></li>
</ul>
</section>
  
</div>
    <nav id="menudesktop">
       <?php 
           $currentLanguage  = get_bloginfo('language');
            $_SESSION["language"] = $currentLanguage;
           if($currentLanguage == 'ja'){
           
           ?>
           <?php wp_nav_menu( array( 'menu' => 'headermenujapan','container_class' => 'my_extra_menu_class') ); ?> 
           <?php }else{ ?>

            <?php wp_nav_menu( array( 'menu' => 'headermenu','container_class' => 'my_extra_menu_class') );
            }  
            ?> 
            <?php
          global $current_user;
          ?>
         <ul class="list-inline cart_header">
          <?php
          if(is_user_logged_in()){
          ?>
          <?php if($currentLanguage == 'ja'){ ?>
          <li class="list-inline-item">こんにちは, <?php echo $current_user->first_name;?></li>
          <?php } else { ?>
          <li class="list-inline-item">Hi, <?php echo $current_user->first_name;?></li>
         <?php } ?>
         <?php } ?>
       <li class="list-inline-item searchid"> <i class="fal fa-search"></i>
       
       </li>
         

      <div class="searchform">
         <div class="search-section">
            <form action="<?php echo site_url();?>" method="get" role="search">
               <input class="auto-suggest-front" id="auto-suggest-front" placeholder="Search..." name="s">
            </form>
         </div>
         <div class="asr-container" style="display: none;background: #fff;text-align: left;border-top: 1px solid #ccc;" id="asr-container">
            <div class="result-section" id="result-section"></div>
         </div>
      </div>



       <li class="list-inline-item" >
        <?php
          $currentLanguage  = get_bloginfo('language');
          if($currentLanguage == 'ja'){
            ?>
             <a href="http://theimpossibleco.com/ja/%e7%a7%81%e3%81%ae%e5%9b%b3%e6%9b%b8%e9%a4%a8/"> 
            <?php
          }else{
        ?>
        <?php if(is_user_logged_in()){ ?>
          <a href="http://theimpossibleco.com/my-account/edit-account/"> 
        <?php } else { ?>
        <a href="http://theimpossibleco.com/my-account"> 
        <?php } ?>
        <?php } ?>
        <i class="fal fa-user-alt"></i> </a></li>


       <li class="list-inline-item" >
        <?php
          $currentLanguage  = get_bloginfo('language');
          if($currentLanguage == 'ja'){
        ?>
        <a href="http://theimpossibleco.com/ja/%E3%82%AB%E3%83%BC%E3%83%88"> 
       <?php
        }else{
          ?>
          <a href="http://theimpossibleco.com/cart/"> 
          <?php
        }
       ?>
          <i class="fal fa-shopping-cart"></i> </a><?php global $woocommerce; ?>
                <a class="your-class-name" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"
                   title="<?php _e('Cart View', 'woothemes'); ?>">
                    <?php echo sprintf(_n('%d items', $woocommerce->cart->cart_contents_count, 'woothemes'),
                    $woocommerce->cart->cart_contents_count);?> 
                    </a></li>

    
       </ul>   
    </nav>

 </div>
</div>

<div class="moblie_header hidden_desktop">
  <div class="d-flex justify-content-between align-items-center">
    <div class="left">
      <button class="menu" onclick="openNav()" ><i class="fal fa-bars"></i></button>
  

    </div>
    <?php 
     $currentLanguage  = get_bloginfo('language');
     if($currentLanguage == 'ja'){
     ?>
    <div class="center logo">
     <a href="<?php echo site_url(); ?>/ja/home-j/"><img src="<?php echo get_template_directory_uri(); ?>/images/shape-png.png" alt=""> </a>
    </div>
  <?php } else { ?>
   <div class="center logo">
     <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/shape-png.png" alt=""> </a>
    </div>
  <?php } ?>
    <div class="right">
      <ul class="list-inline cart_header">
       <li class="list-inline-item searchid"> <i class="fal fa-search"></i>
       
       </li>
          <div class="searchform">
         <div class="search-section">
            <form action="<?php echo site_url();?>" method="get" role="search">
               <input class="auto-suggest-front1" id="auto-suggest-front1" placeholder="Search..." name="s">
            </form>
         </div>
         <div class="asr-container1" style="display: none;background: #fff;text-align: left;border-top: 1px solid #ccc;" id="asr-container1">
            <div class="result-section" id="result-section1"></div>
         </div>
      </div>
       <li class="list-inline-item" >
        <?php if(is_user_logged_in()){ ?>
          <a href="http://theimpossibleco.com/my-account/edit-account/"> 
        <?php } else { ?>
        <a href="http://theimpossibleco.com/my-account"> 
        <?php } ?>
        <i class="fal fa-user-alt"></i> </a></li>
       <li class="list-inline-item" ><a href="http://theimpossibleco.com/cart/">   <i class="fal fa-shopping-cart"></i>  
       	<span class="your-class-name">  <?php echo sprintf(_n('%d items', $woocommerce->cart->cart_contents_count, 'woothemes'),
                    $woocommerce->cart->cart_contents_count);?>  </span></a></li>
       </ul>
    </div>
  </div>
</div>

<div id="mySidenav" class="sidenav">

      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"> <i class="fal fa-times"></i> </a>
  
  <?php dynamic_sidebar('footer-10'); ?>
  <?php 
           $currentLanguage  = get_bloginfo('language');
           if($currentLanguage == 'ja'){
           ?>
           <?php wp_nav_menu( array( 'menu' => 'headermenujapan','container_class' => 'my_extra_menu_class') ); ?> 
           <?php }else{ ?>

            <?php wp_nav_menu( array( 'menu' => 'headermenu','container_class' => 'my_extra_menu_class') );
            }  
  ?> 

<section id="polylang-2" class="widget widget_polylang"><ul class="languagetrans11">
  <li class="lang-item lang-item-25 lang-item-en lang-item-first no-translation"><a class="woocs_auto_switcher_link" lang="en-GB"  href="http://theimpossibleco.com/"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAflJREFUeNpinDRzn5qN3uFDt16+YWBg+Pv339+KGN0rbVP+//2rW5tf0Hfy/2+mr99+yKpyOl3Ydt8njEWIn8f9zj639NC7j78eP//8739GVUUhNUNuhl8//ysKeZrJ/v7z10Zb2PTQTIY1XZO2Xmfad+f7XgkXxuUrVB6cjPVXef78JyMjA8PFuwyX7gAZj97+T2e9o3d4BWNp84K1NzubTjAB3fH0+fv6N3qP/ir9bW6ozNQCijB8/8zw/TuQ7r4/ndvN5mZgkpPXiis3Pv34+ZPh5t23//79Rwehof/9/NDEgMrOXHvJcrllgpoRN8PFOwy/fzP8+gUlgZI/f/5xcPj/69e/37//AUX+/mXRkN555gsOG2xt/5hZQMwF4r9///75++f3nz8nr75gSms82jfvQnT6zqvXPjC8e/srJQHo9P9fvwNtAHmG4f8zZ6dDc3bIyM2LTNlsbtfM9OPHH3FhtqUz3eXX9H+cOy9ZMB2o6t/Pn0DHMPz/b+2wXGTvPlPGFxdcD+mZyjP8+8MUE6sa7a/xo6Pykn1s4zdzIZ6///8zMGpKM2pKAB0jqy4UE7/msKat6Jw5mafrsxNtWZ6/fjvNLW29qv25pQd///n+5+/fxDDVbcc//P/zx/36m5Ub9zL8+7t66yEROcHK7q5bldMBAgwADcRBCuVLfoEAAAAASUVORK5CYII=" title="EN" alt="EN"><span style="margin-left:0.3em;">EN</span></a></li>
  <li class="lang-item lang-item-28 lang-item-ja current-lang"><a class="woocs_auto_switcher_link" lang="ja"  href="http://theimpossibleco.com/ja/"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAE2SURBVHjaYvz69SsDEvj37x+ERGbAwZ9//wACiAUoysXFBST///8P0QOm//+HU0jgxYsXAAHEAlP0H8HYt+//4SP/f//6b2b238sLrpqRkRFoCUAAsaCrXrv2/8KF///8+f/r9//Dh/8/ffI/OQWiAeJCgABigrseJPT27f/Vq////v3/1y8oWrzk/+PHcEv+/PkDEEBMEM/B3fj/40eo0t9g8suX/w8f/odZAVQMEEAsQAzj/2cQFf3PxARWCrYEaBXQLCkpqB/+/wcqBgggJrjxQPX/hYX/+/v///kLqhpIBgf/l5ODhxiQBAggFriToDoTEv5zcf3ftQuk2s7uf0wM3MdAAPQDQAAxvn37lo+PDy4KZUDcycj4/z9CBojv3r0LEEAgG969eweLSBDEBSCWAAQYACaTbJ/kuok9AAAAAElFTkSuQmCC" title="JA" alt="JA"><span style="margin-left:0.3em;">JA</span></a></li>
</ul>
</section>

<ul class="socials">
<li><a target="_blank" href="https://www.facebook.com/The-Impossible-Co-332303457466209"><i class="fab fa-facebook-f"></i></a></li>
<li><a target="_blank" href="https://www.instagram.com/impossiblecompany"><i class="fab fa-instagram"></i></a></li>
<li><a target="_blank" href="https://www.youtube.com/channel/UC-yBvY-tthcFqBHNfqkml4Q"><i class="fab fa-youtube"></i></a></li>
<li><a target="_blank" href="https://twitter.com/impossible2019"><i class="fab fa-twitter"></i></a></li>
</ul>

</div>


    <div id="content" class="site-content main_body_all">
