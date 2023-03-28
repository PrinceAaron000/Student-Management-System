<?php

function connection(){


    $host = "localhost";
    $username = "root";
    $password = "admin123";
    $database = "student_system";

    // Create connection
    $con = new mysqli($host, $username, $password, $database); 
    
    // Check connection
    if($con->connect_error){

        echo $con->connect_error;
     
    }else{

    return $con; 

}

}