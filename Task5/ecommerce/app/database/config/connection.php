<?php
class connection{
    private $hostname='localhost';
    private $username='root';
    private $password='20160020';
    private $database='nti_ecommerce';
    private $connection;
    function __construct()
    {
        $this->connection=new mysqli($this->hostname,$this->username,$this->password,$this->database);
        //for debuging to developer
        // if($connection->connect_error)
        // {
        //     die("Connection Error is: ".$connection->connect_error);
        // }
        // else
        // {
        //     die("Connection Correct");
        // }
    }
    public function SqlInjection($attr)
    {
        return $this->connection->real_escape_string($attr);
    }
    public function runDQL($query)
    {
        $result= $this->connection->query($query);
        if($result->num_rows>0)
        {
            return $result;
        }
        else
        {
            return [];
        }
    }
    public function runDML($query)
    {
        $result= $this->connection->query($query);
        if($result)
        {
            return True;
        }
        else
        {
            return False;
        }
    }
}