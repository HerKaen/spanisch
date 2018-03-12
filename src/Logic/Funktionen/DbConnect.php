<?php

namespace spanisch\Logic\Funktionen;


use mysqli;

class DbConnect
{
    /**
     * @return mysqli
     */
    public function connect(): mysqli
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'nico';

        @ $db = new mysqli($host, $user, $pass, $dbname);

        if (mysqli_connect_errno()) {
            die('The connection to the database could not be established.');
        }
        return $db;
    }
}