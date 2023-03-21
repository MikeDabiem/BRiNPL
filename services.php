<?php /* Template Name: Services Template */
    get_header();
?>
<section class="services-page filler">
    <?php get_template_part("components/page-head");
    $services = new WP_Query(["post_type" => "services", "posts_per_page" => -1]);
    if ($services->have_posts()): ?>
        <section class="services__content">
            <?php while ($services->have_posts()) : $services->the_post();
                get_template_part("components/text-img");
            endwhile; ?>
        </section>
    <?php else: endif;
    get_template_part("components/feedback"); ?>
</section>
<?php get_footer(); ?>