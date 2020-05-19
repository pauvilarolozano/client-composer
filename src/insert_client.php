<?php

require_once 'vendor/autoload.php';
include_once 'client.php';
include_once 'DBConn.php';

$dbConn = new DBconn();
$faker = Faker\Factory::create();

$conn = $dbConn->connect();

echo "Inserting rows...<br>";
for ($i=0; $i<1000; $i++){

    $venta = new client(
        $faker->name,$faker->address,$faker->postcode,$faker->phoneNumber,$faker->country,$faker->city,
        $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now'), 
        $faker->biasedNumberBetween($min = 0, $max = 10000, $function = 'sqrt')
    );

    $venta->insertar($conn);
}

$dbConn->disconnect();

?>