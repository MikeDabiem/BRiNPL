<?php
    require "header.php";
    require "db.php";
?>
<section class="contacts-page filler wrapper d-flex justify-content-between">
    <div class="contacts-page__col1">
        <h1 class="contacts-page__title font-heavy wrapper">contacts</h1>
        <div class="contacts-page__contacts d-flex">
            <?php
                if (isset($contacts_items)) { ?>
                    <div class="contacts-page__contacts-names">
                        <?php
                            foreach ($contacts_items as $key => $value) { ?>
                                <p class="contacts-page__contacts-item small-title"><?php echo $key; ?>:</p>
                            <?php }
                        ?>
                    </div>
                    <div class="contacts-page__contacts-links">
                        <?php
                            foreach ($contacts_items as $key => $value) { ?>
                                <a href="<?php echo $value["url"]; ?>" class="contacts-page__contacts-item-link d-block"><?php echo $value["text"]; ?></a>
                            <?php }
                        ?>
                    </div>
                <?php } ?>
        </div>
        <h5 class="small-title">Follow us!</h5>
        <div class="contacts-page__socials">
            <?php
                $social_links = [
                    [
                        "img" => "Be.svg",
                        "url" => "https://www.behance.net/"
                    ],
                    [
                        "img" => "dribbble.svg",
                        "url" => "https://dribbble.com/"
                    ],
                    [
                        "img" => "facebook.svg",
                        "url" => "https://www.facebook.com/"
                    ],
                    [
                        "img" => "linkedin.svg",
                        "url" => "https://www.linkedin.com/"
                    ]
                ];
                require "components/social-link-img.php";
            ?>
        </div>
    </div>
    <div class="contacts-page__col2">
        <h4 class="tab-title font-bold">Tell us about your project and get<br>a free estimate</h4>
        <?php require "components/contacts-form.php"; ?>
    </div>
</section>
<?php require "footer.php"; ?>