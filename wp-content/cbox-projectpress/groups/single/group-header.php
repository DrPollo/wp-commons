<?php

do_action( 'bp_before_group_header' );

?>

<?php 
	$g_id = bp_get_group_id();
	$post_ID = groups_get_groupmeta( $g_id, $meta_key = 'post_node');
	// echo $g_id;
	$p_idea_progetto = groups_get_groupmeta( $g_id, $meta_key = 'idea_progetto_group_extension_setting');
	$p_idea2_progetto = groups_get_groupmeta( $g_id, $meta_key = 'idea_progetto_group_extension_setting2');
	$p_idea3_progetto = groups_get_groupmeta( $g_id, $meta_key = 'idea_progetto_group_extension_setting3');
	$p_idea4_progetto = groups_get_groupmeta( $g_id, $meta_key = 'idea_progetto_group_extension_setting4');
	$p_idea5_progetto = groups_get_groupmeta( $g_id, $meta_key = 'idea_progetto_group_extension_setting5');
	$p_idea6_progetto = groups_get_groupmeta( $g_id, $meta_key = 'idea_progetto_group_extension_setting6');
	$p_impatto_progetto = groups_get_groupmeta( $g_id, $meta_key ='impatto_progetto_group_extension_setting');
	$p_impatto2_progetto = groups_get_groupmeta( $g_id, $meta_key ='impatto2_progetto_group_extension_setting');
	$p_impatto3_progetto = groups_get_groupmeta( $g_id, $meta_key ='impatto3_progetto_group_extension_setting');
	$p_impatto4_progetto = groups_get_groupmeta( $g_id, $meta_key ='impatto4_progetto_group_extension_setting');
	$p_impatto5_progetto = groups_get_groupmeta( $g_id, $meta_key ='impatto5_progetto_group_extension_setting');
	$p_org_progetto = groups_get_groupmeta( $g_id, $meta_key ='org_progetto_group_extension_setting');
	$p_org2_progetto = groups_get_groupmeta( $g_id, $meta_key ='org2_progetto_group_extension_setting');
	$p_risultato = groups_get_groupmeta( $g_id, $meta_key = 'risultato_progetto');
	$p_tempistiche = groups_get_groupmeta( $g_id, $meta_key ='tempistiche_progetto');
 
//$completed =  
 ?>


<div id="item-header-content">
	<h2><a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>"><?php bp_group_name(); ?></a></h2>
	<span class="highlight"><?php echo $completed; ?></span> <span class="activity"><?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?></span>
	
	<?php do_action( 'bp_before_group_header_meta' ); ?>

	<div id="item-meta">

		<?php #riqua ?>
		<style>.bx-viewport{min-height:40px}</style>
						<div style="display:inline-block;width:49%;vertical-align:top">
						<h5><?php _e('Description', 'infinity_text_domain'); ?></h5>
						<?php 
						bp_group_description();
						 ?></div> 
					   	<div style="display:inline-block;width:49%;vertical-align:top">
						<h5><?php __('Presentation', 'infinity_text_domain'); ?></h5>
							<ul class="bxslider" style="margin: 0 10px;padding: 0 10px;">
								<li><h6>Valore verso gli utenti</h6><?php echo $p_idea_progetto;?></li>
								<li><h6>Originalità</h6><?php echo $p_idea2_progetto;?></li>
								<li><h6>Inclusione sociale</h6><?php echo $p_idea3_progetto;?></li>
								<li><h6>Partecipazione</h6><?php echo $p_idea4_progetto;?></li>
								<li><h6>Territorio</h6><?php echo $p_idea5_progetto;?></li>
								<li><h6>Impatto ambientale</h6><?php echo $p_idea6_progetto;?></li>
								<li><h6>Settore</h6><?php echo $p_impatto_progetto;?></li>
								<li><h6>Scalabilità, replicabilità, internalizzazione</h6><?php echo $p_impatto2_progetto;?></li>
								<li><h6>Sostenibilità economica</h6><?php echo $p_impatto3_progetto;?></li>
								<li><h6>Canali</h6><?php echo $p_impatto4_progetto;?></li>
								<li><h6>Comunicazione</h6><?php echo $p_impatto5_progetto;?></li>
								<li><h6>Processo</h6><?php echo $p_org_progetto;?></li>
								<li><h6>Relazioni</h6><?php echo $p_org2_progetto;?></li>
							</ul>
					   	</div>

		<div id="item-buttons">

			<?php do_action( 'bp_group_header_actions' ); ?>

		</div><!-- #item-buttons -->

		<?php do_action( 'bp_group_header_meta' ); ?>

	</div>
					<div id="project-need">
							<h5><?php /* #riqua or Open position */ _e("Job - Skills required", "infinity_text_domain"); ?></h5>
							<ol><li>
							<?php
							if(get_the_terms($post_ID, 'need')){
							the_terms( $post_ID, 'need','','</li><li>');
								}else{ _e("Team completed [TODO]", "infinity_text_domain"); }
							?>
							</li></ol>
						</div>
						
						<div id="item-actions">

	<?php if ( bp_group_is_visible() ) : ?>

		<h3><?php _e( 'Group Admins', 'buddypress' ); ?></h3>

		<?php bp_group_list_admins();

		do_action( 'bp_after_group_menu_admins' );

		if ( bp_group_has_moderators() ) :
			do_action( 'bp_before_group_menu_mods' ); ?>

			<h3><?php _e( 'Group Mods' , 'buddypress' ); ?></h3>

			<?php bp_group_list_mods();

			do_action( 'bp_after_group_menu_mods' );

		endif;

	endif; ?>

</div><!-- #item-actions -->
</div><!-- #item-header-content -->

<?php
do_action( 'bp_after_group_header' );
do_action( 'template_notices' );
?>