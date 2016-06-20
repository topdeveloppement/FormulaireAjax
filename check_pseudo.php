<?php 
//On verifier si le pseudo existe.

if(!empty($_POST['pseudo_check'])){ //test si $_POST['pseudo_check'] n'est pas vide
	$pseudo = $_POST['pseudo_check']; //si la variable n'est pas vide on stock ca valeur dans une variable $pseudo
	$pseudo = preg_replace('#[^a-z0-9]#i', '', $pseudo); //on remplace tous les caractères qui ne sont pas des lettres ou des chiffres par des caractères vide

	if(is_numeric($pseudo[0])){// on test si la variable et de type numerique
		echo 'Le pseudo doit commencé par une lettre.';
		exit();// on sort du script si l'erreur existe.
	}

	if(strlen($pseudo) < 3 || strlen($pseudo) > 16){// on test si le pseudo à minimun 3 caractères et maximum 16 caractères
		echo 'Le pseudo doit etre compris entre 3 à 16 caractères.';
		exit();// on sort du script si l'erreur existe.
	}

	// lorsque que les tests sont tous bon on va se connecter à la base de donnée
	require "connect_db.php";

	$allPseudo = $db->prepare('SELECT id FROM user WHERE username = ?');// On recupere tous les pseudos en base de donnée
	$allPseudo->execute(array($pseudo));

	$nbPseudo = $allPseudo->rowCount();// On compte le nombre de pseudo en base de donnée

	if($nbPseudo > 0){// On test si le pseudo existe au moin une fois en base de donnée
		echo 'Pseudo déjà utilisé !';
		exit();// on sort du script si le pseudo existe.
	} else {
		echo 'success';
		exit();
	}
}

?>