<?php
/**
 * Validates register form
 *
 * @access public
 * @param array $posts
 * - from Register Form Page
 * @return array $return
 */
function validate_register( $posts ) {
	global $db;
	
	$return = array( 'error' => TRUE, 'msg' => '', 'posts' => array( 'username' => '') );
	
	$username 	= mysql_real_escape_string( $posts['log'] );
	$password 	= mysql_real_escape_string( $posts['pwd'] );
	$repassword = mysql_real_escape_string( $posts['repwd'] );
	
	$fname 		= mysql_real_escape_string( $posts['fname'] );
	$lname 		= mysql_real_escape_string( $posts['lname'] );
	$email 		= mysql_real_escape_string( $posts['email'] );
	$address 	= mysql_real_escape_string( $posts['address'] );
	
	
	$sql = "SELECT * FROM users WHERE user='$username'";
	$user = $db->get_row($sql);
	
	/* check if user exist */
	if ( $user === FALSE ) {
	
		/* check if password not empty */
		if ( trim($password) != '') {
		
			/* check if password match retyping */
			if ( $password == $repassword ) {
			
				/* check if valid email */
				if ( is_email($email) ) {
				
					$save_user = $db->insert('users', array(
						'user' => $username,
						'password' => $password
					));
					
					/* check if successfully save user */
					if ( $save_user !== FALSE ) {
						
						$save_usermeta = $db->insert('user_meta', array(
							'user_id' => (int) $save_user,
							'first_name' => $fname,
							'last_name' => $lname,
							'email' => $email,
							'address' => $address
						));
						
						/* check if successfully save usermeta */
						if ( $save_usermeta !== FALSE ) {
							$return['error'] = FALSE;
							
						} else {
							$return['msg'] = 'Error in saving usermeta';
						}
						
						
					} else {
						$return['msg'] = 'Error in inserting user.';
					}
					
					
				} else {
					$return['msg'] = 'Invalid email address';
				}
				
			} else {
				$return['msg'] = 'Retyping of password did not match.';
			}
			
		} else {
			$return['msg'] = 'Password is required.';
		}
		
	} else {
		$return['msg'] = "User already exist.";
	}
	
	return $return;
	
}
?>