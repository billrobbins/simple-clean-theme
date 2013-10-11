<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	$optionsframework_settings = get_option('optionsframework');
	
	// Edit 'options-theme-customizer' and set your own theme name instead
	$optionsframework_settings['id'] = 'simple';
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Graphic logo or dynamic text
		$logo_type = array(
			"text" => __( 'Text', 'organizedthemes' ),
			"image" => __( 'Image', 'organizedthemes' )
		);
	
	// Yes or No
		$yes = array(
			"yes" => __( 'Yes', 'organizedthemes' ),
			"no" => __( 'No', 'organizedthemes' )
		);
	
	// True or False
		$tf = array(
			"true" => __( 'Yes', 'organizedthemes' ),
			"false" => __( 'No', 'organizedthemes' )
		);
		
	// excerpt or full content
		$content_type = array(
			"excerpt" => __( 'Excerpt', 'organizedthemes' ),
			"content" => __( 'Full Content', 'organizedthemes' )
			);
		
		
	$options = array();
		
	$options[] = array( "name" => __( 'Header', 'organizedthemes' ),
						"type" => "heading");
						
	$options['header_blog_title'] = array( "name" => __( 'Text or Graphic Logo', 'organizedthemes' ),
						"desc" => __( 'Choose between a graphic logo or the site title.', 'organizedthemes' ),
						"id" => "header_blog_title",
						"std" => "Text",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $logo_type);
	
	$options['logo'] = array( "name" => __( 'Upload Logo', 'organizedthemes' ),
						"desc" => __( 'Upload a graphic logo here.', 'organizedthemes' ),
						"id" => "logo",
						"type" => "upload");
	
	$options['site_title_font'] = array( 'name' => __( 'Text Logo Font', 'organizedthemes' ),
						'desc' => __( 'Choose the type for your text logo.', 'organizedthemes' ),
						'id' => 'site_title_font',
						'std' => array( 'size' => '50px', 'face' => 'Open Sans, sans-serif', 'color' => '#ffffff'),
						'type' => 'typography',
						'options' => array(
							'faces' => options_typography_get_google_fonts(),
							'styles' => false,
							'color' => false )
						);
						
	$options['logo_color'] = array( "name" => __( 'Text Logo Color', 'organizedthemes' ),
						"desc" => __( 'The color of a text based logo.', 'organizedthemes' ),
						"id" => "logo_color",
						"std" => "",
						"type" => "color");
	
	$options['logo_color_hover'] = array( "name" => __( 'Text Logo Hover Color', 'organizedthemes' ),
						"desc" => __( 'The color of a text based logo while hovering.', 'organizedthemes' ),
						"id" => "logo_color_hover",
						"std" => "",
						"type" => "color");
	
	$options['navigation_font'] = array( 'name' => __( 'Navigation Item Font', 'organizedthemes' ),
						'desc' => __( 'Sets the type for your navigation menu.', 'organizedthemes' ),
						'id' => 'navigation_font',
						'std' => array( 'size' => '20px', 'face' => 'Raleway, cursive', 'color' => '#ffffff'),
						'type' => 'typography',
						'options' => array(
							'faces' => options_typography_get_google_fonts(),
							'styles' => false,
							'color' => false )
						);
	
	$options['navigation_background_color'] = array( "name" => __( 'Navigation Bar Background Color', 'organizedthemes' ),
						"desc" => __( 'Sets the background color for navigation bar.', 'organizedthemes' ),
						"id" => "navigation_background_color",
						"std" => "",
						"type" => "color");
						
	
	$options['navigation_link_color'] = array( "name" => __( 'Navigation Link Color', 'organizedthemes' ),
						"desc" => __( 'Sets the link color for navigation bar.', 'organizedthemes' ),
						"id" => "navigation_link_color",
						"std" => "",
						"type" => "color");
	
	$options['navigation_link_color_hover'] = array( "name" => __( 'Navigation Link Hover', 'organizedthemes' ),
						"desc" => __( 'Sets the link color for navigation bar while hovering.', 'organizedthemes' ),
						"id" => "navigation_link_color_hover",
						"std" => "",
						"type" => "color");
	
	$options['navigation_link_color_hover_background'] = array( "name" => __( 'Navigation Link Hover Background', 'organizedthemes' ),
						"desc" => __( 'Sets the background link color for navigation bar while hovering.', 'organizedthemes' ),
						"id" => "navigation_link_color_hover_background",
						"std" => "",
						"type" => "color");

	
	$options[] = array( "name" => __( 'Favicon', 'organizedthemes' ),
						"desc" => __( 'Upload a favicon (small icon that sits beside your websites address in a browser navigation bar here.', 'organizedthemes' ),
						"id" => "favicon",
						"std" => "",
						"type" => "upload");

	
	$options[] = array( "name" => __( 'Mobile Navigation Label', 'organizedthemes' ),
						"desc" => __( 'Sets the text for the mobile navigation menu', 'organizedthemes' ),
						"id" => "mobile_navigation_name",
						"std" => "Navigation",
						"type" => "text");



$options[] = array( "name" => __( 'Content', 'organizedthemes' ),
					"type" => "heading");

	$options['content_excerpt'] = array( "name" => __( 'Excerpt Or Full Content', 'organizedthemes' ),
						"desc" => __( 'You can choose to display your full post content or only an excerpt on archive pages.', 'organizedthemes' ),
						"id" => "content_excerpt",
						"std" => "yes",
						"type" => "select",
						"class" => "mini",
						"options" => $content_type);
	
	$options['body_font'] = array( 'name' => __( 'Body Font', 'organizedthemes' ),
						'desc' => __( 'This is used for the main conent and widgets.', 'organizedthemes' ),
						'id' => 'body_font',
						'std' => array( 'size' => '15px', 'face' => 'Open Sans, sans-serif', 'color' => '#000000'),
						'type' => 'typography',
						'options' => array(
							'faces' => options_typography_get_google_fonts(),
							'styles' => false,
							'color' => false )
						);
	
	$options['link_color'] = array( "name" => __( 'Link Color', 'organizedthemes' ),
						"desc" => __( 'Sets the default color for links.', 'organizedthemes' ),
						"id" => "link_color",
						"std" => "",
						"type" => "color");	
	
	$options['link_color_hover'] = array( "name" => __( 'Link Hover Color', 'organizedthemes' ),
						"desc" => __( 'Sets the hover state color for links.', 'organizedthemes' ),
						"id" => "link_color_hover",
						"std" => "",
						"type" => "color");
		
	$options['content_text'] = array( "name" => __( 'Text Color', 'organizedthemes' ),
						"desc" => __( 'The color of your main text', 'organizedthemes' ),
						"id" => "content_text",
						"std" => "",
						"type" => "color");	
	
	$options['content_background'] = array( "name" => __( 'Content Background Color', 'organizedthemes' ),
						"desc" => __( 'The background color of the main content area.', 'organizedthemes' ),
						"id" => "content_background",
						"std" => "",
						"type" => "color");	
	
	$options['heading_font'] = array( 'name' => __( 'Heading Font', 'organizedthemes' ),
						'desc' => __( 'Choose a font for your page titles and other headings (h1, h2, h3, h4, h5, h6)', 'organizedthemes' ),
						'id' => 'heading_font',
						'std' => array( 'size' => '24px', 'face' => 'Raleway, cursive', 'color' => '#000000'),
						'type' => 'typography',
						'options' => array(
							'faces' => options_typography_get_google_fonts(),
							'styles' => false,
							'sizes' => false,
							'color' => false )
						);
	
	$options['heading_color'] = array( "name" => __( 'Heading Color', 'organizedthemes' ),
						"desc" => __( 'The color of your headings', 'organizedthemes' ),
						"id" => "heading_color",
						"std" => "",
						"type" => "color");	

$options[] = array( "name" => __( 'Footer', 'organizedthemes' ),
					"type" => "heading");

						
	$options['footer_text'] = array( "name" => __( 'Custom Footer Text', 'organizedthemes' ),
						"desc" => __( 'The text you enter here will be displayed in the footer.', 'organizedthemes' ),
						"id" => "footer_text",
						"std" => "",
						"type" => "text");
	
	$options['footer_color'] = array( "name" => __( 'Footer Text Color', 'organizedthemes' ),
						"desc" => __( 'The color the text in your footer.', 'organizedthemes' ),
						"id" => "footer_color",
						"std" => "",
						"type" => "color");
						
	
	$options['footer_background'] = array( "name" => __( 'Footer background Color', 'organizedthemes' ),
						"desc" => __( 'The background color the text in your footer.', 'organizedthemes' ),
						"id" => "footer_background",
						"std" => "",
						"type" => "color");

	$options[] = array( "name" => __( 'Widgets', 'organizedthemes' ),
						"type" => "heading");

	
	$options['widget_title_font'] = array( 'name' => __( 'Widget Title Font', 'organizedthemes' ),
						'desc' => __( 'Choose a font for your widget titles.', 'organizedthemes' ),
						'id' => 'widget_title_font',
						'std' => array( 'size' => '24px', 'face' => 'Raleway, cursive', 'color' => '#ffffff'),
						'type' => 'typography',
						'options' => array(
							'faces' => options_typography_get_google_fonts(),
							'styles' => false,
							'color' => false )
						);
		
	$options['widget_title'] = array( "name" => __( 'Widget Title Color', 'organizedthemes' ),
						"desc" => __( 'Text color for widget titles', 'organizedthemes' ),
						"id" => "widget_title",
						"std" => "",
						"type" => "color");
	
	$options['widget_title_background'] = array( "name" => __( 'Widget Title Background', 'organizedthemes' ),
						"desc" => __( 'Background color for widget titles.', 'organizedthemes' ),
						"id" => "widget_title_background",
						"std" => "",
						"type" => "color");
	
	$options['widget_text'] = array( "name" => __( 'Widget Text Color', 'organizedthemes' ),
						"desc" => __( 'Sets the color of text in widgets.', 'organizedthemes' ),
						"id" => "widget_text",
						"std" => "",
						"type" => "color");
	
	$options['widget_background'] = array( "name" => __( 'Widget Background Color', 'organizedthemes' ),
						"desc" => __( 'Sets the background color in widgets.', 'organizedthemes' ),
						"id" => "widget_background",
						"std" => "",
						"type" => "color");
	
$options[] = array( "name" => __( 'Buttons', 'organizedthemes' ),
					"type" => "heading");
	
	$options['button'] = array( "name" => __( 'Button Text', 'organizedthemes' ),
						"desc" => __( 'Text color for buttons', 'organizedthemes' ),
						"id" => "button",
						"std" => "",
						"type" => "color");
	
	$options['button_background'] = array( "name" => __( 'Button Background', 'organizedthemes' ),
						"desc" => __( 'Background color for buttons', 'organizedthemes' ),
						"id" => "button_background",
						"std" => "",
						"type" => "color");
						
	$options['button_hover'] = array( "name" => __( 'Button Text (hover)', 'organizedthemes' ),
						"desc" => __( 'Text color for buttons while hovering', 'organizedthemes' ),
						"id" => "button_hover",
						"std" => "",
						"type" => "color");
	
	$options['button_background_hover'] = array( "name" => __( 'Button Background (hover)', 'organizedthemes' ),
						"desc" => __( 'Background color for buttons while hovering', 'organizedthemes' ),
						"id" => "button_background_hover",
						"std" => "",
						"type" => "color");
								
$options[] = array( "name" => __( 'Advanced', 'organizedthemes' ),
					"type" => "heading");
	
	$options[] = array( 'name' => __( 'Disable Google Fonts', 'organizedthemes' ),
						'desc' => __( 'Turns off the output of Google fonts.', 'organizedthemes' ),
						'id' => 'disable_fonts',
						'std' => false,
						'type' => 'checkbox' );
										
	$options[] = array( "name" => __( 'Custom CSS', 'organizedthemes' ),
						"desc" => __( 'Add any custom CSS you would like to use here.', 'organizedthemes' ),
						"id" => "custom_css",
						"std" => "",
						"type" => "textarea"); 
							
	return $options;
}