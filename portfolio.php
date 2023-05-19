<?php /* Template Name: Portfolio Template */
get_header();
$portfolio = new WP_Query(["posts_per_page" => -1, 'category_name' => "uiux-design"]); ?>
<section class="portfolio-page filler">
    <?php get_template_part("components/page-head");
    $categories = get_categories();
    if ($categories) { ?>
        <div class="portfolio__filter wrapper">
            <form type="post" class="portfolio__filter-buttons d-flex flex-wrap">
                <?php foreach ($categories as $i => $category) {
                    $checked = $i === 0 ? "checked" : null; ?>
                    <input type="radio" name="portfolio-category" id="<?= $category->slug; ?>" value="<?= $category->slug; ?>" class="portfolio__category-input" <?= $checked; ?>>
                    <label for="<?= $category->slug; ?>" class="portfolio__category-name transition-default"><?= $category->name; ?></label>
                <?php } ?>
            </form>
        </div>
    <?php } ?>
    <?php if ($portfolio->have_posts()): ?>
        <div class="portfolio-page__list wrapper d-flex flex-wrap">
            <?php while ($portfolio->have_posts()) : $portfolio->the_post();
                get_template_part('components/portfolio-page-item');
            endwhile; ?>
        </div>
    <?php else: ?>
        <section class="no-posts w-100">
            <h2 class="heavy-title text-center p-5">There is no posts</h2>
        </section>
    <?php endif;
    wp_reset_query();
    get_template_part("components/feedback");
    ?>
</section>
<?php get_footer(); ?>