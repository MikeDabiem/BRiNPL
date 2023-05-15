<?php
/* Template Name: About Template */
get_header();
?>
<section class="about-page filler">
    <?php $tiTitle = get_field("first_title");
    $tiText = get_field("first_text");
    $tiTextMore = get_field("first_text_more");
    $tiImage = get_field("first_image");
    $tiMobImage = get_field("first_mob_image");
    if ($tiTitle || $tiText || $tiImage) { ?>
        <section class="about__first">
            <?php if ($tiTitle || $tiText || $tiImage) {
                require "components/text-img.php";
            } ?>
        </section>
    <?php }
    $keyTitle = get_field("key_title");
    $keyPost = get_field("key_post");
    if (!empty($keyPost)) { ?>
        <section class="things wrapper">
            <?php if ($keyTitle) { ?>
                <h3 class="section-title text-center font-bold"><?= $keyTitle; ?></h3>
            <?php } ?>
            <div class="things__content d-flex justify-content-between flex-wrap">
                <?php foreach ($keyPost as $thing) {
                    if ($thing["key_post_image"] || $thing["key_post_title"] || $thing["key_post_text"]) { ?>
                        <article class="things__content-item">
                            <?php if ($thing["key_post_image"] || $thing["key_post_title"]) { ?>
                                <div class="things__content-item-heading d-flex align-items-center">
                                    <?php if ($thing["key_post_image"]) { ?>
                                        <div class="img-wrapper">
                                            <img src="<?= $thing["key_post_image"]["sizes"]["medium"]; ?>" alt="icon" class="absolute-cover-img">
                                        </div>
                                    <?php } if ($thing["key_post_title"]) { ?>
                                        <h4 class="things__content-item-title key-title font-bold"><?= $thing["key_post_title"]; ?></h4>
                                    <?php } ?>
                                </div>
                            <?php } if ($thing["key_post_text"]) { ?>
                                <div class="things__content-item-text wysiwyg-styles">
                                    <?= $thing["key_post_text"]; ?>
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
                <h3 class="section-title text-center font-bold"><?= $workStrategyTitle; ?></h3>
            <?php } ?>
            <div class="strategy__content d-flex">
                <div class="strategy__list">
                    <?php foreach ($workStrategyPost as $i => $post) {
                        if ($post["work_strategy_post_title"]) { ?>
                            <div class="strategy__list-item transition-default img-shadow wrapper d-flex" data-strat= <?= $i; ?>>
                                <div class="strategy__list-num font-bold transition-default d-flex justify-content-center align-items-center"><?= $i + 1; ?></div>
                                <?php if ($post["work_strategy_post_title"]) { ?>
                                    <h4 class="strategy__list-title strategy-text font-bold"><?= $post["work_strategy_post_title"]; ?></h4>
                                <?php } if ($post["work_strategy_post_text"]) { ?>
                                    <div class="strategy__list-text wysiwyg-styles">
                                        <?= $post["work_strategy_post_text"]; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php }
                    } ?>
                </div>
                <div class="strategy__description d-flex flex-column justify-content-center">
                    <div class="strategy__description-content">
                        <?php foreach ($workStrategyPost as $i => $post) {
                            if ($post["work_strategy_post_title"] || $post["work_strategy_post_text"]) { ?>
                                <article class="strategy__description-item transition-default" data-strat= <?= $i; ?>>
                                    <?php if ($post["work_strategy_post_title"]) { ?>
                                        <h4 class="strategy__description-title portfolio-title font-bold"><?= $post["work_strategy_post_title"]; ?></h4>
                                    <?php } if ($post["work_strategy_post_text"]) { ?>
                                        <div class="strategy__description-text wysiwyg-styles">
                                            <?= $post["work_strategy_post_text"]; ?>
                                        </div>
                                    <?php } ?>
                                </article>
                            <?php }
                        } ?>
                    </div>
                    <div class="strategy__description-dots d-flex">
                        <?php foreach ($workStrategyPost as $i => $post) {
                            if ($post["work_strategy_post_title"] || $post["work_strategy_post_text"]) { ?>
                                <div class="strategy__description-dot transition-default" data-strat= <?= $i; ?>></div>
                            <?php }
                        }?>
                    </div>
                </div>
            </div>
        </section>
    <?php }
    $reviewsTitle = get_field("reviews_title");
    $reviewsPost = get_field("review_post");
    if (!empty($reviewsPost)) { ?>
        <section class="reviews wrapper">
            <?php if ($reviewsTitle) { ?>
                <h3 class="section-title font-bold text-center"><?= $reviewsTitle; ?></h3>
            <?php } ?>
            <div class="brinpl-slider__slides">
                <?php foreach ($reviewsPost as $review) {
                    if ($review["review_image"] || $review["review_name"] || $review["review_profession"] || $review["review_text"]) { ?>
                        <article class="reviews__item transition-default">
                            <?php if ($review["review_image"]) { ?>
                                <div class="img-wrapper overflow-hidden">
                                    <img src="<?= $review["review_image"]["sizes"]["medium"]; ?>" alt="photo" class="absolute-cover-img1">
                                </div>
                            <?php } if ($review["review_name"]) { ?>
                                <h5 class="small-title font-bold"><?= $review["review_name"]; ?></h5>
                            <?php } if ($review["review_profession"]) { ?>
                                <p class="reviews__item-status small-title font-medium"><?= $review["review_profession"]; ?></p>
                            <?php } if ($review["review_text"]) { ?>
                                <div class="wysiwyg-styles">
                                    <?= $review["review_text"]; ?>
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
    $collabTitle = get_field("сollaboration_title");
    $collabPost = get_field("сollaboration_post");
    if ($collabTitle || $collabPost) { ?>
        <section class="collab wrapper">
            <?php if ($collabTitle) { ?>
                <h3 class="section-title font-bold text-center"><?= $collabTitle; ?></h3>
            <?php }
            if ($collabPost) { ?>
                <div class="collab__posts d-flex">
                    <?php foreach ($collabPost as $collab) { ?>
                        <article class="collab__post img-shadow">
                            <div class="collab__post-header">
                                <h4 class="collab__post-title strategy-text font-bold transition-default"><?= $collab["сollaboration_post_title"]; ?></h4>
                            </div>
                            <div class="collab__post-text wysiwyg-styles">
                                <?= $collab["сollaboration_post_text"]; ?>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            <?php } ?>
        </section>
    <?php }
    $faqTitle = get_field("faq_title");
    $faqSubtitle = get_field("faq_subtitle");
    $faqItem = get_field("faq_item");
    if ($faqTitle || $faqSubtitle || $faqItem) { ?>
        <section class="faq wrapper">
            <?php if ($faqTitle) { ?>
                <h3 class="section-title font-bold text-center"><?= $faqTitle; ?></h3>
            <?php } if ($faqSubtitle) { ?>
                <div class="faq__subtitle wysiwyg-styles text-center small-title font-medium">
                    <?= $faqSubtitle; ?>
                </div>
            <?php } if ($faqItem) { ?>
                <div class="faq__items">
                    <?php foreach($faqItem as $faq_item) {
                        if ($faq_item["faq_question"] && $faq_item["faq_answer"]) { ?>
                            <article class="faq__item img-shadow">
                                <h4 class="faq__item-question font-bold transition-default"><?= $faq_item["faq_question"]; ?></h4>
                                <div class="faq__item-answer wysiwyg-styles"><?= $faq_item["faq_answer"]; ?></div>
                            </article>
                        <?php }
                    } ?>
                </div>
            <?php } ?>
        </section>
    <?php }
    get_template_part("components/feedback"); ?>
</section>
<?php get_footer(); ?>