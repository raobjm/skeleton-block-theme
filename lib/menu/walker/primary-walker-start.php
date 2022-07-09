<?php
$args    = $args ?? [];
$item_id = $args['id'] ?? 0;

$back_button_label = esc_html__( 'Back', 'bjm' );

$menu_item_title   = get_the_title( $args['id'] );

if(empty( $menu_item_title )){
	$menu_item_title =  get_the_excerpt( $args['id'] );
}
if ( $item_id > 0 && ! empty( $menu_item_title ) ) {
	$back_button_label = $menu_item_title;
}


if ( isset( $args['depth'] ) && 0 === $args['depth'] ): ?>
<div class="submenu depth-<?= $args['depth'] ?>">
    <div class="submenu-container">
<?php endif; ?>
    <ul class="sub-list depth-<?= $args['depth'] ?> <?= $args['depth'] === 0 ? "children-{$args['children_count']}" : ''; ?>">
    <?php if($args['depth'] === 0): ?>
        <button class="submenu-back" type="button">
            <i class="fas fa-chevron-left"></i> <span><?php echo $back_button_label; ?></span>
        </button>
    <?php endif; ?>

