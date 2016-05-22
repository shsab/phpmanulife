<?php

//global $_ENV;

	define("__HOST__", getenv('OPENSHIFT_MYSQL_DB_HOST'));
	define("__USER__", getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
	define("__PASS__", getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
	define("__DB__", getenv('OPENSHIFT_APP_NAME'));
	define("__PORT__", getenv('OPENSHIFT_MYSQL_DB_PORT'));
/*	
	define("__HOST__", '127.13.52.2');
	define("__USER__", 'adminj5dgMKW');
	define("__PASS__", 'rEnteIf4HYaF');
	define("__DB__", 'phpmanulife');
	define("__PORT__", $_ENV['OPENSHIFT_MYSQL_DB_PORT']);
*/

	class MYSQLDB {
		private $con = false;
		private $data = array();
		public function __construct() {
			$this->con = new mysqli(__HOST__, __USER__, __PASS__, __DB__);
			
			if($this->con->connection_error > 0) {
				die("DB connection failed:" . $con->connection_error);
			}
		}
		
		public function execute($sql=null) {
			if ($sql === null) $sql = "select sysdate() from dual";
			
			if(!$result = $this->con->query($sql)){
				die('There was an error running the query [' . $this->con->error . ']');
			}
			
			if($result->num_rows > 0) {
				while($row = $result->fetch_object()) {
					$this->data[] = $row;
				}
			} else {
				$this->data[] = null;
			}
			$result->free();
			return $this->data;
		}
	}
?>