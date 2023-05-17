<?php
    get_header();
    $portfolioPageID = get_field("portfolio_page", "options");
    $notSetImg = get_field("header_logo", "options");
?>
<section class="portfolio-single filler">
    <div class="portfolio-single__content wrapper d-flex">
        <div class="portfolio-single__content-col1">
            <?php if (!empty($portfolioPageID)) {
            $portfolioLink = get_permalink($portfolioPageID); ?>
                <a href="<?= $portfolioLink; ?>" class="portfolio-single__content-nav portfolio-close transition-default"><img src="<?php bloginfo("template_url"); ?>/images/portf-close.svg" alt="close" class="transition-default"></a>
            <?php }
            $nextPost = get_adjacent_post(false, '', false);
            if(!empty($nextPost)) { ?>
                <a href="<?= get_permalink($nextPost->ID); ?>" class="portfolio-single__content-nav portfolio-prev transition-default"><img src="<?php bloginfo("template_url"); ?>/images/portf-arrow.svg" alt="previous"></a>
            <?php }
            $prevPost = get_adjacent_post(false, '', true);
            if(!empty($prevPost)) { ?>
                <a href="<?= get_permalink($prevPost->ID); ?>" class="portfolio-single__content-nav portfolio-next transition-default"><img src="<?php bloginfo("template_url"); ?>/images/portf-arrow.svg" alt="next"></a>
            <?php } ?>
        </div>
        <?php $portfolioImage = get_field("content_image");
        if ($portfolioImage) { ?>
            <div class="portfolio-single__content-col2">
                <img src="<?= $portfolioImage["url"]; ?>" alt="<?= $portfolioImage["alt"]; ?>" class="portfolio-single__content-presentation">
            </div>
        <?php } ?>
        <div class="portfolio-single__content-col3 <?php $portfolioImage ? null : print "no-image"; ?>">
            <article class="portfolio-single__content-descr">
                <h3 class="portfolio-single__content-descr-title font-bold portfolio-title>"><?php the_title(); ?></h3>
                <?php $contentText = get_field("content_text");
                if ($contentText) { ?>
                    <div class="portfolio-single__content-descr-text font-medium">
                        <?= $contentText; ?>
                    </div>
                <?php }
                $socialLinks = get_field("portfolio_social_links", "options");
                $websiteLink = get_field("website_link");
                if (!empty($socialLinks) || $websiteLink) { ?>
                    <div class="portfolio-single__content-descr-links d-flex align-items-center">
                        <?php if (!empty($socialLinks)) { ?>
                            <div class="portfolio-single__socials d-flex flex-wrap">
                                <?php foreach ($socialLinks as $link) {
                                    if ($link["portfolio_social_link_url"] && $link["portfolio_social_link_image"]) { ?>
                                        <a href="<?= $link["portfolio_social_link_url"] ?>" class="social-link-img" target="_blank">
                                            <img src="<?= $link["portfolio_social_link_image"]["sizes"]["medium"]; ?>" alt="<?= $link["portfolio_social_link_image"]["alt"]; ?>" class="absolute-cover-img">
                                        </a>
                                    <?php }
                                } ?>
                            </div>
                        <?php } if ($websiteLink) { ?>
                            <div class="portfolio-single__website-link font-bold">
                                <a href="<?= $websiteLink; ?>" target="_blank">Link to website</a>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </article>
        </div>
    </div>
    <?php $carousel = new WP_Query(["posts_per_page" => 10, "post__not_in" => [get_the_ID()]]);
    if($carousel->have_posts()) : ?>
        <div class="portfolio-single__carousel wrapper">
            <h2 class="section-title font-bold">other cases</h2>
            <div class="portfolio-single__carousel-slides">
                <?php while($carousel->have_posts()) : $carousel->the_post();
                    $id = get_the_ID();
                    $thumb = get_the_post_thumbnail_url($id, "medium_large");
                    $thumbID = get_post_thumbnail_id($id);
                    $alt = get_post_meta($thumbID, '_wp_attachment_image_alt', true); ?>
                    <a href="<?php the_permalink($id); ?>" class="portfolio-single__carousel-item <?php if($thumb) echo "img-hover"; ?> d-block">
                        <?php if ($thumb) { ?>
                            <div class="img-wrapper img-shadow overflow-hidden">
                                <img src="<?= $thumb; ?>" alt="<?= $alt; ?>" class="absolute-cover-img transition-default">
                            </div>
                        <?php } else if($notSetImg) { ?>
                            <div class="img-wrapper img-shadow overflow-hidden not-set-img">
                                <img src="<?= $notSetImg["sizes"]["medium"]; ?>" alt="image" class="absolute-cover-img transition-default">
                            </div>
                        <?php } else { ?>
                            <div class="img-wrapper img-shadow not-set-img overflow-hidden">
                                <img src="<?php bloginfo("template_url"); ?>/images/logo.svg" alt="image" class="absolute-cover-img">
                            </div>
                        <?php } ?>
                    </a>
                <?php endwhile; ?>
            </div>
            <div class="portfolio-carousel__buttons text-center">
                <button type="button" class="portfolio-carousel__prev brinpl-slider__prev portfolio-prev transition-default d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="<?php bloginfo("template_url"); ?>/images/Arrow.svg" alt="prev"></button>
                <button type="button" class="portfolio-carousel__next brinpl-slider__next transition-default d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="<?php bloginfo("template_url"); ?>/images/Arrow.svg" alt="next"></button>
            </div>
        </div>
    <?php else : endif;
    wp_reset_query();
    require "components/feedback.php";
    ?>
</section>
<?php
    get_footer();