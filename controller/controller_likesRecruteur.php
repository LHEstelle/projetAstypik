<?php 

require_once '../config.php';
require_once '../models/dataBase.php';
require_once '../models/likes.php';

session_start();

$likesObj = new Likes();
$likesRecrutorArray = $likesObj -> getLikesOfOneRecrutor($_SESSION['mail']);