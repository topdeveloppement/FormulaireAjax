<?php 
//On verifie l'email

if (!empty($_POST['email'])) {
	$email = $_POST['email'];
	//verification de l'adresse email
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo 'Adresse email invalide !';
		exit();
	}

	// lorsque que les tests sont tous bon on va se connecter à la base de donnée
	require "connect_db.php";
	
	$allEmail = $db->prepare('SELECT id FROM user WHERE email = ?');// On recupere tous les email en base de donnée
	$allEmail->execute(array($email));

	$nbEmail = $allEmail->rowCount();// On compte le nombre de email en base de donnée

	if($nbEmail > 0){// On test si le email existe au moin une fois en base de donnée
		echo 'Adresse email déjà utilisé !';
		exit();// on sort du script si l'email existe.
	} else {
		echo 'success';
		exit();
	}
}
?>