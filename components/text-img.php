<div class="text-img wrapper d-flex justify-content-between">
    <div class="text-img__col1 content-column">
        <div class="text-img__col1-inner">
            <h3 class="section-title font-bold"><?php echo $post["title"]; ?></h3>
            <div class="text-img-text wysiwyg-styles">
                <?php echo $post["text"]; ?>
            </div>
            <?php
                if (isset($post["btn"])) { ?>
                    <a href="<?php echo $post["btn"]["url"] ?>" class="main-about__btn default-btn transition-default d-inline-block"><?php echo $post["btn"]["title"] ?></a>
                <?php }
            ?>
        </div>
    </div>
    <div class="text-img__col2 content-column">
        <div class="text-img__col2-inner">
            <div class="img-wrapper img-shadow overflow-hidden">
                <img src="images/<?php echo $post["img"]; ?>" alt="illustration" class="absolute-cover-img">
            </div>
        </div>
    </div>
</div>