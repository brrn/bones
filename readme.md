#Connect Think Wordpress Framework
Ver 1.1

##Updates
1.2 - Improved Compiling Plugin

* Added loop for compiling plugin. Allows for any number of sass files located in the scss directory. The loop skips over files that start with an underscore (_examples.scss) as these are typically partial stylesheets that are imported into a parent file. 
* The sass plugin will also create a matching css file if one does not exist yet.
* The sass plugin properly uses .min.css for compiled and enqueued .scss files

1.1 - Sass Compiling Plugin Update

* Completely rewrote sass compiling plugin in order to include more up to date scssphp. It also shows errors when sass fails to compile.
* Removed Bourbon and replaced with Compass. Includes more options and better support.

- - -

##To Do 


 