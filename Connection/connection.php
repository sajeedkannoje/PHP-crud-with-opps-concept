<?php

namespace Connection;

use mysqli;

class Connection extends mysqli
{
    private $server_name = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = 'blog_opps';
    protected  $connection;
    public function __construct()
    {
        if (!isset($this->connection)) {
            // Create connection
            $this->connection = new mysqli($this->server_name, $this->username, $this->password, $this->dbname);
            // Check connection
            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }
        }
        return $this->connection;
    }
}
