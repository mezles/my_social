<?php
/* redirect to homepage if user is logged in */
if ( is_logged_in() ) {
	header( 'Location: ' . site_url('home.php') );
	
}


require( 'model/login_model.php' );
require( 'view/login_view.php' );

$data = array(
	'title' => 'Login Page'
);

if ( $_POST && !empty($_POST) ) {
	$data = validate_login( $_POST );
	if ( $data['error'] === FALSE && isset($_SESSION['uid']) ) {
		header( 'Location: ' . site_url('home.php') );
	}
}

login_view($data);

?>