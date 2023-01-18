<?php
    require "header.php";
    require "db.php";
?>
<section class="portfolio-page filler">
    <?php
        $heading = [
            "img" => "portfolio-bg.jpg",
            "title" => "Portfolio"
        ];
        require "components/page-head.php";
    ?>
    <div class="portfolio-page__list wrapper d-flex justify-content-between flex-wrap">
        <?php
            foreach ($portfolio_posts as $post) { ?>
                <a href="/single.php" class="portfolio-page__list-item img-hover d-block">
                    <div class="img-wrapper img-shadow overflow-hidden">
                        <img src="images/<?php echo $post["img"]; ?>" alt="screenshot" class="absolute-cover-img transition-default">
                    </div>
                    <h3 class="portfolio-page__list-item-title portfolio-title transition-default text-center font-bold"><?php echo $post["title"]; ?></h3>
                </a>
        <?php } ?>
    </div>
    <?php
        require "components/feedback.php";
    ?>
</section>
<?php require "footer.php"; ?>