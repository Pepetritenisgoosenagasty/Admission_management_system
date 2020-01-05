<?php
class Database
{
    private $host = DB_HOST;
    private $port = DB_PORT;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    
    private $dbh;
    private $error;
    private $stmt;
    
    public function __construct()
    {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host .'; port=' . $this->port . ';dbname=' . $this->dbname;
        // Set options
        $options = array (
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_PERSISTENT => true
        );
        // Create a new PDO instanace
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            // echo 'connected';
        }       // Catch any errors
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }
    
    
    public function prepare($sql)
    {
        $result = $this->stmt = $this->dbh->prepare($sql);
        return $result;
    }
    
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    
    
    public function execute()
    {
        return $this->stmt->execute();
    }
    
    
    public function fetchAll()
    {
        $this->execute();
        return $this->stmt->fetchAll();
    }
    
    
    public function fetch()
    {
        $this->execute();
        return $this->stmt->fetch();
    }
    
    
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
    
    
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
    
    
    public function beginTransaction()
    {
        return $this->dbh->beginTransaction();
    }
    
    
    public function endTransaction()
    {
        return $this->dbh->commit();
    }
    
    
    public function cancelTransaction()
    {
        return $this->dbh->rollBack();
    }
}
