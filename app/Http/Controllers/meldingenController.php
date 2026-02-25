<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$type = $_POST['type'];

if(isset($_POST['prioriteit'])) {
    $prioriteit = true;
}
else {
    $prioriteit = false;
}
$overige = $_POST['overige'];

//1. Verbinding
require_once '../../../config/conn.php';

//2. Query
$query = "INSERT INTO meldingen (attractie, capaciteit, melder, type, prioriteit, overige)
VALUES(:attractie, :capaciteit, :melder, :type , :prioriteit, :overige)";

//3. Prepare
$statement = $conn->prepare(query: $query);

//4. Execute
$statement->execute(params: [
 ":attractie" => $attractie,
 ":capaciteit" => $capaciteit,
 ":melder" => $melder,
 ":type" => $type,
":prioriteit" => $prioriteit,
":overige" => $overige
]);

header(header: "Location: ../../../resources/views/meldingen/index.php?msg=Melding opgeslagen");


