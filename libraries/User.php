<?php

/**
 * summary
 */
class User
{
    protected $db;
    private $_stmt;
    /**
     * summary
     */
    public function __construct()
    {
        $this->db = new Database;
    }

   
    public function login($username, $password)
    {
        $this->db->query("SELECT * FROM users
                                    WHERE username = :username
                                    AND password = :password            
        ");
        
        //Bind Values
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        
        $row = $this->db->single();

        //Check Rows
        if ($this->db->rowCount() > 0) {
            $this->setUserData($row);
            return true;
        } else {
            return false;
        }
    }
    
    /*
     * Set User Data
     */
    private function setUserData($row)
    {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_id'] = $row->id;
        $_SESSION['username'] = $row->username;
        $_SESSION['name'] = $row->name;
    }
    
    /*
     * User Logout
    */
    public function logout()
    {
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['name']);
        return true;
    }
}
