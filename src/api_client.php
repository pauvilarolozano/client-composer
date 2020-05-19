<?php

include 'client.php';

class ApiClients{

    function getAll(){
        
        $clients = array();
        $clients['register'] = array();
    
        $client = new client();
        $result = $client->getClients();

        if($result->rowCount()){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $register = array(
                    'NAME' => $row['name'],
                    'ADDRESS' => $row['address'],
                    'POSTCODE' => $row['postcode'],
                    'PHONE_NUMBER' => $row['phone_number'],
                    'COUNTRY' => $row['country'],
                    'CITY' => $row['city'],
                    'DATE' => $row['date'],
                    'QTY' => $row['qty']
                );

                array_push($clients['register'], $register);
            }

            http_response_code(200);
            echo json_encode($clients);
        }else{
            http_response_code(404);
            echo json_encode(array('message' => 'Eleemnt not found'));
        }
    }
}

$api = new ApiClients();
$api->getAll();

?>