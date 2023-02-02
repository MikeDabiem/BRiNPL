<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<?php wp_body_open();
$logo = get_field("header_logo", "options");
$locations = get_nav_menu_locations();
$headerMenu = wp_get_nav_menu_items($locations["menuHeaderMobile"]);
$headerMail = get_field("header_email", "options");
if ($logo || !empty($headerMenu) || $headerMail) { ?>
    <header class="header position-fixed w-100">
        <div class="wrapper d-flex justify-content-between align-items-center">
            <?php
            if ($logo) { ?>
                <a href="<?php echo home_url(); ?>" class="logo-wrapper d-block">
                    <img src="<?= $logo["sizes"]["medium"]; ?>" alt="BRiNPL" class="logo">
                </a>
            <?php }
            if (!empty($headerMenu) || $headerMail) { ?>
                <div class="d-flex align-items-center ml-auto">
                    <?php
                    if (!empty($headerMenu)) { ?>
                        <nav class="nav-menu transition-default">
                            <?php wp_nav_menu([
                                "menu" => "Header Menu",
                                "menu_class" => "flex-wrap",
                                "container" => "ul"
                            ]); ?>
                        </nav>
                    <?php }
                    if($headerMail) { ?>
                        <div class="menu-mail">
                            <a href="mailto:<?php echo $headerMail; ?>" class="mail-btn d-flex justify-content-center align-items-center overflow-hidden">
                                <img src="<?php bloginfo("template_url"); ?>/images/Mail.svg" alt="mail" class="transition-default">
                            </a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="burger">
                <div class="burger-line transition-default"></div>
            </div>
        </div>
    </header>
<?php }