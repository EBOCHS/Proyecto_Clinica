<?php

session_start();
 $conn = mysqli_connect(
     'localhost',
     'erick',
     'erick67boch',
     'CLINICA_'
 );
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
