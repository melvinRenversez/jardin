<?php

include("./database.php");

$nom = $_POST['nom'];
$poids = $_POST['poids'];
$unite = $_POST['unite'];
$date_recolte = $_POST['date_recolte'];

if ($unite == "kg") {
    $poids = $poids * 1000;
}

$query = "INSERT INTO legumes (nom, poids, date_recolte) VALUES (:nom, :poids, :date_recolte)";
$stmt = $db->prepare($query);
$stmt->execute(array(
    'nom' => $nom,
    'poids' => $poids,
    'date_recolte' => $date_recolte
));

header('Location: ../index.php');
