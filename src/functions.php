<?php

/**
 * @param string $db_host
 * @param string $db_name
 * @param string $db_user
 * @param string $db_pass
 * @return PDO
 */
function getPdoInstance(string $db_host, string $db_name, string $db_user, string $db_pass)
{
    // Creation du Data Source Name
    $dsn = 'mysql:dbname=' . $db_name . ';host=' . $db_host;
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    // Creation de la connexion PDO
    return new PDO($dsn, $db_user, $db_pass, $options);
}

/**
 * @param string $template
 * @param array $values
 */
function render(string $template, array $values = [])
{
    // Extraction des variables
    extract($values);

    // Inclusion du template de base
    include 'templates/base.phtml';
}

/**
 * @param PDO $pdo
 * @return array
 */
function getAllListings(PDO $pdo)
{
    // Affectation de la requete
    $sql = 'SELECT * FROM immobilier.logement
            ORDER BY id DESC';

    // Preparation et execution
    $query = $pdo->prepare($sql);
    $query->execute();

    // Retour des tous les resultas trouves
    return $query->fetchAll();
}

/**
 * @param PDO $pdo
 * @param int $id
 * @return mixed
 */
function getListingById(PDO $pdo, int $id)
{
    // Affectation de la requete
    $sql = 'SELECT * FROM immobilier.logement
            WHERE id = ?';

    // Preparation et execution
    $query = $pdo->prepare($sql);
    $query->execute([$id]);

    // Retour du resultat trouve (false si non trouve)
    return $query->fetch();
}

/**
 * @param array $listing
 * @return false|string
 */
function invalidListing(array $listing)
{
    // Si titre plus long que 100 caracteres ou null, alors il est invalide
    if (strlen($listing['titre']) > 100 || strlen($listing['titre']) == 0) {
        return 'Titre non valide';
    }

    // Si description plus longue que 500 caracteres, alors il est invalide
    if (strlen($listing['description']) > 500) {
        return 'Description non valide';
    }

    // Si le prix n'est pas un nombre, alors ils est invalide
    if (!ctype_digit($listing['prix'])) {
        return 'Prix non valide';
    }

    // Si le cp n'est pas un nombre ou s'il n'est pas compose de 5 chiffres, alors ils est invalide
    if (!ctype_digit($listing['cp']) || strlen($listing['cp']) != 5) {
        return 'Code postal non valide';
    }
    return false;
}

/**
 * @param string $img_name
 * @param int $img_size
 * @param $img_ext
 * @return false|string
 */
function invalidPhoto(string $img_name, int $img_size, $img_ext)
{
    // Taille maximale et verification
    $max_size = 200000;
    if ($img_size > $max_size) {
        return 'Image trop grande';
    }

    // Type de fichiers acceptees et verification
    $allowed_ext = array('jpg', 'jpeg', 'png');
    if (!in_array($img_ext, $allowed_ext)) {
        return 'Type de fichier non autorise';
    }

    return false;
}

function addListing(PDO $pdo, array $listing)
{
    $sql = 'INSERT INTO immobilier.logement 
            (titre, adresse, ville, cp, surface, prix, photo, type, description)
            VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([
        $listing['titre'],
        $listing['adresse'],
        $listing['ville'],
        $listing['cp'],
        $listing['surface'],
        $listing['prix'],
        $listing['photo'],
        $listing['type'],
        $listing['description']
    ]);
}

function initMessages()
{
    // Si aucune session n'est encore démarrée:
    if (session_status() === PHP_SESSION_NONE) {
        // ... alors on en démarre une
        session_start();
    }

    // Si la clé 'flashbag' n'existe pas en session ou si elle n'est pas définie...
    if (!array_key_exists('flash', $_SESSION) || !isset($_SESSION['flash'])) {
        // ... alors on range dans la clé 'flashbag' un tableau vide
        $_SESSION['flash'] = [];
    }
}

/**
 * @param string $message
 */
function addFlashMessage(string $message)
{
    // Initialisation du flashbag
    initMessages();

    // On ajoute dans le tableau de message le message passé en paramètre
    // $_SESSION['flashbag'][] = $message;
    array_push($_SESSION['flash'], $message);
}

/**
 * @return array
 */
function fetchFlashMessages()
{
    // Initialisation
    initMessages();

    // Recuperation des messages
    $flashMessages = $_SESSION['flash'];

    // Suppression des messages de la session
    $_SESSION['flash'] = [];

    // Retour des messages recuperes
    return $flashMessages;
}
