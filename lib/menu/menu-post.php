<?php
$post = $args['post'];
setup_postdata( $post );
$has_thumbnail   = has_post_thumbnail();
$mime_type_class = '';

if ( $has_thumbnail ) {
	$mime_type = bjm_get_post_thumbnail_mime_type( $post->ID );

	if ( $mime_type ) {
		$mime_type_class = 'post-img-type-' . $mime_type;
	}
}
?>
<a href="<?php the_permalink(); ?>"
   class="menu-post-card <?= $mime_type_class; ?> <?= $has_thumbnail ? 'has-thumbnail' : 'no-thumbnail' ?>">
	<?php if ( true ) :
		if ( $has_thumbnail )  :


			printf( '<div class="menu-post-img-wrapper"><img class="menu-post-image" src="%s" alt="%s" /></div>',
				get_the_post_thumbnail_url( $post, 'medium_large' ),
				get_the_title()
			);
		endif;
	endif; ?>
    <span class="menu-post-heading"><?=
		get_the_title();
		?></span>
</a>
<?php
wp_reset_postdata();
?>
