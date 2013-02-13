<?php

class DB {
	public $host = 'localhost';
	public $user = 'root';
	public $pass = '';
	public $db   = 'social';
	
	public function __construct() {
		$conn = mysql_connect( $this->host, $this->user, $this->pass) or die('Cannot connect db' . mysql_error() );
		mysql_select_db( $this->db, $conn) or die('Cannot connect. ' . mysql_error() );
	}
	
	public function get_results( $sql ) {
		$data = array();
		
		$results = mysql_query( $sql );
		while( $row = mysql_fetch_array( $results ) ) {
			$data[] = $row;
		}
		
		return (!empty($data)) ? $data : FALSE;
	}
	
	public function get_row( $sql ) {
		$data = array();
		
		$result = mysql_query( $sql );
		$data = mysql_fetch_row( $result);
		
		return $data;
	}
	
	public function insert( $table, $data = array() ) {
		$fields = array_keys( $data );
		$field_value = array();
		
		foreach ( $data as $value ) {
			$field_value[] = $value;
		}
		
		$sql = "INSERT INTO $table (" . implode( ',', $fields ) . ") VALUES ('" . implode( "','", $field_value ) . "')";
		
		$result = mysql_query( $sql );
		$last_id = mysql_insert_id();
		
		if ( $last_id !== NULL && is_numeric($last_id) && $last_id > 0)
			return $last_id;
		else
			return FALSE;
		
	}
	
	public function delete( $table, $where ) {
		$wheres =array();
		
		foreach ( $where as $field => $value ) {
			$wheres[] = "$field = '$value'";
		}
		
		$sql = "DELETE FROM $table WHERE " . implode( ' AND ', $wheres);
		$result = mysql_query( $sql );
		
		return $result;
	
	}
	
	
	
}

session_start();
// session_destroy();
$db = new DB();
?>