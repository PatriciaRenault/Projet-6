<?php

    function theme_enqueue_styles(){
        // Chargement du style.css du thème parent OceanWP
        wp_enqueue_style('parent-style', get_template_directory_uri() .'/style.css');
        wp_enqueue_style('theme-style', get_stylesheet_directory_uri() .'/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
    }    
    // Action qui permet de charger des scripts dans notre thème    
    add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
?>
 <?php

/************Hook Admin*************/
add_filter( 'wp_nav_menu_items', 'ajout_lien_admin', 10, 2 );
function ajout_lien_admin( $items, $args ) {
    // si admin est loggé 
    if ( is_user_logged_in() ) {
        //définition du lien admin
        $admin_link = '<li><a href="' . admin_url() . '">Admin</a></li>';
    
        // position du lien "Nous rencontrer" 
        $position = strpos( $items, 'Nous rencontrer' );

        // Met le lien "Admin" après le lien "Nous rencontrer"
        $items = substr_replace( $items, $admin_link, $position 
        + strlen('Nous rencontrer'), 0 );
    }
    return $items;
}


