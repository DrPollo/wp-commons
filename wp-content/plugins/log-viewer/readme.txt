=== Log Viewer ===
Tags: debug, log, advanced, admin, development
Contributors: mfisc
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CDNHTJWQEP5S2
Tested up to: 3.7.1
Requires at least: 3.4
Stable Tag: 13.11.09
Latest Version: 13.11.09-1728
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin provides an easy way to view *.log files directly in the admin panel.

== Description ==

**Currently i'm completely rewriting the plugin for better usage in MU installations! ( mfisc / Nov. 9th, 2013 )**

This plugin provides an easy way to view any *.log files directly in admin panel. Also you can perform simple actions like empty the file or deleting it. The plugin is recommended to use only in development.

To activate Wordpress logging to file you have to set `define( 'WP_DEBUG_LOG', true );` in your wp-config.php file.

If you're experiencing problems please report through support forum or check FAQ section. If you have suggestions feel free to submit your view.
Log-Viewer is also listed on the excellent [Developer Plugin](http://wordpress.org/extend/plugins/developer/ "WordPress Developer Plugin") which comes directly by the awesome guys at Automattic!

**Known limitations:**

* Autorefresh is currently fixed at 15 seconds if enabled - will let you choose custom timing soon
* Options not really well placed - have to have a look at solutions of other plugins

**ToDo:**

* handling files in MU installations
* catching some not set requirements
* adding in-code documentation
* Translations ( DE )

== Changelog ==

= 13.11.09 =
* moved to PhpStorm for development
* changed build script to Phing
* started complete rewrite for MU optimizations

= 13.6.25 =
* changed version string for better readability

= 2013.05.19 =
* added Display Options above file list
* added Autorefresh Option ( currently fixed at every 15 seconds )
* added FIFO / FILO Option ( FIFO = displays file as is; FILO = displays file reversed )

= 2013.04.02 =
* moved from sublime text to netbeans for development
* modified structure for standard compliance ( Support Topic by nickdaugherty )

= 2012.10.06 =
* added more files ( currently only WP_CONTENT_DIR and *.log )
* added file info
* started revamp of class structure

= 2012.10.01 =
* check if file is writeable; if not cancel actions / display message
* adjusting wp-plugin contents

= 2012.09.30 =
* initial Wordpress.org Plugins commit
* restructured for svn and wp-plugins hosting
* solved problems with wp-plugins site

= 2012.09.29 =
* submit for Wordpress.org approvement


== Installation ==

1. Upload to your plugins folder, usually found at 'wp-content/plugins/'
2. Activate the plugin on the plugins screen
3. Navigate to Tools ... Log Viewer to show and view log files
4. You may want to activate WP logging setting WP_DEBUG_LOG to TRUE in your wp-config.php file

== Frequently Asked Questions ==

= How to enable debug.log =
Simply add `define( 'WP_DEBUG_LOG', true );` in your wp-config.php file.

= I changed my error_log to something other than WP default =
That's ok ... as long as the file extension is .log and it's located in WP_CONTENT_DIR. Other sources or extensions aren't supported for now.

= Can i show other files? =
Yes you can! As long as they are located in WP_CONTENT_DIR and have a .log extension. Other sources or extensions aren't supported for now.

= In Files View i only get the error message "Could not load file." or "No files found." =
It looks like there isn't a *.log file in WP_CONTENT_DIR. Wich could mean there are no errors. Yay!
If there are files, it could be that they are not readable ( check your permissions ) or it's a bug ... Booo!

= I don't see File Actions options =
The options are only displayed if the file is writeable. Check your permissions.

== Upgrade Notice ==

= None yet.

== Screenshots ==

1. Screenshot shows the file view screen ( with MP6 )
2. Screenshot shows the file view screen
