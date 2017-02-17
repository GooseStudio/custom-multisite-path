=== Custom Multisite Paths ===
Contributors: andreasnrb,goosestudio
Tags: multisite, folders, subfolder
Requires at least: 4.7.2
Tested up to: 4.7.2
Stable tag: trunk
License: GPLv2.0
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.txt

This is a (MU-)plugin that fixes the paths for when you have WordPress in a subfolder and want MultiSite.


== Description ==
This is a (MU-)plugin that fixes the paths for when you have WordPress in a subfolder and want MultiSite.

Plugin by default assumes that you have WordPress in a folder called \'/wp/\'.
So you have
* /srv/www/website/index.php
* /srv/www/website/wp

To override the default folder add define(\'CMSP_WP_PATH\', \'/some/path/from/root/\')-

== Installation ==
Add the custom-multisite-path.php file to the mu-plugins folder or install as ordinary plugin and network activate it.

== Changelog ==
1.0 Added existing code.