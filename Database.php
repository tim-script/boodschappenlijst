<?php

class Database {
	private $pdo;

	public function __construct($config) {
		$dsn = "mysql:";
		if (array_key_exists("host", $config))
			$dsn .= "host={$config["host"]};";
		if (array_key_exists("port", $config))
			$dsn .= "port={$config["port"]};";
		if (array_key_exists("database", $config))
			$dsn .= "dbname=${config["database"]};";

		$user = $config["user"] ?? null;
		$password = $config["password"] ?? null;

		$this->pdo = new PDO($dsn, $user, $password);
	}

	public function query($sql, $params = null) {
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute($params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
