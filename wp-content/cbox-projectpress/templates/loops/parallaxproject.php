<?php
/*
Template Name: Reaudioguide
*/
?>

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

?>
<style>
.page-template-reaudioguide-php #container{max-width:none;padding:0;}
.page-template-reaudioguide-php #container #wrapper{padding:0}
</style>

<?php 
do_action('after_single_entry');
?>
<?php
infinity_get_template_part('templates/parts/post-meta-bottom'); 
infinity_get_template_part( 'templates/parts/author-box');	
?>


<!-- intro navigation -->
<div id="presentazione-progetto" class="container clearfix">
	<div class="omega parallax-center">
		<ul class="navigation">
			<li data-slide="2"><a href="#" class="button white parallax-message"><?php _e("Presentazione","infinity_text_domain"); ?></a></li>
			<li data-slide="2"><a class="button white" href="#"><div class="parallax-down parallax-arrow"></div></a></li>
		</ul>
	</div>
</div>
<!-- slide 2 -->
<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
	<div class="container clearfix parallax-navigation">
		<div id="nav" class="omega">
			<ul class="navigation">
				<li data-slide="1"><a class="button white" href="#"><div class="parallax-up parallax-arrow"></div></a></li>
				<li data-slide="3"><a class="button white" href="#"><div class="parallax-down parallax-arrow"></div></a></li>
			</ul>
		</div>
	</div>
	<div class="container clearfix">
		<div id="elementi-flottanti" class="grid_6">
			<h1><?php _e("Valore verso gli utenti","infinity_text_domain"); ?></h1>
			<?php echo $p_idea_progetto;?>
		</div>
	</div>
</div>
<!-- slide 3 -->
<div class="slide" id="slide3" data-slide="3" data-stellar-background-ratio="0.5">
	<div class="container clearfix parallax-navigation">
		<div id="nav" class="grid_9 omega">
			<ul class="navigation">
				<li data-slide="2"><a class="button white" href="#"><div class="parallax-up parallax-arrow"></div></a></li>
				<li data-slide="4"><a class="button white" href="#"><div class="parallax-down parallax-arrow"></div></a></li>
			</ul>
		</div>
	</div>
	<div class="container clearfix">
		<div id="elementi-flottanti" class="grid_6">
			<h1><?php _e("Originalit&agrave;","infinity_text_domain"); ?></h1>
			<?php echo $p_idea2_progetto;?>
		</div>
	</div>
</div>
<!-- slide 4 -->
<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
	<div class="container clearfix parallax-navigation">
		<div id="nav" class="omega">
			<ul class="navigation">
				<li data-slide="3"><a class="button white" href="#"><div class="parallax-up parallax-arrow"></div></a></li>
				<li data-slide="5"><a class="button white" href="#"><div class="parallax-down parallax-arrow"></div></a></li>
			</ul>
		</div>
	</div>
	<h3></h3>
	<div class="container clearfix">
		<div id="elementi-flottanti" class="grid_6">
			<h1><?php _e("Inclusione sociale","infinity_text_domain"); ?></h1>
			<?php echo $p_idea3_progetto;?>
		</div>
	</div>
</div>
<!-- slide 5 -->
<div class="slide" id="slide4" data-slide="5" data-stellar-background-ratio="0.5">
	<div class="container clearfix parallax-navigation">
		<div id="nav" class="omega">
			<ul class="navigation">
				<li data-slide="4"><a class="button white" href="#"><div class="parallax-up parallax-arrow"></div></a></li>
				<li data-slide="6"><a class="button white" href="#"><div class="parallax-down parallax-arrow"></div></a></li>
			</ul>
		</div>
	</div>
	<h3></h3>
	<div class="container clearfix">
		<div id="elementi-flottanti" class="grid_6">
			<h1><?php _e("Partecipazione","infinity_text_domain"); ?></h1>
			<?php echo $p_idea4_progetto;?>
		</div>
	</div>
</div>
<!-- slide 6 -->
<div class="slide" id="slide4" data-slide="6" data-stellar-background-ratio="0.5">
	<div class="container clearfix parallax-navigation">
		<div id="nav" class="omega">
			<ul class="navigation">
				<li data-slide="5"><a class="button white" href="#"><div class="parallax-up parallax-arrow"></div></a></li>
				<li data-slide="7"><a class="button white" href="#"><div class="parallax-down parallax-arrow"></div></a></li>
			</ul>
		</div>
	</div>
	<h3></h3>
	<div class="container clearfix">
		<div id="elementi-flottanti" class="grid_6">
			<h1><?php _e("Territorio","infinity_text_domain"); ?></h1>
			<?php echo $p_idea5_progetto;?>
		</div>
	</div>
</div>
<!-- slide 7 -->
<div class="slide" id="slide4" data-slide="7" data-stellar-background-ratio="0.5">
	<div class="container clearfix parallax-navigation">
		<div id="nav" class="omega">
			<ul class="navigation">
				<li data-slide="6"><a class="button white" href="#"><div class="parallax-up parallax-arrow"></div></a></li>
				<li data-slide="8"><a class="button white" href="#"><div class="parallax-down parallax-arrow"></div></a></li>
			</ul>
		</div>
	</div>
	<h3></h3>
	<div class="container clearfix">
		<div id="elementi-flottanti" class="grid_6">
			<h1><?php _e("Impatto ambientale","infinity_text_domain"); ?></h1>
			<?php echo $p_idea6_progetto;?>
		</div>
	</div>
</div>
<!-- slide 8 -->
<div class="slide" id="slide4" data-slide="8" data-stellar-background-ratio="0.5">
	<div class="container clearfix parallax-navigation">
		<div id="nav" class="omega">
			<ul class="navigation">
				<li data-slide="7"><a class="button white" href="#"><div class="parallax-up parallax-arrow"></div></a></li>
				<li data-slide="9"><a class="button white" href="#"><div class="parallax-down parallax-arrow"></div></a></li>
			</ul>
		</div>
	</div>
	<h3></h3>
	<div class="container clearfix">
		<div id="elementi-flottanti" class="grid_6">
			<h1><?php _e("Settore","infinity_text_domain"); ?></h1>
			<?php echo $p_impatto_progetto;?>
		</div>
	</div>
</div>
<!-- slide 9 -->
<div class="slide" id="slide4" data-slide="9" data-stellar-background-ratio="0.5">
	<div class="container clearfix parallax-navigation">
		<div id="nav" class="omega">
			<ul class="navigation">
				<li data-slide="8"><a class="button white" href="#"><div class="parallax-up parallax-arrow"></div></a></li>
				<li data-slide="10"><a class="button white" href="#"><div class="parallax-down parallax-arrow"></div></a></li>
			</ul>
		</div>
	</div>
	<h3></h3>
	<div class="container clearfix">
		<div id="elementi-flottanti" class="grid_6">
			<h1><?php _e("Scalabilit&agrave;, replicabilit&agrave;, internalizzazione","infinity_text_domain"); ?></h1>
			<?php echo $p_impatto2_progetto;?>
		</div>
	</div>
</div>
<!-- slide 10 -->
<div class="slide" id="slide4" data-slide="10" data-stellar-background-ratio="0.5">
	<div class="container clearfix parallax-navigation">
		<div id="nav" class="omega">
			<ul class="navigation">
				<li data-slide="9"><a class="button white" href="#"><div class="parallax-up parallax-arrow"></div></a></li>
				<li data-slide="11"><a class="button white" href="#"><div class="parallax-down parallax-arrow"></div></a></li>
			</ul>
		</div>
	</div>
	<h3></h3>
	<div class="container clearfix">
		<div id="elementi-flottanti" class="grid_6">
			<h1><?php _e("Sostenibilit&agrave; economica","infinity_text_domain"); ?></h1>
			<?php echo $p_impatto3_progetto;?>
		</div>
	</div>
</div>
<!-- slide 11 -->
<div class="slide" id="slide4" data-slide="11" data-stellar-background-ratio="0.5">
	<div class="container clearfix parallax-navigation">
		<div id="nav" class="omega">
			<ul class="navigation">
				<li data-slide="10"><a class="button white" href="#"><div class="parallax-up parallax-arrow"></div></a></li>
				<li data-slide="12"><a class="button white" href="#"><div class="parallax-down parallax-arrow"></div></a></li>
			</ul>
		</div>
	</div>
	<h3></h3>
	<div class="container clearfix">
		<div id="elementi-flottanti" class="grid_6">
			<h1><?php _e("Inclusione sociale","infinity_text_domain"); ?></h1>
			<?php echo $p_idea3_progetto;?>
		</div>
	</div>
</div>
<!-- slide 12 -->
<div class="slide" id="slide4" data-slide="12" data-stellar-background-ratio="0.5">
	<div class="container clearfix parallax-navigation">
		<div id="nav" class="omega">
			<ul class="navigation">
				<li data-slide="11"><a class="button white" href="#"><div class="parallax-up parallax-arrow"></div></a></li>
				<li data-slide="13"><a class="button white" href="#"><div class="parallax-down parallax-arrow"></div></a></li>
			</ul>
		</div>
	</div>
	<h3></h3>
	<div class="container clearfix">
		<div id="elementi-flottanti" class="grid_6">
			<h1><?php _e("Canali","infinity_text_domain"); ?></h1>
			<?php echo $p_idea4_progetto;?>
		</div>
	</div>
</div>
<!-- slide 13 -->
<div class="slide" id="slide4" data-slide="13" data-stellar-background-ratio="0.5">
	<div class="container clearfix parallax-navigation">
		<div id="nav" class="omega">
			<ul class="navigation">
				<li data-slide="12"><a class="button white" href="#"><div class="parallax-up parallax-arrow"></div></a></li>
				<li data-slide="14"><a class="button white" href="#"><div class="parallax-down parallax-arrow"></div></a></li>
			</ul>
		</div>
	</div>
	<h3></h3>
	<div class="container clearfix">
		<div id="elementi-flottanti" class="grid_6">
			<h1><?php _e("Comunicazione","infinity_text_domain"); ?></h1>
			<?php echo $p_idea5_progetto;?>
		</div>
	</div>
</div>
<!-- slide 14 -->
<div class="slide" id="slide4" data-slide="14" data-stellar-background-ratio="0.5">
	<div class="container clearfix parallax-navigation">
		<div id="nav" class="omega">
			<ul class="navigation">
				<li data-slide="13"><a class="button white" href="#"><div class="parallax-up parallax-arrow"></div></a></li>
				<li data-slide="15"><a class="button white" href="#"><div class="parallax-down parallax-arrow"></div></a></li>
			</ul>
		</div>
	</div>
	<h3></h3>
	<div class="container clearfix">
		<div id="elementi-flottanti" class="grid_6">
			<h1><?php _e("Processo","infinity_text_domain"); ?></h1>
			<?php echo $p_org_progetto;?><
		</div>
	</div>
</div>
<!-- slide 15 -->
<div class="slide" id="slide4" data-slide="15" data-stellar-background-ratio="0.5">
	<div class="container clearfix parallax-navigation">
		<div id="nav" class="omega">
			<ul class="navigation">
				<li data-slide="14"><a class="button white" href="#"><div class="parallax-up parallax-arrow"></div></a></li>
				<li data-slide="1"><a class="button white" href="#"><div class="parallax-home parallax-arrow"></div></a></li>
			</ul>
		</div>
	</div>
	<h3></h3>
	<div class="container clearfix">
		<div id="elementi-flottanti" class="grid_6">
			<h1><?php _e("Relazioni","infinity_text_domain"); ?></h1>
			<?php echo $p_org2_progetto;?><
		</div>
	</div>
</div>