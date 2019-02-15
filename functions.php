<?php


require 'database.php';



function getAllCountries() {
    global $db;

    $query = "SELECT * "
            . " FROM countries ";
    $statement = $db->prepare($query);
    try {
        $statement->execute();
    } catch (Exception $ex) {
       
        exit();
    }
    
   
    $countries = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    return json_encode($countries, TRUE);
    
}



function getallCounties($var) {
    global $db;

    $query = "SELECT * "
            . " FROM counties "
            . " WHERE country_id = '$var' ";
    $statement = $db->prepare($query);
    try {
        $statement->execute();
    } catch (Exception $ex) {
        header("Location:../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    
    $counties = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    return json_encode($counties, TRUE);
    
}

function getallTowns($var) {
    global $db;

    $query = "SELECT * "
            . " FROM towns "
            . " WHERE countyID = '$var' ";
    $statement = $db->prepare($query);
    try {
        $statement->execute();
    } catch (Exception $ex) {
        header("Location:../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    
    $counties = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    
    return json_encode($counties, TRUE);
    
} 