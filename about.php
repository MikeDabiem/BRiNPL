<?php
/* Template Name: About Template */
get_header();
?>
<section class="about-page filler">
    <?php get_template_part("components/page-head");
    $aboutTitle = get_field("first_title");
    $aboutText = get_field("first_text");
    $aboutImage = get_field("first_image");
    if ($aboutTitle || $aboutText || $aboutImage) { ?>
        <section class="about__first">
            <?php require get_template_directory() . "/components/text-img.php"; ?>
        </section>
    <?php }
    $keyTitle = get_field("key_title");
    $keyPost = get_field("key_post");
    if (!empty($keyPost)) { ?>
        <section class="things wrapper">
            <?php if ($keyTitle) { ?>
                <h3 class="section-title text-center font-bold"><?php echo $keyTitle; ?></h3>
            <?php } ?>
            <div class="things__content d-flex justify-content-between flex-wrap">
                <?php foreach ($keyPost as $thing) {
                    if ($thing["key_post_image"] || $thing["key_post_title"] || $thing["key_post_text"]) { ?>
                        <article class="things__content-item">
                            <?php if ($thing["key_post_image"] || $thing["key_post_title"]) { ?>
                                <div class="things__content-item-heading d-flex align-items-center">
                                    <?php if ($thing["key_post_image"]) { ?>
                                        <div class="img-wrapper">
                                            <img src="<?php echo $thing["key_post_image"]["sizes"]["medium"]; ?>" alt="icon" class="absolute-cover-img">
                                        </div>
                                    <?php } if ($thing["key_post_title"]) { ?>
                                        <h4 class="things__content-item-title font-bold"><?php echo $thing["key_post_title"]; ?></h4>
                                    <?php } ?>
                                </div>
                            <?php } if ($thing["key_post_text"]) { ?>
                                <div class="things__content-item-text wysiwyg-styles">
                                    <?php echo $thing["key_post_text"]; ?>
                                </div>
                            <?php } ?>
                        </article>
                    <?php }
                } ?>
            </div>
        </section>
    <?php }
    $workStrategyTitle = get_field("work_strategy_title");
    $workStrategyPost = get_field("work_strategy_post");
    if (!empty($workStrategyPost)) { ?>
        <section class="strategy wrapper">
            <?php if ($workStrategyTitle) { ?>
                <h3 class="section-title text-center font-bold"><?php echo $workStrategyTitle; ?></h3>
            <?php } ?>
            <div class="strategy__line"></div>
            <div class="strategy__items d-flex justify-content-between">
                <?php foreach ($workStrategyPost as $i => $post) {
                    if ($post["work_strategy_post_title"] || $post["work_strategy_post_text"]) { ?>
                        <article class="strategy__item transition-default">
                            <div class="strategy__item-num d-flex justify-content-center align-items-center"><?php echo $i + 1; ?></div>
                            <?php if ($post["work_strategy_post_title"]) { ?>
                                <h4 class="strategy__item-title font-bold"><?php echo $post["work_strategy_post_title"]; ?></h4>
                            <?php } if ($post["work_strategy_post_text"]) { ?>
                                <div class="strategy__item-text wysiwyg-styles">
                                    <?php echo $post["work_strategy_post_text"]; ?>
                                </div>
                            <?php } ?>
                        </article>
                    <?php }
                } ?>
            </div>
        </section>
    <?php }
    $reviewsTitle = get_field("reviews_title");
    $reviewsPost = get_field("review_post");
    if (!empty($reviewsPost)) { ?>
        <section class="reviews wrapper">
            <?php if ($reviewsTitle) { ?>
                <h3 class="section-title font-bold text-center"><?php echo $reviewsTitle; ?></h3>
            <?php } ?>
            <div class="brinpl-slider__slides">
                <?php foreach ($reviewsPost as $review) {
                    if ($review["review_image"] || $review["review_name"] || $review["review_profession"] || $review["review_text"]) { ?>
                        <article class="reviews__item transition-default">
                            <?php if ($review["review_image"]) { ?>
                                <div class="img-wrapper overflow-hidden">
                                    <img src="<?php echo $review["review_image"]["sizes"]["medium"]; ?>" alt="photo" class="absolute-cover-img1">
                                </div>
                            <?php } if ($review["review_name"]) { ?>
                                <h5 class="small-title font-bold"><?php echo $review["review_name"]; ?></h5>
                            <?php } if ($review["review_profession"]) { ?>
                                <p class="reviews__item-status"><?php echo $review["review_profession"]; ?></p>
                            <?php } if ($review["review_text"]) { ?>
                                <div class="wysiwyg-styles">
                                    <?php echo $review["review_text"]; ?>
                                </div>
                            <?php } ?>
                        </article>
                    <?php }
                } ?>
            </div>
            <div class="reviews-slider__buttons text-center">
                <button type="button" class="brinpl-slider__prev transition-default d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="<?php bloginfo("template_url"); ?>/images/Arrow.svg" alt="prev"></button>
                <button type="button" class="brinpl-slider__next transition-default d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="<?php bloginfo("template_url"); ?>/images/Arrow.svg" alt="next"></button>
            </div>
        </section>
    <?php }
    get_template_part("components/lets-talk"); ?>
</section>
<?php get_footer(); ?>