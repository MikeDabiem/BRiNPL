<?php
$notSetImg = get_field("header_logo", "options");
$link = get_permalink();
$id = get_the_ID();
$thumb = get_the_post_thumbnail_url($id, "medium_large");
$thumbID = get_post_thumbnail_id($id);
$alt = get_post_meta($thumbID, '_wp_attachment_image_alt', true);
$title = get_the_title(); ?>
<a href="<?= $link; ?>" class="portfolio-page__list-item <?php if($thumb) echo "scroll-image-trigger"; ?> d-block">
    <div class="img-wrapper img-shadow scroll-image-wrapper overflow-hidden <?= $thumb ? "scroll-image-wrapper" : "not-set-img"; ?>">
        <?php if ($thumb) { ?>
            <img src="<?= $thumb; ?>" alt="<?= $alt; ?>" class="portfolio-page__list-item-image transition-default scroll-image" loading="lazy">
        <?php } else if($notSetImg) { ?>
            <img src="<?= $notSetImg["sizes"]["medium"]; ?>" alt="image" class="absolute-cover-img transition-default">
        <?php } else { ?>
            <img src="<?php bloginfo("template_url"); ?>/images/logo.svg" alt="image" class="absolute-cover-img">
        <?php } ?>
    </div>
    <?php if ($title) { ?>
        <h3 class="portfolio-page__list-item-title transition-default text-center"><?= $title; ?></h3>
    <?php } ?>
</a>