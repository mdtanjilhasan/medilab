<?php
//$menu_class = \MEDILAB_THEME\Inc\Menus::get_instance();
//$menuId = $menu_class->get_menu_id('medilab_main_menu');
//
//function includeWithParams($file, $params = [])
//{
//    $output = NULL;
//    if(file_exists($file)){
//        // Extract the variables to a local namespace
//        extract($params);
//
//        // Start output buffering
//        ob_start();
//
//        // Include the template file
//        include $file;
//
//        // End buffering and return its contents
//        $output = ob_get_clean();
//    }
//    return $output;
//}
//
//$headerMenus = wp_get_nav_menu_items($menuId);
//$menus = $menu_class->get_formated_menus($headerMenus);

?>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto">
            <a href="<?php echo site_url(); ?>">
                <img class="img-fluid" src="<?php echo get_theme_mod('medilab_header_logo'); ?>" alt="Medilab Logo">
            </a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <nav id="navbar" class="navbar order-last order-lg-0">
        <?php
        wp_nav_menu([
            'theme_location' => 'medilab_main_menu',
            'container' => false,
            'menu_class' => '',
            'menu_id' => 'medilab_main_menu',
            'walker' => \MEDILAB_THEME\Inc\Walker_Navigation_Menu::get_instance()
        ]);
        ?>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

<!--        <nav id="navbar" class="navbar order-last order-lg-0">-->
<!--            <ul>-->
<!--            --><?php
//                    //echo includeWithParams(MEDILAB_DIR_PATH . '/template-parts/header/menu/main_menu.php', ['menus' => $menus, 'headerMenus' => $headerMenus]);
//                ?>
<!--            </ul>-->
<!--            <i class="bi bi-list mobile-nav-toggle"></i>-->
<!--        </nav> -->

        <a href="#appointment" class="appointment-btn scrollto">
            <span class="d-none d-md-inline">Make an</span> Appointment
        </a>
    </div>
</header>