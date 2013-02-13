<?php
function validate_login( $posts ) {
	global $db;
	
	$return = array( 'error' => TRUE, 'msg' => '', 'posts' => array( 'username' => '') );
	
	$username = mysql_real_escape_string( $posts['log'] );
	$password = mysql_real_escape_string( $posts['pwd'] );
	
	
	$sql = "SELECT * FROM users WHERE user='$username'";
	$user = $db->get_row($sql);
	
	/* check if user exist */
	if ( $user !== FALSE ) {
		$sql = "SELECT * FROM users WHERE user='$user[1]' AND password='$password'";
		$data = $db->get_row($sql);
		
		/* check if password match username */
		if ( $data !== FALSE ) {
			// session_start();
			$_SESSION['uid'] = $data[0];
			$return['error'] = FALSE;
			
		} else {
			$return['msg'] = "The password you entered for the username <strong>$username</strong> is incorrect.";
			$return['posts']['username'] = $username;
		}
		
	} else {
		$return['msg'] = "Invalid username.";
	}
	
	return $return;
	
}
?>