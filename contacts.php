<?php /* Template Name: Contacts Template */
    get_header();
?>
<section class="contacts-page filler wrapper d-flex justify-content-between">
    <div class="contacts-page__col1">
        <h1 class="contacts-page__title font-heavy wrapper"><?php the_title(); ?></h1>
        <?php
        $feedbackItem = get_field("feedback_item");
        if ($feedbackItem) { ?>
            <div class="contacts-page__contacts d-flex">
                <div class="contacts-page__contacts-names">
                    <?php foreach ($feedbackItem as $item) {
                        if (isset($item["feedback_item_title"])) { ?>
                            <p class="contacts-page__contacts-item small-title"><?php echo $item["feedback_item_title"]; ?>:</p>
                        <?php }
                    } ?>
                </div>
                <div class="contacts-page__contacts-links">
                    <?php foreach ($feedbackItem as $item) {
                        if (isset($item["feedback_item_link"])) { ?>
                            <a href="<?php echo $item["feedback_item_link"]["url"]; ?>" class="contacts-page__contacts-item-link d-block"><?php echo $item["feedback_item_link"]["title"]; ?></a>
                        <?php }
                    } ?>
                </div>
            </div>
        <?php }
        $socials = get_field("social_links", "options");
        $socialsTitle = get_field("socials_title");
        if ($socials || $socialsTitle) {
            if ($socialsTitle) { ?>
                <h5 class="small-title"><?php echo $socialsTitle; ?></h5>
            <?php } if ($socials) { ?>
                <div class="contacts-page__socials">
                    <?php get_template_part("components/social-link-img"); ?>
                </div>
            <?php }
        } ?>
    </div>
    <div class="contacts-page__col2 position-relative">
        <?php $formTitle = get_field("form_title");
        if ($formTitle) { ?>
            <h4 class="tab-title font-bold"><?php echo $formTitle; ?></h4>
        <?php }
        get_template_part("components/contacts-form"); ?>
    </div>
</section>
<?php get_footer(); ?>