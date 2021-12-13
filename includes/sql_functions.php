<?php

$conn=null;


/***
 * Deze functie maakt connectie met de database
 */
function connect_db() {
    global $conn;
    $conn = new mysqli("localhost","bijles-user","bijles-password","bijles-db");

    //return $conn;
}



