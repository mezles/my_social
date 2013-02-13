<?php
require( 'db-connect.php' );
require( 'common.php' );

if ( is_logged_in() ) {
	header( 'Location: ' . site_url('home.php') );

} else {
	header( 'Location: ' . site_url('login.php') );

}
?>