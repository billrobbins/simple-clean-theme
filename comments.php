<?php 
/**
 * Comments Template
 *
 * This sets up the commenting block
 *
 * @package WordPress
 * @package Simple
 * @since   1.0.0
 */

if ( post_password_required() ) : ?>

	<?php return; ?>

<?php endif; ?>

<?php if ( comments_open() || have_comments() ) : ?>

	<h3 class="comments-title">
		<?php
			printf( _n( 'One Comment On &ldquo;%2$s&rdquo;', '%1$s Comments On &ldquo;%2$s&rdquo;', get_comments_number(), 'organizedthemes' ),
				number_format_i18n( get_comments_number() ),   get_the_title()   );
		?>
	</h3>
	
<?php endif; ?>

<?php if ( have_comments() ) : ?>

	<section id="comments">

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'organizedthemes_comment' ) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comments-nav" class="pagination">
				<div class="comments-previous"><?php previous_comments_link( __( 'Older comments', 'organizedthemes' ) ); ?></div>
				<div class="comments-next"><?php next_comments_link( __( 'Newer comments', 'organizedthemes' ) ); ?></div>
			</nav>
		<?php endif; ?>

		<?php if ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="comments-closed"><em><?php _e( 'Comments are closed.', 'organizedthemes' ); ?></em></p>
		<?php endif; ?>
		
	</section>
	
<?php endif; ?>

<?php comment_form();