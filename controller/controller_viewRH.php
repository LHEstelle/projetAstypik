<?php

require_once '../config.php';
require_once '../models/dataBase.php';
require_once '../models/candidat.php';
require_once '../models/likes.php';

session_start();


if (isset($_POST["searchFilters"])) {
    if (isset($_POST['contractName'])) {
        $contractName = $_POST['contractName'];
        foreach ($contractName as $contract) {

            $candidatsObj = new Candidat;
            $allCandidatesArray = $candidatsObj->getAllCandidatesContractSearch($contract);
        }
    }
    if (isset($_POST['domaineName'])) {
        $domaineName = $_POST['domaineName'];
        foreach ($domaineName as $domaine) {

            $candidatsObj = new Candidat;
            var_dump($domaine);
            $allCandidatesArray = $candidatsObj->getAllCandidatesDomaineSearch($domaine);
        }
    }
    if (isset($_POST['profilName'])) {
        $profilName = $_POST['profilName'];
        foreach ($profilName as $profil) {
            $candidatsObj = new Candidat;
            $allCandidatesArray = $candidatsObj->getAllCandidatesProfilSearch($profil);
        }
    } else {
        $candidates = new Candidat;
        $allCandidatesArray = $candidates->getAllCandidates();
    }
} else {
    $candidates = new Candidat;
    $allCandidatesArray = $candidates->getAllCandidates();
}

$likesObj = new Likes();
$likesRecrutorArray = $likesObj -> getAllLikesFromOneRecrutor($_SESSION['id']);
var_dump($likesRecrutorArray);
var_dump($_POST);
var_dump($_SESSION);

