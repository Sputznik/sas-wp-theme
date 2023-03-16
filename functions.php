<?php

/*  CONSTANTS */
if( !defined( 'SAS_THEME_VERSION' ) ) {
  define( 'SAS_THEME_VERSION', time() );
}

if( !defined( 'SAS_THEME_URI' ) ) {
  define( 'SAS_THEME_URI', get_stylesheet_directory_uri() );
}

// INCLUDE FILES
$inc_files = array(
  'lib/class-sas-theme.php'
);

foreach( $inc_files as $inc_file ){ require_once( $inc_file ); }
