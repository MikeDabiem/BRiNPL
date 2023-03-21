<?php
$title = get_field("talk_title", "options");
$contacts = get_field("talk_contacts_title", "options");
$email = get_field("talk_email", "options");
$phone = get_field("talk_phone", "options");
if ($title || $contacts || isset($email["title"]) && isset($email["url"]) || isset($phone["title"]) && isset($phone["url"]) || $image) { ?>
    <section class="lets-talk">
        <div class="wrapper">
            <?php if ($title) { ?>
                <h2 class="lets-talk__title font-heavy"><?php echo $title; ?></h2>
            <?php } ?>
            <div class="lets-talk__content d-flex justify-content-between">
                <div class="lets-talk__col1">
                    <?php get_template_part("components/feedback-form"); ?>
                </div>
                <?php if ($contacts || isset($email["title"]) && isset($email["url"]) || isset($phone["title"]) && isset($phone["url"]) || $image) { ?>
                    <div class="lets-talk__col2">
                        <?php if ($contacts) { ?>
                            <h5 class="lets-talk__contacts-title small-title"><?php echo $contacts; ?></h5>
                        <?php } if (isset($email["title"]) && isset($email["url"])) { ?>
                            <a href="<?php echo $email["url"]; ?>" class="lets-talk__contacts-email contacts-text"><?php echo $email["title"]; ?></a>
                        <?php } if (isset($phone["title"]) && isset($phone["url"])) { ?>
                            <a href="<?php echo $phone["url"]; ?>>" class="lets-talk__contacts-phone contacts-text"><?php echo $phone["title"]; ?></a>
                        <?php }
                        $socialsTitle = get_field("socials_title", "options");
                        if ($socialsTitle) { ?>
                            <h5 class="feedback__socials-title input-text text-uppercase"><?= $socialsTitle; ?></h5>
                        <?php }
                        get_template_part("components/social-link-img"); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>