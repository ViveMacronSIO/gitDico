<?php

include("vues/v_entete.php") ;
require_once("include/fct.inc.php");
require_once ("include/class.PdoDico.inc.php");
 
$pdo = PdoDico::getPdoDico();
if(!isset($_GET['uc'])){
     $_GET['uc'] = 'index';
}
$uc = $_GET['uc'];
switch($uc){
	case 'index':
	{
        include("controleurs/c_gererThemes.php");break;
	}
        case 'gestionMots':
        {
            include("controleurs/c_gererMots.php");
        }      
}
include("vues/v_pied.php") ;
?>

