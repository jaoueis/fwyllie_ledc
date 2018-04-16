<?php
$host_name = "localhost";
$database  = "ledc";
$user_name = "root";
$password  = "root";
$port      = 8889;
date_default_timezone_set("America/Toronto");
$link = mysqli_connect($host_name, $user_name, $password, $database, $port);

if (mysqli_connect_errno()) {
    echo "<p>Verbindung zum MySQL Server fehlgeschlagen: " . mysqli_connect_error() . "</p>";
}
