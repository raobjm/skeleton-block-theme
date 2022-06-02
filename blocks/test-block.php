<?php
// to fix IDE crying for unset variable
$block = $block ?? [];

printf( '<div class="%s">', $block['className'] ?? 'wp-block-acf-bjm-test-block' );
	echo 'This is a Test block created with acf';
printf( '</div>' );
