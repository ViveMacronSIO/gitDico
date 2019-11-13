<?php
/** 
 * Classe d'accès aux données.  
 * Utilise les services de la classe PDO
 * @author KrauseBenjamin
 */

class PdoDico{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=dico';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;			
        private static $monPdo;
		private static $monPdoDico=null;
	
	/**
	 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
	 * pour toutes les méthodes de la classe
	 */				
	private function __construct(){
    	PdoDico::$monPdo = new PDO(PdoDico::$serveur.';'.PdoDico::$bdd, PdoDico::$user, PdoDico::$mdp); 
		PdoDico::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoDico::$monPdo = null;
	}
	
	/**
	 * Fonction statique qui crée l'unique instance de la classe	 
	 * Appel : $instancePdoDico = PdoDico::getPdoDico();	 
	 * @return l'unique objet de la classe PdoDico
	 */
	public  static function getPdoDico(){
		if(PdoDico::$monPdoDico==null){
			PdoDico::$monPdoDico= new PdoDico();
		}
		return PdoDico::$monPdoDico;  
	}
	
	/**
	 * Fonction qui permet d'afficher thème
	 *
	 * @return La liste des thèmes
	 */   
	public function afficherThemes()
	{
		$res = PdoDico::$monPdo->prepare
				("SELECT idTheme, nomTheme, dureeTheme, COUNT(idMot) AS nbMots "
				. "FROM THEMES T "
				. "LEFT JOIN MOTS M "
				. "ON T.idTheme = M.idThemeMot "
				. "GROUP BY idTheme, nomTheme, dureeTheme "
				);
		$res->execute();
		$lesLignes = $res->fetchAll();
		return $lesLignes;		
	}
		
	/**
	 * Fonction qui permet modifier un thème
	 *
	 * @param $idTheme 
	 * @param $nomTheme
	 *
	 */
	public function modifierThemesNom($idTheme,$nomTheme)
	{
		$res = PdoDico::$monPdo->prepare
				("UPDATE THEMES "
				. "SET nomTheme = :nomTheme "
				. "WHERE idTheme = :idTheme ");
		$res->bindValue('idTheme', $idTheme);
		$res->bindValue('nomTheme', $nomTheme);
		$res->execute();
	}
	
	/**
	 * Fonction qui permet modifier la durée du thème
	 *
	 * @param $idTheme 
	 * @param $dureeTheme
	 *
	 */
	 public function modifierThemesDuree($idTheme,$dureeTheme)
	{
		$res = PdoDico::$monPdo->prepare
				("UPDATE THEMES "
				. "SET dureeTheme = :dureeTheme "
				. "WHERE idTheme = :idTheme ");
		$res->bindValue('idTheme', $idTheme);
		$res->bindValue('dureeTheme', $dureeTheme);
		$res->execute();
	}
		
	/**
	 * Fonction qui permet d'ajouter un thème
	 *
	 * @param $nomTheme 
	 * @param $dureeTheme
	 *
	 */
	public function ajouterThemes($nomTheme,$dureeTheme)
	{
		$res = PdoDico::$monPdo->prepare
				("INSERT INTO THEMES (nomTheme, dureeTheme) "
				. "VALUES(:nomTheme,:dureeTheme) ");
		$res->bindValue('nomTheme', $nomTheme);
		$res->bindValue('dureeTheme', $dureeTheme);
		$res->execute();
	}
		
	/**
	 * Fonction qui permet de supprimer un thème
	 *
	 * @param $idTheme 
	 *
	 */
	public function supprimerThemes($idTheme)
	{
		$res = PdoDico::$monPdo->prepare
				("DELETE MOTS WHERE idThemeMot = :idThemeMot ");
		$res->bindValue('idThemeMot', $idTheme);
		$res->execute();
		$res1 = PdoDico::$monPdo->prepare
				("DELETE THEMES WHERE idTheme = :idTheme ");
		$res1->bindValue('idTheme', $idTheme);
		$res1->execute();
	}
	
	/**
	 * Fonction qui permet d'afficher les mots
	 *
	 * @param $idTheme 
	 *
	 * @return La liste des mots
	 */
	public function afficherMots($idTheme)
	{
		$res = PdoDico::$monPdo->prepare("SELECT * FROM MOTS WHERE idThemeMot = :idTheme");
		$res->bindValue('idTheme', $idTheme);
		$res->execute();
		$ligne = $res->fetchAll();
		return $ligne;
	}
		
	/**
	 * Fonction qui permet de modifier un mots
	 *
	 * @param $idTheme 
	 *
	 */
	public function modifierMots($idMot,$contenuMot,$nbPointsMot,$dureeMot)
	{
		$res = PdoDico::$monPdo->prepare
				("UPDATE MOTS "
				. "SET contenuMot = :contenuMot, "
				. "nbPointsMot = :nbPointsMot, "
				. "dureeMot = :dureeMot "
				. "WHERE idMot = :idMot ");
		$res->bindValue('idMot', $idMot);
		$res->bindValue('contenuMot', $contenuMot);
		$res->bindValue('nbPointsMot', $nbPointsMot);
		$res->bindValue('dureeMot', $dureeMot);
		$res->execute();
	}
	
	/**
	 * Fonction qui permet d'ajouter un mot
	 *
	 * @param $contenuMot 
	 * @param $nbPointsMot 
	 * @param $idThemeMot 
	 * @param $dureeMot 
	 *
	 */
	public function ajouterMots($contenuMot,$nbPointsMot,$idThemeMot,$dureeMot)
	{
		$res = PdoDico::$monPdo->prepare
				("INSERT INTO MOTS (contenuMot, nbPointsMot, dureeMot, idThemeMot) "
				. "VALUES(:contenuMot,:nbPointsMot,:dureeMot,:idThemeMot) ");
		$res->bindValue('contenuMot', $contenuMot);
		$res->bindValue('nbPointsMot', $nbPointsMot);
		$res->bindValue('idThemeMot', $idThemeMot);
		$res->bindValue('dureeMot', $dureeMot);
		$res->execute();
		echo "ajouterMots".$contenuMot.' '.$idThemeMot;
	}
	
	/**
	 * Fonction qui permet de supprimer un mot
	 *
	 * @param $idMot 
	 *
	 */
	public function supprimerMots($idMot)
	{
	echo "supMot=".$idMot;
		$res = PdoDico::$monPdo->prepare
				("DELETE MOTS WHERE idMot = :idMot ");
		$res->bindValue('idMot', $idMot);
		$res->execute();
	}
}
?>