<?php

class DatabaseClass{
    private $connection = null;

    // this function is called everytime this class is instantiated		
    public function __construct( $dbhost = "localhost", $dbname = "myDataBaseName", $username = "root", $password    = ""){
        try{
            $this->connection = new mysqli($dbhost, $username, $password, $dbname);
            if( mysqli_connect_errno() ){
                throw new Exception("Could not connect to database.");   
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());   
        }
    }

    // Insert a row/s in a Database Table
    public function Insert( $query = "" , $params = [] ){
        try {
            $stmt = $this->executeStatement( $query , $params );
            $stmt->close();
            return $this->connection->insert_id;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    // Select a row/s in a Database Table
    public function Select( $query = "" , $params = [] ){
        try {
            $stmt = $this->executeStatement( $query , $params );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);				
            $stmt->close();
            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    // Update a row/s in a Database Table
    public function Update( $query = "" , $params = [] ){
        try {
            $this->executeStatement( $query , $params )->close();
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }		

    // Remove a row/s in a Database Table
    public function Remove( $query = "" , $params = [] ){
        try {
            $this->executeStatement( $query , $params )->close();
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }		

    // execute statement
    private function executeStatement( $query = "" , $params = [] ){
        try {
            $stmt = $this->connection->prepare( $query );
            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
            if( $params ){
                call_user_func_array(array($stmt, 'bind_param'), $this->refValues($params) );				
            }
            $stmt->execute();
            return $stmt;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
    }

    private function refValues($arr){
        $refs = array();
        foreach($arr as $key => $value) {
            $refs[$key] = &$arr[$key];
        }
        return $refs;
    }
		
    public function dnevnik($radnja, $upit, $tip_radnje_id) {
        $sql = "INSERT INTO `dnevnik_rada` (`radnja`, `upit`, `datum_vrijeme`, `korisnik_id`, `tip_radnje_id`) VALUES (?, ?, ?, ?, ?) ";
        $datum_vrijeme = $this->vrijemePomak(date("Y-m-d H:i:s"));
        $korisnik_id = $_SESSION['id'] ?? '';
        $tip_radnje_id = $tip_radnje_id ?? null;
        $values = [
            'sssii',
            $radnja,
            $upit,
            $datum_vrijeme,
            $korisnik_id,
            $tip_radnje_id
        ];
        # die($sql .  print_r($values, true));
        $data = $this->Insert($sql, $values);

    }

    public function vrijemePomak($date)
    {
        $pomak = '+0';
        return date('Y-m-d H:i:s', strtotime($date . ' ' . $pomak . ' day'));
    }

    public function generateHash(): string
    {
        $bytes = random_bytes(8);
        $base64 = base64_encode($bytes);

        return rtrim(strtr($base64, '+/', '-_'), '=');
    }

    public function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $password = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $password[] = $alphabet[$n];
        }
        return implode($password);
    }
}
