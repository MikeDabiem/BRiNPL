<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-5K669H9J07"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-5K669H9J07');
    </script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<?php wp_body_open();
$notSetImg = get_field("header_logo", "options");
$logo = get_field("header_logo", "options");
$locations = get_nav_menu_locations();
$headerMenu = wp_get_nav_menu_items($locations["menuHeaderMobile"]);
if ($logo || !empty($headerMenu)) { ?>
    <header class="header position-fixed w-100">
        <div class="wrapper d-flex justify-content-between align-items-center">
            <?php if ($logo) { ?>
                <a href="<?= home_url(); ?>" class="logo-wrapper d-flex align-items-center">
                    <img src="<?= $logo["sizes"]["medium"]; ?>" alt="BRiNPL" class="logo">
                </a>
            <?php }
            if (!empty($headerMenu)) { ?>
                <div class="d-flex align-items-center ml-auto">
                    <nav class="nav-menu transition-default">
                        <?php wp_nav_menu([
                            "menu" => "Header Menu",
                            "menu_class" => "flex-wrap",
                            "container" => "ul"
                        ]); ?>
                        <div class="nav-menu__social">
                            <h5 class="nav-menu__social-title input-text">Follow us</h5>
                            <?php get_template_part("components/social-link-img"); ?>
                            <h5 class="nav-menu__social-title input-text">Send us an email</h5>
                            <?php $email = get_field("talk_email", "options");
                            if (isset($email["title"]) && isset($email["url"])) { ?>
                                <a href="<?= $email["url"]; ?>" class="nav-menu__social-email strategy-text"><?= $email["title"]; ?></a>
                            <?php } ?>
                        </div>
                    </nav>
                </div>
            <?php } ?>
            <div class="burger">
                <div class="burger-line transition-default"></div>
            </div>
        </div>
    </header>
<?php }