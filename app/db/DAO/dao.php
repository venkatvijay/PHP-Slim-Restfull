<?php

class BaseDAO {
	
	var $dbManager = null;
	
	function BaseDAO($dbMng) {
		$this->dbManager = $dbMng;	
	}
	
	function getDbManager() {
		return $this->dbManager;
	}
}

?>

