<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div id="reviews">
<div class="container">
  <?php if(!is_user_logged_in()){ ?>
 <div class="row">
   <div class="col-md-12 retingsection without_login woo-rating">
    <?php $slug = get_post_field( 'post_name', $post_id );?>
     
        <h2>Customer Reviews <span><a href="<?php echo site_url();?>/my-account?slug_name=<?php echo $slug;?>">Write a review</a></span></h2>
        <?php
        global $product;

if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
  return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
?>
        <?php if ( $rating_count > 0 ) : ?>

  <div class="woocommerce-product-rating star-rat">
    <?php echo wc_get_rating_html( $average, $rating_count ); ?>
    <?php if ( comments_open() ) : ?><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</a><?php endif ?>
  </div>
<?php endif; ?>
        <?php if ( have_comments() ) : ?>

        <ol class="commentlist">
            <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
        </ol>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            echo '<nav class="woocommerce-pagination">';
            paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
                'prev_text' => '&larr;',
                'next_text' => '&rarr;',
                'type'      => 'list',
            ) ) );
            echo '</nav>';
        endif; ?>

    <?php else : ?>

        <p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

    <?php endif; ?>
   </div>
 </div>
 <?php } else { ?>
<div class="row">
    <div class="col-md-8 retingsection woo-rating">
   
        <h2>Customer Reviews</h2>
        <?php
        global $product;

if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
  return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
?>
        <?php if ( $rating_count > 0 ) : ?>

  <div class="woocommerce-product-rating star-rat">
    <?php echo wc_get_rating_html( $average, $rating_count ); ?>
    <?php if ( comments_open() ) : ?><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</a><?php endif ?>
  </div>
<?php endif; ?>

        <?php if ( have_comments() ) : ?>

        <ol class="commentlist">
            <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
        </ol>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            echo '<nav class="woocommerce-pagination">';
            paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
                'prev_text' => '&larr;',
                'next_text' => '&rarr;',
                'type'      => 'list',
            ) ) );
            echo '</nav>';
        endif; ?>

    <?php else : ?>

        <p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

    <?php endif; ?>
    </div>
    <div class="col-md-4">
         <div id="review_form">
                  <?php
                $commenter = wp_get_current_commenter();

                $comment_form = array(
                    'title_reply'          => have_comments() ? __( 'Add a review', 'woocommerce' ) : __( 'Be the first to review', 'woocommerce' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
                    'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
                    'comment_notes_before' => '',
                    'comment_notes_after'  => '',
                    'fields'               => array(
                        'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
                                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
                        'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
                                    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
                    ),
                    'label_submit'  => __( 'Submit', 'woocommerce' ),
                    'logged_in_as'  => '',
                    'comment_field' => ''
                );
                ?>
               
               
                <?php
                if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
                    $comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'woocommerce' ) .'</label><select name="rating" id="rating">
                        <option value="">' . __( 'Rate&hellip;', 'woocommerce' ) . '</option>
                        <option value="5">' . __( 'Perfect', 'woocommerce' ) . '</option>
                        <option value="4">' . __( 'Good', 'woocommerce' ) . '</option>
                        <option value="3">' . __( 'Average', 'woocommerce' ) . '</option>
                        <option value="2">' . __( 'Not that bad', 'woocommerce' ) . '</option>
                        <option value="1">' . __( 'Very Poor', 'woocommerce' ) . '</option>
                    </select></p>';
                }
                ?>
               
               
              <?php
                $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __( 'Your Review', 'woocommerce' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';
                
                comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
            ?>
          
        </div>
    </div>  
</div>
<?php } ?>
</div>
</div>

<?php
global $product, $woocommerce_loop, $flatsome_opt;
if ( empty( $product ) || !$product->exists() ) {
    return;
}
if(!isset($flatsome_opt['max_related_products'])) {$flatsome_opt['max_related_products'] = '12';}
$related = $product->get_related($flatsome_opt['max_related_products']);
if ( sizeof( $related ) == 0 ) return;
$args = apply_filters( 'woocommerce_related_products_args', array(
    'post_type'              => 'product',
    'ignore_sticky_posts'    => 1,
    'no_found_rows'          => 1,
    'posts_per_page'         => 3,
    'orderby'                => $orderby,
    'post__in'               => $related,
    'post__not_in'           => array( $product->id )
    ) );
$products                        = new WP_Query( $args );
$woocommerce_loop[ 'name' ]      = 'related';
$woocommerce_loop[ 'columns' ]   = apply_filters( 'woocommerce_related_products_columns', $columns );
if ( $products->have_posts() ) :
    ?>

    <div class="related products">
      
        <h2><?php _e( 'Related Products', 'woocommerce' ); ?></h2>
      
        <?php woocommerce_product_loop_start(); ?>

        <?php
        if ( shortcode_exists( 'pt_view' ) ) :
            $pids = array();
            $query_obj = $products;
            while ( $query_obj ? $query_obj->have_posts() : have_posts() ) :
                $query_obj ? $query_obj->the_post() : the_post();
                $pids[] = get_the_ID();
            endwhile;
            echo do_shortcode( '[pt_view id="VIEW_ID" post_id="' . implode( ',', $pids ) . '"]' );
        else :
            ?>


             <div class="row">

            <?php while ( $products->have_posts() ) : $products->the_post(); ?>
                <div class="col-lg-4 col-md-6 price_box">
                 <div class="popular_videos pro-iteam">
                  <a href="<?php echo the_permalink(); ?>">
            <?php $video_section =  get_field('add_video_demo_url'); 
           if($video_section){
             ?>
              
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(  $post->ID ), 'full' ); ?>
     

<img class="img" src="<?php echo $image[0]; ?>">

             <?php  
             }else{
             ?>
              <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
               
                   <img class="img" src="<?php echo $image[0]; ?>">


             
             <?php  
             }
            ?> 
            <div class="text">
                 <div class="cen">     
                <h3><?php the_title();?> </h3> 
               <?php
                  $product = wc_get_product( $post_id ); 
                  $price = get_post_meta( get_the_ID(), '_sale_price', true);
                  $regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
 
                 if ($price != "") {
               ?>
               <!-- <span>$<?php //echo $price; ?></span> -->
             <?php } ?>


                  </div> </div>
              </a>
            </div>
         </div>
           

            <?php endwhile; // end of the loop. ?>

            </div>

        <?php endif; ?>

        <?php woocommerce_product_loop_end(); ?>

    </div>

    <?php
endif;
wp_reset_postdata();
?>

