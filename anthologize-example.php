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
				
		$name = 'example_format';
		$label = 'My Anthologize Format';
		$loader_file = dirname(__FILE__) . '/base.php';
		
		$font_faces = array(
			'label' => 'Font Face',
			'values' => array(
				'courier' => 'Courier',
				'georgia' => 'Georgia',
				'garamond' => 'Garamond'
			),
			'default' => 'georgia'
		);
		
		$margins = array(
			'label' => 'Margins',
			'values' => array(
				'.25' => '.25in',
				'.50' => '.50in',
				'.75' => '.75in',
				'1' => '1.0in'
			),
			'default' => '.50'
		);
		
		$website = array(
			'label' => 'Website',
			'type' => 'textbox'
		);
			
		$options = array(
			'page-size' => false,
			'font-size' => false,
			'font-face' => $font_faces,
			'margins' => $margins,
			'website' => $website
		);
				
		anthologize_register_format( $name, $label, $loader_file, $options );
	}
}
$anth_example = new Anth_Example();

?>