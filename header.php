<!DOCTYPE html>
<html lang="ru">
    <head itemscope itemtype="http://schema.org/WPHeader">
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />      
        
        <?php wp_head();?>
    </head>

    <body>
        <header>      
            <div class="d_flex container header_container">
                <div class="logo_img"><?php the_custom_logo() ?></div>
                <div class="header__burger">
                    <i aria-hidden="true" class="fas fa-bars"></i>
                </div>
                <?php
                    $args = array(
                        'container'       => 'nav',          
                        'container_class' => 'header_menu menu',           
                        'menu_class'      => 'menu_list',          
                        'fallback_cb'     => 'wp_page_menu',            
                        'link_class'     => 'menu_link',           
                        'theme_location'  => 'main_menu',
                        'add_li_class'    => 'menu_item',
                        'container_atts'  => array(
                            'role'      => 'navigation',
                            'itemscope' => '',
                            'itemtype'  => 'http://schema.org/SiteNavigationElement',
                        ),     
                        'items_wrap'  => '<ul itemprop="about" itemscope="" itemtype="http://schema.org/ItemList" id="%1$s" class="%2$s">%3$s</ul>',
                        'echo'          => false,               
                    );
                    $temp_menu = wp_nav_menu($args);
                    $temp_menu = str_replace('<a', '<a itemprop="url" ', $temp_menu);
                    $temp_menu = str_replace('<li', '<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ItemList" ', $temp_menu);
                    $temp_menu = str_replace('<ul class="sub-menu"', '<ul class="sub-menu" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ItemList"', $temp_menu);
                    preg_match_all("~<a (.*?)>(.*)</a>~", $temp_menu, $matches);
                    foreach($matches[0] as $value){
                        if(strpos($value, "<span") === false){
                            $temp_value = preg_replace("~<a (.*?)>(.*)</a>~", "<a $1><span itemprop='name'>$2</span></a>", $value);
                            $temp_menu = str_replace($value, $temp_value, $temp_menu);
                        }else{
                            $temp_value = str_replace("<span", "<span itemprop='name'", $value);
                            $temp_menu = str_replace($value, $temp_value, $temp_menu);
                        }
                    }
                    echo $temp_menu;
                ?>
            </div>      
                                        
        </header>
    
        <main>