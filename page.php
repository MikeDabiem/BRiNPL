<?php get_header(); ?>
<section class="filler">
    <?php get_template_part("components/page-head"); ?>
    <section class="wrapper py-5">
        <?php $content = apply_filters('the_content', get_the_content());
        if ($content) { ?>
            <div class="wysiwyg-styles"><?= $content; ?></div>
        <?php } ?>
    </section>
</section>
<?php get_footer();
