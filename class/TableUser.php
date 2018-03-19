<?php

	class TableUser {

		/* ATTRIBUTES */
		private $user_id;
		private $user_firstname;
		private $user_lastname;
		private $user_birthdate;
		private $user_email;
		private $user_pass;
		private $user_datecreate;

		/* CONSTRUCT METHODS */

		//construct
		public function __construct($fn = "", $ln = "", $bd = "", $e = "", $p = "") {

			$this->setFirstName($fn);
			$this->setLastName($ln);
			$this->setBirthDate($bd);
			$this->setEmail($e);
			$this->setPass($p);

		}

		//toString
		public function __toString() {

			return json_encode(array(

				'Id' => $this->getId(),
				'FirstName' => $this->getFirstName(),
				'LastName' => $this->getLastName(),
				'BirthDate' => $this->getBirthDate()->format("Y/m/d"),
				'Email' => $this->getEmail(),
				'Pass' => $this->getPass(),
				'DateCreate' => $this->getDateCreate()->format("Y/m/d H:i:s")

			));

		}

		/* METHODS */
		//METHOD FOR GETTERS AND SETTERS

		//$user_id
		public function getId() {
			return $this->user_id;
		}

		public function setId($value) {
			$this->user_id = $value;
		}

		//$user_firstname
		public function getFirstName() {
			return $this->user_firstname;
		}

		public function setFirstName($value) {
			$this->user_firstname = $value;
		}

		//$user_lastname
		public function getLastName() {
			return $this->user_lastname;
		}

		public function setLastName($value) {
			$this->user_lastname = $value;
		}

		//$user_birthdate
		public function getBirthDate() {
			return $this->user_birthdate;
		}

		public function setBirthDate($value) {
			$this->user_birthdate = $value;
		}

		//$user_email
		public function getEmail() {
			return $this->user_email;
		}

		public function setEmail($value) {
			$this->user_email = $value;
		}

		//$user_pass
		public function getPass() {
			return $this->user_pass;
		}

		public function setPass($value) {
			$this->user_pass = $value;
		}

		//$user_datecreate
		public function getDateCreate() {
			return $this->user_datecreate;
		}

		public function setDateCreate($value) {
			$this->user_datecreate = $value;
		}

		//METHOD FOR SET DATAS IN ATTRIBUTES

		//method for this
		private function setData($data) {

			$this->setId($data['user_id']);
			$this->setFirstName($data['user_firstname']);
			$this->setLastName($data['user_lastname']);
			$this->setBirthDate(new DateTime($data['user_birthdate']));
			$this->setEmail($data['user_email']);
			$this->setPass($data['user_pass']);
			$this->setDateCreate(new DateTime($data['user_datecreate']));

		}

		//METHOD FOR OBTAIN DATAS OF DATABASE BY EMAIL PARAMETER

		//method for this
		public function loadByEmail($email) {

			$sql = new Database();

			$result = $sql->select("SELECT * FROM tb_user WHERE user_email = :EMAIL", array(

				':EMAIL' => $email

			));

			if (count($result) > 0) {

				$this->setData($result[0]);

			}

		}

		//METHOD FOR VERIFY IF EMAIL ARE ALREADY REGISTERED

		//method for this
		public function isEmailExists($email) : bool  {

			$sql = new Database();

			$result = $sql->select("SELECT * FROM tb_user WHERE user_email = :EMAIL", array(

				':EMAIL' => $email

			));

			if (count($result) > 0) {
				
				return true;

			} else {

				return false;

			}

		}

		//METHOD FOR VERIFY IF EMAIL AND PASS EXISISTS 

		//method for this
		public function verify() : bool {

			$sql = new Database();

			$results = $sql->select("SELECT * FROM tb_user WHERE user_email = :E AND user_pass = :P", array(

					':E' => $this->getEmail(),
					':P' => $this->getPass()

			));

			if (count($results) > 0) {
				
				return true;

			} else {

				return false;

			}

		}

		//METHOD FOR INSERT DATAS IN DATABASE

		//method for this

		public function insert() {

			$sql = new Database();

			$results = $sql->select("CALL sp_user_insert(:FN, :LN, :BD, :E, :P)", array(

				':FN' => $this->getFirstName(),
				':LN' => $this->getLastName(),
				':BD' => $this->getBirthDate(),
				':E'  => $this->getEmail(),
				':P'  => $this->getPass()

			));

			if (count($results) > 0) {

				$this->setData($results[0]);

			}

		}

	}