<?php
function login_view( $data = NULL ) {
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $data['title']; ?></title>
	<link rel="stylesheet" id="wp-admin-css" type="text/css" media="all" href="<?php echo site_url( 'style/wp-admin.css' ) ?>" />
	<link rel="stylesheet" id="buttons-css" type="text/css" media="all" href="<?php echo site_url( 'style/buttons.css' ) ?>" />
	<link rel="stylesheet" id="colors-fresh-css" type="text/css" media="all" href="<?php echo site_url( 'style/colors-fresh.css' ) ?>" />
	<script type="text/javascript">
		
	</script>
</head>

<body class="login login-action-login wp-core-ui">
	<div id="login">
		<h1>
			<a title="Social Site" href="<?php echo site_url(); ?>"><?php _e( 'Login Page' ); ?></a>
		</h1>
		
		<?php if( isset($data['error']) && $data['error'] === TRUE ): ?>
		<div id="login_error">
			<strong><?php _e( 'ERROR' ); ?></strong>:&nbsp;<?php echo $data['msg']; ?>
			<a title="Password Lost and Found" href="<?php echo site_url('get_password.php'); ?>"><?php _e( 'Lost your password' ); ?></a>?
		</div>
		<?php endif; ?>
		<form id="loginform" name="loginform" method="POST" action="<?php echo site_url( 'login.php' ); ?>">
			<p>
				<label for="user_login"><?php _e( 'Username' ); ?><br />
				<input type="text" id="user_login" class="input" size="20" name="log" value="<?php 
				echo (isset($data['posts'])) ? $data['posts']['username'] : ''; ?>"></label>
			</p>
			<p>
				<label for="user_pass"><?php _e( 'Password' ); ?><br />
				<input type="password" id="user_pass" class="input" size="20" name="pwd"></label>
			</p>
			<p class="forgetmenot">
				<label for="rememberme">
					<input type="checkbox" id="rememberme" value="forever" name="rememberme" /><?php _e( ' Remember Me' ); ?>
				</label>
			</p>
			<p class="submit">
				<input type="submit" id="wp-submit" class="button button-primary button-large" value="Log In" name="wp-submit">
			</p>
			
		</form>
		
		<p id="nav">
			<a title="Password Lost and Found" href="<?php echo site_url('get_password.php'); ?>"><?php _e( 'Lost your password?' ); ?></a>
		</p>
		<p id="nav">
			<a title="Register Here" href="<?php echo site_url('register.php'); ?>"><?php _e( 'Not yet register?' ); ?></a>
		</p>
		<p id="backtoblog">
			<a title="Are you lost?" href="<?php echo site_url(); ?>"><?php _e( '← Back to Social Site' ); ?></a>
		</p>
	</div>

</body>
</html>

<?php
}
?>