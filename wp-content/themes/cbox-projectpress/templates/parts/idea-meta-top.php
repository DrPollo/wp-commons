<?php
/**
 * Infinity Theme: Post Meta Top Template
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 *
 * This template display the post meta date attached to a post. You can hook into this section 
 * to add your own stuff as well!
 */
?>

<?php
	do_action( 'open_loop_post_meta_data_top' );
?>					
<?php 
	$category = get_the_category();
	if($category[0]): 
		/*print_r($category[0]);
		if(!$category[0]->category_parent == $category[0]->term_id){
			$parents = (string)get_category_parents( $category[0]->term_id, true, ', ' );
			$parent = substr($parents, strrpos($parents, ', '));
			$catid = $category[0]->category_parent;
			$catname = get_the_category_by_ID( $catid );
		} else {
			$catid = $category[0]->term_id;
			$catname = $category[0]->cat_name;
		}*/
		$catid = $category[0]->term_id;
		$catname = $category[0]->cat_name;
		?>
		<div class="post-meta-data post-top idea-meta-top idea-cat-<?php echo $catid;?>">
		<?php 
			echo '<a class="idea-category" href="'.get_category_link($catid ).'">'.$catname.'</a>';
		?>
		</div>
		
	<?php endif;
?>						
<?php
	do_action( 'close_loop_post_meta_data_top' );
?>