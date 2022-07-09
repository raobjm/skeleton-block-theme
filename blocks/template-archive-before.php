<?php

$before_template = bjm_get_template_archive_before();

if ( $before_template ) {
	echo apply_filters( 'the_content', get_post_field( 'post_content', $before_template ) );
}