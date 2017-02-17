# Custom Multisite Path
This is a (MU-)plugin that fixes the paths for when you have WordPress in a subfolder and want MultiSite.

Plugin by default assumes that you have WordPress in a folder called '/wp/'.
So you have 
* /srv/www/website/index.php
* /srv/www/website/wp

To override the default folder add define('CMSP_WP_PATH', '/some/path/from/root/')-