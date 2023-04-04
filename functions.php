<?php
/*Diese Datei ist ein Teil vonhello-elementor-child, hello-elementor child theme.

Alle Funktionen dieser Datei werden vor den Funktionen des Eltern-Themes geladen.
Erfahre mehr unter https://codex.wordpress.org/Child_Themes.

Notiz: Diese Funktion lädt das Stylesheet des Eltern-Themes vor dem Stylesheet des Child-Themes
(Lass es an Ort und Stelle, es sei denn du weißt, was du tust.)
*/

if ( ! function_exists( 'suffice_child_enqueue_child_styles' ) ) {
	function hello_elementor_child_enqueue_child_styles() {
	    // loading parent style
	    wp_register_style(
	      'parente2-style',
	      get_template_directory_uri() . '/style.css'
	    );

	    wp_enqueue_style( 'parente2-style' );
	    // loading child style
	    wp_register_style(
	      'childe2-style',
	      get_stylesheet_directory_uri() . '/style.css'
	    );
	    wp_enqueue_style( 'childe2-style');
	 }
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_child_styles' );

/*Hier kannst du deine eigenen Funktionen schreiben */
