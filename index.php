<?php /* Template Name: Home Template */
    get_header();
    $currentID = get_the_ID();
    $notSetImg = get_field("header_logo", "options");
?>
<main class="homepage filler">
    <?php
    $heroTitle = get_field("hero_title");
    $heroSubtitle = get_field("hero_subtitle");
    $heroButton = get_field("hero_button");
    if($heroTitle || $heroSubtitle || (isset($heroButton["title"]) && isset($heroButton["url"]))) { ?>
        <section class="hero">
            <div class="hero__content wrapper d-flex justify-content-between align-items-center">
                <?php if($heroTitle || $heroSubtitle || (isset($heroButton["title"]) && isset($heroButton["url"]))) { ?>
                    <div class="hero__content-left">
                        <?php if($heroTitle) { ?>
                            <h1 class="main-title font-bold"><?php echo $heroTitle; ?></h1>
                        <?php } if($heroSubtitle) { ?>
                            <p class="main-subtitle contacts-text"><?php echo $heroSubtitle; ?></p>
                        <?php } if(isset($heroButton["title"]) && isset($heroButton["url"])) { ?>
                            <a href="<?php echo $heroButton["url"]; ?>" class="hero__btn default-btn-icon transition-default d-inline-flex">
                                <img src="<?php bloginfo("template_url"); ?>/images/Plane.svg" alt="plane">
                                <?php echo $heroButton["title"]; ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
                    <div class="hero__content-right">
                        <div class="img-wrapper hero__content-right-image">
                            <video src="<?php bloginfo("template_url"); ?>/images/laptop.mp4" class="absolute-cover-img" playsinline autoplay loop muted></video>
                        </div>
                    </div>
            </div>
        </section>
    <?php }
    $outstaffTitle = get_field("outstaffing_title");
    $outstaffText = get_field("outstaffing_text");
    $outstaffCards = get_field("outstaffing_cards");
    if ($outstaffTitle || $outstaffText || !empty($outstaffCards)) { ?>
        <section class="outstaff wrapper">
            <p class="outstaff__new small-title d-flex align-items-center">new service</p>
            <?php if ($outstaffTitle) { ?>
                <h3 class="section-title font-bold"><?= $outstaffTitle; ?></h3>
            <?php }
            if ($outstaffText || !empty($outstaffCards)) { ?>
                <div class="outstaff__content d-flex justify-content-between">
                    <?php if ($outstaffText) { ?>
                        <div class="outstaff__content-col1">
                            <div class="wysiwyg-styles"><?= $outstaffText; ?></div>
                        </div>
                    <?php }
                    if (!empty($outstaffCards)) { ?>
                        <div class="outstaff__content-col2 d-flex flex-wrap">
                            <?php foreach ($outstaffCards as $i => $card) { ?>
                                <div class="outstaff__content-card img-shadow transition-default d-flex flex-column" data-index="<?= $i; ?>">
                                    <div class="outstaff__content-card-img img-wrapper position-relative"><img src="<?= $card["outstaffing_card_image"]["sizes"]["medium"] ?>" alt="<?= $card["outstaffing_card_image"]["alt"] ?>" class="absolute-cover-img"></div>
                                    <h4 class="outstaff__content-card-title"><?= $card["outstaffing_card_title"]; ?></h4>
                                    <p class="outstaff__content-card-text input-text"><?= $card["outstaffing_card_text"]; ?></p>
                                    <button class="outstaff__content-card-btn default-btn">More</button>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </section>
    <?php }
    $services = new WP_Query(["post_type" => "services", "post_per_page" => -1]);
    if ($services->have_posts()):
        $wwdTitle = get_field("what_we_do_title"); ?>
        <section class="whatwedo" id="whatwedo">
            <?php if ($wwdTitle) { ?>
                <h3 class="section-title font-bold"><?php echo $wwdTitle; ?></h3>
            <?php } ?>
            <div class="overflow-auto">
                <div class="whatwedo__tabs transition-default">
                    <a href="all-services__tab" class="whatwedo__tab small-title active">All Services</a>
                    <?php while($services->have_posts()):$services->the_post(); ?>
                        <a href="<?php the_ID(); ?>" class="whatwedo__tab small-title"><?php the_title(); ?></a>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="whatwedo__content">
                <div class="all-services__tab whatwedo__content-item active" id="all-services__tab">
                    <?php while($services->have_posts()):$services->the_post();
                    if (strtolower(pathinfo(get_the_post_thumbnail_url(get_the_ID()), PATHINFO_EXTENSION)) === "gif") {
                        $thumb = get_the_post_thumbnail_url(get_the_ID(), "full");
                    } else {
                        $thumb = get_the_post_thumbnail_url(get_the_ID(), "medium_large");
                    }
                    $thumbID = get_post_thumbnail_id(get_the_ID());
                    $alt = get_post_meta($thumbID, '_wp_attachment_image_alt', true); ?>
                        <a href="<?php the_ID(); ?>" class="all-services__tab-item d-block">
                            <?php if ($thumb) { ?>
                                <div class="img-wrapper img-shadow overflow-hidden">
                                    <img src="<?= $thumb; ?>" alt="<?php echo $alt; ?>" class="absolute-cover-img transition-default">
                                </div>
                            <?php } else if ($notSetImg) { ?>
                                <div class="img-wrapper not-set-img overflow-hidden">
                                    <img src="<?= $notSetImg["sizes"]["medium"]; ?>" alt="<?= $notSetImg["alt"]; ?>" class="absolute-cover-img">
                                </div>
                            <?php } else { ?>
                                <div class="img-wrapper not-set-img overflow-hidden">
                                    <img src="<?php bloginfo("template_url"); ?>/images/Logo.svg" alt="image" class="absolute-cover-img">
                                </div>
                            <?php } ?>
                            <h4 class="all-services__tab-item-title tab-title transition-default"><?php the_title(); ?></h4>
                        </a>
                    <?php endwhile; ?>
                </div>
                <?php
                while($services->have_posts()):$services->the_post();
                    get_template_part("components/whatwedo-tab");
                endwhile; ?>
            </div>
        </section>
    <?php else:endif;
    wp_reset_query();
    $portfolioPosts = get_field("portfolio_elements");
    $portfolio = new WP_Query(["posts_per_page" => -1, "post__in" => $portfolioPosts]);
    if ($portfolio->have_posts()) :
        $title = get_field("portfolio_title");
        $link = get_field("portfolio_link"); ?>
        <section class="portfolio-slider wrapper">
            <?php if ($title || (isset($link["title"]) && isset($link["url"]))) { ?>
                <div class="portfolio-slider__header d-flex justify-content-between align-items-center">
                    <?php if ($title) { ?>
                        <h3 class="section-title font-bold"><?php echo $title; ?></h3>
                    <?php } if (isset($link["title"]) && isset($link["url"])) { ?>
                        <div>
                            <a href="<?php echo $link["url"]; ?>" class="portfolio-slider__link transition-default small-title"><?php echo $link["title"]; ?></a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="brinpl-slider__slides">
                <?php while($portfolio->have_posts()) : $portfolio->the_post();
                    $id = get_the_ID();
                    $title = get_the_title();
                    $thumb = get_the_post_thumbnail_url($id, "medium_large");
                    $thumbID = get_post_thumbnail_id($id);
                    $alt = get_post_meta($thumbID, '_wp_attachment_image_alt', true); ?>
                    <a href="<?php the_permalink(); ?>" class="brinpl-slider__slides-item <?php if($thumb) echo "img-hover"; ?> d-block">
                        <?php if ($thumb) { ?>
                            <div class="img-wrapper img-shadow overflow-hidden">
                                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" class="absolute-cover-img transition-default">
                            </div>
                        <?php } else if ($notSetImg) { ?>
                            <div class="img-wrapper img-shadow overflow-hidden not-set-img">
                                <img src="<?= $notSetImg["sizes"]["medium"]; ?>" alt="<?= $notSetImg["alt"]; ?>" class="absolute-cover-img">
                            </div>
                        <?php } else { ?>
                            <div class="img-wrapper img-shadow overflow-hidden not-set-img">
                                <img src="<?php bloginfo("template_url"); ?>/images/Logo.svg" alt="image" class="absolute-cover-img">
                            </div>
                        <?php }
                        if ($title) { ?>
                            <h5 class="transition-default tab-title"><?php echo $title; ?></h5>
                        <?php } ?>
                    </a>
                <?php endwhile; ?>
            </div>
            <div class="portfolio-slider__buttons text-center">
                <button type="button" class="brinpl-slider__prev transition-default d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="<?php bloginfo("template_url"); ?>/images/Arrow.svg" alt="prev"></button>
                <button type="button" class="brinpl-slider__next transition-default d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="<?php bloginfo("template_url"); ?>/images/Arrow.svg" alt="next"></button>
            </div>
        </section>
    <?php endif;
    wp_reset_query();
    $aboutTitle = get_field("about_title");
    $aboutText = get_field("about_text");
    $aboutImage = get_field("about_image");
    if($aboutTitle || $aboutText || $aboutImage) { ?>
        <section class="main-about">
            <?php require get_template_directory() . "/components/text-img.php"; ?>
        </section>
    <?php }
    get_template_part("components/feedback");
    ?>
</main>
<div class="popup">
    <button type="button" class="popup__close transition-default d-flex justify-content-center align-items-center"><img src="<?php bloginfo("template_url"); ?>/images/portf-close.svg" alt="close"></button>
    <section class="popup__body position-relative">
        <div class="popup__content"></div>
        <button type="button" class="popup__btn default-btn font-bold">Send a message  </button>
        <form action="" class="popup__form">
            <input type="text" class="input-type-text popup__form-input" placeholder="Your name">
            <input type="email" class="input-type-text popup__form-input" placeholder="Your email">
            <textarea name="" id="" class="input-type-text popup__form-textarea" rows="3" placeholder="For example: I`m looking for a senior JS developer "></textarea>
            <p class="popup__form-agree">By messaging us, you agree to our <a href="#" target="_blank">terms & conditions</a></p>
            <button type="submit" class="popup__form-btn default-btn font-bold">Submit</button>
        </form>
    </section>
</div>
<?php get_footer(); ?>