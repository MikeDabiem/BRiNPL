<?php
    require "header.php";
    require "db.php";
?>
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
        <a href="#all-services__tab" class="whatwedo__tab">All Services</a>
        <?php
            if ($whatwedo_tabs) {
                foreach ($whatwedo_tabs as $tab) { ?>
                    <a href="<?php echo $tab['link'] ?>" class="whatwedo__tab"><?php echo $tab['title'] ?></a>
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
        <a href="#" class="whatwedo__btn default-btn transition-default d-inline-block">View portfolio</a>
    </div>
</section>
<section class="portfolio-slider wrapper">
    <div class="portfolio-slider__header d-flex justify-content-between align-items-center">
        <h3 class="section-title font-bold">OUR Portfolio</h3>
        <div>
            <a href="#" class="portfolio-slider__link transition-default">All cases</a>
        </div>
    </div>
    <div class="portfolio-slider__slides">
        <?php
        if ($slides) {
            foreach ($slides as $slide) { ?>
                <a href="#" class="portfolio-slider__slides-item img-hover d-block">
                    <div class="img-wrapper img-shadow overflow-hidden">
                        <img src="images/<?php echo $slide['img']; ?>" alt="thumbnail" class="absolute-cover-img transition-default">
                    </div>
                    <p class="transition-default"><?php echo $slide['title']; ?></p>
                </a>
            <?php }
        } ?>
    </div>
    <div class="portfolio-slider__buttons text-center">
        <button type="button" class="portfolio-slider__prev transition-default d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="images/Arrow.svg" alt="prev"></button>
        <button type="button" class="portfolio-slider__next transition-default d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="images/Arrow.svg" alt="next"></button>
    </div>
</section>
<section class="main-about wrapper d-flex justify-content-between">
    <div class="main-about__col1 content-column">
        <div class="main-about__col1-inner wysiwyg-styles">
            <h3 class="main-about__title section-title font-bold">A few words<br>About brinpl</h3>
            <p class="font-medium">We are a young creative design studio located in Ukraine. We create, we design, we research, we develop... but first we care! We take care of every aspect of our work, from brand design strategy development to every tiny design element in our projects. We fight for a sense of satisfaction from our work and help brands share their unique stories with customers. We are very sensitive to visual details, color schemes and typography. We are passionate about UI/UX design, illustration, branding, product design and development.<br><br>BRiNPL is a powerful team of professionals with a creative eye for digital technologies. Each project for us is not only a beautiful solution, but also a new challenge! Your project will be no exception!</p>
            <a href="#" class="main-about__btn default-btn transition-default d-inline-block">Get in touch</a>
        </div>
    </div>
    <div class="main-about__col2 content-column">
        <div class="main-about__col2-inner wysiwyg-styles">
            <div class="img-wrapper img-shadow">
                <img src="images/About.jpg" alt="about" class="main-about__img absolute-cover-img">
            </div>
        </div>
    </div>
</section>
<section class="feedback">
    <div class="wrapper d-flex justify-content-between">
        <div class="feedback__col1">
            <div class="img-wrapper">
                <img src="images/Rocket.png" alt="rocket" class="absolute-cover-img">
            </div>
        </div>
        <div class="feedback__col2">
            <h2 class="feedback__title heavy-title font-heavy">Let's do it <span class="font-heavy">together!</span></h2>
            <p class="feedback__subtitle contacts-text">Tell us a few words about your project.</p>
            <a href="#" class="feedback__btn default-btn-icon transition-default d-inline-flex"><img src="images/Plane.svg" alt="plane">get in touch</a>
            <div class="social d-flex">
                <?php
                if ($socials) {
                    foreach ($socials as $social) { ?>
                        <a href="#" class="<?php echo $social; ?> font-bold transition-default"><?php echo $social; ?></a>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</section>
<?php
    require "footer.php";
?>