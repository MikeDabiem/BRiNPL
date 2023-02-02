<div class="wysiwyg-gallery d-flex flex-wrap">
    <?php $imageCounter = 0;
    $count = count($attachments);
    foreach ($attachments as $id => $attachment) {
        if ($imageCounter == 3) break;
        $img = wp_get_attachment_image_src($id, 'medium_large');
        $alt = get_post_meta($id, '_wp_attachment_image_alt', true); ?>
        <div class="single-gallery-element position-relative overflow-hidden transition-default">
            <a href="" rel="nofollow" data-toggle="modal" data-target="#galleryImages<?= $funcCounter; ?>" data-counter="<?= $imageCounter; ?>" class="slider-image-link">
                <img src="<?= $img[0]; ?>" alt="<?= $alt; ?>" class="gallery-image absolute-cover-img transition-default">
                <?php if ($imageCounter == 2 && $count > 3) { ?>
                    <div class="darkness-effect absolute-cover-img"></div>
                    <div class="additional-number position-absolute">+<?= $count - 3; ?></div>
                <?php } ?>
            </a>
        </div>
        <?php $imageCounter++;
    } ?>
</div>
<div class="image-modal-window">
    <div class="modal" id="galleryImages<?= $funcCounter; ?>" tabindex="-1">
        <div class="modal-dialog d-inline-block w-100">
            <div class="modal-content d-block">
                <div id="imagesSlider<?= $funcCounter; ?>" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                        <?php $imageCounter = 0;
                        foreach ($attachments as $id => $attachment) {
                            $img = wp_get_attachment_image_src($id, 'modal-thumb');
                            $alt = get_post_meta($id, '_wp_attachment_image_alt', true); ?>
                            <div class="carousel-item <?php if ($imageCounter == 0) echo "active"; ?>" data-counter="<?= $imageCounter; ?>">
                                <div class="align-modal-helper d-flex flex-wrap align-items-center justify-content-center">
                                    <img src="<?= $img[0]; ?>" alt="<?= $alt; ?>" class="slide-image">
                                </div>
                            </div>
                            <?php $imageCounter++;
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($count > 1) { ?>
            <a class="carousel-control-prev position-absolute" href="#imagesSlider<?= $funcCounter; ?>" role="button" data-slide="prev">
                <img src="<?php bloginfo("template_url"); ?>/images/arrow-left-white.svg">
            </a>
            <a class="carousel-control-next position-absolute" href="#imagesSlider<?= $funcCounter; ?>" role="button" data-slide="next">
                <img src="<?php bloginfo("template_url"); ?>/images/arrow-right-white.svg">
            </a>
        <?php } ?>
        <button class="modal-cross position-absolute" data-dismiss="modal">
            <img src="<?php bloginfo("template_url"); ?>/images/cross.svg">
        </button>
    </div>
</div>