<?php

if ( function_exists( 'blokki_render_post' ) ) {
	blokki_render_post();
} else {

	// Fallback if blokki is not activated.

	$card_content = '
	<!-- wp:post-title {"level":3,"isLink":true,"fontSize":"x-large"} /-->
	<!-- wp:post-featured-image {"isLink":true} /-->
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false}} -->
	<div class="wp-block-group">
		<!-- wp:post-author {"showAvatar":false} /-->
		<!-- wp:post-date /-->
		<!-- wp:post-terms {"term":"category","prefix":"Categories: "} /-->
	</div>
	<!-- /wp:group -->
	<!-- wp:post-excerpt {"moreText":"Read more","showMoreOnNewLine":false} /-->

	<!-- wp:spacer {"height":"40px"} -->
	<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->';

	echo do_blocks( $card_content );

}