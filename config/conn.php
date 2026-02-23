<?php

//Haal de configuratie op
require_once 'config.php';

//Met behulp van PDO zetten we de connectie op, waarna we met setAttribute de manier van errormeldingen weergeven bepalen.
$conn = new PDO(dsn: "mysql:host=$dbHost;dbname=$dbName", username: $dbUser, password: $dbPass);
$conn->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
