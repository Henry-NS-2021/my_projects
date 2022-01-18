<?php 

$connect = mysqli_connect("localhost", "root", "", "fswd14_cr12_mount_everest_henry_ngosytchev");

if(!$connect){
    die("Unable to connect to the Databse:" . mysqli_connect_error());
} 
// else {
//     echo "Connection is on!";
// }
?>