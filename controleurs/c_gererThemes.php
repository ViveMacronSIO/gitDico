<?php

$d = $_POST;
if(isset($d) || !empty($d))
{
    if(isset($d["modif"]))
    {
        if(!empty($d['nom'])){
            $pdo->modifierThemesNom($d['id'],$d['nom']);   
        }
        if(!empty($d['duree'])){
            $pdo->modifierThemesDuree($d['id'],$d['duree']);
        }
    }
    if(isset($d["ajouter"]))
    {
        if(!empty($d['nom']) && !empty($d['duree'])){
            $pdo->ajouterThemes($d['nom'],$d['duree']);   
        }else{
            ajouterErreur('Veuillez mettre un nom et une durée non nulle.');
            include ('vues\v_erreurs.php');
        }
    }
}
if(isset($_GET["sup"]))
{
    $pdo->supprimerThemes($_GET['sup']);
    header('location:index.php');
}
$lesThemes = $pdo->afficherThemes();
include("vues/v_accueil.php");
