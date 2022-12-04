        </main>
        <footer>
            <div class="container footer_container">
                <?php
                    $args = array(
                    'container'       => 'nav',          
                    'container_class' => 'footer_menu menu',           
                    'menu_class'      => 'menu_list',          
                    'fallback_cb'     => 'wp_page_menu',            
                    'link_class'     => 'menu_link',           
                    'theme_location'  => 'footer_menu',
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
                    preg_match_all("~<a (.*?)>(.*)</a>~", $temp_menu, $matchesz);
                    foreach($matchesz[0] as $value){
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
        </footer>    
    </body>
</html>

<?php wp_footer(); ?>