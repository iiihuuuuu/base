<?php

require_once 'connection.class.php'; require 'config.php';

class Database extends Connection {
	
	protected $transactionCount = 0;

	public function __construct() {
		parent::__construct(USERNAME,PASSWORD,HOST,DBNAME);
    }

    public function beginTransaction()
    {
        if (!$this->transactionCounter++) {
            return parent::getConnection()->beginTransaction();
        }
        $this->exec('SAVEPOINT trans'.$this->transactionCounter);
        return $this->transactionCounter >= 0;
    }

    public function commit()
    {
        if (!--$this->transactionCounter) {
            return parent::getConnection()->commit();
        }
        return $this->transactionCounter >= 0;
    }

    public function rollback()
    {
        if (--$this->transactionCounter) {
            $this->exec('ROLLBACK TO trans'.$this->transactionCounter + 1);
            return true;
        }
        return parent::getConnection()->rollback();
    }

}
