<form enctype="multipart/form-data" class="contacts__form" id="contact-form">
    <h6 class="contacts__form-services key-title">Services you need</h6>
    <div class="service">
        <?php
        $services = new WP_Query(["post_type" => "services", "posts_per_page" => -1]);
        if ($services->have_posts()) : while ($services->have_posts()) : $services->the_post(); ?>
            <div class="service__item d-inline-block">
                <input type="checkbox" name="form-service[]" id="form-<?= the_ID(); ?>" class="service__item-input d-none" value="<?php the_ID(); ?>">
                <label for="form-<?php the_ID(); ?>" class="service__item-label input-text transition-default"><?php the_title(); ?></label>
            </div>
        <?php endwhile; else: endif;
        wp_reset_query(); ?>
    </div>
    <div class="form__sender d-flex">
        <div class="form__group">
            <input type="text" name="form-name" id="form-name" class="input-type-text input-text font-medium" placeholder="Your name">
            <p class="error-message font-medium transition-default">The field is required</p>
        </div>
        <div class="form__group">
            <input type="email" name="form-email" id="form-email" class="input-type-text input-text font-medium" placeholder="Your email">
            <p class="error-message font-medium transition-default">The field is required</p>
        </div>
    </div>
    <div class="form__group">
        <textarea name="form-message" id="form-message" class="contacts__form-tellus input-type-text input-text font-medium" placeholder="Tell us more about your idea"></textarea>
        <p class="error-message font-medium transition-default">The field is required</p>
        <input type="file" name="feedback-form-file" id="feedback-form-file" class="d-none">
        <label for="feedback-form-file" class="label-clip transition-default"><img src="<?php bloginfo("template_url"); ?>/images/clip.svg" alt="clip"></label>
        <p class="feedback-form-filename font-medium"></p>
    </div>
    <div class="position-relative">
        <button type="submit" class="contacts__form-btn default-btn">Submit</button>
        <div class="preloader contact-form-preloader position-absolute">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="contact-form-success position-absolute transition-default px-3">
        <h2 class="page__title font-bold text-center">Thank You!</h2>
        <p class="main-subtitle contacts-text text-center">We will contact You as soon as possible</p>
    </div>
</form>