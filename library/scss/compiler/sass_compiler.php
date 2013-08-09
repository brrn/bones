<?php
/* Sass Compiler 1.0 */

// Define Directories
$input_dir = get_stylesheet_directory().'/library/scss';
$output_dir = get_stylesheet_directory().'/library/css';

// Define Files
$input_file = $input_dir.'/theme.scss';
$output_file = $output_dir.'/theme.css';

// Setup
require_once __DIR__ . "/scssphp/scss.inc.php";
$scss = new scssc();
$scss->setFormatter('scss_formatter_compressed');
$scss->setImportPaths($input_dir);

// Error Handling
function myException($exception) {
  echo "<strong>Sass Syntax Error:</strong> " , $exception->getMessage();
}
set_exception_handler('myException');

// Compile
$css = $scss->compile(file_get_contents($input_file));
if ($css != file_get_contents($output_file)) { 
  try {
    $css = $scss->compile(file_get_contents($input_file));
    file_put_contents($output_file, $css);
  } catch (Exception $e) {}
  enqueue_file();
}

// Enqueue
function enqueue_file() {
  $uri = get_template_directory_uri().'/library/css/theme.css';
  $deps = array('bones-stylesheet');
 wp_register_style(
    'theme_style', 
    $uri,
    $deps
  );
  wp_enqueue_style('theme_style');
}

?>
