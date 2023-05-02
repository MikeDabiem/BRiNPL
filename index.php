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
                            <h1 class="main-title font-bold"><?= $heroTitle; ?></h1>
                        <?php } if($heroSubtitle) { ?>
                            <p class="main-subtitle contacts-text"><?= $heroSubtitle; ?></p>
                        <?php } if(isset($heroButton["title"]) && isset($heroButton["url"])) { ?>
                            <a href="<?= $heroButton["url"]; ?>" class="hero__btn default-btn-icon transition-default d-inline-flex">
                                <img src="<?php bloginfo("template_url"); ?>/images/Plane.svg" alt="plane">
                                <?= $heroButton["title"]; ?>
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
    $newService = get_field("new_service");
    $outstaffTitle = get_field("outstaffing_title");
    $outstaffTextPreview = get_field("outstaffing_text_preview");
    $outstaffTextMore = get_field("outstaffing_text_more");
    $outstaffCards = get_field("outstaffing_cards");
    if ($outstaffTitle || $outstaffTextPreview || !empty($outstaffCards)) { ?>
        <section class="outstaff wrapper">
            <?php if ($newService) { ?>
                <p class="outstaff__new small-title d-flex align-items-center">new service</p>
            <?php } if ($outstaffTitle) { ?>
                <h3 class="section-title font-bold"><?= $outstaffTitle; ?></h3>
            <?php }
            if ($outstaffTextPreview || !empty($outstaffCards)) { ?>
                <div class="outstaff__content d-flex justify-content-between">
                    <?php if ($outstaffTextPreview) { ?>
                        <div class="outstaff__content-col1">
                            <div class="wysiwyg-styles"><?= $outstaffTextPreview; ?></div>
                            <?php if ($outstaffTextMore) { ?>
                                <div class="wysiwyg-styles outstaff__content-more show-more-content"><?= $outstaffTextMore; ?></div>
                                <button type="button" class="show-more-button input-text transition-default">Show more</button>
                            <?php } ?>
                        </div>
                    <?php }
                    if (!empty($outstaffCards)) { ?>
                        <div class="outstaff__content-col2 d-flex flex-wrap">
                            <?php foreach ($outstaffCards as $i => $card) { ?>
                                <div class="outstaff__content-card img-shadow transition-default d-flex flex-column" data-index="<?= $i; ?>">
                                    <div class="outstaff__content-card-img img-wrapper position-relative"><img src="<?= $card["outstaffing_card_image"]["sizes"]["medium"] ?>" alt="<?= $card["outstaffing_card_image"]["alt"] ?>" class="absolute-cover-img"></div>
                                    <h4 class="outstaff__content-card-title"><?= $card["outstaffing_card_title"]; ?></h4>
                                    <p class="outstaff__content-card-text input-text"><?= $card["outstaffing_card_text"]; ?></p>
                                    <button class="outstaff__content-card-btn default-btn"><span>More</span><img src="<?php bloginfo("template_url"); ?>/images/loader.gif" alt="loader"></button>
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
                <h3 class="section-title font-bold"><?= $wwdTitle; ?></h3>
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
        <section class="portfolio-home wrapper">
            <?php if ($title || (isset($link["title"]) && isset($link["url"]))) {
                if ($title) { ?>
                    <h3 class="section-title font-bold"><?= $title; ?></h3>
                <?php } ?>
            <?php } ?>
            <div class="portfolio-home__items d-flex">
                <?php while($portfolio->have_posts()) : $portfolio->the_post();
                    $id = get_the_ID();
                    $title = get_the_title();
                    $thumb = get_the_post_thumbnail_url($id, "medium_large");
                    $thumbID = get_post_thumbnail_id($id);
                    $alt = get_post_meta($thumbID, '_wp_attachment_image_alt', true); ?>
                    <a href="<?php the_permalink(); ?>" class="portfolio-home__item scroll-image-trigger d-block">
                        <div class="portfolio-home__item-image-wrapper scroll-image-wrapper img-shadow overflow-hidden <?php $thumb ? null : print "not-set-img"; ?>">
                            <?php if ($thumb) { ?>
                                <img src="<?= $thumb; ?>" alt="<?= $alt; ?>" class="portfolio-home__item-image scroll-image transition-default" loading="lazy">
                            <?php } else if ($notSetImg) { ?>
                                <img src="<?= $notSetImg["sizes"]["medium"]; ?>" alt="<?= $notSetImg["alt"]; ?>" class="absolute-cover-img">
                            <?php } else { ?>
                                <img src="<?php bloginfo("template_url"); ?>/images/logo.svg" alt="image" class="absolute-cover-img">
                            <?php } ?>
                        </div>
                        <?php if ($title) { ?>
                            <h5 class="portfolio-home__item-title transition-default contacts-text"><?= $title; ?></h5>
                        <?php } ?>
                    </a>
                <?php endwhile; ?>
            </div>
            <?php if (isset($link["title"]) && isset($link["url"])) { ?>
                <a href="<?= $link["url"]; ?>" class="portfolio-home__link default-btn transition-default d-block mx-auto"><?= $link["title"]; ?></a>
            <?php } ?>
        </section>
    <?php endif;
    wp_reset_query();
    $aboutTitle = get_field("about_title");
    $aboutText = get_field("about_text");
    $aboutTextMore = get_field("about_text_more");
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
    <button type="button" class="popup__close transition-default justify-content-center align-items-center"><img src="<?php bloginfo("template_url"); ?>/images/portf-close.svg" alt="close"></button>
    <div class="popup__body-wrapper">
        <section class="popup__body position-relative">
            <h2 class="d-none">Outstaffing</h2>
            <div class="popup__content overflow-auto"></div>
            <button type="button" class="popup__btn default-btn font-bold">Send a message  </button>
            <form id="staffing-form" class="popup__form">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="form__group">
                        <input type="text" name="staffing-name" id="staffing-name" class="input-type-text popup__form-input" placeholder="Your name">
                        <p class="error-message font-medium transition-default">The field is required</p>
                    </div>
                    <div class="form__group">
                        <input type="email" name="staffing-email" id="staffing-email" class="input-type-text popup__form-input" placeholder="Your email">
                        <p class="error-message font-medium transition-default">The field is required</p>
                    </div>
                </div>
                <div class="form__group w-100">
                    <textarea name="staffing-message" id="staffing-message" class="input-type-text popup__form-textarea" rows="3" placeholder="For example: I`m looking for a senior JS developer "></textarea>
                    <p class="error-message font-medium transition-default">The field is required</p>
                </div>
                <input name="staffing-label" id="staffing-label" type="hidden">
                <p class="popup__form-agree">By messaging us, you agree to our <a href="#" target="_blank">terms & conditions</a></p>
                <div class="position-relative">
                    <button type="submit" class="popup__form-btn default-btn font-bold">Submit</button>
                    <div class="preloader staffing-form-preloader position-absolute">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="contact-form-success position-absolute transition-default px-3">
                    <h2 class="page__title font-bold text-center">Thank You!</h2>
                    <p class="main-subtitle contacts-text text-center">We will contact You as soon as possible</p>
                </div>
            </form>
        </section>
    </div>
</div>
<?php get_footer(); ?>