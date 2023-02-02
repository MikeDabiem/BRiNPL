<div class="whatwedo__content-item" id="<?php the_ID(); ?>">
    <?php
    $title = get_the_title();
    $text = get_field("services_post_excerpt");
    $gallery = get_field("services_post_gallery");
    $col1_class = "";
    if ($gallery) {
        if (count($gallery) === 2) {
            $img_class = "whatwedo__content-2images";
        } else if (count($gallery) === 3) {
            $img_class = "whatwedo__content-3images";
        } else {
            $img_class = "";
        }
    }
    else {
        $img_class = "";
        $col1_class = "mx-auto";
    }
    if ($title || $text) { ?>
        <div class="whatwedo__content-col1 <?php echo $col1_class; ?>">
            <?php if ($title) { ?>
                <h4 class="whatwedo__content-title tab-title font-bold"><?php the_title(); ?></h4>
            <?php } if ($text) { ?>
                <div class="whatwedo__content-text wysiwyg-styles">
                    <?php echo $text; ?>
                </div>
            <?php } ?>
        </div>
    <?php } if ($gallery) { ?>
        <div class="whatwedo__content-col2 <?php echo $img_class ?>">
            <?php foreach ($gallery as $img) { ?>
                <div class="img-shadow img-wrapper overflow-hidden">
                    <img src="<?php echo $img["url"]; ?>" alt="thumbnail" class="whatwedo__content-img absolute-cover-img">
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>