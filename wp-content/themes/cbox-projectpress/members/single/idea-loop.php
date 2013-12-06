<?php
$user_id = bp_displayed_user_id();

$args = array(
	'post_type' => 'post',
	'author' => $user_id,
	'posts_per_page' => 100,
	'paged' => $paged,
	''
);
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('posts_per_page=5'.'&paged='.$paged);
?>
<h3><?php _e('Idee','infinity_text_domain'); ?></h3>
<?php 
while ($wp_query->have_posts()) : $wp_query->the_post();


?>	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
			$category = get_the_category();
			if($category[0]): 
				$catid = $category[0]->term_id;
				$catname = $category[0]->cat_name;
				?>
				<div class="post-meta-data post-top idea-meta-top idea-cat-<?php echo $catid;?>">
				<?php 
					echo '<a class="idea-category" href="'.get_category_link($catid ).'">'.$catname.'</a>';
				?>
				</div>
				
			<?php endif; ?>		
			<header>
			<h2 class="post-title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', infinity_text_domain ) ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				<?php //edit_post_link('edit','',' ');?>
			</h2>
			</header>
			<?php
				do_action( 'open_loop_post_content' );
			?>
				
			<?php
			do_action( 'before_post_thumb' );
			?>
			<!-- show the avatar? -->
			<div class="entry">
			<?php
				infinity_get_template_part( 'templates/parts/post-thumbnail');	
			?>	
				<?php
					do_action( 'before_loop_content' );
					if ( is_search() || is_category() || is_tag() || is_archive()  ) : // Display excerpts for archives and search results
					the_excerpt();
					else : 
					the_content( __( 'Read More', infinity_text_domain ) );
					endif;
					do_action( 'after_loop_content' );
				?>
			</div>
			<?php
				do_action( 'close_loop_post_content' );
			?>
			<!-- footer idea -->
			<footer class="post-meta-data post-bottom idea-meta">
				<?php
					do_action( 'open_loop_post_meta_data_bottom' );
				?>
				<span class="meta-left meta-container">
					<span class="idea-author">
						<?php __('Idea by',hackunito); ?>
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

		</article><!-- post -->
	<?php
		do_action( 'close_loop' );
	endwhile;
   		infinity_base_paginate();
?>
