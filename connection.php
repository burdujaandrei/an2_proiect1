<?php

   // connect to the database
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "proiect1";
    
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
   
?>