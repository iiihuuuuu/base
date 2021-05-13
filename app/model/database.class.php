<?php

require_once 'connection.class.php';

class Database extends Connection {
	
	public function __construct() {
		parent::__construct('localhost','root', '', 'db_amosaude');
    }

}
