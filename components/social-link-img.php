<?php
$socials = get_field("social_links", "options");
if (!empty($socials)) { ?>
    <div class="socials__wrapper">
        <?php foreach ($socials as $soc) {
            if ($soc["social_link_url"] && $soc["social_link_image"]) { ?>
                <a href="<?php echo $soc["social_link_url"] ?>" class="social-link-img" target="_blank">
                    <img src="<?php echo $soc["social_link_image"]["sizes"]["medium"]; ?>" alt="<?php echo $soc["social_link_image"]["alt"]; ?>" class="absolute-cover-img">
                </a>
            <?php }
        } ?>
    </div>
<?php }