<?php
    require "header.php";
    require "db.php";
?>
<section class="about-page filler">
    <?php
        $heading = [
            "img" => "about-bg.jpg",
            "title" => "About Us"
        ];
        require "components/page-head.php";
    ?>
    <section class="about__first">
        <?php
            foreach ($aboutus_post as $post) {
                require "components/text-img.php";
            }
        ?>
    </section>
    <section class="things wrapper">
        <h3 class="section-title text-center font-bold">Key things about us</h3>
        <div class="things__content d-flex justify-content-between flex-wrap">
            <?php
                if ($key_things) {
                    foreach ($key_things as $thing) { ?>
                        <div class="things__content-item">
                            <div class="things__content-item-heading d-flex align-items-center">
                                <div class="img-wrapper">
                                    <img src="images/<?php echo $thing['icon']; ?>" alt="icon" class="absolute-cover-img">
                                </div>
                                <h4 class="things__content-item-title font-bold"><?php echo $thing['title']; ?></h4>
                            </div>
                            <div class="things__content-item-text wysiwyg-styles">
                                <p><?php echo $thing['text']; ?></p>
                            </div>
                        </div>
                    <?php }
                }
            ?>
        </div>
    </section>
    <section class="strategy wrapper">
        <h3 class="section-title text-center font-bold">Our work strategy</h3>
        <div class="strategy__line"></div>
        <div class="strategy__items d-flex justify-content-between">
            <?php
                if ($strategy) {
                    foreach ($strategy as $i => $strat) { ?>
                        <div class="strategy__item transition-default">
                            <div class="strategy__item-num d-flex justify-content-center align-items-center"><?php echo $i + 1; ?></div>
                            <h4 class="strategy__item-title font-bold"><?php echo $strat["title"]; ?></h4>
                            <div class="strategy__item-text wysiwyg-styles">
                                <p><?php echo $strat["text"]; ?></p>
                            </div>
                        </div>
                    <?php }
                }
            ?>
        </div>
    </section>
    <section class="reviews wrapper">
        <h3 class="section-title font-bold text-center">reviews</h3>
        <div class="brinpl-slider__slides">
            <?php
            if ($reviews) {
                foreach ($reviews as $review) { ?>
                    <div class="reviews__item transition-default">
                        <div class="img-wrapper overflow-hidden">
                            <img src="images/<?php echo $review['img']; ?>" alt="thumbnail" class="absolute-cover-img1">
                        </div>
                        <h5 class="small-title font-bold"><?php echo $review['name']; ?></h5>
                        <p class="reviews__item-status"><?php echo $review['status']; ?></p>
                        <div class="wysiwyg-styles">
                            <p><?php echo $review['text']; ?></p>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
        <div class="reviews-slider__buttons text-center">
            <button type="button" class="brinpl-slider__prev transition-default d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="images/Arrow.svg" alt="prev"></button>
            <button type="button" class="brinpl-slider__next transition-default d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="images/Arrow.svg" alt="next"></button>
        </div>
    </section>
    <?php
        require "components/lets-talk.php";
    ?>
</section>
<?php require "footer.php"; ?>