<?php

require_once '../config.php';
require_once '../models/dataBase.php';
require_once '../models/likes.php';

session_start();
if (empty($_SESSION) || empty($_SESSION['siretNumber'])) {
    header('Location: pageErreur.php');
}

if (isset($_GET["searchFilters"])) {
    if (isset($_GET['contractName'])) {
        $contract = '"' . implode('","', $_GET['contractName']) . '"';
    } else {
        $contract = '"CDI","CDD","contrat d' . "'" . 'apprentissage","contrat de professionalisation","stage","indépendant"';
    }
    if (isset($_GET['domaineName'])) {
        $domaine = '"' . implode('","', $_GET['domaineName']) . '"';
    } else {
        $domaine = '"Commercial","Marketing","Communication","Création","Direction d' . "'" . 'entreprise","Etudes, Recherche et Développement","Gestion, Finance, Administration","Production Industrielle, Travaux, Chantiers","Ressources Humaines","Sanitaire, Social, Culture","Services Techniques","Informatique"';
    }
    if (isset($_GET['profilName'])) {
        $profil = '"' . implode('","', $_GET['profilName']) . '"';
    } else {
        $profil = "'superCactus','peterPaon','spiderLutin','ironSpoke'";
    }
    if (isset($_GET['experienceYears'])) {

        $exp =  intval($_GET['experienceYears']);
    } else {
        $exp = '';
    }
    if (isset($_GET['inputSearch'])) {

        $terme = '"%' . htmlspecialchars(trim(strip_tags($_GET['inputSearch']))) . '%"';
    }

    $mail =  '"' . $_SESSION['mail'] . '"';
    $likesObj = new Likes();
    $likesRecrutorArray = $likesObj->getAllRecrutorsLikesFilters($mail, $contract, $domaine, $profil, $exp, $terme);
    $candidatesLikesObj = new Likes();
    $allCandidatesLikes = $candidatesLikesObj->getLikesOfAllCandidateForOneRecrutor($_SESSION['mail']);
} else {
    $likesObj = new Likes();
    $likesRecrutorArray = $likesObj->getLikesOfOneRecrutor($_SESSION['mail']);
    $candidatesLikesObj = new Likes();
    $allCandidatesLikes = $candidatesLikesObj->getLikesOfAllCandidateForOneRecrutor($_SESSION['mail']);
}





