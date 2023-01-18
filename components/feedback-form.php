<form action="#" method="post" class="feedback__form" id="feedback-form">
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
    <h6 class="feedback-form-services input-text">Services</h6>
    <?php
        if (isset($whatwedo_tabs)) {
            foreach ($whatwedo_tabs as $tab) { ?>
                <div class="service__item d-inline-block">
                    <input type="checkbox" name="form-<?php echo $tab["id"]; ?>" id="form-<?php echo $tab["id"]; ?>" class="service__item-input d-none">
                    <label for="form-<?php echo $tab["id"]; ?>" class="service__item-label transition-default"><?php echo $tab["title"]; ?></label>
                </div>
            <?php }
        }
    ?>
    <div class="form__group form__group-tellus">
        <input type="text" name="tellus" id="tellus" class="feedback-form-tellus input-type-text input-text font-medium" placeholder=" ">
        <label for="tellus" class="label-text transition-default input-text">Tell us about your project...</label>
        <input type="file" name="file" id="feedback-form-file" class="d-none">
        <label for="feedback-form-file" class="label-clip transition-default"><img src="images/clip.svg" alt="clip"></label>
        <p class="feedback-form-filename font-medium"></p>
    </div>
    <button type="submit" class="default-btn transition-default">send</button>
</form>