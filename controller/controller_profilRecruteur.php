<?php

require_once '../config.php';
require_once '../models/dataBase.php';
require_once '../models/entreprise.php';

$regexCity = "/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/";
$regexPostalCode = "/\d{5}$/";
$regexPhone = "/^0[1-68][0-9]{8}$/";
// Tableau vide qui va nous permettre de stocker les erreurs 
$arrayErrors = [];

session_start();
var_dump($_POST);

$entrepriseInfo= new Entreprise;
$entrepriseInfoArray= $entrepriseInfo->getOneRecrutor($_SESSION['mail']);

if (isset($_POST["modifyButton"])) {

    // a l'aide de la fonction empty je verifie que l'input nom n'est pas vide 
    if (empty($_POST["city"])) {

        // je crée une clef nom dans tableau d'erreur avec un message 
        $arrayErrors["city"] = "Veuillez indiquer votre ville";

        // je verifie a l'aide de la fonction !preg_match() si l'input ne correspond pas
    } else if (!preg_match($regexCity, $_POST["city"])) {

        // je crée une clef nom dans tableau d'erreur avec un message
        $arrayErrors["lastname"] = "Format invalide";
    }


    if (empty($_POST["postalCode"])) {
        $arrayErrors["postalCode"] = "Veuillez indiquer votre code postal";
    } else if (!preg_match($regexPostalCode, $_POST["postalCode"])) {
        $arrayErrors["postalCode"] = "Format invalide";
    }

    if (empty($_POST["adress"])) {
        $arrayErrors["adress"] = "Veuillez indiquer votre adresse";
    }

    if (empty($_POST["mail"])) {
        $arrayErrors["mail"] = "Veuillez indiquer un mail";
    } else if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        $arrayErrors["mail"] = "Format invalide";
    }

    if (empty($_POST["phone"])) {
        $arrayErrors["phone"] = "Veuillez indiquer votre numéro de téléphone";
    } else if (!preg_match($regexPostalCode, $_POST["phone"])) {
        $arrayErrors["phone"] = "Format invalide";
    }
    if (count($arrayErrors) == 0) {
        $pseudo = htmlspecialchars(strtoupper(trim($_POST["pseudo"])));
        $city = htmlspecialchars(strtoupper(trim($_POST["city"])));
        $postalCode = htmlspecialchars(intval(trim($_POST["postalCode"])));
        $adress = htmlspecialchars(trim($_POST["adress"]));
        $mail = htmlspecialchars(trim($_POST["mail"]));
        $phone = htmlspecialchars(trim($_POST["phone"]));

        $entreprise = new Entreprise();
        $entrepriseModifyArray = $entreprise->modifyInfosEnterprise($pseudo, $city, $postalCode, $adress, $mail, $phone);

    }
}

if(isset($_POST['deconnectButton'])){
    session_unset();
    session_destroy();
    header('location: ../index.php');
}
