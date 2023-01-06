<?php require "header.php"; ?>
<section class="services-page filler">
    <?php
        $bg_image = "serv-bg.jpg";
        require "components/page-head.php";
    ?>
    <?php
        require "db.php";
        if ($serv_posts) { ?>
            <section class="services__content">
            <?php
                foreach ($serv_posts as $post) { ?>
                    <div class="services__content-item wrapper d-flex justify-content-between">
                        <div class="services__col1 content-column">
                            <div class="services__col1-inner">
                                <h3 class="section-title font-bold"><?php echo $post["title"]; ?></h3>
                                <div class="services__content-text wysiwyg-styles">
                                    <p><?php echo $post["text"]; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="services__col2 content-column">
                            <div class="services__col2-inner">
                                <div class="services__content-gif-wrapper img-wrapper img-shadow overflow-hidden">
                                    <img src="images/<?php echo $post["img"]; ?>" alt="gif" class="absolute-cover-img">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>
            <?php
        }
        require "components/lets-talk.php";
    ?>
</section>
<?php require "footer.php"; ?>