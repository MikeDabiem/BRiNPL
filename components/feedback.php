<?php
$feedbackImage = get_field("footer_feedback_image", "options");
$feedbackTitle = get_field("footer_feedback_title", "options");
$feedbackSubtitle = get_field("footer_feedback_subtitle", "options");
$feedbackButton = get_field("footer_feedback_button", "options");
if($feedbackImage || $feedbackTitle || $feedbackSubtitle || $feedbackButton) { ?>
<section class="feedback">
    <div class="wrapper d-flex justify-content-between align-items-center">
        <?php if($feedbackImage) { ?>
            <div class="feedback__col1">
                <div class="img-wrapper">
                    <img src="<?= $feedbackImage["sizes"]["medium_large"]; ?>" alt="<?= $feedbackImage["alt"]; ?>" class="absolute-cover-img">
                </div>
            </div>
        <?php } else { ?>
            <div class="feedback__col1">
                <div class="img-wrapper">
                    <video src="<?php bloginfo("template_url"); ?>/images/footer.mp4" class="absolute-cover-img" playsinline autoplay loop muted></video>
                </div>
            </div>
        <?php } if ($feedbackTitle || $feedbackSubtitle || (isset($feedbackButton["title"]) && isset($feedbackButton["url"]))) { ?>
            <div class="feedback__col2">
                <?php if($feedbackTitle) { ?>
                    <h2 class="feedback__title section-title font-bold"><?= $feedbackTitle; ?></h2>
                <?php } if($feedbackSubtitle) { ?>
                    <p class="feedback__subtitle contacts-text"><?= $feedbackSubtitle; ?></p>
                <?php } if(isset($feedbackButton["title"]) && isset($feedbackButton["url"])) { ?>
                    <a href="<?= $feedbackButton["url"]; ?>" class="feedback__btn default-btn-icon font-bold transition-default d-inline-flex">
                        <img src="<?php bloginfo("template_url"); ?>/images/Plane.svg" alt="plane">
                        <?= $feedbackButton["title"]; ?>
                    </a>
                <?php }
                $socialsTitle = get_field("socials_title", "options");
                if ($socialsTitle) { ?>
                    <h5 class="feedback__socials-title input-text text-uppercase"><?= $socialsTitle; ?></h5>
                <?php }
                get_template_part("components/social-link-img"); ?>
            </div>
        <?php } ?>
    </div>
</section>
<?php } ?>