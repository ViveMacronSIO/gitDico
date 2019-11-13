<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_GET['idTheme']) || isset ($_SESSION['idTheme']))
{
    if(isset($_GET['idTheme']))
    {
        $_SESSION['idTheme'] = $_GET['idTheme'];
    }

}
else
{
    header('Location: index.php');
}


$d = $_POST;
if(isset($d) || !empty($d))
{
    if(isset($d["modif"]))
    {
        if(!empty($d['idMot']) && !empty($d['contenuMot']) && !empty($d['nbPointsMot']) && !empty($d['dureeMot'])){
            $pdo->modifierMots($d['idMot'],$d['contenuMot'],$d['nbPointsMot'],$d['dureeMot']);   
        }
        else
        {
            ajouterErreur("Veuillez renseigner tout les champs");
            include ('vues\v_erreurs.php');
        }
    }
    if(isset($d["ajouter"]))
    {
        if(!empty($d['mot']) && !empty($d['point']) && !empty($d['duree'])){
            $pdo->ajouterMots($d['mot'],$d['point'],$_SESSION['idTheme'],$d['duree']);   
        }else{
            ajouterErreur('Veuillez mettre un nom, un nombre de point et une durée non nulle.');
            include ('vues\v_erreurs.php');
        }
    }
}
if(isset($_GET["sup"]))
{
    $pdo->supprimerMots($_GET['sup']);
    header('location:index.php?uc=gestionMots');
}

$lesMots = $pdo->afficherMots($_SESSION['idTheme']);

include("vues/v_gestionMots.php");