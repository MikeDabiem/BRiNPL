<?php
$wrap = null;
if (is_page_template("index.php")) {
    $title = $aboutTitle;
    $text = $aboutText;
    $image = $aboutImage;
    $wrap = "main-about__wrapper";
} else if(is_page_template("about.php")) {
    $title = $aboutTitle;
    $text = $aboutText;
    $image = $aboutImage;
} else if(is_page_template("services.php")) {
    $title = get_the_title();
    $text = $servicePostText;
    $image = get_field("services_post_gif");
} else {
    $title = get_the_title();
}
if ($title || $text || $image) { ?>
    <article class="text-img wrapper d-flex justify-content-between align-items-center <?= $wrap; ?>">
        <?php if ($title || $text) { ?>
            <div class="text-img__col1 content-column">
                <div class="text-img__col1-inner">
                    <?php if ($title) { ?>
                        <h3 class="section-title font-bold"><?= $title; ?></h3>
                    <?php } if ($text) { ?>
                        <div class="text-img-text wysiwyg-styles">
                            <?= $text; ?>
                        </div>
                    <?php }
                    if (isset($button["title"]) && isset($button["url"])) { ?>
                        <a href="<?= $button["url"] ?>" class="text-img__btn default-btn transition-default d-inline-block"><?= $button["title"] ?></a>
                    <?php } ?>
                </div>
            </div>
        <?php } if ($image) { ?>
            <div class="text-img__col2 content-column">
                <div class="text-img__col2-inner">
                    <div class="img-wrapper overflow-hidden">
                        <?php if ($image["subtype"] === "gif") { ?>
                            <img src="<?= $image["url"]; ?>" alt="<?php $image["alt"]; ?>" class="absolute-cover-img" loading="lazy">
                        <?php } else { ?>
                            <img src="<?= $image["sizes"]["large"]; ?>" alt="<?php $image["alt"]; ?>" class="absolute-cover-img">
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </article>
<?php } ?>