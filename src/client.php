<?php

include_once 'DBconn.php';

class client extends DBconn{

    var $name;
    var $last_name;
    var $address;
    var $postcode;
    var $phone_number;
    var $country;
    var $city;
    var $date;
    var $qty;

    function __construct(){} 

    function __construct2($name, $address, $postcode, $phone_number, $country, $city, $date, $qty){
        $this->name = $name;
        $this->address = $address;
        $this->postcode = $postcode;
        $this->phone_number = $phone_number;
        $this->country = $country;
        $this->city = $city;
        $this->date = $date;
        $this->qty = $qty;
    } 

    public function insertar(){

        $sql = 'INSERT INTO client VALUES
        ("'.$this->name.'","'.$this->address.'",'.$this->postcode.',"'.$this->phone_number.'","'.$this->country.'","'.$this->city.'","'.$this->date->format('Y-m-d').'",'.$this->qty.')';
        $result = $this->connect()->query($sql);
        $this->disconnect();

        return $result;
    }

    public function getClients(){

        if(isset($_GET['client'])){
            $result = $this->connect()->query('SELECT * FROM client WHERE name="'.$_GET['client'].'"');

        }else if(isset($_GET['date'])){
            $result = $this->connect()->query('SELECT * FROM client WHERE date > "'.$_GET['date'].'"');

        }else{
            $result = $this->connect()->query('SELECT * FROM client');
        }

        $this->disconnect();

        return $result;
    }
}

?>