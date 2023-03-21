<form enctype="multipart/form-data" class="feedback__form position-relative" id="contact-form">
    <div class="d-flex justify-content-between">
        <div class="form__group d-inline-block">
            <input type="text" name="form-name" id="form-name" class="input-type-text input-text font-medium" placeholder=" ">
            <p class="error-message font-medium transition-default">The field is required</p>
            <label for="form-name" class="label-text transition-default input-text">Name</label>
        </div>
        <div class="form__group d-inline-block text-end">
            <input type="email" name="form-email" id="form-email" class="input-type-text input-text font-medium" placeholder=" ">
            <p class="error-message font-medium transition-default">The field is required</p>
            <label for="form-email" class="label-text transition-default input-text">Email</label>
        </div>
    </div>
    <h6 class="feedback-form-services input-text">Services</h6>
    <?php
    $services = new WP_Query(["post_type" => "services", "posts_per_page" => -1]);
    if ($services->have_posts()) : while ($services->have_posts()) : $services->the_post(); ?>
        <div class="service__item d-inline-block">
            <input type="checkbox" name="form-service[]" id="form-<?php echo the_ID(); ?>" class="service__item-input d-none" value="<?= the_ID(); ?>">
            <label for="form-<?php echo the_ID(); ?>" class="service__item-label transition-default"><?php the_title(); ?></label>
        </div>
    <?php endwhile;
    else: endif;
    wp_reset_query(); ?>
    <div class="form__group form__group-tellus">
        <input type="text" name="form-message" id="form-message" class="feedback-form-tellus input-type-text input-text font-medium" placeholder=" ">
        <label for="form-message" class="label-text transition-default input-text">Tell us about your project...</label>
        <p class="error-message font-medium transition-default">The field is required</p>
        <input type="file" name="feedback-form-file" id="feedback-form-file" class="d-none">
        <label for="feedback-form-file" class="label-clip transition-default"><img src="<?php bloginfo("template_url"); ?>/images/clip.svg" alt="clip"></label>
        <p class="feedback-form-filename font-medium"></p>
    </div>
    <div class="position-relative">
        <button type="submit" class="default-btn transition-default text-uppercase">send</button>
        <div class="preloader contact-form-preloader position-absolute">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="contact-form-success position-absolute transition-default">
        <h2 class="page__title font-bold text-center">Thank You!</h2>
        <p class="main-subtitle contacts-text text-center">We will contact You as soon as possible</p>
    </div>
</form>