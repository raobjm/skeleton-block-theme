<div class="footer-elements-wrapper">
    <div class="footer-menu-cont">
		<?php
		wp_nav_menu(
			[
				'theme_location'  => 'secondary-menu',
				'container'       => false,                           // remove nav container
				'container_class' => '',                // class of container
				'menu'            => '',                                // menu name
				'before'          => '',                                 // before each link <a>
				'after'           => '',                                  // after each link </a>
				'link_before'     => '',                            // before each link text
				'link_after'      => '',                             // after each link text
				'depth'           => 5,                                   // limit the depth of the nav
				'fallback_cb'     => false,                         // fallback function (see below)
			]
		);
		?>
    </div>
</div>
