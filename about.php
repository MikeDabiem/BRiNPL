<?php
    require "header.php";
    require "db.php";
?>
<section class="about filler">
    <section class="page__heading about__heading">
        <h1 class="page__title font-heavy wrapper">About Us</h1>
    </section>
    <section class="about__first wrapper d-flex justify-content-between">
        <div class="about__first-col1 content-column">
            <div class="about__first-col1-inner wysiwyg-styles">
                <h3 class="section-title font-bold">Your search for a design partner ends here </h3>
                <p class="about__first-text font-medium">We’ve created a fresh approach to web design — one rooted in transparency, strategy, and partnership. We care deeply about each of our client’s success, and our dedication to your project will show it.<br><br>We’re not a traditional web design company that simply asks what you want and makes it. We’ll dig into your goals, audience, and budget, and then work together to brainstorm and build the right solution for your project.</p>
            </div>
        </div>
        <div class="about__first-col2 content-column">
            <div class="about__first-col2-inner wysiwyg-styles">
                <div class="about__first-gif-wrapper img-wrapper img-shadow overflow-hidden">
                    <img src="images/product-launch.gif" alt="gif" class="absolute-cover-img">
                </div>
            </div>
        </div>
    </section>
    <section class="things wrapper">
        <h3 class="section-title text-center font-bold">Key things about us</h3>
        <div class="things__content d-flex justify-content-between flex-wrap">
            <?php
                if ($key_things) {
                    foreach ($key_things as $thing) { ?>
                        <div class="things__content-item wysiwyg-styles">
                            <div class="things__content-item-heading d-flex align-items-center">
                                <div class="img-wrapper">
                                    <img src="images/<?php echo $thing['icon']; ?>" alt="icon" class="absolute-cover-img">
                                </div>
                                <h4 class="things__content-item-title font-bold"><?php echo $thing['title']; ?></h4>
                            </div>
                            <p class="things__content-item-text font-medium"><?php echo $thing['text']; ?></p>
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
                        <div class="strategy__item wysiwyg-styles">
                            <p class="strategy__item-num"><?php echo $i + 1; ?></p>
                            <h4 class="strategy__item-title"><?php echo $strat["title"]; ?></h4>
                            <p class="strategy__item-text"><?php echo $strat["text"]; ?></p>
                        </div>
                    <?php }
                }
            ?>
        </div>
    </section>
    <?php
        require "components/lets-talk.php";
    ?>
</section>
<?php require "footer.php"; ?>