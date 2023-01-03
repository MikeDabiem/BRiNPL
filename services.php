<?php require "header.php"; ?>
<section class="services filler">
    <section class="page__heading services__heading">
        <h1 class="page__title font-heavy wrapper">our Services</h1>
    </section>
    <?php
        require "db.php";
        if ($serv_posts) { ?>
            <section class="services__content">
            <?php
                foreach ($serv_posts as $post) { ?>
                    <div class="services__content-item wrapper d-flex justify-content-between">
                        <div class="services__col1 content-column">
                            <div class="services__col1-inner wysiwyg-styles">
                                <h3 class="section-title font-bold"><?php echo $post["title"]; ?></h3>
                                <p class="services__content-text"><?php echo $post["text"]; ?></p>
                            </div>
                        </div>
                        <div class="services__col2 content-column">
                            <div class="services__col2-inner wysiwyg-styles">
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