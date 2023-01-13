<?php
    require "header.php";
    require "db.php";
?>
<main class="homepage">
    <section class="hero">
        <div class="hero__content wrapper d-flex justify-content-between align-items-center">
            <div class="hero__content-left">
                <h1 class="main-title font-bold">Let`s develop something awesome <span class="font-bold">together.</span></h1>
                <p class="main-subtitle contacts-text">We define, design and build digital products that look amazing, work flawlessly, and unlock business value.</p>
                <a href="#" class="hero__btn default-btn-icon transition-default d-inline-flex"><img src="images/Plane.svg" alt="plane">get in touch</a>
            </div>
            <div class="hero__content-right">
                <div class="img-wrapper">
                    <img src="images/Hero.png" alt="Hero" class="absolute-cover-img">
                </div>
            </div>
        </div>
        <div class="hero__scroll text-center">
            <a href="#" id="hero__scroll">
                <img src="images/Scroll.svg" alt="scroll">
                <div class="scroll-dot"></div>
                <div class="scroll-dot"></div>
                <div class="scroll-dot"></div>
            </a>
        </div>
    </section>
    <section class="whatwedo wrapper" id="whatwedo">
        <h3 class="section-title font-bold">What we do</h3>
        <div class="whatwedo__tabs transition-default d-inline-flex">
            <a href="#all-services__tab" class="whatwedo__tab small-title active">All Services</a>
            <?php
                if ($whatwedo_tabs) {
                    foreach ($whatwedo_tabs as $tab) { ?>
                        <a href="<?php echo $tab['link'] ?>" class="whatwedo__tab small-title"><?php echo $tab['title'] ?></a>
                    <?php }
                }
            ?>
        </div>
        <div class="whatwedo__content">
            <?php
                require "components/all-services.php";
                require "components/whatwedo-tab.php";
            ?>
        </div>
        <div class="whatwedo__portfolio text-center">
            <a href="/portfolio.php" class="whatwedo__btn default-btn transition-default d-inline-block">View portfolio</a>
        </div>
    </section>
    <section class="portfolio-slider wrapper">
        <div class="portfolio-slider__header d-flex justify-content-between align-items-center">
            <h3 class="section-title font-bold">OUR Portfolio</h3>
            <div>
                <a href="/portfolio.php" class="portfolio-slider__link transition-default small-title">All cases</a>
            </div>
        </div>
        <div class="brinpl-slider__slides">
            <?php
            if ($slides) {
                foreach ($slides as $slide) { ?>
                    <a href="#" class="brinpl-slider__slides-item img-hover d-block">
                        <div class="img-wrapper img-shadow overflow-hidden">
                            <img src="images/<?php echo $slide['img']; ?>" alt="thumbnail" class="absolute-cover-img transition-default">
                        </div>
                        <h5 class="transition-default small-title"><?php echo $slide['title']; ?></h5>
                    </a>
                <?php }
            } ?>
        </div>
        <div class="portfolio-slider__buttons text-center">
            <button type="button" class="brinpl-slider__prev transition-default d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="images/Arrow.svg" alt="prev"></button>
            <button type="button" class="brinpl-slider__next transition-default d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="images/Arrow.svg" alt="next"></button>
        </div>
    </section>
    <section class="main-about">
        <?php
            foreach ($home_about as $post) {
                require "components/text-img.php";
            }
        ?>
    </section>
    <?php
        require "components/feedback.php";
    ?>
</main>
<?php
    require "footer.php";
?>