<?php
/**
 * Infinity Theme: single template
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
	<div id="content" role="main" class="<?php do_action( 'content_class' ); ?>">
		<?php
			do_action( 'open_content' );
			do_action( 'open_single' );
		?>
			<?php /* Load Single Post Loop */
				infinity_get_template_part( 'templates/loops/loop', 'single' ); //#riqua qui cambiamo il post type, inseriamo progetti al posto di single
			?>
		<?php
			do_action( 'close_single' );
			do_action( 'close_content' );
		?>
	</div>
<?php		
	infinity_get_sidebar();
	infinity_get_footer();
?>


