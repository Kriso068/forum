<?php

/**
 * User
 */
class User
{
    private $db;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->db = new Database;
    }
    
    /**
     * Register function
     *
     * @param  mixed $data
     * @return void
     */
    public function register($data)
    {
        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');

        //binding the values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }

    //Login user
    
    /**
     * Login function
     *
     * @param  mixed $email
     * @param  mixed $password
     * @return void
     */
    public function login($email, $password) 
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        //bind value
        $this->db->bind(':email', $email);

        //we calling the function single for get a single answer with the fetch
        $row = $this->db->single();

        $hashed_password = $row->password;
        

        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
  
    /**
     * Find user by email   
     * findUserByEmail
     *
     * @param  string $email
     * @return void
     */
    public function findUserByEmail($email)
    {
        //we looking for user by email abd we bind param we looking for Controller Database
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //bind the value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //We check row if something is inside
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Function ti getUserById
     *
     * @param  mixed $id
     * @return void
     */
    public function getUserById($id)
    {
        //we looking for user by email abd we bind param we looking for Controller Database
        $this->db->query('SELECT * FROM users WHERE id = :id');

        //bind the value
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

}