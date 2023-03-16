<?php

/**
 * BOOTSTRAPS THEME SPECIFIC FUNCTIONALITIES
 */
class SAS_THEME {

  private $sidebars;

  public function __construct() {

    $this->sidebars = array(
      'sas-single-post-sidebar'	=> array(
        'name' 				=> __( 'Single Post Sidebar', 'story-beings-theme' ),
        'description' => __( 'Appears in the right column of the single post above related posts', 'sas-wp-theme' )
      )
    );

    add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );  // LOAD ASSETS

    add_action( 'widgets_init', array( $this, 'widgets_init' ) );  // INITIALIZE ALL THE WIDGETS IN THE SIDEBAR

    add_filter( 'excerpt_length', function( $length ){ return 20; } );  // EXCERPT LENGTH

    add_filter( 'excerpt_more', function( $more ){ return '&hellip;'; } );  // EXCERPT MORE

  }

  function assets() {

    // ENQUEUE STYLES
    wp_enqueue_style('sas-core-css', SAS_THEME_URI.'/assets/css/main.css', array('sp-core-style'), SAS_THEME_VERSION );

  }

  function widgets_init() {
    foreach( $this->sidebars as $id => $sidebar ) {
      $sidebar['id'] = $id;
      $this->register_sidebar( $sidebar );
    }
  }

  function register_sidebar( $sidebar ) {
    register_sidebar( array(
      'name' 			    => $sidebar['name'],
      'id' 			      => $sidebar['id'],
      'description' 	=> $sidebar['description'],
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' 	=> "</aside>",
      'before_title' 	=> '<h3>',
      'after_title' 	=> '</h3>'
    ) );
  }

}

new SAS_THEME;
