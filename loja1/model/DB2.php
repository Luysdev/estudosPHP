<?php
class DB2 {
    private $hostName_db;
    private $username_db;
    private $password_db;
    private $data_base_db;
    private $port_db;
    public function __construct($hostName_db,$username_db,$password_db,$data_base_db,$port_db)
        {
            $this->hostName_db = $hostName_db;
            $this->username_db = $username_db;
            $this->password_db = $password_db;
            $this->data_base_db = $data_base_db;
            $this->port_db = $port_db;
        }

    function iniciaConexao()
    {
        $conn = mysqli_connect($this->hostName_db, $this->username_db, $this->password_db, $this->data_base_db, $this->port_db);
        print_r($conn);
        echo "BD aberto";
        return $conn;

    }
}