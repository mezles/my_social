<?php
/* redirect to homepage if user is logged in */
if ( !is_logged_in() ) {
	header( 'Location: ' . site_url('login.php') );
	
}


require( 'model/home_model.php' );
require( 'view/home_view.php' );

$data = null;
if ( $_POST && !empty($_POST) ) {
	$data = validate_login( $_POST );
	if ( $data['error'] === FALSE && isset($_SESSION['uid']) ) {
		header( 'Location: ' . site_url('home.php') );
	}
}

login_view($data);

?>