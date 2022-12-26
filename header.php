<!DOCTYPE html>
<html lang="ru">
    <head itemscope itemtype="http://schema.org/WPHeader">
        <meta charset="<?php bloginfo('charset'); ?>">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />      
        <?php wp_head();?>
        <!-- Yandex.Metrika counter -->
            <script type="text/javascript" >
            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(91825390, "init", {
                    clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
            });
            </script>
            <noscript><div><img src="https://mc.yandex.ru/watch/91825390" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
            <!-- /Yandex.Metrika counter -->
    </head>

    <body>
        <header>      
            <div class="d_flex header_container">
                <div class="header_wrapper container">
                    <div class="logo_img"><?php the_custom_logo() ?></div>
                    <div class="header_phone"><a href="tel:+79381097773" class="header_phone-link">+7 938 109-77-73</a></div>
                    <div class="header_burger">
                        <span></span>
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
            </div>                    
        </header>
    
        <main>