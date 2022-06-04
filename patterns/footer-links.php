<?php
/**
 * Title: Footer links
 * Slug: starter-basic/footer-links
 * Categories: text
 * Inserter: no
 *
 * @package starter-basic
 * @since 1.0.0
 */

?>
<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","allowOrientation":false}} -->
<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"extra-small"} -->
<p class="has-extra-small-font-size"><?php esc_html_e( 'Copyright', 'starter-basic' );
echo ' ' . date_i18n( _x( 'Y', 'copyright date format', 'starter-basic' ) ); ?></p><!-- /wp:paragraph -->
<!-- wp:site-title {"level":0, "fontSize":"extra-small"} /-->
    <!-- wp:paragraph {"fontSize":"extra-small"} --><p class="has-extra-small-font-size"><?php get_the_privacy_policy_link() ?>'</p><!-- /wp:paragraph -->
<!-- wp:social-links {"className":"is-style-logos-only"} -->
<ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /--></ul>
<!-- /wp:social-links -->
</div><!-- /wp:group -->
</div><!-- /wp:group -->
