<?php
/**
 * @package WPSASS
 */
/*
Plugin Name: Wordpress SASS
Plugin URI: http://trioniclabs.com/2011/12/sass-for-wordpress/
Description: This plugin provides automated SASS stylesheet generation
Version: 3.3.05
Author: Ed Burns
Author URI: http://trioniclabs.com
License: New BSD License (http://www.opensource.org/licenses/bsd-license.php)
*/

/* This plugin has been updated by Adam Patarino @ Connect Think
*  Changes include 
*     *added WPSASS_TARGET_DIR and editing WP_SS_DIR
*     *Updated functions to reflect different directors for source and target
*     *Moved the target enqueuing to admin.php
*/

define('WPSASS_VERSION', '3.3.05');
define('WPSASS_PLUGIN_DIR', dirname( __FILE__ ).DIRECTORY_SEPARATOR);
define('WPSASS_SS_DIR', get_stylesheet_directory().DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR.'scss'.DIRECTORY_SEPARATOR);
define('WPSASS_TARGET_DIR', get_stylesheet_directory().DIRECTORY_SEPARATOR.'library'.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR);
$wpsass_debug = false;

function wpsass_define_stylesheet($stylesheet, $debug = false) {
  global $wpsass_debug;
  $wpsass_debug = $debug;

  if(!wpsass_validate_stylesheet($stylesheet)) return;

  $info = pathinfo($stylesheet);
  $target = preg_replace("/\.".$info["extension"]."$/", ".css", $stylesheet);

  if(wpsass_needs_update($stylesheet, $target)) {
    wpsass_update_stylesheet($stylesheet, $target);
  }

  if(file_exists(WPSASS_TARGET_DIR.$target)) {
    wpsass_enqueue_stylesheet($target);
  }
 
}

function wpsass_validate_stylesheet($filename) {
  global $wpsass_debug;
  $is_valid = true;

  $info = pathinfo(WPSASS_SS_DIR.$filename);
  if($info['filename'] == 'style') {
    if($wpsass_debug) wpsass_report_error("Invalid Stylesheet: $filename",
      "Stylesheet cannot be named 'style'");
    $is_valid = false;
  }

  if($info['extension'] != 'sass' && $info['extension'] != 'scss') {
    if($wpsass_debug) wpsass_report_error("Invalid Stylesheet: $filename",
      "Stylesheet extension must be .sass or .scss");
    $is_valid = false;
  }

  if(!file_exists(WPSASS_SS_DIR.$filename)) {
    if($wpsass_debug) wpsass_report_error("wpsass_define_stylesheet()",
      "Stylesheet '$filename' Does Not Exist");
    $is_valid = false;
  }

  return $is_valid;
}

function wpsass_needs_update($source, $target) {
  if(!file_exists(WPSASS_TARGET_DIR.$target)) return(true);

  $source_date = filemtime(WPSASS_SS_DIR.$source);
  $target_date = filemtime(WPSASS_TARGET_DIR.$target);

  return($source_date > $target_date);
}

function wpsass_update_stylesheet($source, $target) {
  global $wpsass_debug;
  $source_file = WPSASS_SS_DIR.$source;
  $target_file = WPSASS_TARGET_DIR.$target;

  try {
    include_once(WPSASS_PLUGIN_DIR."phpsass/SassParser.php");
    $sass_parser = new SassParser(array('cache'=>false, 'style' => 'nested'));
    $css = $sass_parser->toCss($source_file);
    
    if(is_writable($target_file)) {
      $fh = fopen($target_file, 'w');
      if($fh) {
        fwrite($fh, "/* DO NOT EDIT - ".
          " AUTOMATICALLY GENERATED FROM: ".
          basename($source_file)." */\n"
        );
        fwrite($fh, $css);
        fclose($fh);
      } else {
        if($wpsass_debug) wpsass_report_error(
          "Error Writing CSS File $target_file",
          error_get_last()->message 
        );
      }
    } else if($wpsass_debug) {
      wpsass_report_error(
        "Cannot Update CSS File $target_file",
        "File does not have write permissions"
      );
    }
  } catch (Exception $e) {
    if($wpsass_debug) {
      wpsass_report_error(
        "Error Parsing SASS File $sass",
        $e->getMessage() 
      );
    } 
  }
}



function wpsass_enqueue_stylesheet($stylesheet) {
  $info = pathinfo($stylesheet);
  $uri = get_stylesheet_directory_uri() . '/library/css/'.$stylesheet;
 
  wp_register_style(
    'wpsass_'.$info['filename'], 
    $uri
  );
  wp_enqueue_style('wpsass_'.$info['filename']);
 
}

function wpsass_report_error($error, $message) {

  print "<!--\n WPSASS ERROR - $error\n";
  print "  $message\n-->\n";
}


?>
