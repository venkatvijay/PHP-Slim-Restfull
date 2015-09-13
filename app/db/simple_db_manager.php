<?php
/**
 * @author luca
 * a basic implementation of a database manager
 */
class DBManager{

	private $db_link;
	private $hostname = 'localhost';
	private $username = 'root';
	private $password = '';
	private $dbname;

	function __construct($dbname){
		$this->dbname = $dbname;
	}

	function openConnection(){
		$this->db_link = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname) or die("Unable to connect to database.");
	}

	function executeSelectQuery($query){
		
		$result = mysqli_query($this->db_link, $query) or die("Syntax error in SQL statement." . $this->db_link->error);	
 		//Fetch a result row as an associative array
		$rows = array();
 		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$rows[] = $row;
		}
		return $rows;
	}
	
	function executeQuery($query){
		mysqli_query($this->db_link, $query) or die("Syntax error in SQL statement."  . $this->db_link->error);
		$numAffectedRows = mysqli_affected_rows($this->db_link);
		return $numAffectedRows;
	}
	
	function closeConnection(){
		$this->db_link->close();
	}
}
?>
