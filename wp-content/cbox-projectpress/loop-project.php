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
			$n_members = $group -> total_member_count;
			$last_activity = $group -> last_activity;
			$g_description = $group -> description;
?>
			<!-- the post -->
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="post-content">
					<?php
					do_action( 'open_loop_single' );
					do_action( 'open_single_entry' );
					?>
					<!-- show the post thumb? -->
					<span class="project-node-avatar">
						<?php //infinity_get_template_part( 'templates/parts/post-thumbnail');
							echo bp_core_fetch_avatar(array('object' => 'group', 'item_id' => $g_id, 'type' => 'full' ) );
						?>			
					</span>
					<span class="project-node-title">
						<h1 class="post-title">
							<?php the_title(); ?>
							<?php edit_post_link(' ✍','',' ');?>
						</h1>	
						<div class="project-meta-fields">
							<span class="project-meta"><?php _e('Followers: ','infinity_text_domain'); ?>
								<span class="group-couter"><?php echo $group -> total_member_count; ?> </span>
							</span>
							<span class="project-meta"><?php _e('Last update: ','infinity_text_domain'); ?>
								<span class="group-couter"><?php 
									$last_activity = $group -> last_activity; 
									$newDate = date(__('H:i d/m/Y','infinity_text_domain'), strtotime($last_activity));
									echo $newDate;
								?> </span>
							</span>
							<?php echo(bp_get_group_join_button($group)); ?>
							<div>Social links [TO DO]</div>
						</div>
					</span>
					<?php
					/* #riqua da integrare successivamente in una struttura mvc infinity_get_template_part( 'templates/parts/post-meta-top');	*/
					?>
					
					<?php
						do_action( 'before_single_entry' )
					?>
					<div class="entry">
						<div class="intro-progetto">
							<h5><?php _e('Description', 'infinity_text_domain'); ?></h5>
							<?php echo $g_description; ?>
						</div>

						<div class="project-description-meta">
							<div class="project-meta-left">
								<h4><?php _e("Proponenti","infinity_text_domain"); ?>
								<ul>
								<?php 
									$g_admins = $group -> admins;
									foreach($g_admins as $admin){
										$a_id = $admin -> user_id;
										echo '<li>'.get_avatar($a_id, 35);
										echo $admin -> user_login.'</li>';
									}
									$g_mods = $group -> mods;
									if($g_mods):
									foreach($g_mods as $mod){
										$m_id = $mod -> user_id;
										echo '<li>'.get_avatar($m_id, 35);
										echo $mod -> user_login.'</li>';
									}
									endif;
									//var_dump($group);
								?>
								</ul>
							</div>
							<div id="project-need" class="project-meta-right">
								<h4><?php /* #riqua or Open position */ _e("Job - Skills required", "infinity_text_domain"); ?></h4>
								<ul><li>
								<?php
								if(get_the_terms($post->ID, 'need')){
								the_terms( $post->ID, 'need','','</li><li>');
									}else{ _e("Nothing [TODO]", "infinity_text_domain"); }
								?>
								</li></ul>
							</div>
						</div>
						<div class="project-description-meta">
							<div class="project-taxonomies" >
								<h4><?php _e("Tematics", "infinity_text_domain"); ?></h4>
								<ul><li>
								<?php
								if(get_the_terms($post->ID, 'area-of-interest')){
								the_terms( $post->ID, 'area-of-interest','','</li><li>');
									}else{ _e("Nothing [TODO]", "infinity_text_domain"); }
								?>
								</li></ul>
							</div>
							<div class="project-taxonomies" id="results">
								<h4><?php _e("Results", "infinity_text_domain"); ?></h4>
								<ul><li>
								<?php
								$results = groups_get_groupmeta($g_id, $meta_key = 'risultato_progetto');
								if($results){
										echo $results;
									}else{ _e("Nothing [TODO]", "infinity_text_domain"); }
								?>
								</li></ul>
							</div>
							<div class="project-taxonomies" id="Timing" >
								<h4><?php _e("Timing", "infinity_text_domain"); ?></h4>
								<ul>
									<li>
									<?php
									$timing = groups_get_groupmeta($g_id, $meta_key = 'tempistiche_progetto');
									if($timing){
											echo $timing;
										}else{ _e("Nothing [TODO]", "infinity_text_domain"); }
									?>
									</li>
								</ul>
							</div>
						</div>
						<?php
							wp_link_pages( array(
								'before' => __( '<p><strong>Pages:</strong> ', infinity_text_domain ),
								'after' => '</p>', 'next_or_number' => 'number')
							);
							do_action( 'close_single_entry' );
						?>
						
						
						<?php include('parallaxproject.php'); ?>
					</div>	
				<?php
					do_action( 'close_loop_single' );
				?>
				</div>
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