<?php

// Inclusion des fichiers necessaires a l'execution
include 'src/functions.php';
include 'src/dbconfig.php';
include '../vendor/autoload.php';

// Creation d'una instance de connexion PDO
$pdo = getPdoInstance(DB_HOST, DB_NAME, DB_USER, DB_PASS);

// Recuperation de l'id du logement via l'URL
$listing_id = $_GET['id'];

// Recuperation de toutes les annonces
$listing = getListingById($pdo, $listing_id);


// Affichage
render('templates/listing.phtml', [
    'listing' => $listing
]);