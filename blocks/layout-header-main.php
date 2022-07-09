<div class="header-elements-wrapper flex-container align-justify align-middle">
	<?php if ( $logo = get_field( 'logo', 'options' ) ) : ?>
        <a class="header-logo" href="<?= home_url( '/' ); ?>"
           aria-label="<?php _e( 'Home page', 'bjm' ); ?>">
            <img src="<?= $logo; ?>" alt="<?= get_bloginfo( 'name', 'display' ); ?>">
        </a>
	<?php else: ?>
        <a class="header-blog-name" href="<?= home_url( '/' ); ?>"
           aria-label="<?php _e( 'Home page', 'bjm' ); ?>">
            <h2><?php bloginfo( 'name' ); ?></h2>
        </a>
	<?php endif; ?>
    <nav class="header-nav">
		<?php

		wp_nav_menu( [
			'theme_location'  => 'primary-menu',
			'container_class' => 'primary-menu',
			'walker'          => new SkeletonBlockTheme\Primary_Walker(),
		] );

		?>
        <div class="mobile-menu-links-wrapper hide-for-large">
            <div class="mobile-menu-buttons">
				<?php
				get_template_part( 'partials/header', 'links' );
				?>
            </div>
        </div>
    </nav>

    <div class="header-links show-for-large">
		<?php
		get_template_part( 'partials/header', 'links' );
		get_template_part( 'partials/header', 'button' );
		?>
    </div>
    <div class="header-links-mobile hide-for-large">
		<?php
		get_template_part( 'partials/header', 'button' );
		?>
    </div>
    <button class="header-toggle" type="button" aria-label="<?php _e( 'Toggle main menu', 'bjm' ); ?>">
        <i></i></button>
</div>
