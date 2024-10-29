<?php
/**
 * @link              
 * @since             1.0.0
 * @package           Be Boost
 *
 * Single product share function
 *
 */
	

if ( ! function_exists( 'be_boost_share_products' ) ) :
function be_boost_share_products(){
	global $post; 
	 
	$beboost_product_link = get_the_permalink(get_the_ID() );
	$beboost_product_title = get_the_title(get_the_ID() );
?>
<div class="be-boost-share beproduct-share">
	<span><?php esc_html_e( 'Share Now:','be-boost' ); ?></span>
	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($beboost_product_link); ?>" target="_blank" class="beshare-item"><i class="icon-Facebook"></i></a>
	<a href="https://twitter.com/intent/tweet?url=<?php echo esc_url($beboost_product_link); ?>&text=<?php echo esc_html($beboost_product_title); ?>" target="_blank" class="beshare-item"><i class="icon-Twitter"></i></a>
	<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url($beboost_product_link); ?>&title=<?php echo esc_html($beboost_product_title); ?>" target="_blank" class="beshare-item"><i class="icon-Linkedin"></i></a>
	<a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url($beboost_product_link); ?>&description=<?php echo esc_html($beboost_product_title); ?>" target="_blank" class="beshare-item"><i class="icon-Pinterest"></i></a>
	<a href="http://www.tumblr.com/share?v=3&u=<?php echo esc_url($beboost_product_link); ?>&t=<?php echo esc_html($beboost_product_title); ?>" target="_blank" class="beshare-item"><i class="icon-Tumblr"></i></a>
</div>
	

<?php
}	
add_action('woocommerce_share','be_boost_share_products');	
endif;
