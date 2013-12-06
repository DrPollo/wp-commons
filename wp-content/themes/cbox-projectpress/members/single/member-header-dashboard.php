<?php 

/** 
*** Dashboad for the user header
*** deadlines
*** if user
*** projects status
*** else 
*** actions
**/

// user page
// logged user
if(is_user_logged_in()):
	include('member-actions.php');
	// my member page
	if ( bp_is_my_profile() ){
		include('member-dashboad.php'); 
	}
endif;
?>


