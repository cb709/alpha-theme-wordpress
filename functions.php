<?php

if (site_url() == 'http://localhost/alpha') {
    define('VERSION', time());
} else {
    define("VERSION", wp_get_theme()->get("Version"));
}


function alpha_theme_setup()
{
    load_theme_textdomain('alpha-theme');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    $header_details = array(
        'header-text' => true,
        'default-theme-color' => '#ffffff',
    );
    add_theme_support("custom-header", $header_details);
    $logo_details = array(
        'height' => '100px',
        'width' => '100px',
        'flex-height' => true,
        'flex-width'  => true,
    );
    add_theme_support('custom-logo', $logo_details);
    add_theme_support('custom-background');
    register_nav_menu("topmenu", __("Top Menu", "alpha-theme"));
    register_nav_menu("footermenu", __("Footer Menu", "alpha-theme"));
}

add_action('after_setup_theme', 'alpha_theme_setup');

function alpha_theme_enqueue()
{
    wp_enqueue_style('alpha-theme', get_stylesheet_uri(), null, VERSION);
    wp_enqueue_style('bootstrap', "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style('featherlight', "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");
    wp_enqueue_script('featherlight', "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array('jquery'), "0.0.1", true);
    wp_enqueue_script('alpha-main', get_theme_file_uri("/assets/js/main.js"), array('jquery', 'featherlight-js'), VERSION, true);
}

add_action('wp_enqueue_scripts', 'alpha_theme_enqueue');

function alpha_sidebar()
{
    register_sidebar(
        array(
            'name'          => __('Single Post Sidebar', 'alpha'),
            'id'            => 'sidebar-1',
            'description'   => __('Right Sidebar', 'alpha'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',

        )
    );

    register_sidebar(
        array(
            'name'          => __('Footer Left', 'alpha'),
            'id'            => 'footer-left',
            'description'   => __('Footer Left Area', 'alpha'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',

        )
    );

    register_sidebar(
        array(
            'name'          => __('Footer Right', 'alpha'),
            'id'            => 'footer-right',
            'description'   => __('Footer Right Area', 'alpha'),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',

        )
    );
}

add_action("widgets_init", "alpha_sidebar");


function alpha_about_page_banner()
{
    if (is_page()) {
        $page_feat_img = get_the_post_thumbnail_url(null, 'full');
?>
        <style>
            .page-header {
                background-image: url("<?php echo $page_feat_img ?>");
            }
        </style>
        <?php
    }

    if (is_front_page()) {
        if (current_theme_supports('custom-header')) {
        ?>
            <style>
                .header {
                    background-image: url("<?php echo header_image(); ?>");
                    margin-bottom: 50px;
                    background-size: cover;
                    padding: 70px 0;
                }

                .site-title,
                .tagline {
                    color: #<?php echo get_header_textcolor(); ?>
                }
            </style>
<?php
        }
    }
}

add_action('wp_head', 'alpha_about_page_banner', 100);
