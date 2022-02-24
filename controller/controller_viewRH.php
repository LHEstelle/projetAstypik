<?php 

require_once '../config.php';
require_once '../models/dataBase.php';
require_once '../models/candidat.php';

$candidates = new Candidat;
$allCandidatesArray = $candidates -> getAllCandidates();