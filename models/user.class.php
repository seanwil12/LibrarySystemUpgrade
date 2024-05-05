<?php


/*
 * Author: Sean Wilson
 * Date: 3/1/2024
 * Name: login.class.php
 * Description: the Login class models a real-world user.
 */

class User
{
    //private data members
    private $id, $login_id, $first_name, $last_name, $passwd, $street_num, $street_name, $city, $state, $zip, $permissions_id;

    //the constructor
    public function __construct($id, $login_id, $first_name, $last_name, $passwd, $street_num, $street_name, $city, $state, $zip, $permissions_id)
    {
        $this->id = $id;
        $this->login_id = $login_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->passwd = $passwd;
        $this->street_num = $street_num;
        $this->street_name = $street_name;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->permissions_id = $permissions_id;
    }

    //get the user id
    public function getId()
    {
        return $this->id;
    }

    //get the login id
    public function getLogin()
    {
        return $this->login_id;
    }

    //get the users first name
    public function getFirstName()
    {
        return $this->first_name;
    }

    //get the users last name
    public function getLastName()
    {
        return $this->last_name;
    }

    //get the users password
    public function getPassword()
    {
        return $this->passwd;
    }

    //get the users street number
    public function getStreetNum()
    {
        return $this->street_num;
    }

    //get the street name
    public function getStreetName()
    {
        return $this->street_name;
    }

    //get the city
    public function getCity()
    {
        return $this->city;
    }

    //get the state
    public function getState()
    {
        return $this->state;
    }

    //get the zip
    public function getZip()
    {
        return $this->zip;
    }

    //get the permissions id
    public function getPermissions()
    {
        return $this->permissions_id;
    }

    //set user id
    public function setId($id)
    {
        $this->id = $id;
    }
}