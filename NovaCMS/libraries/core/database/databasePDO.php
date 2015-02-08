<?php
    class DatabasePDO {
    	var $dbname = '';
		var $dbuser = '';
		var $dbpass = '';
		var $dbserver = '';
		var $pdo;

		function set_config($server, $db, $user, $pass){
			$this->dbserver = $server;
			$this->dbname = $db;
			$this->dbuser = $user;
			$this->dbpass = $pass;
		}

		private function connect() {
			try {
				$this->pdo = new PDO('mysql:host=' . $this->dbserver . ';dbname=' . $this->dbname, $this->dbuser, $this->dbpass);
				//echo "Connected";
			}
			catch(PDOException $e) {
				echo "Not connected " . $e->getMessage();
			}
		}

		private function disconnect() {
			$this->pdo = null;
		}

    function safe_query($sql) {
      $this->connect();
      $sq = $this->pdo->prepare($sql);
      return $sq;
    }

		function query($sql) {
			$this->connect();
			$res = $this->pdo->query($sql);
			$this->disconnect();
			return $res;
		}

		function loadResult($sql) {
			$this->connect();
			$rows = array();
			$res = $this->pdo->query($sql);
			while($row = $res->fetch(PDO::FETCH_ASSOC)){
				$rows[] = $row;
			}
			$this->disconnect();
			return $rows;
		}

		function loadSingleResult($sql){
			$this->connect();
			$res = $this->pdo->query($sql);
			$row = $res->fetch();
			$this->disconnect();
			return $row;
		}
    }
?>
