<?php
require_once '../config.php';
require_once '../models/dataBase.php';
require_once '../models/entreprise.php';

session_start();
$regexCity = "/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/";
$regexPostalCode = "/\d{5}$/";
$regexPhone = "/^0[1-68][0-9]{8}$/";
// Tableau vide qui va nous permettre de stocker les erreurs 
$arrayErrors = [];


var_dump($_POST);
var_dump($_COOKIE);
if(!empty($_SESSION)){
$entrepriseInfo = new Entreprise;
$entrepriseInfoArray = $entrepriseInfo->getOneRecrutor($_SESSION['mail']);
}

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
        header('location: profilRecruteur.php');
    }
}
if (!empty($_POST['submitButton'])) {
    if (mime_content_type($_FILES['fileToUpload']['tmp_name']) != 'image/jpeg' && mime_content_type($_FILES['fileToUpload']['tmp_name']) != 'image/jpg' && mime_content_type($_FILES['fileToUpload']['tmp_name']) != 'image/png') {
        $arrayErrors["mime"] = "Votre téléchargement n'est pas une image";
    } else if ($_FILES['fileToUpload']['size'] > 1000000) {
        $arrayErrors["size"] = "Désolé, votre fichier ne doit pas dépasser 1MO.Votre fichier n'a pas été téléchargé";
    } else if ($_FILES['fileToUpload']['type'] != 'image/png' &&  $_FILES['fileToUpload']['type'] != 'image/jpg' && $_FILES['fileToUpload']['type'] != 'image/jpeg') {
        $arrayErrors["extension"] = "L'extension n'est pas une image";
    } else if ($_FILES['fileToUpload']['size'] <= 1000000 && (mime_content_type($_FILES['fileToUpload']['tmp_name']) == 'image/jpeg' || mime_content_type($_FILES['fileToUpload']['tmp_name']) == 'image/jpg' || mime_content_type($_FILES['fileToUpload']['tmp_name']) == 'image/png') && ($_FILES['fileToUpload']['type'] == 'image/png' ||  $_FILES['fileToUpload']['type'] == 'image/jpg' || $_FILES['fileToUpload']['type'] == 'image/jpeg')) {
        $uploaddir = 'C:\wamp\www\phpVariables\PROJETRECRUTEMENT\assets\img/';
        $_FILES['fileToUpload']['name'] = uniqid() . basename($_FILES['fileToUpload']['name']);
        $uploadfile = $uploaddir . $_FILES['fileToUpload']['name'];
        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile);
        $mail = htmlspecialchars(trim($_SESSION["mail"]));
        $profilPicture = htmlspecialchars(trim($_FILES['fileToUpload']["name"]));
        $entreprise = new Entreprise();
        $entrepriseModifyArray = $entreprise->modifyprofilPictureEnterprise($mail, $profilPicture);
        header('location: profilRecruteur.php');
    }
}

if (isset($_POST["deleteButton"])) {
    $mail = htmlspecialchars(trim($_POST["mail"]));
    $entreprise = new Entreprise();
    $entrepriseDeleteArray = $entreprise->deleteEnterprise($mail);
    session_unset();
    session_destroy();
    header('Location: ../views/index.php');
    exit();
}
if (isset($_POST['deconnectButton'])) {
    session_unset();
    unset($_COOKIE["PHPSESSID"]);
    setcookie("PHPSESSID", '', - 4200);
    session_destroy();

    header('Location: ../views/index.php');
}

if(empty($_SESSION)){
    header('Location: pageErreur.php');
}
