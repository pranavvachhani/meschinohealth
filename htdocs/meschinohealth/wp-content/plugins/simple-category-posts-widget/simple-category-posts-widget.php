<?php
/*
  Plugin Name: Simple Category Posts Widget
  Plugin URI: http://www.psdtohtmlcloud.com/simple-category-posts-widget
  Description: Simple Category Posts Widget is simple and easy to use plugin.Lists taxonomy/category posts in widget with options to enable or disable featured image/excerpt, number of posts to display, select taxonomy,select multiple categories, select post type.
  Version: 0.1
  Author: <a href="http://www.psdtohtmlcloud.com/">PSD TO HTML CLOUD</a>
  Author URI: http://www.psdtohtmlcloud.com
  Text Domain: simple-category-posts-widget
  License: GPLv3

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 3 of the License, or
  any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., PSDtoHTMLCloud, 342 Pocket B, Sector 1,Rohini, New Delhi,Delhi 110085

  Copyright 2008-2016  Vaibhav Arora  (email : vaibhav@psdtohtmlcloud.com)
*/

define("SCPW_PLUGIN_SLUG",'simple-category-posts-widget');
define("SCPW_PLUGIN_VERSION", 0.1);
define("SCPW_PLUGIN_URL",plugins_url("",__FILE__ ));#without trailing slash (/)
define("SCPW_PLUGIN_PATH",plugin_dir_path(__FILE__)); #with trailing slash (/)

include_once(SCPW_PLUGIN_PATH.'inc/register-scripts.php');
include_once(SCPW_PLUGIN_PATH.'inc/widget.php');
