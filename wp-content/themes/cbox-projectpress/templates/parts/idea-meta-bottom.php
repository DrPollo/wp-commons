<?php
/**
 * Infinity Theme: Post Meta Bottom Template
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 *
 * This template display the post tags attached to a post. You can hook into this section 
 * to add your own stuff as well!
 */
?>

<footer class="post-meta-data post-bottom idea-meta">
	<?php
		do_action( 'open_loop_post_meta_data_bottom' );
	?>
	<span class="meta-left meta-container">
		<span class="idea-author">
			<?php _e('Idea from',hackunito); ?>
			<a href="<?php /*vanno create funzioni in functions o simili! No nel template. qui vanno solo richiamate le funzioni*/
			echo bp_core_get_user_domain( $post->post_author ) ?>" rel="bookmark" title="<?php _e( 'Author of', infinity_text_domain ) ?> <?php the_title_attribute(); ?>">
			<?php
			echo bp_core_fetch_avatar( array('item_id' => $post->post_author, 'type' => 'thumb', 'width' => "50px", 'height' => "50px" ) );
			?></a>
		</span>
	</span>
	<span class="meta-center meta-container">
		<span class="idea-comments">
			<div class="idea-comments-title comments-title">
				<?php _e('Comments',hackunito); ?>
			</div>
			<div class="comments-counter idea-comments-counter">
			<?php
				comments_popup_link(
					__( '0', infinity_text_domain ),
					__( '1', infinity_text_domain ),
					__( '%', infinity_text_domain )
				);
			?>
			</div>
		</span>
	</span>
	<span class="meta-right meta-container">
		<span class="idea-like">
			<div class="idea-like-title like-title">
				<?php _e('Like',hackunito); /*#riqua questa tab è da collegare ai like di buddypress, almeno compaiono pure sulla bacheca dell'utente*/?>
			</div>
			<div class="like-counter idea-like-counter">
				<!-- put here your like display function -->
				0
			</div>	
		</span>
	</span>
<?php
	do_action( 'close_loop_post_meta_data_bottom' );
?>
</footer>
