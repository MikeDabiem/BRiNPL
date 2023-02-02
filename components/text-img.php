<?php
if (is_page_template("index.php")) {
    $title = $aboutTitle;
    $text = $aboutText;
    $image = $aboutImage;
    $button = $aboutButton;
} else if(is_page_template("about.php")) {
    $title = $aboutTitle;
    $text = $aboutText;
    $image = $aboutImage;
} else {
    $title = get_the_title();
    $text = get_field("services_post_excerpt");
    $image = get_field("services_post_gif");
}
if ($title || $text || $image) { ?>
    <article class="text-img wrapper d-flex justify-content-between">
        <?php if ($title || $text) { ?>
            <div class="text-img__col1 content-column">
                <div class="text-img__col1-inner">
                    <?php if ($title) { ?>
                        <h3 class="section-title font-bold"><?php echo $title; ?></h3>
                    <?php } if ($text) { ?>
                        <div class="text-img-text wysiwyg-styles">
                            <?php echo $text; ?>
                        </div>
                    <?php }
                    if (isset($button)) { ?>
                        <a href="<?php echo $button["url"] ?>" class="main-about__btn default-btn transition-default d-inline-block"><?php echo $button["title"] ?></a>
                    <?php } ?>
                </div>
            </div>
        <?php } if ($image) { ?>
            <div class="text-img__col2 content-column">
                <div class="text-img__col2-inner">
                    <div class="img-wrapper img-shadow overflow-hidden">
                        <img src="<?= $image["sizes"]["large"]; ?>" alt="<?php $image["alt"]; ?>" class="absolute-cover-img">
                    </div>
                </div>
            </div>
        <?php } ?>
    </article>
<?php } ?>