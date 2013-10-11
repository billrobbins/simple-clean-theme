<?php
 
/**
 * Loads our Google Fonts
 *
 *
 * @package WordPress
 * @subpackage Simple
 * @since 1.0.0
 *
 *
 */

function options_typography_get_os_fonts() {
	// OS Font Defaults
	$os_faces = array(
		'Arial, sans-serif' => 'Arial',
		'"Avant Garde", sans-serif' => 'Avant Garde',
		'Cambria, Georgia, serif' => 'Cambria',
		'Copse, sans-serif' => 'Copse',
		'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',
		'Georgia, serif' => 'Georgia',
		'"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
		'Tahoma, Geneva, sans-serif' => 'Tahoma'
	);
	return $os_faces;
}

/**
 * Returns a select list of Google fonts
 * Feel free to edit this, update the fallbacks, etc.
 */

function options_typography_get_google_fonts() {
	// Google Font Defaults
	$google_faces = array(
		'ABeeZee, sans-serif' => 'ABeeZee',
		'Abril Fatface, serif' => 'Abril Fatface',
		'Alegreya, serif' => 'Alegreya',
		'Amatic SC, sans-serif' => 'Amatic SC',
		'Archivo Narrow, sans-serif' => 'Archivo Narrow',
		'Arvo, serif' => 'Arvo',
		'Bitter, sans-serif' => 'Bitter',
		'Boogaloo, sans-serif' => 'Boogaloo',
		'Bubblegum Sans, cursive' => 'Bubblegum Sans',
		'Cabin, sans-serif' => 'Cabin',
		'Cookie, cursive' => 'Cookie',
		'Copse, sans-serif' => 'Copse',
		'Cutive, serif' => 'Cutive',
		'Domine, serif' => 'Domine',
		'Droid Sans, sans-serif' => 'Droid Sans',
		'Droid Serif, serif' => 'Droid Serif',
		'Economica, sans-serif' => 'Economica',
		'Exo, sans-serif' => 'Exo',
		'Fjalla One, sans-serif' => 'Fjalla One',
		'Federo, sans-serif' => 'Federo',
		'Gabriela, serif' => 'Gabriela',
		'Gentium Book Basic, serif' => 'Gentium Book Basic',
		'Grand Hotel, cursive' => 'Grand Hotel',
		'Gudea, sans-serif' => 'Gudea',
		'Homenaje, sans-serif' => 'Homenaje',
		'Josefin Slab, sans-serif' => 'Josefin Slab',
		'Lato, sans-serif' => 'Lato',
		'Libre Baskerville, serif' => 'Libre Baskerville',
		'Lobster, cursive' => 'Lobster',
		'Lora, serif' => 'Lora',
		'Merriweather, sans-serif' => 'Merriweather',
		'Monda, sans-serif' => 'Monda',
		'Montserrat, sans-serif' => 'Montserrat',
		'Mouse Memoirs, sans-serif' => 'Mouse Memoirs',
		'Nobile, sans-serif' => 'Nobile',
		'Offside, cursive' => 'Offside',
		'Old Standard TT, serif' => 'Old Standard',
		'Open Sans, sans-serif' => 'Open Sans',
		'Oswald, sans-serif' => 'Oswald',
		'Pacifico, cursive' => 'Pacifico',
		'Patrick Hand SC, cursive' => 'Patrick Hand SC',
		'Playfair Display, sans-serif' => 'Playfair',
		'Poly, serif' => 'Poly',
		'PT Sans, sans-serif' => 'PT Sans',
		'PT Serif, serif' => 'PT Serif',
		'Quattrocento, serif' => 'Quattrocento',
		'Quicksand, sans-serif' => 'Quicksand',
		'Raleway, cursive' => 'Raleway',
		'Rancho, cursive' => 'Rancho',
		'Rambla, serif' => 'Rambla',
		'Rochester, cursive' => 'Rochester',
		'Roboto, sans-serif' => 'Roboto',
		'Rouge Script, cursive' => 'Rouge Script',
		'Rokkitt, serif' => 'Rokkit',
		'Sacramento, cursive' => 'Sacramento',
		'Sanchez, serif' => 'Sanchez',
		'Satisfy, cursive' => 'Satisfy',
		'Shadows Into Light Two, cursive' => 'Shadows Into Light Two',
		'Sintony, sans-serif' => 'Sintony',
		'Sofia, cursive' => 'Sofia',
		'Source Sans Pro, sans-serif' => 'Source Sans',
		'Sue Ellen Francisco, cursive' => 'Sue Ellen Francisco',
		'Titillium Web, sans-serif' => 'Titillium Web',
		'Ubuntu, sans-serif' => 'Ubuntu',
		'Varela, sans-serif' => 'Varela',
		'Vollkorn, serif' => 'Vollkorn',
		'Wire One, sans-serif' => 'Wire One',
		'Yanone Kaffeesatz, sans-serif' => 'Yanone Kaffeesatz'
	);
	return $google_faces;
}


/* 
 * Returns a typography option in a format that can be outputted as inline CSS
 */
 
function options_typography_font_styles($option, $selectors) {
		$output = $selectors . ' {';
		$output .= 'font-family:' . $option['face'] . '; ';
		$output .= 'font-weight:' . $option['style'] . '; ';
		$output .= 'font-size:' . $option['size'] . '; ';
		$output .= '}';
		$output .= "\n";
		return $output;
}

/**
 * Checks font options to see if a Google font is selected.
 * If so, options_typography_enqueue_google_font is called to enqueue the font.
 * Ensures that each Google font is only enqueued once.
 */
 
if ( !function_exists( 'options_typography_google_fonts' ) ) {
	function options_typography_google_fonts() {
		$all_google_fonts = array_keys( options_typography_get_google_fonts() );
		// Define all the options that possibly have a unique Google font
		$site_title_font = of_get_option('site_title_font', 'Open Sans, sans-serif');
		$headings = of_get_option('heading_font', false);
		$navigation = of_get_option('navigation', false);
		$body_font = of_get_option('body_font', false);
		$widget_title_font = of_get_option('widget_title_font', false);
		// Get the font face for each option and put it in an array
		$selected_fonts = array(
			$site_title_font['face'],
			$headings['face'],
			$navigation['face'],
			$body_font['face'],
			$widget_title_font['face'] );
		// Remove any duplicates in the list
		$selected_fonts = array_unique($selected_fonts);
		// Check each of the unique fonts against the defined Google fonts
		// If it is a Google font, go ahead and call the function to enqueue it
		foreach ( $selected_fonts as $font ) {
			if ( in_array( $font, $all_google_fonts ) ) {
				options_typography_enqueue_google_font($font);
			}
		}
	}
}

add_action( 'wp_enqueue_scripts', 'options_typography_google_fonts' );

/**
 * Enqueues the Google $font that is passed
 */
 
function options_typography_enqueue_google_font($font) {
	
	if ( !of_get_option( 'disable_fonts' ) ) {
	
		$font = explode(',', $font);
		$font = $font[0];
		// Certain Google fonts need slight tweaks in order to load properly
		// Like our friend "Raleway"
		if ( $font == 'Raleway' )
			$font = 'Raleway:100';
		$font = str_replace(" ", "+", $font);
		wp_enqueue_style( "options_typography_$font", "http://fonts.googleapis.com/css?family=$font", false, null, 'all' );
	
	}
}