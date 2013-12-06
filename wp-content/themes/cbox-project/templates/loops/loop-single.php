<?php
/**
 * Infinity Theme: loop single template
 *
 * The loop that displays single posts
 * 
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */

	if ( have_posts()):
		while ( have_posts() ):
			the_post();
			do_action( 'open_loop' );
			$group_id = get_post_custom_values('_group_node');
			$g_id = $group_id[0];
			$group = groups_get_group( array( 'group_id' => $g_id ) );
?>
			<!-- the post -->
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="post-content">
					<?php
						//infinity_get_template_part( 'templates/parts/post-avatar');	
					?>	
					<div class="idea-map" style="display:inline-block;width:49%">
						<?php echo do_shortcode('[wp_geo_map]'); ?>
					</div>
					<div id="meta-idea" style="display:inline-block;width:49%">
						<h1 class="post-title">
							<?php the_title(); ?>
							<?php edit_post_link(' ✍','',' ');?>
						</h1>
						<div class="proposer">
							<h5>
								<?php _e('Proposer','infinity_text_domain'); ?>
							</h5>
							<span>
								<span><?php $a_ID = get_the_author_meta( 'ID');
											echo get_avatar( $a_id, 35 ); ?></span>
								<span></span>
								<span><?php the_author(); ?></span>
							</span>
						</div>
						<input type="submit" id="searchsubmit" value="Connect a project" class="button orange">
						<div class="followers">
							<h5>
								<?php _e('Follower','infinity_text_domain'); ?>
							</h5>
							<span><?php echo $group -> total_member_count; ?></span>
						</div>
					</div>
					<?php
					do_action( 'open_loop_single' );
					?>								
					<?php
						do_action( 'before_single_entry' )
					?>
					<div class="entry">
						<div>
							<h5><?php _e('Description', 'infinity_text_domain'); ?></h5>
							<?php
								do_action( 'open_single_entry' );
								the_content( __( 'Read the rest of this entry &rarr;', infinity_text_domain ) ); 
					   		?>
					   	</div>
						<div style="clear: both;"></div>
						<?php
							wp_link_pages( array(
								'before' => __( '<p><strong>Pages:</strong> ', infinity_text_domain ),
								'after' => '</p>', 'next_or_number' => 'number')
							);
							do_action( 'close_single_entry' );
						?>
					</div>
					<div class="meta-bottom">
						<div>
							<?php if(get_the_category_list()){ ?>
									<h5><?php _e('Categories', 'infinity_text_domain'); ?></h5>
									<?php the_category(', ');	?>
							<?php } ?>
					   	</div>
					   	<div>
					   		<?php if(get_the_tag_list()){ ?>
									<h5><?php _e('Tags', 'infinity_text_domain'); ?></h5>
									<?php the_tags(', '); ?>
							<?php	} ?>
					   	</div>
					   	<div>[TODO]
					   		<h5><?php _e('Saving/', 'infinity_text_domain');_e('Profit', 'infinity_text_domain'); ?></h5>
					   		€€€
					   	</div>
					   	<div>[TODO]
					   		<h5><?php _e('Recipients', 'infinity_text_domain'); ?></h5>
					   		AAAA
					   	</div>
					   	<div>[TODO]
					   		<h5><?php _e('Time lost/gained', 'infinity_text_domain'); ?></h5>
					   		00 00
					   	</div>
					</div>
					<?php 
						do_action('after_single_entry');
					?>
					<?php
						infinity_get_template_part('templates/parts/post-meta-bottom'); 
						infinity_get_template_part( 'templates/parts/author-box');	
					?>
				</div>
				<?php
					do_action( 'close_loop_single' );
				?>
			</div>
<?php
			comments_template('', true);
			do_action( 'close_loop' );
		endwhile;
	else: ?>
		<h1>
			<?php _e( 'Sorry, no posts matched your criteria.', infinity_text_domain ) ?>
		</h1>
<?php
		do_action( 'loop_not_found' );
	endif;
?>