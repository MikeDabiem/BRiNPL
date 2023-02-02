<?php
$currentID = get_the_ID();
$thumb = get_the_post_thumbnail_url($currentID, "full");
$thumbID = get_post_thumbnail_id($currentID);
$alt = get_post_meta($thumbID, '_wp_attachment_image_alt', true);
?>
<section class="page__heading position-relative">
    <?php if ($thumb) { ?>
        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" class="absolute-cover-img">
    <?php } ?>
    <h1 class="page__title font-heavy wrapper"><?php the_title(); ?></h1>
</section>