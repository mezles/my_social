<?php

/**
 * Parse PHP echo output
 *
 * @access public
 * @param $string
 * @return string
 */
function _e( $string ) {
	echo $string;
}

/**
 * Check if user is currently logged in
 *
 * @access public
 * @param none
 *	- check for session uid
 * @return boolean
 */
function is_logged_in() {
	if ( isset($_SESSION['uid']) ) {
		return TRUE;
	} else {
		return FALSE;
	}
	// return ( isset($_SESSION['uid']) ) ? TRUE : FALSE;
}

/**
 * Returns base url
 *
 * @access public
 * @param none
 * @return string
 */
function base_url() {
	if (isset($_SERVER['HTTP_HOST'])) {
		$base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
		$base_url .= '://'. $_SERVER['HTTP_HOST'];
		$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
		
	} else {
		$base_url = 'http://localhost/';
	}
	
	return $base_url;
}

/**
 * Returns site url
 *
 * @access public
 * @param none
 * @return string
 */
function site_url( $param = NULL ) {
	if ( $param !== NULL ) {
		$site_url = base_url() . $param;
	} else {
		$site_url = base_url();
	}
	
	return $site_url;
}

/** 
 * Validates email address
 *
 * @access public
 * @param string
 * @return boolean
 */
function is_email( $email ) {
	$pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.[a-zA-Z0-9._-]*$/';
	return (preg_match($pattern, $email)) ? TRUE : FALSE;
}
?>