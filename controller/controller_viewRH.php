<?php 

require_once '../config.php';
require_once '../models/dataBase.php';
require_once '../models/candidat.php';

$candidates = new Candidat;
$allCandidatesArray = $candidates -> getAllCandidates();


if (isset($_POST["filtersSearch"])){
$_POST[$domain["name"]] = htmlspecialchars($_POST[$domain["name"]]); //pour sécuriser le formulaire contre les failles html
$terme = $_GET['search'];
$terme = trim($terme);
$terme = strip_tags($terme);
$patientsObj = new Patients();
$patientsArraySearch = $patientsObj->getAllPatientsSearch($terme);