<?php
/**
 * Infinity Theme: loop projects template
 * 
 * The loop that displays posts
 * 
 * @author Fabrizio Zaccaron <bowe@presscrew.com> e Stefano Colarelli <>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */
$temp = $wp_query;
$wp_query= null;

//$wp_query = new WP_Query();
$args = array(
	'post_type' => 'project',
	'posts_per_page' => 8,
	'paged' => $paged,
);
$wp_query = new WP_Query( $args );
//$wp_query->query('posts_per_page=8'.'&paged='.$paged);
global $bp;
do_shortcode('[pace color="#ccf4c6" theme="fill-left"]');
while ($wp_query->have_posts()) : $wp_query->the_post();
	// group variables 
	$group_id = get_post_custom_values('_group_node');
	$g_id = $group_id[0];
	$group = groups_get_group( array( 'group_id' => $g_id ) );
?>
		<!-- post -->
		<article class="post project-summary" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
				do_action( 'open_loop_post' );
			?>
			<!-- post-content -->
			<div class="post-content post-summary-content">
				<?php
				
				
	$tassonomia = 'area-of-interest';
	$interests = get_the_terms($post->ID, $tassonomia);
	if(!empty($interests)): 
		foreach($interests as $interest){
			$catid = $interest->term_id;
			$catname = $interest->name;
			$termlink = get_term_link($interest, $tassonomia);
			echo '<div class="post-meta-data post-top proj-meta-top proj-int-'.$catid.'"><a class="project-interest" href="'.$termlink.'">'.$catname.'</a></div>';
			break;
		}
	endif;
/*				$interests = get_the_terms($post->ID, 'area-of-interest');
				if(!empty($interests)){ ?>
					<div id="project-taxonomies" class="post-meta-data post-top project-meta-top project-cat-<?php echo $interests[0]->term_id;?>">
						<?php foreach($interests as $interest){
							$catname = $interest->name;
							$catid = $interest->term_id;
							echo '<a class="idea-category" href="'.get_category_link($catid ).'">'.$catname.'</a>';
						} ?>
					</div>
				<?php } */	?> 
				<!-- post title -->
				
				<div class="project-sub-box">
					<div class="project-description-box">
						<h2 class="post-title">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'infinity_text_domain'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</h2>
						<span class="project-thumb project-meta-block">
							<?php echo bp_core_fetch_avatar (array('item_id' => $group->id,  'avatar_dir' => 'group-avatars', 'type' => 'full', )); ?>	
						</span>				
						<span class="project-description project-meta-block"><!-- show the avatar? -->
						<?php //the_excerpt(); 
						/* group description */
						$g_description = $group -> description;
						echo $g_description;
						?>
						</span>
					</div>
					<a class="project-link project-link-presentation" href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'infinity_text_domain'); ?> <?php the_title_attribute(); ?>">
						<div class="project-link-message"><?php _e("Presentazione &raquo;", 'infinity_text_domain'); ?></div>
					</a>
				</div>
				<div class="project-sub-box">
					<?php
					/* groups and project share the same name */
					/* if a group can have more than one project you want to show also the group name */
					// echo '<h3 class="project-group-name">';
						//$g_name = $group -> name;
						//echo $g_name;
					// echo '</h3>';
					?>
					<div class="project-group-meta project-description-box">
						<?php /*group members */
						$g_admins = $group -> admins; // Admins
						$g_mods = $group -> mods; // Moderators ARRAY 
						if(!empty($g_admins)) { ?>
							<span class="project-proposers project-meta-block">
								<h5><?php _e('Proposers','infinity_text_domain'); ?></h5>
								<div class="avatar-slider">
								<?php 
								foreach($g_admins as $g_admin){
									$a_name = $g_admin -> user_login;
									$a_id = $g_admin->user_id; ?>
									<span class="avatar-slide avatar-admin"><a title="<?php echo $a_name; ?>" class="ploop-proposer-avatar" href="<?php echo bp_core_get_user_domain( $a_id ); ?>">
										<?php echo bp_core_fetch_avatar (array('item_id' => $a_id, 'width' => 35)); ?>
									</a></span>
								<?php } 
								if(!empty($g_mods)):
									foreach($g_mods as $g_mod){
										$m_name = $g_mod -> user_login;
										$m_id = $g_mod->user_id; ?>
										<span class="avatar-slide avatar-mod"><a title="<?php echo $m_name; ?>" class="ploop-proposer-avatar" href="<?php echo bp_core_get_user_domain( $m_id ); ?>">
											<?php echo bp_core_fetch_avatar (array('item_id' => $m_id, 'width' => 35)); ?>
										</a></span>
									<?php }
								endif;?>
								</div>
							</span>
						<?php } ?>
						<?php /**skills required */
						$skills = get_the_terms($post->ID, 'need');
						if(!empty($skills)){ ?>
							<span class="project-need project-meta-block">
								<h5><?php /* #riqua or Open position */ _e("Job - Skills required", "infinity_text_domain"); ?></h5>
								<ul>
								<?php foreach($skills as $skill){ ?>
									<li>
										<?php echo $skill->name; ?>
									</li>
								<?php } ?>
								</ul>
							</span>
						<?php }?>
					</div>
					<?php $group_url = home_url($bp->groups->slug . '/' . $group -> slug); ?>
					<a class="project-link project-link-group" href="<?php echo $group_url; ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'infinity_text_domain'); ?> <?php $group->name; ?>">
						<div class="project-link-message"><?php _e("Gruppo di progetto &raquo;", 'infinity_text_domain'); ?></div>
					</a>
				</div>
				<footer class="project-footer post-meta-data">
					<span class="project-comments meta-container">
						<div class="project-comments-title comments-title">
							<?php _e('Discussions','infinity_text_domain'); ?>
						</div>
						<div class="comments-counter project-comments-counter meta-counter">
						<?php
						$topic=bbp_get_group_forum_ids($g_id);
						$topics= bbp_get_forum_post_count($topic[0], true);
						echo $topics;
						?>
						</div>
					</span>
					<span class="project-meta meta-container">
						<div class="project-like-title comments-title">
							<?php _e('Followers','infinity_text_domain'); ?>
						</div>
						<div class="like-counter project-group-couter meta-counter">
							<?php echo $group -> total_member_count; ?>
						</div>
					</span>
					<?php
						do_action( 'open_loop_post_content' );
					?>
					<?php
					/* #riqua aggiungere componenti dichiarate sopra, se necessario infinity_get_template_part( 'templates/parts/post-meta-top');	*/
					?>				
					<?php
					do_action( 'before_post_thumb' );
					?>
					<?php
						/* infinity_get_template_part( 'templates/parts/post-meta-bottom');	*/
						
					?>
					
					<?php
						do_action( 'close_loop_post_content' );
					?>
				</footer>
			</div><!-- post-content -->
			<?php
				do_action( 'close_loop_post' );
			?>
		</article><!-- post -->
	<?php
		do_action( 'close_loop' );
		endwhile;
   		infinity_base_paginate();
		$wp_query = null; $wp_query = $temp;
?>