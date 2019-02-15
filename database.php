<?php

// connects to a database

$dsn = "mysql:host=localhost;dbname=locations";
$username = "root";
$password = "";
 
try {
    $db = new PDO($dsn, $username, $password);
    //set up error reporting on server
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_reporting(E_ALL);
} catch (PDOException $ex) {
    //echo "Connection Failure Error is " . $ex->getMessage();
    // redirect to an error page passing the error message
    header("Location:index.php?action=error&msg=" . $ex->getMessage());
}








