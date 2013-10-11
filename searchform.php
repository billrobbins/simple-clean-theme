<?php
/**
 * Controls the display of search forms
 *
 * @package WordPress
 * @subpackage Simple
 * @since 	   1.0.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'organizedthemes' ); ?></label>
		<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'organizedthemes' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'organizedthemes' ); ?>" />
	</form>
