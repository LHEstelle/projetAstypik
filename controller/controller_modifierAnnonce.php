<?php

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/annonces.php';
require_once '../models/entreprise.php';

session_start();
$arrayErrors = [];




$modifyAnnonceOk = false;




if (isset($_GET["id"])) {
    $id = htmlspecialchars(trim($_GET["id"]));
    $annonceObj = new Annonce();
    $annonceInfo = $annonceObj->getOneAnnonce($id);
    $entrepriseInfo = new Entreprise;
    $entrepriseInfoArray = $entrepriseInfo->getOneRecrutor($_SESSION['mail']);
    $contractObj = new Annonce;
    $contractArray = $contractObj->getAllContract();

    $domainObj = new Annonce;
    $domainArray = $domainObj->getAllDomaines();
var_dump($_GET);

if (isset($_POST["modifyAnnonce"])) {



    if (isset($_POST["job"])) {
        if (empty($_POST["job"])) {
            $arrayErrors["job"] = "Veuillez saisir votre intitulé de poste";
        }
    }

    if (isset($_POST["id_domaine"])) {
        if (empty($_POST["id_domaine"])) {
            $arrayErrors["id_domaine"] = "Veuillez saisir votre domaine";
        }
    } else {
        $arrayErrors["id_domaine"] = "Veuillez saisir votre domaine";
    }

    if (isset($_POST["id_contract"])) {
        if (empty($_POST["id_contract"])) {
            $arrayErrors["id_contract"] = "Veuillez saisir un contrat";
        }
    } else {
        $arrayErrors["id_contract"] = "Veuillez saisir un contrat";
    }

    if (isset($_POST["startDate"])) {
        if (empty($_POST["startDate"])) {
            $arrayErrors["startDate"] = "Veuillez saisir une date de début";
        }
    } else {
        $arrayErrors["startDate"] = "Veuillez saisir une date de début";
    }

    if (isset($_POST["description"])) {
        if (empty($_POST["description"])) {
            $arrayErrors["description"] = "Veuillez saisir une description de l'offre";
        }
    }

    var_dump(count($arrayErrors));
    if (count($arrayErrors) == 0) {

        $job = htmlspecialchars(trim($_POST['job']));
        $experienceYear = htmlspecialchars(intval(trim($_POST['experienceYear'])));
        $publicationDate = htmlspecialchars((trim($_POST['publicationDate'])));
        $description = htmlspecialchars((trim($_POST['description'])));
        $startDate = htmlspecialchars((trim($_POST['startDate'])));
        $idRecruteur = htmlspecialchars(trim($_POST['id_recruteur']));
        $idDomaine = htmlspecialchars(trim($_POST['id_domaine']));
        $idContract = htmlspecialchars(trim($_POST['id_contract']));
        $experience = htmlspecialchars(trim($_POST['experienceYear']));
        $description = htmlspecialchars(trim($_POST['description']));
        $idAnnonce = htmlspecialchars(trim($_POST["idAnnonce"]));
        $annonce = new Annonce();
        $annonceArray = $annonce->modifyAnnonce($job, $experienceYear, $publicationDate, $description, $startDate, $idRecruteur, $idDomaine, $idContract, $idAnnonce);
        $modifyAnnonceOk = true;
        $annonceObj = new Annonce();
        $annonceInfo = $annonceObj->getOneAnnonce($idAnnonce);
    }
}
}