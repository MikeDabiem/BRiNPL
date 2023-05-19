<?php /* Template Name: Home Template */
get_header(); ?>
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
                            <a href="<?= $heroButton["url"]; ?>" class="hero__btn font-bold default-btn-icon transition-default d-inline-flex">
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
    $services = new WP_Query(["post_type" => "services", "post_per_page" => -1]);
    if ($services->have_posts()):
        $wwdTitle = get_field("what_we_do_title"); ?>
        <section class="whatwedo" id="whatwedo">
            <?php if ($wwdTitle) { ?>
                <h3 class="section-title font-bold"><?= $wwdTitle; ?></h3>
            <?php } ?>
            <div class="whatwedo__content">
                <?php require "components/all-services-slider.php"; ?>
            </div>
        </section>
    <?php else:endif;
    wp_reset_query();
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
                                    <p class="outstaff__content-card-text font-medium"><?= $card["outstaffing_card_text"]; ?></p>
                                    <button class="outstaff__content-card-btn default-btn"><span class="font-bold">More</span><img src="<?php bloginfo("template_url"); ?>/images/loader.gif" alt="loader"></button>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </section>
    <?php }
    $portfolioPosts = get_field("portfolio_elements");
    $portfolio = new WP_Query(["posts_per_page" => 3, "post__in" => $portfolioPosts]);
    if ($portfolio->have_posts()) :
        $title = get_field("portfolio_title");
        $link = get_field("portfolio_link");
        $wrapper = 'wrapper';
        require "components/portfolio-slider.php";
    endif;
    wp_reset_query();
    $tiTitle = get_field("about_title");
    $tiText = get_field("about_text");
    $tiTextMore = get_field("about_text_more");
    $tiImage = get_field("about_image");
    if($tiTitle || $tiText || $tiImage) { ?>
        <section class="main-about">
            <?php require get_template_directory() . "/components/text-img.php"; ?>
        </section>
    <?php }
    get_template_part("components/feedback"); ?>
</main>
<div class="popup">
    <button type="button" class="popup__close transition-default justify-content-center align-items-center"><img src="<?php bloginfo("template_url"); ?>/images/portf-close.svg" alt="close"></button>
    <div class="popup__body-wrapper">
        <section class="popup__body position-relative">
            <h2 class="d-none">Outstaffing</h2>
            <div class="popup__content overflow-auto"></div>
            <button type="button" class="popup__btn default-btn font-bold">Send a message</button>
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
                <?php $privPolID = get_field("privacy_policy_page", "options");
                $privPolLink = get_permalink($privPolID); ?>
                <p class="popup__form-agree">By messaging us, you agree to our <a href="<?= $privPolLink; ?>" target="_blank">terms & conditions</a></p>
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