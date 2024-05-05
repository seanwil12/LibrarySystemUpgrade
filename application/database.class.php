<?php

/*
 * Author: Sean Wilson
 * Date: 4/5/2023
 * File: database.class.php
 * Description: Description: the Database class sets the database details.
 * 
 */

class Database {

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'librarysystem',
        'tblAuthor' => 'author',
        'tblBook' => 'books',
        'tblLoan' => 'loans',
        'tblPermission' => 'permissions',
        'tblPublisher' => 'publisher',
        'tblUsers' => 'user'
    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    private function __construct() {
        $this->objDBConnection = @new mysqli(
                $this->param['host'], $this->param['login'], $this->param['password'], $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            include 'error.php';
            exit();
        }
    }

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    //returns the name of the table that stores movies
    public function getCatalogTable() {
        return $this->param['tblBook'];
    }

    //returns the name of the table that stores books
    public function getAuthorTable() {
        return $this->param['tblAuthor'];
    }

    //returns the name of the table storing games
    public function getLoanTable() {
        return $this->param['tblloans'];
    }

    //returns the name of the table storing cds
    public function getPermissionTable() {
        return $this->param['tblPermission'];
    }

    //returns the name of the table storing movie ratings
    public function getPublisherTable() {
        return $this->param['tblPublisher'];
    }

    //return the name of the table that stores book categories
    public function getUserTable() {
        return $this->param['tblUsers'];
    }

}
