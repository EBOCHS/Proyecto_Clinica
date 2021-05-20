<?php

session_start();

$conn = mysqli_connect(
    'localhost', //nombre del servidor 
    'clinica', //nombre del usuario de la base de datos
    'ingenieriasoftware', //contraseña 
    'DB_CLINICA_LA_BENDICION' //nombre del esquema base de datos
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
