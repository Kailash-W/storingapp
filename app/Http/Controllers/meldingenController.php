<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];

echo $attractie . " / " . $capaciteit . " / " . $melder;

//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, type)
VALUES(:attractie, :type)";

//3. Prepare
$statement = $conn->prepare(query: $query);

//4. Execute
$statement->execute(params: [
 ":attractie" => $attractie,
 ":type" => $type,
]);

$items = $statement->fetchAll(mode: PDO::FETCH_ASSOC);
