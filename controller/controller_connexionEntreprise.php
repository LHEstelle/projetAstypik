<?php
require_once '../config.php';
require_once '../models/database.php';
require_once '../models/entreprise.php';

$arrayError = [];
$arrayOk = [];
$entreprise = new Entreprise;

session_start();

if (!empty($_POST)) {
    if (empty($_POST['mail']) || empty($_POST['password'])) {
        $arrayError['error'] = "veuillez saisir votre mail et/ou mot de passe";
    }
}

if (isset($_POST['mail']) && isset($_POST['password'])) {
    var_dump($entreprise->verifyPassword($_POST['mail'], $_POST['password']));
    if ($entreprise->verifyPassword($_POST['mail'], $_POST['password'])) {
        $arrayOk['connexion'] = "Connexion réussie !";
        $sessionObj = new Entreprise;
        $_SESSION = $sessionObj->getOneRecrutor($_POST['mail']);
        header("Location: profilRecruteur.php");
    } else {
        $arrayError['false'] = "Mauvais mot de passe et/ou mail";
    }
}
