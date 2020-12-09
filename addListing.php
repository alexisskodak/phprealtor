<?php

// Inclusion des fichiers necessaires a l'execution
include 'src/functions.php';
include 'src/dbconfig.php';
include '../vendor/autoload.php';

// Initalisation de la session
session_start();

// Creation d'una instance de connexion PDO
$pdo = getPdoInstance(DB_HOST, DB_NAME, DB_USER, DB_PASS);

// Initialisation des messages
$message = null;
$success = null;

if (!empty($_POST)) {
    // titre, adresse, ville, cp, surface, prix, photo, type, description
    $listing = [
        'titre' => $_POST['titre'],
        'adresse' => $_POST['adresse'],
        'ville' => $_POST['ville'],
        'cp' => $_POST['cp'],
        'surface' => $_POST['surface'],
        'prix' => $_POST['prix'],
        'photo' => 'blbla.jpg',
        'type' => $_POST['type'],
        'description' => $_POST['description'],
    ];

    if (invalidListing($listing)) {

        // Si il y a un retour non null de 'invalidListing', on l'affecte a '$message'
        $message = invalidListing($listing);
    }

    /**
     * Si le message est null alors pas d'erreurs.
     * 1. on ecrit dans la BDD,
     * 2. on ajoute un message flash de success dans la session
     * 3. on redirige a la page d'accueil
    */
    if ($message == null) {
        addListing($pdo, $listing);
        $success = 'Annonce publiee avec success';
        addFlashMessage($success);
        header('Location: templates/index.php');
    }

}

// Affichage
render('templates/addListing.phtml', [
    'message' => $message,
    'success' => $success
]);
