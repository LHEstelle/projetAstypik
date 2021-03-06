<?php
require_once '../config.php';
require_once '../models/database.php';
require_once '../models/candidat.php';

$arrayError = [];
$arrayOk = [];
$candidat = new Candidat;

session_start();

if (!empty($_POST)) {
    if (empty($_POST['mail']) || empty($_POST['password'])) {
        $arrayError['error'] = "veuillez saisir votre mail et/ou mot de passe";
    }
}

if (isset($_POST['mail']) && isset($_POST['password'])) {
    var_dump($candidat->verifyPassword($_POST['mail'], $_POST['password']));
    if ($candidat->verifyPassword($_POST['mail'], $_POST['password'])) {
        $arrayOk['connexion'] = "Connexion réussie !";
        $sessionObj = new Candidat;
        $_SESSION = $sessionObj->getOneCandidate($_POST['mail']);
        $_SESSION['anotherQuestionKey']= true ;
        $_SESSION['key']= true ;
        header("Location: profilCandidat.php");
    } else {
        $arrayError['false'] = "Mauvais mot de passe et/ou mail";
    }
}
