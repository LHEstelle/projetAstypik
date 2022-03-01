<?php

require_once '../config.php';
require_once '../models/database.php';
require_once '../models/annonces.php';
require_once '../models/entreprise.php';

// $entrepriseInfo = new Entreprise;
// $entrepriseInfoArray = $entrepriseInfo->getAllRecrutor();

$contractObj = new Annonce;
$contractArray = $contractObj->getAllContract();

$domainObj = new Annonce;
$domainArray = $domainObj->getAllDomaines();

$profilsObj = new Annonce;
$profilsArray = $profilsObj->getAllProfils();