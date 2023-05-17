<?php get_header();
$notSetImg = get_field("header_logo", "options"); ?>
<div class="single-service wrapper filler">
    <?php $heroTitle = get_the_title();
    $heroSubtitle = get_field("single_service_subtitile");
    $heroButton = get_field("single_service_button");
    $heroImage = get_field("services_post_image");
    if ($heroTitle || $heroImage) { ?>
        <section class="single-service__hero d-flex align-items-center">
            <?php if ($heroTitle) { ?>
                <div class="single-service__hero-col1">
                    <h2 class="page__title font-bold mb-0"><?= $heroTitle; ?></h2>
                    <?php if ($heroSubtitle) { ?>
                        <p class="single-service__hero-subtitle contacts-text font-medium"><?= $heroSubtitle; ?></p>
                    <?php } if (isset($heroButton["title"]) && isset($heroButton["url"])) { ?>
                        <a href="<?= $heroButton["url"]; ?>" class="hero__btn font-bold default-btn-icon transition-default d-inline-flex">
                            <img src="<?php bloginfo("template_url"); ?>/images/Plane.svg" alt="plane">
                            <?= $heroButton["title"]; ?>
                        </a>
                    <?php } ?>
                </div>
            <?php } if ($heroImage) { ?>
                <div class="single-service__hero-col2">
                    <div class="img-wrapper">
                        <img src="<?= $heroImage["sizes"]["large"]; ?>" alt="<?= $heroImage["alt"]; ?>" class="absolute-cover-img">
                    </div>
                </div>
            <?php } ?>
        </section>
    <?php }
    $serviceArticles = get_field("single_service_articles");
    if (!empty($serviceArticles)) { ?>
        <section class="single-service__articles">
            <?php foreach ($serviceArticles as $article) {
                $tiTitle = $article["single_service_article_title"];
                $tiText = $article["single_service_article_text"];
                $tiTextMore = $article["single_service_article_text_more"];
                $tiImage = $article["single_service_article_image"];
                require "components/text-img.php";
            } ?>
        </section>
    <?php }
    $serviceIndustriesTitle = get_field("single_service_industries_title");
    $serviceIndustries = get_field("single_service_industries_cards");
    if (!empty($serviceIndustries)) { ?>
        <section class="single-service__industries">
            <?php if ($serviceIndustriesTitle) { ?>
                <h3 class="section-title font-bold text-center"><?= $serviceIndustriesTitle; ?></h3>
            <?php } ?>
            <div class="single-service__industries-cards">
                <?php $industriesSlides = array_chunk($serviceIndustries, 2);
                foreach ($industriesSlides as $industry) { ?>
                    <div class="single-service__industries-slide">
                        <?php foreach ($industry as $item) {
                            $smallCardImage = $item["industries_card_image"];
                            $smallCardTitle = $item["industries_card_title"];
                            require "components/small-card.php";
                        } ?>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php }
    $serviceExpertiseTitle = get_field("single_service_expertise_title");
    $serviceExpertise = get_field("single_service_expertise_cards");
    if (!empty($serviceExpertise)) { ?>
        <section class="single-service__expertise">
            <?php if ($serviceExpertiseTitle) { ?>
                <h3 class="section-title font-bold text-center"><?= $serviceExpertiseTitle; ?></h3>
            <?php } ?>
            <div class="single-service__expertise-cards">
                <?php $expertiseSlides = array_chunk($serviceExpertise, 4);
                foreach ($expertiseSlides as $expertise) { ?>
                    <div class="single-service__expertise-slide">
                        <div class="single-service__expertise-slide-item">
                            <?php foreach ($expertise as $item) {
                                $smallCardImage = $item["expertise_card_image"];
                                $smallCardTitle = $item["expertise_card_title"];
                                require "components/small-card.php";
                            } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    <?php }
    $serviceStepsTitle = get_field("single_service_steps_titile");
    $serviceSteps = get_field("single_service_steps_items");
    if ($serviceStepsTitle || !empty($serviceSteps)) { ?>
        <section class="single-service__steps">
            <?php if ($serviceStepsTitle) { ?>
                <h3 class="section-title font-bold text-center"><?= $serviceStepsTitle; ?></h3>
            <?php } if (!empty($serviceSteps)) { ?>
                <div class="single-service__steps-content">
                    <?php foreach ($serviceSteps as $step) {
                        if ($step["single_service_step_image"] || isset($step["single_service_step_title"]) || isset($step["single_service_step_text"])) { ?>
                            <article class="single-service__steps-item img-shadow">
                                <div class="img-wrapper">
                                    <?php if ($step["single_service_step_image"]) { ?>
                                        <img src="<?= $step["single_service_step_image"]["sizes"]["medium"]; ?>" alt="<?= $step["single_service_step_image"]["alt"]; ?>" class="absolute-cover-img">
                                    <?php } ?>
                                </div>
                                <?php if (isset($step["single_service_step_title"])) { ?>
                                    <h4 class="single-service__steps-item-title key-title font-bold"><?= $step["single_service_step_title"]; ?></h4>
                                <?php } if (isset($step["single_service_step_text"])) { ?>
                                    <p class="single-service__steps-item-text font-medium small-title"><?= $step["single_service_step_text"]; ?></p>
                                <?php } ?>
                            </article>
                        <?php }
                    } ?>
                </div>
            <?php } ?>
        </section>
    <?php }
    $serviceExamplesTitle = get_field("single_service_examples_title");
    $serviceExamples = get_field("single_service_examples_items");
    if (!empty($serviceExamples)) { ?>
        <section class="single-service__examples">
            <?php if ($serviceExamplesTitle) { ?>
                <h3 class="section-title font-bold text-center"><?= $serviceExamplesTitle; ?></h3>
            <?php } ?>
            <div class="single-service__examples-content d-flex flex-wrap">
                <?php foreach ($serviceExamples as $serviceID) {
                    $title = get_the_title($serviceID);
                    $thumb = get_the_post_thumbnail_url($serviceID, "medium_large");
                    $thumbID = get_post_thumbnail_id($serviceID);
                    $alt = get_post_meta($thumbID, '_wp_attachment_image_alt', true);
                    $tags = get_the_tags($serviceID); ?>
                    <a href="<?php the_permalink(); ?>" class="single-service__examples-item scroll-image-trigger d-block">
                        <div class="single-service__examples-item-image-wrapper scroll-image-wrapper img-shadow overflow-hidden <?php $thumb ? null : print "not-set-img"; ?>">
                            <?php if ($thumb) { ?>
                                <img src="<?= $thumb; ?>" alt="<?= $alt; ?>" class="single-service__examples-item-image scroll-image transition-default" loading="lazy">
                            <?php } else if ($notSetImg) { ?>
                                <img src="<?= $notSetImg["sizes"]["medium"]; ?>" alt="<?= $notSetImg["alt"]; ?>" class="absolute-cover-img">
                            <?php } else { ?>
                                <img src="<?php bloginfo("template_url"); ?>/images/logo.svg" alt="image" class="absolute-cover-img">
                            <?php } ?>
                        </div>
                        <?php if ($title) { ?>
                            <h5 class="single-service__examples-item-title tab-title font-bold transition-default text-center"><?= $title; ?></h5>
                        <?php } if (!empty($tags)) { ?>
                            <p class="single-service__examples-item-tag small-title font-medium text-center"><?= $tags[0]->name; ?></p>
                        <?php } ?>
                    </a>
                <?php } ?>
            </div>
        </section>
    <?php }
    $faqTitle = get_field("single_service_faq_title");
    $faqSubtitle = get_field("single_service_faq_subtitle");
    $faqItem = get_field("single_service_faq");
    if (!empty($faqItem)) {
        require "components/faq.php";
    }
    $portfolioItems = get_field("single_service_our_portfolio_items");
    if (!empty($portfolioItems)) {
        $portfolio = new WP_Query(["posts_per_page" => 3, "post__in" => $portfolioItems]);
        if ($portfolio->have_posts()) :
            $title = get_field("single_service_our_portfolio_title");
            $link = get_field("single_service_our_portfolio_link");
            require "components/portfolio-slider.php";
        endif;
        wp_reset_query();
    }
    $postID = get_the_ID();
    $services = new WP_Query(["post_type" => "services", "post_per_page" => -1, "post__not_in" => [$postID]]);
    if ($services->have_posts()): ?>
        <section class="single-service__other">
            <h3 class="section-title font-bold text-center">Other services</h3>
            <?php require "components/all-services-slider.php"; ?>
        </section>
    <?php else:endif; ?>
</div>
<?php require "components/feedback.php";
get_footer();
