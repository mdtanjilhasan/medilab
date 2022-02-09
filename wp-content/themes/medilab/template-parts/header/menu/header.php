<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto">
            <a href="<?php echo site_url(); ?>">
                <img class="img-fluid" src="<?php echo get_theme_mod('medilab_header_logo'); ?>" alt="Medilab Logo">
            </a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <?php echo includeWithParams(get_template_directory() . '/partials/menu/main_menu.php', ['menus' => $menus, 'headerMenus' => $headerMenus]); ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="#appointment" class="appointment-btn scrollto">
            <span class="d-none d-md-inline">Make an</span> Appointment
        </a>
    </div>
</header>