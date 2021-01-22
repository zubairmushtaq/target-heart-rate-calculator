<?php
/**
 * Plugin Name: Target Heart Rate Calculator
 * Description: An awesome target heart rate calculator shortcode plugin.
 * Plugin URI: http://www.aliammaryasir.com/target-heart-rate/
 * Author: Zubair Mushtaq
 * Author URI: https://www.facebook.com/zubairmushtaaq
 * Version: 1.0
 * License: GPL2
 *
 */
 
/**
 * Copyright (c) 2015 | rayhan095@gmail.com | All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */
 
add_action('wp_enqueue_scripts', 'thr_hooks_stylesheet');

function thr_hooks_stylesheet() {
	 	
	
	wp_enqueue_script('jquery');		
	
	//----------------------------------------------
	//	Include  javascript file
	//----------------------------------------------	
	wp_enqueue_script( 'target-heart-rate', plugin_dir_url( __FILE__ ) . ('core.js'), array('jquery'),'',false);
	wp_enqueue_style('thr-style-css',plugins_url('style.css', __FILE__ ), array(), null, 'all' );		

}


function thr_display_html(){

	ob_start();
	?>
    <form id="formTargetHeartRate">
        <label>Age:</label>
        <input type="text" name="age" />
        <input type="submit" value="Submit" />
    </form>
    <div id="calculatedThr"></div>
    
    <?php
	
	$output = ob_get_contents();
	
	ob_end_clean();
	
	return $output; 

}

add_shortcode('target-heart-rates','thr_display_html');
