<section class="feedback">
    <div class="wrapper d-flex justify-content-between">
        <?php
        $feedbackImage = get_field("footer_feedback_image", "options");
        $feedbackTitle = get_field("footer_feedback_title", "options");
        $feedbackSubtitle = get_field("footer_feedback_subtitle", "options");
        $aboutButton = get_field("footer_feedback_button", "options");
        if($feedbackImage) { ?>
            <div class="feedback__col1">
                <div class="img-wrapper">
                    <img src="<?php echo $feedbackImage["sizes"]["medium_large"]; ?>" alt="<?php echo $feedbackImage["alt"]; ?>" class="absolute-cover-img">
                </div>
            </div>
        <?php }
        if ($feedbackTitle || $feedbackSubtitle || (isset($aboutButton["title"]) && isset($aboutButton["url"]))) { ?>
            <div class="feedback__col2">
                <?php if($feedbackTitle) { ?>
                    <h2 class="feedback__title heavy-title font-heavy"><?php echo $feedbackTitle; ?></h2>
                <?php } if($feedbackSubtitle) { ?>
                    <p class="feedback__subtitle contacts-text"><?php echo $feedbackSubtitle; ?></p>
                <?php } if(isset($aboutButton["title"]) && isset($aboutButton["url"])) { ?>
                    <a href="<?php echo $aboutButton["url"]; ?>" class="feedback__btn default-btn-icon transition-default d-inline-flex">
                        <img src="<?php bloginfo("template_url"); ?>/images/Plane.svg" alt="plane">
                        <?php echo $aboutButton["title"]; ?>
                    </a>
                <?php }
                get_template_part("components/social-links"); ?>
            </div>
        <?php } ?>
    </div>
</section>
