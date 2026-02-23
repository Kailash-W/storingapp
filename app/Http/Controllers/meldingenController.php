<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$type = "";


echo $attractie . " / " . $capaciteit . " / " . $melder;

//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, capaciteit, melder, type)
VALUES(:attractie, :capaciteit, :melder, type)";

//3. Prepare
$statement = $conn->prepare(query: $query);

//4. Execute
$statement->execute(params: [
 ":attractie" => $attractie,
 ":capaciteit" => $capaciteit,
 ":melder" => $melder,
 ":type" => $type,
]);


