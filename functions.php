<?php
/*Load styles and scripts*/
function load_style_script()
{
    $templatePath = ['templateUrl' => get_template_directory_uri()];

    // CSS PLUGINS
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('slick', get_template_directory_uri() . '/slick/slick.css');
    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/slick/slick-theme.css');

    // CSS CUSTOM
    wp_enqueue_style('styleMain', get_template_directory_uri() . '/css/compiled-css/style.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');

    // JS PLUGINS
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js');
    wp_enqueue_script('slick', get_template_directory_uri() . '/slick/slick.js');
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/js/slick.js');

    // JS CUSTOM HEADER
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js');
    wp_enqueue_script('contact-form', get_template_directory_uri() . '/js/contact-form.js');
    wp_localize_script('contact-form', 'data', $templatePath);

    wp_localize_script('main', 'ajaxurl', ['url' => admin_url('admin-ajax.php')]);
}
add_action("wp_enqueue_scripts", "load_style_script");
/*END Load styles and scripts*/



/*Add Thumbnails*/
add_theme_support('post-thumbnails');

/*Add Menus*/
add_theme_support("menus");
/*Register Menu*/
register_nav_menu("menuHeaderMobile", "Mobile Header Menu");



// Modify TinyMCE editor
function tiny_mce_remove_unused_formats($initFormats)
{
    // Add block format elements you want to show in dropdown
    $initFormats['block_formats'] = 'Paragraph=p;Heading (h2)=h2;';
    return $initFormats;
}

add_filter('tiny_mce_before_init', 'tiny_mce_remove_unused_formats');

function tinymce_paste_as_text($init)
{
    $init['paste_as_text'] = true;
    return $init;
}

add_filter('tiny_mce_before_init', 'tinymce_paste_as_text');
// End Modify TinyMCE editor


/* Services Post Type */
add_action("init", "services_post_type");
function services_post_type()
{
    register_post_type("services", [
        "public" => true,
        "supports" => ["title", "thumbnail", "revisions", "editor"],
        "labels" => [
            "name" => "Services",
            "add_new_item" => "Add"
        ],
        'rewrite' => [
            'with_front' => false
        ],
    ]);
}

add_rewrite_rule('^services/page/([0-9]+)', 'index.php?pagename=services&paged=$matches[1]', 'top');
/* END Services Post Type */



// Email address encoder hook
if (function_exists('eae_encode_emails')) {
    add_filter('acf/load_value', 'eae_encode_emails');
}
// END Email address encoder hook



/*Remove Autocomplete URL*/
remove_filter('template_redirect', 'redirect_canonical');
/*End Remove Autocomplete URL*/



/*Container for content video*/
function custom_video_html($html)
{
    return '<div class="video-wysiwyg">' . $html . '</div>';
}

add_filter('embed_oembed_html', 'custom_video_html', 10, 3);
add_filter('video_embed_html', 'custom_video_html');
/*END Container for content video*/



// Shortcode in text fields
add_filter('acf/format_value/type=text', 'do_shortcode');
// END Shortcode in text fields



// Hide content editor
function hide_editor()
{
    $template_file = basename(get_page_template());
    $templatesArray = ['index.php','services.php','about.php','contacts.php','portfolio.php'];
    if (in_array($template_file, $templatesArray)) remove_post_type_support('page', 'editor');
}

add_action('admin_head', 'hide_editor');
// END Hide content editor



/*New thumb size*/
if (function_exists('add_image_size')) {
    add_image_size('modal-thumb', 1680, 1050);
}
/*END New thumb size*/



/*SVG Through admin-panel*/
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');
/*END SVG Through admin-panel*/



/*Make ACF Options*/
if (function_exists('acf_add_options_page')) {
    $args = ['page_title' => 'Options', 'menu_title' => 'Options'];
    acf_add_options_page($args);
}
/*End Make ACF Options*/



/*Custom Default WordPress Gallery*/
add_filter('post_gallery', 'my_post_gallery', 10, 2);
function my_post_gallery($output, $attr)
{
    static $funcCounter = 0;

    // Don't change code
    extract(shortcode_atts([
        'include' => '',
    ], $attr));

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(['include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'post__in']);
        $attachments = [];
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }
    if (empty($attachments)) return '';
    // END Don't change code

    ob_start();
    require get_template_directory() . '/components/custom-gallery.php';
    $output = ob_get_clean();
    $funcCounter++;
    return $output;
}
/*END Custom Default WordPress Gallery*/



// Full size images
add_filter( 'big_image_size_threshold', '__return_false' );
//End full size images



// Remove editor from edit post
add_action('init', function() {
    remove_post_type_support('post', 'editor');
});
// End remove editor from edit post



// Contact form handler
require get_template_directory()."/components/contact-form.php";
// END Contact form handler



/*Date shortcode*/
function year_current_function() {
    return date("Y", time());
}

add_shortcode('current_year', 'year_current_function');
/*END Date shortcode*/



/*Portfolio ajax*/
if (wp_doing_ajax()) {
    add_action('wp_ajax_filter', 'portfolio_filter');
    add_action('wp_ajax_nopriv_filter', 'portfolio_filter');
}
function portfolio_filter() {
    $args = ["posts_per_page" => -1, 'category_name' => "uiux-design"];
    if ($_POST) {
        $cat = str_replace("portfolio-category=", '', $_POST['data']);
        $args = ["posts_per_page" => -1, 'category_name' => $cat];
    }
    $portfolio = new WP_Query($args);
    if ($portfolio->have_posts()): ?>
        <?php while ($portfolio->have_posts()) : $portfolio->the_post();
            get_template_part('components/portfolio-item');
        endwhile; ?>
    <?php else: ?>
        <section class="no-posts w-100">
            <h2 class="heavy-title text-center p-5">There is no posts</h2>
        </section>
    <?php endif;
    wp_reset_postdata();
    wp_die();
}