<?php
/**
 * Infinity Theme: archive template
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */

	infinity_get_header();
?>
<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'need' ) ); ?>

	<div id="content" role="main" class="<?php do_action( 'content_class' ); ?>">
		<?php
			do_action( 'open_content' );
			do_action( 'open_archive' );
		?>
		<div class="page" id="blog-archive">
			<header>
			<h4 class="page-title">
				Progetti che cercano figure competenti in HTML/CSS<?php /* echo '<span>' . $term->name . '</span>'; */ ?>
			</h4>
			</header>
			<?php
				infinity_get_template_part( 'templates/loops/loop-projects' );
			?>
		</div>
		<?php
			do_action( 'close_archive' );
			do_action( 'close_content' );
		?>
	</div>
<?php
	infinity_get_sidebar();
	infinity_get_footer();
?>
