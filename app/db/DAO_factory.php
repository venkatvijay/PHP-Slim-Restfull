<?php
/**
 * @author Luca
 * definition of the DAO factory
 */
include_once 'simple_db_manager.php';

class DAO_Factory {
	private $dbManager;

	function getDbManager() {
		if($this->dbManager == null)
			throw new Exception("No persistence storage link");
		return $this->dbManager;
	}

	/**
	 * init resources: connect to the database
	 */
	function initDBResources() {
		$dbName = "ditcoursedb";
		$this->dbManager = new dbmanager($dbName);
		$this->dbManager->openConnection();
	}

	/**
	 * release resources: close the database link
	 */
	function clearDBResources() {
		if($this->dbManager != null)
			$this->dbManager->closeConnection();
	}

	/**
	 * return the reference of the Users DAO
	 */
	function getMessagesDAO() {
		require_once("dao/messagesDAO.php");
		return new messagesDAO($this->getDbManager());
	}

}


