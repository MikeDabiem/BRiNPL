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
    $thumb = get_the_post_thumbnail_url($currentID, "large");
    $thumbID = get_post_thumbnail_id($currentID);
    $alt = get_post_meta($thumbID, '_wp_attachment_image_alt', true);
    if($heroTitle || $heroSubtitle || $thumb || (isset($heroButton["title"]) && isset($heroButton["url"]))) { ?>
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
                <?php } if($thumb) { ?>
                    <div class="hero__content-right">
                        <div class="img-wrapper">
                            <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" class="absolute-cover-img">
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="hero__scroll text-center">
                <a href="#" id="hero__scroll">
                    <img src="<?php bloginfo("template_url"); ?>/images/Scroll.svg" alt="scroll">
                    <div class="scroll-dot"></div>
                    <div class="scroll-dot"></div>
                    <div class="scroll-dot"></div>
                </a>
            </div>
        </section>
    <?php }
    $services = new WP_Query(["post_type" => "services", "post_per_page" => -1]);
    if ($services->have_posts()):
        $wwdTitle = get_field("what_we_do_title"); ?>
        <section class="whatwedo wrapper" id="whatwedo">
            <?php if ($wwdTitle) { ?>
                <h3 class="section-title font-bold"><?php echo $wwdTitle; ?></h3>
            <?php } ?>
            <div class="overflow-auto">
                <div class="whatwedo__tabs transition-default d-inline-flex">
                    <a href="all-services__tab" class="whatwedo__tab small-title active">All Services</a>
                    <?php while($services->have_posts()):$services->the_post(); ?>
                        <a href="<?php the_ID(); ?>" class="whatwedo__tab small-title"><?php the_title(); ?></a>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="whatwedo__content">
                <div class="all-services__tab whatwedo__content-item active" id="all-services__tab">
                    <?php while($services->have_posts()):$services->the_post();
                    $thumb = get_the_post_thumbnail_url(get_the_ID(), "medium_large");
                    $thumbID = get_post_thumbnail_id(get_the_ID());
                    $alt = get_post_meta($thumbID, '_wp_attachment_image_alt', true); ?>
                        <a href="<?php the_ID(); ?>" class="all-services__tab-item d-block overflow-hidden <?php if($thumb) echo "img-hover"; else echo "not-set-img"; ?>">
                            <?php if ($thumb) { ?>
                                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" class="absolute-cover-img transition-default">
                            <?php } else if ($notSetImg) { ?>
                                <img src="<?= $notSetImg["sizes"]["medium"]; ?>" alt="<?= $notSetImg["alt"]; ?>" class="absolute-cover-img">
                            <?php } else { ?>
                                <img src="<?php bloginfo("template_url"); ?>/images/Logo.svg" alt="image" class="absolute-cover-img">
                            <?php } ?>
                            <h4 class="all-services__tab-item-title tab-title"><?php the_title(); ?></h4>
                        </a>
                    <?php endwhile; ?>
                </div>
                <?php
                while($services->have_posts()):$services->the_post();
                    get_template_part("components/whatwedo-tab");
                endwhile; ?>
            </div>
            <?php $portfolioPageID = get_field("portfolio_page", "options");
            if (!empty($portfolioPageID)) {
                $portfolioLink = get_permalink($portfolioPageID); ?>
                <div class="whatwedo__portfolio text-center">
                    <a href="<?= $portfolioLink; ?>" class="whatwedo__btn default-btn transition-default d-inline-block">View portfolio</a>
                </div>
            <?php } ?>
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
                    <a href="<?php the_permalink(); ?>" class="brinpl-slider__slides-item img-hover d-block">
                        <?php if ($thumb) { ?>
                            <div class="img-wrapper img-shadow overflow-hidden">
                                <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" class="absolute-cover-img transition-default">
                            </div>
                        <?php } if ($title) { ?>
                            <h5 class="transition-default small-title"><?php echo $title; ?></h5>
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
    $aboutButton = get_field("about_button");
    $aboutImage = get_field("about_image");
    if($aboutTitle || $aboutText || (isset($aboutButton["title"]) && isset($aboutButton["url"])) || $aboutImage) { ?>
        <section class="main-about">
            <?php require get_template_directory() . "/components/text-img.php"; ?>
        </section>
    <?php }
    $feedbackImage = get_field("footer_feedback_image", "options");
    $feedbackTitle = get_field("footer_feedback_title", "options");
    $feedbackSubtitle = get_field("footer_feedback_subtitle", "options");
    $feedbackButton = get_field("footer_feedback_button", "options");
    if($feedbackImage || $feedbackTitle || $feedbackSubtitle || $feedbackButton) {
        get_template_part("components/feedback");
    } ?>
</main>
<?php get_footer(); ?>