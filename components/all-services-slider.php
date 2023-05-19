<div class="all-services__tab whatwedo__content-item active" id="all-services__tab">
    <?php while($services->have_posts()):$services->the_post();
        if (strtolower(pathinfo(get_the_post_thumbnail_url(get_the_ID()), PATHINFO_EXTENSION)) === "gif") {
            $thumb = get_the_post_thumbnail_url(get_the_ID(), "full");
        } else {
            $thumb = get_the_post_thumbnail_url(get_the_ID(), "medium_large");
        }
        $thumbID = get_post_thumbnail_id(get_the_ID());
        $alt = get_post_meta($thumbID, '_wp_attachment_image_alt', true); ?>
        <a href="<?php the_permalink(); ?>" class="all-services__tab-item d-block">
            <?php if ($thumb) { ?>
                <div class="img-wrapper img-shadow overflow-hidden">
                    <img src="<?= $thumb; ?>" alt="<?= $alt; ?>" class="absolute-cover-img transition-default">
                </div>
            <?php } else if ($notSetImg) { ?>
                <div class="img-wrapper not-set-img overflow-hidden">
                    <img src="<?= $notSetImg["sizes"]["medium"]; ?>" alt="<?= $notSetImg["alt"]; ?>" class="absolute-cover-img">
                </div>
            <?php } else { ?>
                <div class="img-wrapper not-set-img overflow-hidden">
                    <img src="<?php bloginfo("template_url"); ?>/images/logo.svg" alt="image" class="absolute-cover-img">
                </div>
            <?php } ?>
            <h4 class="all-services__tab-item-title tab-title transition-default"><?php the_title(); ?></h4>
        </a>
    <?php endwhile; ?>
</div>