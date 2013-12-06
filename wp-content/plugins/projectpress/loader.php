<?php

if (class_exists( 'BP_Group_Extension' ) ){
if ( !class_exists( 'Idea_Progetto_Group_Extension' ) ) :

	class Idea_Progetto_Group_Extension extends BP_Group_Extension {
    function __construct() {
		global $bp;
        $args = array(
            // need localization (English version default)
            'slug' => 'campo-idea-progetto',
            'name' => 'Valore sociale',
            'nav_item_position' => 5,
            'enable_nav_item' => false,
			'visibility' => 'private',
            'screens' => array(
                'edit' => array(
                    'name' => 'Valore sociale',
                    // The submit button
                    'submit_text' => 'Aggiorna',
                ),
                'create' => array(
                    'position' => 5,
                ),
            ),
        );
        parent::init( $args );
    }
 
    function display() {
        echo 'Per ora non inseriamo nulla, tanto sarà fatta la scheda';
    }
 
    function settings_screen( $group_id ) {
        $setting = groups_get_groupmeta( $group_id, 'idea_progetto_group_extension_setting' );
        $setting2 = groups_get_groupmeta( $group_id, 'idea_progetto_group_extension_setting2' );
        $setting3 = groups_get_groupmeta( $group_id, 'idea_progetto_group_extension_setting3' );
        $setting4 = groups_get_groupmeta( $group_id, 'idea_progetto_group_extension_setting4' );
        $setting5 = groups_get_groupmeta( $group_id, 'idea_progetto_group_extension_setting5' );
        $setting6 = groups_get_groupmeta( $group_id, 'idea_progetto_group_extension_setting6' );
 
        ?>
			<h4>Benefici verso gli utenti</h4>
			<p>Qual è il prodotto/servizio e a quali bisogni risponde. Quale utilità e vantaggio crea per gli utenti e gli stakeholders (max 1500 battute)</p>
			<textarea rows="4" cols="50" name="idea_progetto_group_extension_setting" value="<?php echo esc_attr( $setting ) ?>"><?php echo esc_attr( $setting ); ?></textarea>
			<h4>Originalità</h4>
			<p>Innovatività e differenziazione dell’idea rispetto allo stato delle conoscenze, al contesto in cui si inserisce, al mercato di riferimento (max 1000 battute)</p>
			<textarea rows="4" cols="50" name="idea_progetto_group_extension_setting2" value="<?php echo esc_attr( $setting2 ) ?>"><?php echo esc_attr( $setting2 ); ?></textarea>
			<h4>Inclusione sociale</h4>
			<p>Esistono caratteristiche del progetto che promuovono l'inclusione sociale e la creazione di posti di lavoro (max 1000 battute)</p>
			<textarea rows="4" cols="50" name="idea_progetto_group_extension_setting3" value="<?php echo esc_attr( $setting3 ) ?>"><?php echo esc_attr( $setting3 ); ?></textarea>
			<h4>Partecipazione</h4>
			<p>Quali caratteristiche del Progetto promuovono forme di collaborazione e co-produzione? Ossia la capacità di relazione e interazione con soggetti terzi attraverso la costruzione di reti reali e reti on-line? (max 1000 battute)</p>
			<textarea rows="4" cols="50" name="idea_progetto_group_extension_setting4" value="<?php echo esc_attr( $setting4 ) ?>"><?php echo esc_attr( $setting4 ); ?></textarea>
			<h4>Territorio</h4>
			<p>Quali caratteristiche del Progetto si prevede che possano avere un impatto sociale territoriale positivo? Quali attività promuovono la coesione sociale nei territori e nelle comunità di riferimento? (max 1000 battute)</p>
			<textarea rows="4" cols="50" name="idea_progetto_group_extension_setting5" value="<?php echo esc_attr( $setting5 ) ?>"><?php echo esc_attr( $setting5 ); ?></textarea>
			<h4>Impatto ambientale</h4>
			<p>Indicare se c’è una particolare attenzione all’impatto ambientale del processo produttivo (attenzione nella scelta di materiali, tecnologie, processi; utilizzo di materiali riciclati, etc.) (max 1000 battute)</p>
			<textarea rows="4" cols="50" name="idea_progetto_group_extension_setting6" value="<?php echo esc_attr( $setting6 ) ?>"><?php echo esc_attr( $setting6 ); ?></textarea>
        <?php
    }
 
    function settings_screen_save( $group_id ) {
        $setting = isset( $_POST['idea_progetto_group_extension_setting'] ) ? $_POST['idea_progetto_group_extension_setting'] : '';
        groups_update_groupmeta( $group_id, 'idea_progetto_group_extension_setting', $setting );
		
		$setting2 = isset( $_POST['idea_progetto_group_extension_setting2'] ) ? $_POST['idea_progetto_group_extension_setting2'] : '';
        groups_update_groupmeta( $group_id, 'idea_progetto_group_extension_setting2', $setting2 );
		
		$setting3 = isset( $_POST['idea_progetto_group_extension_setting3'] ) ? $_POST['idea_progetto_group_extension_setting3'] : '';
        groups_update_groupmeta( $group_id, 'idea_progetto_group_extension_setting3', $setting3 );
		
		$setting4 = isset( $_POST['idea_progetto_group_extension_setting4'] ) ? $_POST['idea_progetto_group_extension_setting4'] : '';
        groups_update_groupmeta( $group_id, 'idea_progetto_group_extension_setting4', $setting4 );
		
        $setting5 = isset( $_POST['idea_progetto_group_extension_setting5'] ) ? $_POST['idea_progetto_group_extension_setting5'] : '';
        groups_update_groupmeta( $group_id, 'idea_progetto_group_extension_setting5', $setting5 );
		
		$setting6 = isset( $_POST['idea_progetto_group_extension_setting6'] ) ? $_POST['idea_progetto_group_extension_setting6'] : '';
        groups_update_groupmeta( $group_id, 'idea_progetto_group_extension_setting6', $setting6 );
    }
 
    /**
     * create_screen() is an optional method that, when present, will
     * be used instead of settings_screen() in the context of group
     * creation.
     *
     * Similar overrides exist via the following methods:
     *   * create_screen_save()
     *   * edit_screen()
     *   * edit_screen_save()
     *   * admin_screen()
     *   * admin_screen_save()
     */
    // function create_screen_save( $group_id ) {
    function create_screen( $group_id ) {
        $setting = groups_get_groupmeta( $group_id, 'idea_progetto_group_extension_setting' );
        $setting2 = groups_get_groupmeta( $group_id, 'idea_progetto_group_extension_setting2' );
        $setting3 = groups_get_groupmeta( $group_id, 'idea_progetto_group_extension_setting3' );
        $setting4 = groups_get_groupmeta( $group_id, 'idea_progetto_group_extension_setting4' );
        $setting5 = groups_get_groupmeta( $group_id, 'idea_progetto_group_extension_setting5' );
        $setting6 = groups_get_groupmeta( $group_id, 'idea_progetto_group_extension_setting6' );
 
        ?>
			<h4>Valore verso gli utenti</h4>
			<p>Qual è il prodotto/servizio e a quali bisogni risponde. Quale utilità e vantaggio crea per gli utenti e gli stakeholders (max 1500 battute)</p>
			<textarea rows="4" cols="50" name="idea_progetto_group_extension_setting" value="<?php echo esc_attr( $setting ) ?>"><?php echo esc_attr( $setting ); ?></textarea>
			<h4>Originalità</h4>
			<p>Innovatività e differenziazione dell’idea rispetto allo stato delle conoscenze, al contesto in cui si inserisce, al mercato di riferimento (max 1000 battute)</p>
			<textarea rows="4" cols="50" name="idea_progetto_group_extension_setting2" value="<?php echo esc_attr( $setting2 ) ?>"><?php echo esc_attr( $setting2 ); ?></textarea>
			<h4>Inclusione sociale</h4>
			<p>Esistono caratteristiche del progetto che promuovono l'inclusione sociale e la creazione di posti di lavoro (max 1000 battute)</p>
			<textarea rows="4" cols="50" name="idea_progetto_group_extension_setting3" value="<?php echo esc_attr( $setting3 ) ?>"><?php echo esc_attr( $setting3 ); ?></textarea>
			<h4>Partecipazione</h4>
			<p>Quali caratteristiche del Progetto promuovono forme di collaborazione e co-produzione? Ossia la capacità di relazione e interazione con soggetti terzi attraverso la costruzione di reti reali e reti on-line? (max 1000 battute)</p>
			<textarea rows="4" cols="50" name="idea_progetto_group_extension_setting4" value="<?php echo esc_attr( $setting4 ) ?>"><?php echo esc_attr( $setting4 ); ?></textarea>
			<h4>Territorio</h4>
			<p>Quali caratteristiche del Progetto si prevede che possano avere un impatto sociale territoriale positivo? Quali attività promuovere la coesione sociale nei territori e nelle comunità di riferimento? (max 1000 battute)</p>
			<textarea rows="4" cols="50" name="idea_progetto_group_extension_setting5" value="<?php echo esc_attr( $setting5 ) ?>"><?php echo esc_attr( $setting5 ); ?></textarea>
			<h4>Impatto ambientale</h4>
			<p>Indicare se c’è una particolare attenzione all’impatto ambientale del processo produttivo (attenzione nella scelta di materiali, tecnologie, processi; utilizzo di materiali riciclati, etc.) (max 1000 battute)</p>
			<textarea rows="4" cols="50" name="idea_progetto_group_extension_setting6" value="<?php echo esc_attr( $setting6 ) ?>"><?php echo esc_attr( $setting6 ); ?></textarea>
        <?php
    }
 
}
bp_register_group_extension( 'Idea_Progetto_Group_Extension' );
 
endif;

if ( !class_exists( 'Impatto_Progetto_Group_Extension' ) ) :

	class Impatto_Progetto_Group_Extension extends BP_Group_Extension {
    function __construct() {
		global $bp;
        $args = array(
            'slug' => 'campo-impatto-progetto',
            'name' => 'Sostenibilità economica e marketing',
            'nav_item_position' => 6,
            'enable_nav_item' => false,
			'visibility' => 'private',
            'screens' => array(
                'edit' => array(
                    'name' => 'Sostenibilità economica e marketing',
                    // Changes the text of the Submit button
                    // on the Edit page
                    'submit_text' => 'Aggiorna',
                ),
                'create' => array(
                    'position' => 6,
                ),
            ),
        );
        parent::init( $args );
    }
 
    function display() {
        echo 'Idem qui: per ora non inseriamo nulla, tanto sarà fatta una scheda, non so a quanti tab';
    }
 
    function settings_screen( $group_id ) {
		$group_id = bp_get_current_group_id();
        $setting = groups_get_groupmeta( $group_id, 'impatto_progetto_group_extension_setting' );
        $setting2 = groups_get_groupmeta( $group_id, 'impatto2_progetto_group_extension_setting' );
        $setting3 = groups_get_groupmeta( $group_id, 'impatto3_progetto_group_extension_setting' );
        $setting4 = groups_get_groupmeta( $group_id, 'impatto4_progetto_group_extension_setting' );
        $setting5 = groups_get_groupmeta( $group_id, 'impatto5_progetto_group_extension_setting' );
 
        ?>
			<h4>Settore</h4>
			<p>Identificazione e descrizione dei principali processi alternativi o prodotti concorrenti. Punti di forza e debolezza rispetto ad essi, minacce e opportunità. Esistono barriere all’entrata? (per esempio ottenimento di brevetti, volume di costi fissi elevati per l’avvio dell’attività) (max 1500 battute)</p>
			<textarea rows="4" cols="50" name="impatto_progetto_group_extension_setting" value="<?php echo esc_attr( $setting ) ?>"><?php echo esc_attr( $setting ); ?></textarea>
			<h4>Scalabilità, replicabilità, internazionalizzazione</h4>
			<p>Il modello è scalabile e replicabile in altri contesti? Ovvero, come il Progetto può essere sviluppato ulteriormente temporalmente e quantitativamente, divenendo riproducibile in condizioni e ambiti differenti? Ci sono prospettive future di internazionalizzazione? (max 2500 battute)</p>
			<textarea rows="4" cols="50" name="impatto2_progetto_group_extension_setting" value="<?php echo esc_attr( $setting2 ) ?>"><?php echo esc_attr( $setting2 ); ?></textarea>
			<h4>Sostenibilità economica</h4>
			<p>Quali sono i costi principali del Progetto? Quali caratteristiche del Progetto ne garantiscono la sostenibilità economica nel tempo? Indicare un arco di tempo limitato e definito nel quale il Progetto può divenire economicamente sostenibile. (Max 2500 battute)</p>
			<textarea rows="4" cols="50" name="impatto3_progetto_group_extension_setting" value="<?php echo esc_attr( $setting3 ) ?>"><?php echo esc_attr( $setting3 ); ?></textarea>
			<h4>Canali</h4>
			<p>Canali di distribuzione, grado di innovazione nelle modalità di distribuzione e fruizione del prodotto/servizio/processo risultante dal Progetto (Max 1500 battute)</p>
			<textarea rows="4" cols="50" name="impatto4_progetto_group_extension_setting" value="<?php echo esc_attr( $setting4 ) ?>"><?php echo esc_attr( $setting4 ); ?></textarea>
			<h4>Comunicazione</h4>
			<p>Quali azioni di comunicazione delle proprie attività sono previste per coinvolgere le comunità di riferimento e i destinatari del Progetto? Quanto si prevede di investire nella comunicazione? (max 1500 battute)</p>
			<textarea rows="4" cols="50" name="impatto5_progetto_group_extension_setting" value="<?php echo esc_attr( $setting5 ) ?>"><?php echo esc_attr( $setting5 ); ?></textarea>
        <?php
    }
 
    function settings_screen_save( $group_id ) {
		$group_id = bp_get_current_group_id();
        $setting = isset( $_POST['impatto_progetto_group_extension_setting'] ) ? $_POST['impatto_progetto_group_extension_setting'] : '';
        groups_update_groupmeta( $group_id, 'impatto_progetto_group_extension_setting', $setting );
        $setting2 = isset( $_POST['impatto2_progetto_group_extension_setting'] ) ? $_POST['impatto2_progetto_group_extension_setting'] : '';
        groups_update_groupmeta( $group_id, 'impatto2_progetto_group_extension_setting', $setting2 );
        $setting3 = isset( $_POST['impatto3_progetto_group_extension_setting'] ) ? $_POST['impatto3_progetto_group_extension_setting'] : '';
        groups_update_groupmeta( $group_id, 'impatto3_progetto_group_extension_setting', $setting3 );
        $setting4 = isset( $_POST['impatto4_progetto_group_extension_setting'] ) ? $_POST['impatto4_progetto_group_extension_setting'] : '';
        groups_update_groupmeta( $group_id, 'impatto4_progetto_group_extension_setting', $setting4 );
        $setting5 = isset( $_POST['impatto5_progetto_group_extension_setting'] ) ? $_POST['impatto5_progetto_group_extension_setting'] : '';
        groups_update_groupmeta( $group_id, 'impatto5_progetto_group_extension_setting', $setting5 );
    }
 
    /**
     * create_screen() is an optional method that, when present, will
     * be used instead of settings_screen() in the context of group
     * creation.
     *
     * Similar overrides exist via the following methods:
     *   * create_screen_save()
     *   * edit_screen()
     *   * edit_screen_save()
     *   * admin_screen()
     *   * admin_screen_save()
     */
    function create_screen( $group_id ) {
		$group_id = bp_get_current_group_id();
        $setting = groups_get_groupmeta( $group_id, 'impatto_progetto_group_extension_setting' );
        $setting2 = groups_get_groupmeta( $group_id, 'impatto2_progetto_group_extension_setting' );
        $setting3 = groups_get_groupmeta( $group_id, 'impatto3_progetto_group_extension_setting' );
        $setting4 = groups_get_groupmeta( $group_id, 'impatto4_progetto_group_extension_setting' );
        $setting5 = groups_get_groupmeta( $group_id, 'impatto5_progetto_group_extension_setting' );
 
        ?>
			<h4>Settore</h4>
			<p>Identificazione e descrizione dei principali processi alternativi o prodotti concorrenti. Punti di forza e debolezza rispetto ad essi, minacce e opportunità. Esistono barriere all’entrata? (per esempio ottenimento di brevetti, volume di costi fissi elevati per l’avvio dell’attività) (max 1500 battute)</p>
			<textarea rows="4" cols="50" name="impatto_progetto_group_extension_setting" value="<?php echo esc_attr( $setting ) ?>"><?php echo esc_attr( $setting ); ?></textarea>
			<h4>Scalabilità, replicabilità, internalizzazione</h4>
			<p>Il modello è scalabile e replicabile in altri contesti? Ovvero, come il Progetto può essere sviluppato ulteriormente temporalmente e quantitativamente, divenendo riproducibile in condizioni e ambiti differenti? Ci sono prospettive future di internazionalizzazione? (max 2500 battute)</p>
			<textarea rows="4" cols="50" name="impatto2_progetto_group_extension_setting" value="<?php echo esc_attr( $setting2 ) ?>"><?php echo esc_attr( $setting2 ); ?></textarea>
			<h4>Sostenibilità economica</h4>
			<p>Quali sono i costi principali del Progetto? Quali caratteristiche del Progetto ne garantiscono la sostenibilità economica nel tempo? Indicare un arco di tempo limitato e definito nel quale il Progetto può divenire economicamente sostenibile. (Max 2500 battute)</p>
			<textarea rows="4" cols="50" name="impatto3_progetto_group_extension_setting" value="<?php echo esc_attr( $setting3 ) ?>"><?php echo esc_attr( $setting3 ); ?></textarea>
			<h4>Canali</h4>
			<p>Canali di distribuzione, grado di innovazione nelle modalità di distribuzione e fruizione del prodotto/servizio/processo risultante dal Progetto (Max 1500 battute)</p>
			<textarea rows="4" cols="50" name="impatto4_progetto_group_extension_setting" value="<?php echo esc_attr( $setting4 ) ?>"><?php echo esc_attr( $setting4 ); ?></textarea>
			<h4>Comunicazione</h4>
			<p>Quali azioni di comunicazione delle proprie attività sono previste per coinvolgere le comunità di riferimento e i destinatari del Progetto? Quanto si prevede di investire nella comunicazione? (max 1500 battute)</p>
			<textarea rows="4" cols="50" name="impatto5_progetto_group_extension_setting" value="<?php echo esc_attr( $setting5 ) ?>"><?php echo esc_attr( $setting5 ); ?></textarea>
        <?php
    }
 
}
bp_register_group_extension( 'Impatto_Progetto_Group_Extension' );
 
endif;

if ( !class_exists( 'Org_Progetto_Group_Extension' ) ) :

	class Org_Progetto_Group_Extension extends BP_Group_Extension {
    function __construct() {
		global $bp;
        $args = array(
            'slug' => 'prg-impatto-progetto',
            'name' => 'Organizzazione',
            'nav_item_position' => 7,
            'enable_nav_item' => false,
			'visibility' => 'private',
            'screens' => array(
                'edit' => array(
                    'name' => 'Organizzazione',
                    // Changes the text of the Submit button
                    // on the Edit page
                    'submit_text' => 'Aggiorna',
                ),
                'create' => array(
                    'position' => 7,
                ),
            ),
        );
        parent::init( $args );
    }
 
    function display() {
        echo 'Idem qui: per ora non inseriamo nulla, tanto sarà fatta una scheda, non so a quanti tab';
    }
 
    function settings_screen( $group_id ) {
		$group_id = bp_get_current_group_id();
        $setting = groups_get_groupmeta( $group_id, 'org_progetto_group_extension_setting' );
        $setting2 = groups_get_groupmeta( $group_id, 'org2_progetto_group_extension_setting' );
 
        ?>
			<h4>Processo</h4>
			<p>Descrivere l’organizzazione del processo produttivo, le azioni e le attività con cui si intende realizzare i prodotti/servizi/eventi del Progetto (max 1500 battute)</p>
			<textarea rows="4" cols="50" name="org_progetto_group_extension_setting" value="<?php echo esc_attr( $setting ) ?>"><?php echo esc_attr( $setting ); ?></textarea>
			<h4>Relazioni</h4>
			<p>Identificare i principali soggetti con i quali si stabilirà una collaborazione (max 1500 battute)</p>
			<textarea rows="4" cols="50" name="org2_progetto_group_extension_setting" value="<?php echo esc_attr( $setting2 ) ?>"><?php echo esc_attr( $setting2 ); ?></textarea>
        <?php
    }
 
    function settings_screen_save( $group_id ) {
		$group_id = bp_get_current_group_id();
        $setting = isset( $_POST['org_progetto_group_extension_setting'] ) ? $_POST['org_progetto_group_extension_setting'] : '';
        groups_update_groupmeta( $group_id, 'org_progetto_group_extension_setting', $setting );
        $setting2 = isset( $_POST['org2_progetto_group_extension_setting'] ) ? $_POST['org2_progetto_group_extension_setting'] : '';
        groups_update_groupmeta( $group_id, 'org2_progetto_group_extension_setting', $setting2 );
    }
 
    /**
     * create_screen() is an optional method that, when present, will
     * be used instead of settings_screen() in the context of group
     * creation.
     *
     * Similar overrides exist via the following methods:
     *   * create_screen_save()
     *   * edit_screen()
     *   * edit_screen_save()
     *   * admin_screen()
     *   * admin_screen_save()
     */
    function create_screen( $group_id ) {
		$group_id = bp_get_current_group_id();
        $setting = groups_get_groupmeta( $group_id, 'org_progetto_group_extension_setting' );
        $setting2 = groups_get_groupmeta( $group_id, 'org2_progetto_group_extension_setting' );
 
        ?>
			<h4>Processo</h4>
			<p>Descrivere l’organizzazione del processo produttivo, le azioni e le attività con cui si intende realizzare i prodotti/servizi/eventi del Progetto (max 1500 battute)</p>
			<textarea rows="4" cols="50" name="org_progetto_group_extension_setting" value="<?php echo esc_attr( $setting ) ?>"><?php echo esc_attr( $setting ); ?></textarea>
			<h4>Relazioni</h4>
			<p>Identificare i principali soggetti con i quali si stabilirà una collaborazione (max 1500 battute)</p>
			<textarea rows="4" cols="50" name="org2_progetto_group_extension_setting" value="<?php echo esc_attr( $setting2 ) ?>"><?php echo esc_attr( $setting2 ); ?></textarea>
        <?php
    }
 
}
bp_register_group_extension( 'Org_Progetto_Group_Extension' );
 
endif;

if ( !class_exists( 'Dettagli_Progetto_Group_Extension' ) ) :

	class Dettagli_Progetto_Group_Extension extends BP_Group_Extension {
    function __construct() {
		global $bp;
        $args = array(
            // need localization (English version default)
            'slug' => 'campo-dettagli-progetto',
            'name' => 'Dettagli progetto',
            'nav_item_position' => 8,
            'enable_nav_item' => false,
			'visibility' => 'private',
            'screens' => array(
                'edit' => array(
                    'name' => 'Dettagli progetto',
                    // The submit button
                    'submit_text' => 'Aggiorna',
                ),
                'create' => array(
                    'position' => 8,
                ),
            ),
        );
        parent::init( $args );
    }
 
    function display() {
        echo 'Per ora non inseriamo nulla, tanto sarà fatta la scheda';
    }
 
    function settings_screen( $group_id ) {
        $setting = groups_get_groupmeta( $group_id, 'risultato_progetto' );
        $setting2 = groups_get_groupmeta( $group_id, 'tempistiche_progetto' );
        ?>

Risultato: 
<input type="radio" name="risultato_progetto" <?php if($setting == 'one'){ ?> checked="checked" <?php } ?> value="one">Prima dell'hackathon<br>
<input type="radio" name="risultato_progetto" <?php if($setting == 'two'){ ?> checked="checked" <?php } ?> value="two">Durante l'hackathon<br>
<input type="radio" name="risultato_progetto" <?php if($setting == 'three'){ ?> checked="checked" <?php } ?> value="three">Dopo l'hackathon



Tempistiche: 
<input type="radio" name="tempistiche_progetto" <?php if($setting2 == 'one'){ ?> checked="checked" <?php } ?> value="one">Prodotto<br>
<input type="radio" name="tempistiche_progetto" <?php if($setting2 == 'two'){ ?> checked="checked" <?php } ?> value="two">Servizio<br>
<input type="radio" name="tempistiche_progetto" <?php if($setting2 == 'three'){ ?> checked="checked" <?php } ?> value="three">Evento<br>
<input type="radio" name="tempistiche_progetto" <?php if($setting2 == 'four'){ ?> checked="checked" <?php } ?> value="four">Processo

        <?php
    }
 
    function settings_screen_save( $group_id ) {
        $setting = isset( $_POST['risultato_progetto'] ) ? $_POST['risultato_progetto'] : '';
        groups_update_groupmeta( $group_id, 'risultato_progetto', $setting );
		
		$setting2 = isset( $_POST['tempistiche_progetto'] ) ? $_POST['tempistiche_progetto'] : '';
        groups_update_groupmeta( $group_id, 'tempistiche_progetto', $setting2 );
    }
 
    /**
     * create_screen() is an optional method that, when present, will
     * be used instead of settings_screen() in the context of group
     * creation.
     *
     * Similar overrides exist via the following methods:
     *   * create_screen_save()
     *   * edit_screen()
     *   * edit_screen_save()
     *   * admin_screen()
     *   * admin_screen_save()
     */
    // function create_screen_save( $group_id ) {
    /* function create_screen( $group_id ) {
        $setting = groups_get_groupmeta( $group_id, 'risultato_progetto' );
		$setting2 = groups_get_groupmeta( $group_id, 'tempistiche_progetto' );
 
        ?>
<form>
Risultato: 
<input type="radio" name="risultato_progetto" <?php if($setting=='one'){ ?> checked="checked" <?php } ?> value="one">Prima dell'hackathon<br>
<input type="radio" name="risultato_progetto" <?php if($setting=='two'){ ?> checked="checked" <?php } ?> value="two">Durante l'hackathon<br>
<input type="radio" name="risultato_progetto" <?php if($setting=='three'){ ?> checked="checked" <?php } ?> value="three">Dopo l'hackathon
</form>

<form>
Tempistiche: 
<input type="radio" name="tempistiche_progetto" <?php if($setting2=='one'){ ?> checked="checked" <?php } ?> value="one">Prodotto<br>
<input type="radio" name="tempistiche_progetto" <?php if($setting2=='two'){ ?> checked="checked" <?php } ?> value="two">Servizio<br>
<input type="radio" name="tempistiche_progetto" <?php if($setting2=='three'){ ?> checked="checked" <?php } ?> value="three">Evento<br>
<input type="radio" name="tempistiche_progetto" <?php if($setting2=='four'){ ?> checked="checked" <?php } ?> value="four">Processo
</form>
        <?php
    } */
 
}
bp_register_group_extension( 'Dettagli_Progetto_Group_Extension' );
 
endif;


if ( !class_exists( 'Need_Group_Extension' ) ) :

	class Need_Group_Extension extends BP_Group_Extension {
    function __construct() {
		//global $bp;
        $args = array(
            'slug' => 'campo-need',
            'name' => 'Risorse umane',
            'nav_item_position' => 10,
            'enable_nav_item' => false,
			'visibility' => 'private',
            'screens' => array(
                'edit' => array(
                    'name' => 'Risorse umane',
                    // Changes the text of the Submit button
                    // on the Edit page
                    'submit_text' => 'Aggiorna',
                ),
                'create' => array(
                    'position' => 10,
                ),
            ),
        );
        parent::init( $args );
    }
 
    function display() {
        echo 'Idem qui: per ora non inseriamo nulla, tanto sarà fatta una scheda, non so a quanti tab';
    }
 
    function settings_screen( $group_id ) {
		//$group_id = bp_get_current_group_id();
        //$setting = groups_get_groupmeta( $group_id, 'need_group_extension_setting' );
        /* ?>
        Salva campi 3: <input type="text" name="need_group_extension_setting" value="<?php echo esc_attr( $setting ) ?>" />
        <?php */
		$dump = create_fieldlist();
		$post_ID = groups_get_groupmeta( $group_id, $meta_key = 'post_node');
		$term_list = wp_get_post_terms($post_ID, 'need', array("fields" => "names"));
		$optionvalue = '<form name="competenze_form" action="" method="POST" enctype="multipart/form-data"><fieldset><legend>Competenze</legend><br>';
		foreach( $dump as $option ){
			$nome = $option->name;
			foreach( $term_list as $term ){
				if($term == $nome){$checked = 'checked="checked"';break;}
				else{$checked = '';}
			}
			// $nometag = str_replace(" ","-",$nome); versione php
			$nometag = sanitize_title($nome); // versione Wp
			$optionvalue .= '<input type="checkbox" name="competenze[]" value="'.strtolower($nometag).'" '.$checked.'/> '.$nome.'<br />';
		}
		$optionvalue .= '</fieldset><input type="submit" name="submit-competenze" value="Invia"></form>';
		echo $optionvalue;
		if(isset($_POST['submit-competenze'])) {
			$projectneed = ( $_POST['competenze'] ); 
			wp_set_post_terms( $post_ID, $projectneed, 'need' ); // sovrascrive le attuali impostazioni
		}
    }
 
    function settings_screen_save( $group_id ) {
        // e se mettessimo qui l'invio?!!!!!!!!
		//$setting = isset( $_POST['need_group_extension_setting'] ) ? $_POST['need_group_extension_setting'] : '';
        //groups_update_groupmeta( $group_id, 'need_group_extension_setting', $setting );
    }
 
}
bp_register_group_extension( 'Need_Group_Extension' );
 
endif;

if ( !class_exists( 'Ambiti_Group_Extension' ) ) :

	class Ambiti_Group_Extension extends BP_Group_Extension {
    function __construct() {
		//global $bp;
        $args = array(
            'slug' => 'campo-ambiti',
            'name' => 'Ambiti del progetto',
            'nav_item_position' => 9,
            'enable_nav_item' => false,
			'visibility' => 'private',
            'screens' => array(
                'edit' => array(
                    'name' => 'Ambiti del progetto',
                    // Changes the text of the Submit button
                    // on the Edit page
                    'submit_text' => 'Aggiorna',
                ),
                'create' => array(
                    'position' => 9,
                ),
            ),
        );
        parent::init( $args );
    }
 
    function display() {
        echo 'Idem qui: per ora non inseriamo nulla, tanto sarà fatta una scheda, non so a quanti tab';
    }
 
    function settings_screen() {
		echo do_shortcode('[front-end-subcat]');
    }
 
    function settings_screen_save( $group_id ) {
        $setting = isset( $_POST['ambiti_group_extension_setting'] ) ? $_POST['ambiti_group_extension_setting'] : '';
        groups_update_groupmeta( $group_id, 'ambiti_group_extension_setting', $setting );
    }
 
}
bp_register_group_extension( 'Ambiti_Group_Extension' );
 
endif;

function create_fieldlist( ){
	global $bp;
	$field = new BP_XProfile_Field( 2 );
	$dump = $field->get_children();	
	return $dump;
	}
	
/*	
function create_fieldlist( $group_id ){
	global $bp;
	$field = new BP_XProfile_Field( 2 );
	$dump = $field->get_children();	
	//Returns Array of Term ID's for "need"
	$post_ID = groups_get_groupmeta( $group_id, $meta_key = 'post_node');
	$term_list = wp_get_post_terms($post_ID, 'need', array("fields" => "slug"));
	$optionvalue = '<form action=""><fieldset><legend>Competenze</legend><br>';
	foreach( $dump as $option ){
		$nome = $option->name;
		// $nometag = str_replace(" ","-",$nome); versione php
		$nometag = sanitize_title($nome); // versione Wp
		$optionvalue .= '<input type="checkbox" name="'.$nome.'" value="'.strtolower($nometag).'" /> '.$nome.'<br />';
	}
	$optionvalue .= '</fieldset></form>';
	$optionvalue .= $post_ID.' oppure '.$group_id;
	print_r($term_list);
	echo $optionvalue;
	//wp_set_post_terms( $post_id, $terms, 'need', 'false' ); // sovrascrive le attuali impostazioni
}
*/

function create_group_node ( $group_id ) {
	global $bp;
			
	$group = groups_get_group( array( 'group_id' => $group_id ) );
	// controllo, di fatto, se il gruppo non è stato già creato (ex facendo step back nel processo di creazione)
	$groupmeta = groups_get_groupmeta( $group_id, $meta_key = 'post_node');

	// Insert or edit the post into the database and get the id for update_groupmeta field
	if (!$groupmeta):
		$my_post = array(
			'post_title'    => $group->name,
			'post_content'  => $group->description,
			'post_status'   => 'publish',
			'post_author'   => $group->creator_id,
			'post_type' => 'project',
			//'post_category' => array(8,39)
		);
		$post_ID = wp_insert_post( $my_post );
	else:
		$my_post = array(
			'ID' => $groupmeta,
			'post_title'    => $group->name,
			'post_content'  => $group->description,
		);
		$post_ID = wp_update_post( $my_post );
	endif;
	
	//add post id to groupmeta
    groups_update_groupmeta( $group_id, 'post_node', $post_ID );
	//add group id to postmeta; underscore hide the postmeta in editor
	add_post_meta( $post_ID, '_group_node', $group_id, true ) || update_post_meta( $post_ID, '_group_node', $group_id );
}

// fired quando il post è completamente finito add_action( 'groups_group_create_complete',  'create_group_node' );
add_action( 'groups_created_group',  'create_group_node' );

}

 
/* Se troviamo codice alternativo a Bp, possiamo metterlo qui sotto */

?>