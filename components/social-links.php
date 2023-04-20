<?php
$socials = get_field("social_links", "options");
if (!empty($socials)) { ?>
    <div class="brinpl-social">
        <?php foreach ($socials as $social) {
            if ($social["social_link_url"] && $social["social_link_title"]) { ?>
                <a href="<?= $social["social_link_url"]; ?>" class="font-bold" target="_blank"><?= $social["social_link_title"]; ?></a>
            <?php }
        } ?>
    </div>
<?php } ?>
