<?php

	/* CLASS OF CONNECT WITH DATABASE AND SQL OPERATIONS */
	/* CREATED BY: Allan Barbosa */
	/* YEAR: 2018 */
	/* PROJECT: SysLogin */

	class Database extends PDO {

		/* ATTRIBUTES */
		private $conn; //for connection with database 

		/* METHODS */

		//Construct Method For Connection With Database
		public function __construct() {

			$this->conn = new PDO("mysql:host=127.0.0.1;dbname=sislog", "root", "");

		}

		//Query Method For Performing SQL Scripts
		public function query($rawQuery, $params = array()) {

			$stmt = $this->conn->prepare($rawQuery);

			$this->setParams($stmt, $params);

			$stmt->execute();

			return $stmt;

		}

		//SetParams Method For Adding Parameters In SQL Script
		private function setParams($statement, $parameters = array()) {

			foreach ($parameters as $key => $value) {
				
				$this->setParam($statement, $key, $value);

			}

		}

		//SetParam Method For Add One Param Per Call
		private function setParam($statement, $key, $value) {

			$statement->bindParam($key, $value);

		}

		//Select Method For Store Datas In Arrays
		public function select($rawQuery, $params = array()) : array {

			$stmt = $this->query($rawQuery, $params);

			return $stmt->fetchAll(PDO::FETCH_ASSOC);

		}


	}