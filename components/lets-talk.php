<section class="lets-talk">
    <div class="wrapper">
        <h2 class="lets-talk__title font-heavy">let's talk!</h2>
        <div class="lets-talk__content d-flex justify-content-between">
            <div class="lets-talk__col1">
                <form action="#" method="post" class="lets-talk__form" id="lets-talk-form">
                    <div class="d-flex justify-content-between">
                        <div class="form__group d-inline-block">
                            <input type="text" name="username" id="name" class="input-type-text input-text font-medium" placeholder=" ">
                            <p class="error-message font-medium transition-default">The field is required</p>
                            <label for="name" class="label-text transition-default input-text">Name</label>
                        </div>
                        <div class="form__group d-inline-block text-end">
                            <input type="email" name="email" id="email" class="input-type-text input-text font-medium" placeholder=" ">
                            <p class="error-message font-medium transition-default">The field is required</p>
                            <label for="email" class="label-text transition-default input-text">Email</label>
                        </div>
                    </div>
                    <h6 class="lets-talk-form-services input-text">Services</h6>
                    <?php
                        if ($whatwedo_tabs) {
                            foreach ($whatwedo_tabs as $tab) { ?>
                                <div class="service__item d-inline-block">
                                    <input type="checkbox" name="form-<?php echo $tab["id"]; ?>" id="form-<?php echo $tab["id"]; ?>" class="service__item-input d-none">
                                    <label for="form-<?php echo $tab["id"]; ?>" class="service__item-label transition-default"><?php echo $tab["title"]; ?></label>
                                </div>
                            <?php }
                        }
                    ?>
                    <div class="form__group form__group-tellus">
                        <input type="text" name="tellus" id="tellus" class="lets-talk-form-tellus input-type-text input-text font-medium" placeholder=" ">
                        <label for="tellus" class="label-text transition-default input-text">Tell us about your project...</label>
                        <input type="file" name="file" id="lets-talk-form-file" class="d-none">
                        <label for="lets-talk-form-file" class="label-clip transition-default"><img src="images/clip.svg" alt="clip"></label>
                        <p class="lets-talk-form-filename font-medium"></p>
                    </div>
                    <button type="submit" class="default-btn transition-default">send</button>
                </form>
            </div>
            <div class="lets-talk__col2">
                <h5 class="lets-talk__contacts-title">Contacts</h5>
                <a href="mailto:brinpl.ua@gmail.com" class="lets-talk__contacts-email contacts-text">brinpl.ua@gmail.com</a>
                <a href="tel:+380500000000" class="lets-talk__contacts-phone contacts-text">+38050 000 00 00</a>
                <div class="social d-flex">
                    <?php require "db.php";
                    if ($socials) {
                        foreach ($socials as $social) { ?>
                            <a href="#" class="<?php echo $social; ?>"><?php echo $social; ?></a>
                        <?php }
                    } ?>
                </div>
                <div class="img-wrapper">
                    <img src="images/letters.svg" alt="mail" class="absolute-cover-img">
                </div>
            </div>
        </div>
    </div>
</section>