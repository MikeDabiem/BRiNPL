<?php
if ($social_links) {
    foreach ($social_links as $soc) { ?>
        <a href="<?php echo $soc["url"] ?>" class="social-link-img" target="_blank">
            <img src="images/<?php echo $soc["img"] ?>" alt="social-link" class="absolute-cover-img">
        </a>
    <?php }
}