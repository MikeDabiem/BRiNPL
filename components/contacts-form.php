<form action="#" method="post" class="contacts__form" id="feedback-form">
    <div class="form__group">
        <input type="text" name="username" id="name" class="input-type-text input-text font-medium" placeholder="Your name">
        <p class="error-message font-medium transition-default">The field is required</p>
    </div>
    <div class="form__group">
        <input type="email" name="email" id="email" class="input-type-text input-text font-medium" placeholder="E-mail">
        <p class="error-message font-medium transition-default">The field is required</p>
    </div>
    <div class="form__group">
        <textarea name="tellus" id="tellus" class="contacts__form-tellus input-type-text input-text font-medium" placeholder="Tell us more about your project"></textarea>
        <input type="file" name="file" id="feedback-form-file" class="d-none">
        <label for="feedback-form-file" class="label-clip transition-default"><img src="images/clip.svg" alt="clip"></label>
        <p class="feedback-form-filename font-medium"></p>
    </div>
    <h6 class="contacts__form-services small-title">Services</h6>
    <?php
    if (isset($whatwedo_tabs)) {
        foreach ($whatwedo_tabs as $tab) { ?>
            <div class="service__item d-inline-block">
                <input type="checkbox" name="form-<?php echo $tab["id"]; ?>" id="form-<?php echo $tab["id"]; ?>" class="service__item-input d-none">
                <label for="form-<?php echo $tab["id"]; ?>" class="service__item-label input-text transition-default"><?php echo $tab["title"]; ?></label>
            </div>
        <?php }
    } ?>
    <button type="submit" class="contacts__form-btn default-btn-icon transition-default d-block border-0"><img src="images/Plane.svg" alt="plane">Get in touch</button>
</form>