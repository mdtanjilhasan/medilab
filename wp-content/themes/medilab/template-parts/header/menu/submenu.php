<?php if (!empty($childs)): ?>
<ul>
    <?php
    foreach($childs as $child):
        $childrens = getChildMenus($full_menu, $child->ID);
        $child->childs = $childrens;
    ?>

    <li <?php if(!empty($child->childs)): echo 'class="dropdown"'; endif; ?>>
        <a href="<?php echo $child->url; ?>">
            <?php echo $child->title; ?> <?php if(!empty($child->childs)): echo '<i class="bi bi-chevron-right"></i>'; endif; ?>
        </a>

        <?php if(!empty($child->childs)):
            echo includeWithParams(get_template_directory() . '/partials/menu/submenu.php', ['childs' => $child->childs, 'full_menu' => $full_menu]);
        endif; ?>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>