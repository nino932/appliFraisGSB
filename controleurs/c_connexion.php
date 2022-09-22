<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$Utilisateur = $pdo->getInfosUtilisateur($login,$mdp);
		if(!is_array( $Utilisateur)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
		else{
			$id = $Utilisateur['id'];
			$nom =  $Utilisateur['nom'];
			$prenom = $Utilisateur['prenom'];
			$role = $Utilisateur['role'];
            connecter($id,$nom,$prenom,$role);
			include("vues/v_sommaire.php");
		}
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>