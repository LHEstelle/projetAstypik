<?php 
require_once '../config.php';
require_once '../models/database.php';
require_once '../models/candidat.php';


$login='$2a$12$3OxUxOeOomhdCAzqd1r9neU0BXUwwNhmLhJnzF.OsJ7lxsjulQH6i';
$password='$2a$12$3OxUxOeOomhdCAzqd1r9neU0BXUwwNhmLhJnzF.OsJ7lxsjulQH6i';

if(!empty($_POST)){
    if(empty($_POST['mail']) || empty($_POST['password'])){
$arrayError['error']="veuillez saisir votre mail et/ou mot de passe";
    }else if(!password_verify ($_POST['password'], $login) && !password_verify ($_POST['password'], $password)){
$arrayError['error']= "Mot de passe ou mail invalide";
    } else{
header("Location: annoncesRecruteur.php");
exit;
    }
}