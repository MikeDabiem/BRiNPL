<?php require "header.php"; ?>
<section class="portfolio-single filler">
    <div class="portfolio-single__content wrapper d-flex">
        <div class="portfolio-single__content-col1">
            <a href="/portfolio.php" class="portfolio-single__content-nav portfolio-close transition-default"><img src="images/portf-close.svg" alt="close" class="transition-default"></a>
            <a href="#" class="portfolio-single__content-nav portfolio-prev transition-default"><img src="images/portf-arrow.svg" alt="previous"></a>
            <a href="#" class="portfolio-single__content-nav portfolio-next transition-default"><img src="images/portf-arrow.svg" alt="next"></a>
        </div>
        <div class="portfolio-single__content-col2">
            <img src="images/presentation.jpg" alt="presentation" class="portfolio-single__content-presentation">
        </div>
        <div class="portfolio-single__content-col3">
            <article class="portfolio-single__content-descr">
                <h3 class="portfolio-single__content-descr-title portfolio-title font-bold">In Pro</h3>
                <div class="portfolio-single__content-descr-text font-medium">
                    Look is new generation of social media resources. The main idea was to create one source for the users were they can meet friends, share music and video content and keep in touch everywhere and everytime. As a result our team made this unique social network. We took all strong and best parts of the Skype, WhatsApp, Telegram, and some other platforms and combine them.<br><br>Moreover, we added the possibility of advanced music and video player. In addition users can share Youtube videos and news there. To sum up, you will be able to chill out with your friends, meet new people, listen to music, watch videos and share news and many other things on social network Look!
                </div>
                <?php
                    $social_links = [
                        [
                            "img" => "Be.svg",
                            "url" => "https://www.behance.net/"
                        ]
                    ];
                    require "components/social-link-img.php";
                ?>
            </article>
        </div>
    </div>
    <div class="portfolio-single__carousel">
        <div class="portfolio-single__carousel-slides">
            <?php
            require "db.php";
            if ($portfolio_posts) {
                foreach ($portfolio_posts as $slide) { ?>
                    <a href="/single.php" class="portfolio-single__carousel-item img-hover d-block">
                        <div class="img-wrapper img-shadow overflow-hidden">
                            <img src="images/<?php echo $slide['img']; ?>" alt="thumbnail" class="absolute-cover-img transition-default">
                        </div>
                    </a>
                <?php }
            } ?>
        </div>
        <div class="portfolio-carousel__buttons text-center">
            <button type="button" class="portfolio-carousel__prev portfolio-single__content-nav portfolio-prev transition-default d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="images/portf-arrow.svg" alt="prev"></button>
            <button type="button" class="portfolio-carousel__next portfolio-single__content-nav transition-default d-inline-flex justify-content-center align-items-center overflow-hidden"><img src="images/portf-arrow.svg" alt="next"></button>
        </div>
    </div>
    <?php
        require "components/feedback.php";
    ?>
</section>
<?php require "footer.php";