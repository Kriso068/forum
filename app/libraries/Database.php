<?php

/**
 * PDO database class implementation
 * connect to database
 * create prepare statment
 * bind values
 * return rows and result
 */

class Database
{
     // we using the define paramater from the config 
     private $host = DB_HOST;
     private $user = DB_USER;
     private $password = DB_PASSWORD;
     private $dbname = DB_NAME;

     private $dbh;
     private $stmt;
     private $error;
     
     /**
      * __construct
      *
      * @return void
      */
    public function __construct()
    {
        // Set the DSN
        $dsn = 'mysql:host=' . $this->host. ';dbname=' . $this->dbname;
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            //request a persistent connection rather than a neew one
            PDO::ATTR_PERSISTENT => true,
            //handle the errors
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //Create a PDO instance

        try{
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);

        } catch (PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //Prepare statment with query    
    /**
     * Function to query database
     *
     * @param  mixed $sql
     * @return void
     */
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    //bind the values    
    /**
     * Function to bind parameters, value and type
     *
     * @param  mixed $param
     * @param  mixed $value
     * @param  mixed $type
     * @return void
     */
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch(true) {
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

        //we bind the parameters
        $this->stmt->bindValue($param, $value, $type);
    }

    //we will exectute the prepared statment    
    /**
    * Function to execute the prepared statement
     *
     * @return void
     */
    public function execute()
    {
        return $this->stmt->execute();
    }

    //get result set as array of object    
    /**
     * Function resultSet for get all from database
     *
     * @return void
     */
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //get single record as object    
    /**
     * Function single to get one result
     *
     * @return void
     */
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //get row count    
    /**
     * Function rowCount to check if somethig specifique existing
     *
     * @return void
     */
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
 