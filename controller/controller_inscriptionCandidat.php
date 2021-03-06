<?php

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/candidat.php';



$regexNom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/";
$regexMail = "/^([a-z.-]+)@([a-z]+).([a-z]){2,4}$/";
// $regexDate = "/^[0-9\-]+$/";
$regexPhone = "/^0[1-98][0-9]{8}$/";
$regexCity = "/^[^0-9]$/";
$regexPostalCode = "/\d{5}$/";
$arrayErrors = [];


if (!empty($_POST)) {

    if (isset($_POST["lastname"])) {
        if (empty($_POST["lastname"])) {
            $arrayErrors["lastname"] = "Veuillez saisir votre nom";
        } elseif (!preg_match($regexNom, $_POST["lastname"])) {
            $arrayErrors["lastname"] = "Format invalide";
        }
    }

    if (isset($_POST["firstname"])) {
        if (empty($_POST["firstname"])) {
            $arrayErrors["firstname"] = "Veuillez saisir votre prénom";
        } elseif (!preg_match($regexNom, $_POST["firstname"])) {
            $arrayErrors["firstname"] = "Format invalide";
        }
    }

    if (isset($_POST["birthdate"])) {
        if (empty($_POST["birthdate"])) {
            $arrayErrors["birthdate"] = "Veuillez saisir la date de naissance";
        } else {
            $dateNaissance = $_POST['birthdate'];
            $aujourdhui = date("Y-m-d");
            $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
            $age = $diff->format('%y');
            if($age<'16'){
                $arrayErrors["birthdate"] = "Vous devez avoir 16ans minimum pour vous inscrire";
            }else if($age > '100'){
                $arrayErrors["birthdate"] = "Vous ne pouvez pas avoir plus de 100 ans";
            }
        }
    }


    if (isset($_POST["phone"])) {
        if (empty($_POST["phone"])) {
            $arrayErrors["phone"] = "Veuillez saisir votre numéro de telephone";
        } elseif (!preg_match($regexPhone, $_POST["phone"])) {
            $arrayErrors["phone"] = "Format invalide";
        }
    }

    $candidatMail = new Candidat();
    if (isset($_POST["mail"])) {
        if (empty($_POST["mail"])) {
            $arrayErrors["mail"] = "Veuillez saisir votre Mail";
        } elseif (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            $arrayErrors["mail"] = "Le format de votre mail est invalide";
        } elseif (!$candidatMail->checkFreeMail($_POST['mail'])) {
            $arrayErrors["mail"] = "Cette adresse mail est déjà utilisée";
        }
    }

    if (isset($_POST["city"])) {
        if (empty($_POST["city"])) {
            $arrayErrors["city"] = "Veuillez saisir votre ville";
        }
    } elseif (!preg_match($regexCity, $_POST["city"])) {
        $arrayErrors["city"] = "Format invalide";
    }



    if (isset($_POST["postalCode"])) {
        if (empty($_POST["postalCode"])) {
            $arrayErrors["postalCode"] = "Veuillez saisir votre code postal";
        }
    } elseif (!preg_match($regexPostalCode, $_POST["postalCode"])) {
        $arrayErrors["postalCode"] = "Format invalide";
    }

    if (isset($_POST["adress"])) {
        if (empty($_POST["adress"])) {
            $arrayErrors["adress"] = "Veuillez saisir votre adresse";
        }

        if (isset($_POST["password"]) && isset($_POST["passwordOk"])) {
            if (empty($_POST["password"])) {
                $arrayErrors["password"] = "Veuillez indiquer votre mot de passe";
            } else if ($_POST["password"] != $_POST["passwordOk"]) {
                $arrayErrors["passwordOk"] = "Les mots de passe ne sont pas identiques";
            }
        }
        if (isset($_POST['g-recaptcha-response'])) {
            $captcha = $_POST['g-recaptcha-response'];

            if (isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response'])) {

                $arrayErrors['captcha'] = "Veuillez prouver que vous n'êtes pas un robot";
            }
        }

        $secretKey = "6LcVRNweAAAAAOVoCQpKFs4egqwLHj3dexyTOVH_";
        $ip = $_SERVER['REMOTE_ADDR'];
        
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha ?? "");
        $response = file_get_contents($url);
        $responseKeys = json_decode($response, true);
       
        if ($responseKeys["success"]) {
        } elseif (isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response'])) {
            $arrayErrors['captcha'] = "Veuillez prouver que vous n'êtes pas un robot";
        }
        if(empty($_POST['cgu'])){
            $arrayErrors['cgu'] = "Veuillez accepter les CGU";
        }

     


        if (count($arrayErrors) == 0) {

            $candidatObj = new Candidat();
            $addCandidat = $candidatObj->addCandidat($_POST);
            session_start();
            $sessionObj = new Candidat;
            $_SESSION = $sessionObj->getOneCandidate($_POST['mail']);

            header('location: testCandidat.php');
        }
    }
}
