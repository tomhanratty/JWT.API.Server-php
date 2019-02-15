<?php

require_once 'database.php';
require_once 'JWT_class.php';
require_once "functions.php";

$secret = "Tom'sKey12345";
$api_key = filter_input(INPUT_GET, 'api_key');
$Service = filter_input(INPUT_GET, 'Service');


switch ($Service) {

    case 'Request_Key':
        $token = array();
        $token['userName'] = filter_input(INPUT_GET, 'userName');
        $jwt = JWT::encode($token, $secret);
        $jwt_json = json_encode($jwt);
        echo $jwt_json;
        break;

    case'getCountries':
        
        try {
            $token = JWT::decode($api_key, $secret);
        } catch (ErrorException $ex) {
            return -1;
        }
        $result = getAllCountries();
        echo $result;
        break;



    case 'getCounties':
        
       
        try {
            $token = JWT::decode($api_key, $secret);
        } catch (ErrorException $ex) {
            return -1;
        }
         $countryId = filter_input(INPUT_GET, 'country_id');
       
        $result = getAllCounties($countryId);
        
        echo $result;
        break;
    
    case'getTowns':
        try {
            $token = JWT::decode($api_key, $secret);
        } catch (ErrorException $ex) {
            return -1;
        }
         $countyId = filter_input(INPUT_GET, 'county_id');
       
        $result = getAllTowns($countyId);
        
        echo $result;
        break;
        

}
