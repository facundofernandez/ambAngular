<?php
 
class DB {
	static $dbh;
	
	private function __construct(){}
	
	/**
	 * @static
	 * @return PDO
	 */
	static function getConnection() {
		if(empty(self::$dbh)) {
			try {
				self::$dbh = new PDO("mysql:host=localhost;dbname=abmangularjs", "root", "", 
					array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
				);
				
			} catch(Exception $e) {
				echo "<strong>Error de conexion a MySQL:</strong> " . $e->getMessage();
			}
		}

		return self::$dbh;
	}

	/**
	 * @static
	 * @param string $query
	 * @return PDOStatement
	 */
	static function getStatement($query) {
		return self::getConnection()->prepare($query);
	}
}
