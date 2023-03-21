<?php
$notSetImg = get_field("header_logo", "options");
$link = get_permalink();
$id = get_the_ID();
$thumb = get_the_post_thumbnail_url($id, "medium_large");
$thumbID = get_post_thumbnail_id($id);
$alt = get_post_meta($thumbID, '_wp_attachment_image_alt', true);
$title = get_the_title(); ?>
<a href="<?php echo $link; ?>" class="portfolio-page__list-item <?php if($thumb) echo "img-hover"; ?> d-block">
    <?php if ($thumb) { ?>
        <div class="img-wrapper img-shadow overflow-hidden">
            <img src="<?= $thumb; ?>" alt="<?= $alt; ?>" class="absolute-cover-img transition-default">
        </div>
    <?php } else if($notSetImg) { ?>
        <div class="img-wrapper img-shadow not-set-img overflow-hidden">
            <img src="<?= $notSetImg["sizes"]["medium"]; ?>" alt="image" class="absolute-cover-img transition-default">
        </div>
    <?php } else { ?>
        <div class="img-wrapper img-shadow not-set-img overflow-hidden">
            <img src="<?php bloginfo("template_url"); ?>/images/Logo.svg" alt="image" class="absolute-cover-img">
        </div>
    <?php } if ($title) { ?>
        <h3 class="portfolio-page__list-item-title portfolio-title transition-default text-center font-bold"><?php echo $title; ?></h3>
    <?php } ?>
</a>