<?php
if (!empty($menus)):
    foreach($menus as $menu):
        $li_class = '';
        $a_class = '';
        $dropdown_icon = '';
        if(count($menu->childs)):
            $dropdown_icon = '<i class="bi bi-chevron-down"></i>';
            $li_class = 'dropdown';
            $a_class = 'nav-link scrollto';
        endif;
        ?>
        <li class="<?php echo $li_class; ?>">
            <a class="<?php echo $a_class; ?>" href="<?php echo $menu->url; ?>"><?php echo $menu->title . $dropdown_icon; ?></a>

            <?php if(count($menu->childs)):
                echo includeWithParams(get_template_directory() . '/partials/menu/submenu.php', ['childs' => $menu->childs, 'full_menu' => $headerMenus]);
            endif; ?>
        </li>
    <?php
    endforeach;
else:
    include get_template_directory() . '/partials/menu/static.php';
endif;
?>