<?php
/* redirect to homepage if user is logged in */
// if ( !is_logged_in() ) {
	// header( 'Location: ' . site_url('login.php') );
	
// }


require( 'model/register_model.php' );
require( 'view/register_view.php' );

$data = array();
$data['title'] = 'Register Page';
if ( $_POST && !empty($_POST) ) {
	// var_dump($_POST);
	$data['validate'] = validate_register( $_POST );
	if ( $data['validate']['error'] === FALSE && isset($_SESSION['uid']) ) {
		header( 'Location: ' . site_url('home.php') );
	}
}

register_view($data);

?>