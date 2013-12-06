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
/** need to be moved somewhere **/
do_shortcode('[pace color="#b3eef4" theme="fill-left"]');
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
				<div class="header-single">
					<hr/>
						<h5>
							<?php _e('Idea', 'infinity_text_domain'); ?>
							<?php if(get_the_category_list()){ ?>
								<span class="category-list">
									<?php the_category(' - ');	?>
								</span>
							<?php } ?>
						</h5>
					<hr/>
				</div>
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
						<h3 class="proposer">
							<?php $a_id = get_the_author_meta('ID'); $a_link = bp_core_get_user_domain( $a_id );?>
							<?php echo bp_core_fetch_avatar (array('item_id' => $a_id, 'width' => 36)); ?>
							<a id="user-<?php echo $a_id ?>" href="<?php echo $a_link; ?>">
								<?php the_author(); ?>
							</a>
						</h3>
						<h5 class="Like">
								<?php ?>
							<?php 
							$like_values = get_post_custom_values('like_counter');
							if($like_values[0]){ 
								_e('Likes','infinity_text_domain'); ?>
								<span class="like-counter"><?php echo $like_values[0]; ?><?php printLikes(get_the_ID()); ?></span>
							<?php }
							?>
						</h5>
						<div class="idea-actions">
							<span class="meta-right meta-container">
								<input type="submit" id="searchsubmit" value="Connect a project" class="button orange" />
							</span>
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
							<div class="description-content-container idea-description-content-container">
							<?php
								do_action( 'open_single_entry' );
								the_content( __( 'Read the rest of this entry &rarr;', infinity_text_domain ) ); 
					   		?>
							</div>
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
						
					   	<span class="meta-left meta-container">
							<div class="money-wasted-counter">
								<div class="left-inner-container inner-container">
									<h5 class="idea-counter-title"><?php _e('Saving/', 'infinity_text_domain');_e('Profit', 'infinity_text_domain'); ?></h5>
								<?php 
								$saving_values = get_post_custom_values('saving_counter');
								if($saving_values[0]){ 
									$saving_value = $saving_values[0];
									for($i=0;$i<$saving_value;$i++)
										echo '<span class="saving saving-color color counter-icon">&nbsp</span>';
									for( ;$i<5;$i++)
										echo '<span class="saving gray counter-icon">&nbsp</span>';
								}
								?>
								</div>
							</div>
						</span>
						<span class="meta-center meta-container">
							<div class="involvedrecipients-counter">
								<div class="center-inner-container inner-container">
									<h5 class="idea-counter-title"><?php _e('Recipients', 'infinity_text_domain'); ?></h5>
								<?php 
								$recipient_values = get_post_custom_values('recipient_counter');
								if($recipient_values[0]){ 
									$recipient_value = $recipient_values[0];
									for($i=0;$i<$recipient_value;$i++)
										echo '<span class="recipient recipient-color color counter-icon">&nbsp</span>';
									for( ;$i<5;$i++)
										echo '<span class="recipient gray counter-icon">&nbsp</span>';
								}
								?>
								</div>
							</div>
						</span>
						<span class="meta-right meta-container">
							<div class="timelost-counter">
								<div class="right-inner-container inner-container">
									<h5 class="idea-counter-title"><?php _e('Time lost/gained', 'infinity_text_domain'); ?></h5>
								<?php 
								$time_values = get_post_custom_values('time_counter');
								if($time_values[0]){ 
									$time_value = $time_values[0];
									for($i=0;$i<$time_value;$i++)
										echo '<span class="time time-color color counter-icon">&nbsp</span>';
									for( ;$i<5;$i++)
										echo '<span class="time gray counter-icon">&nbsp</span>';
								} ?>
								</div>
							</div>
						</span>
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