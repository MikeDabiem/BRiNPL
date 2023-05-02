<?php /* Template Name: Contacts Template */
    get_header();
?>
<section class="contacts-page filler">
    <h2 class="d-none">Contacts</h2>
    <div class="contacts-page__inner wrapper">
        <section class="contacts-page__socials position-relative">
            <?php
            $socials = get_field("social_links", "options");
            $socialsTitle = get_field("socials_title") ? get_field("socials_title") : get_field("socials_title", "options");
            if ($socials || $socialsTitle) {
                if ($socialsTitle) { ?>
                    <h5 class="small-title contacts-page__socials-title"><?= $socialsTitle; ?></h5>
                <?php } if ($socials) {
                    get_template_part("components/social-link-img"); ?>
                <?php }
            }
            $feedbackItem = get_field("feedback_item");
            if ($feedbackItem) { ?>
                <div class="contacts-page__contacts">
                    <?php foreach ($feedbackItem as $item) {
                        if (isset($item["feedback_item_title"]) && isset($item["feedback_item_link"])) { ?>
                            <div class="contacts-page__contacts-item">
                                <p class="contacts-page__contacts-item-title small-title"><?= $item["feedback_item_title"]; ?>:</p>
                                <a href="<?= $item["feedback_item_link"]["url"]; ?>" class="contacts-page__contacts-item-link strategy-text d-block" target="_blank"><?= $item["feedback_item_link"]["title"]; ?></a>
                            </div>
                        <?php }
                    } ?>
                </div>
            <?php } ?>
        </section>
        <section class="contacts-page__form position-relative">
            <?php $formTitle = get_field("form_title");
            if ($formTitle) { ?>
                <h4 class="section-title font-bold"><?= $formTitle; ?></h4>
            <?php }
            get_template_part("components/contacts-form"); ?>
        </section>
        <?php
        $NxStTitle = get_field("next_steps_title");
        $NxStItems = get_field("next_steps_items");
        if ($NxStTitle && $NxStItems) { ?>
            <section class="steps">
                <h3 class="steps__title section-title font-bold"><?= $NxStTitle; ?></h3>
                <div class="steps__items d-flex justify-content-between">
                    <?php foreach ($NxStItems as $i => $step) { ?>
                        <div class="steps__item">
                            <div class="steps__item-number d-flex justify-content-center align-items-center img-shadow tab-title"><?= $i + 1; ?></div>
                            <p class="steps__item-text contacts-text"><?= $step["next_steps_text"]; ?></p>
                        </div>
                    <?php } ?>
                </div>
            </section>
        <?php }
        $ctaTitle = get_field("call_to_action_title");
        $ctaButton = get_field("call_to_action_button");
        if ($ctaTitle && $ctaButton) { ?>
            <section class="call-to-action">
                <h3 class="section-title font-bold text-center"><?= $ctaTitle; ?></h3>
                <?php if(isset($ctaButton["title"]) && isset($ctaButton["url"])) { ?>
                    <div class="call-to-action__btn text-center">
                        <a href="<?= $ctaButton["url"]; ?>" class="default-btn d-inline-block"><?= $ctaButton["title"]; ?></a>
                    </div>
                <?php } ?>
            </section>
        <?php } ?>
    </div>
</section>
<?php get_footer(); ?>