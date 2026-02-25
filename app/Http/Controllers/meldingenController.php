<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$type = $_POST['type'];
$overige = $_POST['overige'];
$errors = array();

if(isset($_POST['prioriteit'])) {
    $prioriteit = true;
}
else {
    $prioriteit = false;
}

$attractie = $_POST['attractie'];
if(empty($attractie))
{
 $errors[] = "Vul de attractie-naam in.";
}
$capaciteit = $_POST['capaciteit'];
if(!is_numeric(value: $capaciteit))
{
 $errors[] = "Vul voor capaciteit een geldig getal in.";
}
$melder = $_POST['melder'];
if(empty($melder))
{
 $errors[] = "Vul de melder naam in.";
}
$type = $_POST['type'];
if(empty($type))
{
 $errors[] = "Vul de type-achtbaan in.";
}

if(count($errors) > 0)
{
 print_r($errors);
 die();
}


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
":overige" => $overige,
]);


header(header: "Location: ../../../resources/views/meldingen/index.php?msg=Melding opgeslagen");


