<?php get_header(); ?>
    <section class="filler wrapper">
        <h1 class="page__title text-center font-heavy">404</h1>
        <?php $content = get_field("content_404", "options");
        if ($content) { ?>
            <div class="wysiwyg-styles text-center"><?= $content; ?></div>
        <?php } ?>
    </section>
<?php get_footer();
