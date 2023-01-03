<div class="all-services__tab whatwedo__content-item" id="all-services__tab">
    <?php require "db.php";
        if ($all_services) {
            foreach ($all_services as $serv) { ?>
                <a href="<?php echo $serv['link']; ?>" class="all-services__tab-item d-block img-hover overflow-hidden">
                    <img src="images/<?php echo $serv['img']; ?>" alt="thumbnail" class="absolute-cover-img transition-default">
                    <h4 class="all-services__tab-item-title tab-title"><?php echo $serv['title']; ?></h4>
                </a>
            <?php }
        }
    ?>
</div>






