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
		// Hook your registration and deregistration routines to anthologize_init. That ensures that they'll only run when Anthologize is activated.
		add_action( 'anthologize_init', array( $this, 'register_format' ) );
		
		// It's a good idea to hook the deregister_format() method late in the loading process (eg 999, as you see here) so that your deregistration happens *after* all formats have been registered.
		add_action( 'anthologize_init', array( $this, 'deregister_format' ),999 );
	}

	function register_format() {
		
		// Register a new export format with
		// anthologize_register_format(). The function
		// takes three arguments:
		// - $name is the name used internally by Anthologize 
		//   to refer to the format
		// - $label is the user-facing label that will appear
		//   in the interface
		// - $loader_file is the absolute system path of the
		//   file that will be included when the user exports
		//   to this format.
		// All three arguments are required.
		
		$name = 'example_format';
		$label = 'My Anthologize Format';
		$loader_file = dirname(__FILE__) . '/base.php';
				
		anthologize_register_format( $name, $label, $loader_file );
		
		
		
		// Let's register an option for "My Anthologize Format".
		// The function anthologize_register_format_option takes
		// the following arguments (for the sake of clarity, the
		// variables are namespaced - you can call them whatever
		// you want):
		// - $format_name is the name used internally by Anthologize 
		//   to refer to the *format*. 
		// - $option_name is the name used internally by Anthologize 
		//   to refer to the *option*
		// - $label is the user-facing label that will appear
		//   in the interface for the option
		// - $type is the type of input. Possible values are
		//   'dropdown' and 'textbox' (Optional. Will default to
		//   'textbox' if nothing is provided
		// - $values is an associative array of possible values
		//   for this option. The key is the value name (the value
		//   that will 
		$fontface_format_name = 'example_format';
		$fontface_option_name = 'font-face';
		$fontface_label = 'Font Face';
		$fontface_type = 'dropdown';
		$fontface_values = array(
			'courier' => 'Courier',
			'georgia' => 'Georgia',
			'garamond' => 'Garamond'
		);
		$fontface_default = 'georgia';

		anthologize_register_format_option( $fontface_format_name, $fontface_option_name, $fontface_label, $fontface_type, $fontface_values, $fontface_default );
		
		
		
		// Here's another option, 'website', of type 'textbox', which requires no predetermined values 
		$website_name = 'website';
		$website_label = 'Website';
		$website_type = 'textbox';
		
		anthologize_register_format_option( 'example_format', $website_name, $website_label, $website_type );	
		
		$download_html_name = 'download_html';
		$download_html_label = 'Download HTML?';
		$download_html_type = 'checkbox';
		
		anthologize_register_format_option( 'example_format', $download_html_name, $download_html_label, $download_html_type );
		
	}
	
	// Just for the fun of it, let's deregister some stuff
	function deregister_format() {
		// To deregister an entire format, you only need to specify the internal name of the format
		anthologize_deregister_format( 'tei' );
		
		// If you want to deregister a format option, you'll need to specify both the format name and the option name. In this case, I'm disabling font-face support for PDF.
		anthologize_deregister_format_option( 'pdf', 'font-face' );
	}
}
$anth_example = new Anth_Example();

?>