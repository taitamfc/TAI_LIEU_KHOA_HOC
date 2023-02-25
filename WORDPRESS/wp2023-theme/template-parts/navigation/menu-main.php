<nav class="header__menu">
    <?php
    wp_nav_menu([
        'theme_location' => 'primary',
        'menu_class'     => 'menu-wrapper',
        'container_class' => 'header__menu',
        'container'       => true,
        'items_wrap'      => '<ul class="%2$s" id="primary-menu-ul">%3$s</ul>',
        'fallback_cb'     => false    
    ]);
    ?>
</nav>