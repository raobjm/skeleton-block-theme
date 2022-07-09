<?php

$after_template = bjm_get_template_archive_after();

if ( $after_template ) {
	echo apply_filters( 'the_content', get_post_field( 'post_content', $after_template ) );
}