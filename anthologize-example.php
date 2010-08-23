<?php

/*
Plugin Name: Anthologize Example Plugin
Plugin URI: http://anthologize.org
Description: A sample plugin for Anthologize
Version: 0.1
Author: Boone Gorges
Author URI: http://teleogistic.net
*/

class Anth_Example {

	function __construct() {
		add_action( 'anthologize_init', array( $this, 'register_format' ) );
	}

	function register_format() {
		
		// Register the format itself
		$name = 'example_format';
		$label = 'My Anthologize Format';
		$loader_file = dirname(__FILE__) . '/base.php';
				
		anthologize_register_format( $name, $label, $loader_file );
		
		
		
		// Register the first option, font-face
		$font_face_name = 'font-face';
		$font_face_label = 'Font Face';
		$font_face_type = 'dropdown';
		$font_face_values = array(
			'courier' => 'Courier',
			'georgia' => 'Georgia',
			'garamond' => 'Garamond'
		);
		$font_face_default = 'georgia';

		anthologize_register_format_option( 'example_format', $font_face_name, $font_face_label, $font_face_type, $font_face_values, $font_face_default );
		
		
		
		// Here's another option, 'website', of type 'textbox', which requires no predetermined values 
		$website_name = 'website';
		$website_label = 'Website';
		$website_type = 'textbox';
		
		anthologize_register_format_option( 'example_format', $website_name, $website_label, $website_type );
		
		
		
			
	}
}
$anth_example = new Anth_Example();

?>