<?php

class Dbh {
	
	protected function connect() {

		$pdo = new PDO('mysql:host=localhost;dbname=denali;charset=utf8', 'root', '');
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $pdo;

	}

}