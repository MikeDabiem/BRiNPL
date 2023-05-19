<?php $wrapper = $wrapper ?? null; ?>
<section class="portfolio-slider <?= $wrapper; ?> d-flex justify-content-between align-items-center flex-wrap">
    <?php if ($title || (isset($link["title"]) && isset($link["url"]))) {
        if ($title) { ?>
            <h3 class="section-title font-bold"><?= $title; ?></h3>
        <?php } if (isset($link["title"]) && isset($link["url"])) { ?>
            <a href="<?= $link["url"]; ?>" class="portfolio-slider__link default-btn font-bold transition-default d-block"><?= $link["title"]; ?></a>
        <?php }
    } ?>
    <div class="portfolio-slider__items d-flex">
        <?php while($portfolio->have_posts()) : $portfolio->the_post();
            $id = get_the_ID();
            $title = get_the_title();
            $thumb = get_the_post_thumbnail_url($id, "medium_large");
            $thumbID = get_post_thumbnail_id($id);
            $alt = get_post_meta($thumbID, '_wp_attachment_image_alt', true); ?>
            <a href="<?php the_permalink(); ?>" class="portfolio-slider__item scroll-image-trigger d-block">
                <div class="portfolio-slider__item-image-wrapper scroll-image-wrapper img-shadow overflow-hidden <?php $thumb ? null : print "not-set-img"; ?>">
                    <?php if ($thumb) { ?>
                        <img src="<?= $thumb; ?>" alt="<?= $alt; ?>" class="portfolio-slider__item-image scroll-image transition-default" loading="lazy">
                    <?php } else if ($notSetImg) { ?>
                        <img src="<?= $notSetImg["sizes"]["medium"]; ?>" alt="<?= $notSetImg["alt"]; ?>" class="absolute-cover-img">
                    <?php } else { ?>
                        <img src="<?php bloginfo("template_url"); ?>/images/logo.svg" alt="image" class="absolute-cover-img">
                    <?php } ?>
                </div>
                <?php if ($title) { ?>
                    <h5 class="portfolio-slider__item-title transition-default contacts-text"><?= $title; ?></h5>
                <?php } ?>
            </a>
        <?php endwhile; ?>
    </div>
</section>