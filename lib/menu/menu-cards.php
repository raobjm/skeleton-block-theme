<div class="menu-cards">
    <?php foreach($args['cards'] as $card) : ?>
        <a class="menu-card" href="<?= $card['link']['url']; ?>" target="<?= $card['link']['target']; ?>">
            <img class="menu-card-image" src="<?= $card['image']['sizes']['thumbnail']; ?>" alt="<?= $card['image']['title']; ?>">
            <h5 class="menu-card-heading"><?= $card['heading']; ?></h5>
            <span class="menu-card-link"><?= $card['link']['title']; ?></span>
        </a>
    <?php endforeach; ?>
</div>
