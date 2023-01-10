<?php require "header.php"; ?>
<section class="services-page filler">
    <?php
        $heading = [
            "img" => "serv-bg.jpg",
            "title" => "Our Services"
        ];
        require "components/page-head.php";
    ?>
    <?php
        require "db.php";
        if ($serv_posts) { ?>
            <section class="services__content">
            <?php
                foreach ($serv_posts as $post) { 
                    require "components/text-img.php";
                } ?>
            </section>
            <?php
        }
        require "components/lets-talk.php";
    ?>
</section>
<?php require "footer.php"; ?>