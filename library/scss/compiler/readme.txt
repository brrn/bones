=== Wordpress SASS ===
Contributors: blogrescue
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GFVCGSUFKX2CU
Tags: SASS
Requires at least: 3.0
Tested up to: 3.4.2
Stable tag: 3.4.2

This plugin provides automated SASS stylesheet generation.

== Description ==

SASS is a programmable approach to stylesheets which really adds some cool features. It can make a stylesheet easier to read, easier to update and also adds some powerful features like functions, variables and imports. (See http://sass-lang.com/docs/yardoc/file.SASS_REFERENCE.html for more details.)

This plugin enables any Wordpress Theme to use SASS stylesheets.  In a wordpress theme, the comments at the top of style.css are used to define the theme.  For this reason, this plugin will not allow a .sass or .scss file named 'style'.

== Installation ==

1. Install the plugin
2. Add the following to functions.php in your theme and include a wpsass_define_stylesheet call for each stylesheet:

    // SASS/SCSS Stylesheet Definition  
    function generate_css() {  
        if(function_exists('wpsass_define_stylesheet')) {  
            wpsass_define_stylesheet("mystyle.scss");  
        }  
    }  
    add_action( 'after_setup_theme', 'generate_css' );  

3. Create the source .sass or .scss file in your theme directory (i.e. mystyle.sass)
4. Create the target .css as an empty file in your theme directory (i.e. mystyle.css)
5. For obvious reasons, the target file must be writable by wordpress
6. Whenever your source file is updated and has a newer date than the target file, the target will be automatically regenerated.  
7. The plugin will automatically add the target stylesheet to your theme.

== Frequently Asked Questions ==

= It is not working - what is the problem? =

I have no idea.  But, if you add a second parameter to the wpsass_define_stylesheet() call in functions.php:

  wpsass_define_stylesheet("style.scss", true);

Then any errors encountered will be printed as html comments on your site.  That should provide some insight, but they will appear at the top of the page before the opening <html> tag, so only use this feature to determine why style.css fails to update and then turn it back off again.

= What SASS/SCSS Compiler Are You Using? =

The standard compiler is Compass, but that typically requires installation on the server.  To avoid requiring Compass or another haml/sass conversion program to be installed on your server, this plugin uses a PHP based compiler.

The initial release used a project named PHamlP (http://code.google.com/p/phamlp/), but that implementation had some serious flaws and has not been updated since late 2010.  The plugin now uses a very up-to-date implementation named phpsass (https://github.com/richthegeek/phpsass) which looks to be a dramatic improvement.

= What has changed since the last version? =

First, the wpsass_define_stylesheet() function no longer requires the target filename.  It does now require that the source filename has a .sass or .scss extention and the target will automatically be set to the basename with a .css extension.

Second, the plugin now automatically enqueues the target stylesheet (if it exists).
