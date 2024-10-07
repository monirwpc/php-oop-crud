<?php 
	class Database {
		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASS;
		public $name = DB_NAME;

		public $link;
		public $error;

		public function __construct() {
			$this->connectDB();
		}

		private function connectDB() {
			$this->link = new mysqli( $this->host, $this->user, $this->pass, $this->name );
			if( ! $this->link ) {
				$this->error = "Connection Failed".$this->link->connect_error;
				return false;
			}
		}

		public function select($query) {
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if( $result->num_rows > 0 ) {
				return $result;
			} else {
				return false;
			}
		}

		public function selectDataByID($query) {
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if( $result->num_rows > 0 ) {
				return $result;
			} else {
				return false;
			}
		}


		public function insert($query) {
			$insert = $this->link->query($query) or die( $this->link->error.__LINE__);
			if( $insert ) {
				header("Location: index.php?msg=".urlencode('Data inserted successfully'));
				exit();
			} else {
				die("Error : (".$this->link->errno.")".$this->link->error);
			}
		}

		public function update($query) {
			$insert = $this->link->query($query) or die( $this->link->error.__LINE__);
			if( $insert ) {
				header("Location: index.php?msg=".urlencode('Data updated successfully'));
				exit();
			} else {
				die("Error : (".$this->link->errno.")".$this->link->error);
			}
		}


		public function deleteDataByID( $query ) {
			$delete = $this->link->query($query) or die( $this->link->error.__LINE__);
			if( $delete ) {
				header("Location: index.php?msg=".urlencode('Data deleted successfully'));
				exit();
			} else {
				die("Error : (". $this->link->errno.")".$this->link->error);
			}
		}


	}


?>