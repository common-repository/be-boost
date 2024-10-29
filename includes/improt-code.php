<?php
/*
*
* One click demo import fetaures add by this code 
*
*
*/

//One click demo import activation
if (!function_exists('be_boost_import_files')) :
    function be_boost_import_files()
    {
        return array(
            array(
                'import_file_name'             => __('Shop Demo One', 'be-boost'),
                'local_import_file'            => BE_BOOST_DIR . 'includes/demo/shop1/shop1.xml',
                'local_import_widget_file'     => BE_BOOST_DIR . 'includes/demo/shop1/widget.wie',
                'local_import_customizer_file' => BE_BOOST_DIR . 'includes/demo/shop1/options.dat',
                'import_notice'                =>  __('After you import this demo, you will have to setup menu. Go appearance -> menus -> set your menu', 'be-boost'),
                'import_preview_image_url'   => BE_BOOST_ASSETS . 'img/demo/shop-one.jpg',
                'preview_url'          => 'http://beshop.wpcolors.net/free/shop/',
            ),
            array(
                'import_file_name'             => __('Shop Pro Demo One', 'be-boost'),
                'local_import_file'            => '',
                'local_import_widget_file'     => '',
                'local_import_customizer_file' => '',
                'import_preview_image_url'   => BE_BOOST_ASSETS . 'img/pro-demo/shop1.jpg',
                'preview_url'          => 'http://bspro.fullsitediting.com/demo1/',
            ),
            array(
                'import_file_name'             => __('Shop Demo Two', 'be-boost'),
                'local_import_file'            => BE_BOOST_DIR . 'includes/demo/shop2/shop2.xml',
                'local_import_widget_file'     => BE_BOOST_DIR . 'includes/demo/shop2/widgets.wie',
                'local_import_customizer_file' => BE_BOOST_DIR . 'includes/demo/shop2/options.dat',
                'import_notice'                =>  __('After you import this demo, you will have to setup menu. Go appearance -> menus -> set your menu', 'be-boost'),
                'import_preview_image_url'   => BE_BOOST_ASSETS . 'img/demo/shop-two.jpg',
                'preview_url'          => 'http://beshop.wpcolors.net/free/shop-home-two',

            ),
            array(
                'import_file_name'             => __('Shop Pro Demo Two', 'be-boost'),
                'local_import_file'            => '',
                'local_import_widget_file'     => '',
                'local_import_customizer_file' => '',
                'import_preview_image_url'   => BE_BOOST_ASSETS . 'img/pro-demo/shop2.jpg',
                'preview_url'          => 'http://bspro.fullsitediting.com/demo1/shop-home-two/',
            ),
            array(
                'import_file_name'             => __('Blog Demo One', 'be-boost'),
                'local_import_file'            => BE_BOOST_DIR . 'includes/demo/blog1/blog1.xml',
                'local_import_widget_file'     => BE_BOOST_DIR . 'includes/demo/blog1/widgets.wie',
                'local_import_customizer_file' => BE_BOOST_DIR . 'includes/demo/blog1/options.dat',
                'import_notice'                =>  __('After you import this demo, you will have to setup menu. Go appearance -> menus -> set your menu', 'be-boost'),
                'import_preview_image_url'   => BE_BOOST_ASSETS . 'img/demo/blog1.jpg',
                'preview_url'          => 'http://beshop.wpcolors.net/free/',

            ),
            array(
                'import_file_name'             => __('Blog Pro Demo One', 'be-boost'),
                'local_import_file'            => '',
                'local_import_widget_file'     => '',
                'local_import_customizer_file' => '',
                'import_preview_image_url'   => BE_BOOST_ASSETS . 'img/pro-demo/blog1.jpg',
                'preview_url'          => 'http://bspro.fullsitediting.com/demo1/blog-home/',
            ),
            array(
                'import_file_name'             => __('Blog Demo Two', 'be-boost'),
                'local_import_file'            => BE_BOOST_DIR . 'includes/demo/blog2/blog2.xml',
                'local_import_widget_file'     => BE_BOOST_DIR . 'includes/demo/blog2/widgets.wie',
                'local_import_customizer_file' => BE_BOOST_DIR . 'includes/demo/blog2/options.dat',
                'import_notice'                =>  __('After you import this demo, you will have to setup menu. Go appearance -> menus -> set your menu', 'be-boost'),
                'import_preview_image_url'   => BE_BOOST_ASSETS . 'img/demo/blog-two.jpg',
                'preview_url'          => 'http://beshop.wpcolors.net/free/blog-home-two/',

            ),
            array(
                'import_file_name'             => __('Blog Pro Demo Two', 'be-boost'),
                'local_import_file'            => '',
                'local_import_widget_file'     => '',
                'local_import_customizer_file' => '',
                'import_preview_image_url'   => BE_BOOST_ASSETS . 'img/pro-demo/blog2.jpg',
                'preview_url'          => 'http://bspro.fullsitediting.com/demo1/blog-home-two/',
            ),




        );
    }
endif;
add_filter('pt-ocdi/import_files', 'be_boost_import_files');

add_filter('pt-ocdi/disable_pt_branding', '__return_true');

function beboost_add_demo_exlink()
{
    $theme = wp_get_theme();
    $theme_domain = $theme->get('TextDomain');
    if ($theme_domain != 'beshop-pro') {
        echo '<div class="be-boost-probtn" style="text-align:center"><h1> Buy BeShop Pro Now And Unlock All Pro Features!!! <a href="https://wpthemespace.com/product/beshop" target="_blank">Get BeShop Pro Now</a> </h1><a target="_blank" class="button button-danger" href="https://wpthemespace.com/product/beshop/?add-to-cart=2897" style="margin-right:10px">Buy BeShop Pro & Unlock All Features</a></div>';
    }
}

add_action('pt-ocdi/plugin_page_footer', 'beboost_add_demo_exlink');
