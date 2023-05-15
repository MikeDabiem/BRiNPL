<?php
if (isset($tiMobImage)) {
    $imageClass = 'text-img__image';
    $mobImageClass = 'text-img__image-mob';
} else {
    $imageClass = null;
    $mobImageClass = null;
}
if (isset($tiTitle) || isset($tiText) || isset($tiImage) || isset($tiMobImage)) { ?>
    <article class="text-img wrapper d-flex justify-content-between align-items-center">
        <?php if (isset($tiTitle) || isset($tiText)) { ?>
            <div class="text-img__col1 content-column">
                <div class="text-img__col1-inner">
                    <?php if (isset($tiTitle)) { ?>
                        <h3 class="section-title font-bold"><?= $tiTitle; ?></h3>
                    <?php } if (isset($tiText)) { ?>
                        <div class="text-img-text wysiwyg-styles"><?= $tiText; ?></div>
                        <?php if (isset($tiTextMore)) { ?>
                            <div class="text-img-text wysiwyg-styles show-more-content"><?= $tiTextMore; ?></div>
                            <button type="button" class="show-more-button input-text transition-default">Show more</button>
                        <?php }
                    } if (isset($button["title"]) && isset($button["url"])) { ?>
                        <a href="<?= $button["url"] ?>" class="text-img__btn default-btn transition-default d-inline-block"><?= $button["title"] ?></a>
                    <?php } ?>
                </div>
            </div>
        <?php } if (isset($tiImage) || isset($tiMobImage)) { ?>
            <div class="text-img__col2 content-column">
                <div class="text-img__col2-inner">
                    <div class="img-wrapper overflow-hidden">
                        <?php if ($tiImage["subtype"] === "gif") { ?>
                            <img src="<?= $tiImage["url"]; ?>" alt="<?php $tiImage["alt"]; ?>" class="<?= $imageClass; ?> absolute-cover-img" loading="lazy">
                        <?php } else { ?>
                            <img src="<?= $tiImage["sizes"]["large"]; ?>" alt="<?php $tiImage["alt"]; ?>" class="<?= $imageClass; ?> absolute-cover-img" loading="lazy">
                        <?php }
                        if (isset($tiMobImage)) { ?>
                            <img src="<?= $tiMobImage["sizes"]["large"]; ?>" alt="<?php $tiMobImage["alt"]; ?>" class="<?= $mobImageClass; ?> absolute-cover-img" loading="lazy">
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </article>
<?php } ?>