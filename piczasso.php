<?php
/*
Plugin Name: PicZasso Image Hosting
Plugin URI: http://www.vievern.com/wordpress_plugins
Description: PicZasso is the photo sharing service where you can easily upload your photos for free. Plugin adds a submenu to wp-admin panel for easy images uploading in PicZasso's service. (http://piczasso.com)
Version: 1.0
Author: Vievern
Author URI: http://vievern.com/
*/

function piczasso_page()
{
$pl = plugin_dir_url( __FILE__ );

?>
<a href="http://www.piczasso.com/"><img src="<?= $pl; ?>logo.png" border="0" width="300" height="69"></a><br>
<iframe name="piczasso" src="<?= $pl; ?>api.php" marginwidth="1" marginheight="1" height="400" width="300" title="PicZasso" scrolling="no" border="0" frameborder="0">
Iframe Error
</iframe><br>
<span style="font-size: 10px; color: #6F942B;">PicZasso is the photo sharing service where you can easily upload your photos for free. <a target="_blank" style="color: #1f3806; text-decoration: none;" href="http://www.piczasso.com/">&copy; 2009-2010 Piczasso</a><br>Plugin for Wordpress (based on PicZasso API) <a target="_blank" style="color: #1f3806; text-decoration: none;" href="http://www.vievern.com/">&copy; 2011 Vievern</a></span>
<?
}


function piczasso_menu ()
{
add_menu_page('PicZasso','PicZasso', 'edit_themes', 'piczasso', 'piczasso_page', plugin_dir_url( __FILE__ ).'ico.png');
}

add_action('admin_menu', 'piczasso_menu');

?>