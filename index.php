<?php

// Inclusion des fichiers necessaires a l'execution
include 'src/functions.php';
include 'src/dbconfig.php';
include '../vendor/autoload.php';

// Demarre la session afin de recuperer les eventuels messages flash
session_start();

// Creation d'una instance de connexion PDO
$pdo = getPdoInstance(DB_HOST, DB_NAME, DB_USER, DB_PASS);

// Recuperation de toutes les annonces
$listings = getAllListings($pdo);

// Affichage
render('templates/index.phtml', [
    'listings' => $listings,
    'flash' => fetchFlashMessages()
]);