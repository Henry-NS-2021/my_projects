<?php

    $host_name = "localhost";
    $user_name = "root";
    $password = "";
    $db_name = "fswd14_cr10_henryngosytchev_biglibrary";

    $connect= mysqli_connect($host_name, $user_name, $password, $db_name);

    if(!$connect){
        die("Connection failed:" . mysqli_connect_error());
    } 
    // else {
    //     echo "<b  class='text-info'>db_connect:</b> Successfully connected!";
    // }
    
?>