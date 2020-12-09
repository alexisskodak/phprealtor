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
        'photo' => $_FILES['photo'],
        'type' => $_POST['type'],
        'description' => $_POST['description'],
    ];

    // Recuperation des infos de l'image
    $img = $listing['photo'];
    $img_name = $img['name'];
    $tmp_name = $img['tmp_name'];
    $img_size = $img['size'];
    $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

    if (invalidListing($listing)) {
        // Si il y a un retour non faux de 'invalidListing', on l'affecte a '$message'
        $message = invalidListing($listing);
    }

    if (invalidPhoto($img_name, $img_size, $img_ext)) {
        // Si il y a un retour non faux de 'invalidPhoto', on l'affecte a '$message'
        $message = invalidPhoto($img_name, $img_size, $img_ext);
    }

    /**
     * Si le message est null alors pas d'erreurs.
     * 1. traitement de la photo
     * 2. on ecrit dans la BDD,
     * 3. on ajoute un message flash de success dans la session
     * 4. on redirige a la page d'accueil
    */
    if ($message == null) {
        // on renome la photo avec un nom unique et on la place dans le dossier media dedie
        $new_img_name = uniqid('IMG-', true).'.'.$img_ext;
        $img_path = 'media/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_path);

        // on affecte le nouveau nom de fichier au tableau listing
        $listing['photo'] = $new_img_name;

        // Etapes 2. a 5.
        addListing($pdo, $listing);
        $success = 'Annonce publiee avec success';
        addFlashMessage($success);
        header('Location: index.php');
    }

}

// Affichage
render('templates/addListing.phtml', [
    'message' => $message,
    'success' => $success
]);
