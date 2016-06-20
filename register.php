<?php 
//Traitement de l'inscription
if(isset($_POST) && !empty($_POST)){

	require "connect_db.php"; // j'inclus le fichier qui me permet de me connecter a la base de donnée 

	$ip = $_SERVER['REMOTE_ADDR']; // je recupere l' addresse ip du serveur

	extract($_POST); // j'extrait le valeur de la super globale $_POST sous form $_POST['name'] sera egale a $name

	$username = preg_replace('#[^a-z0-9]#i', '', $username); 
	$allPseudo = $db->prepare('SELECT id FROM user WHERE username = ?');
	$allPseudo->execute(array($username));
	$nbPseudo = $allPseudo->rowCount();
	$allPseudo->closeCursor();

	$allEmail = $db->prepare('SELECT id FROM user WHERE email = ?');
	$allEmail->execute(array($email));
	$nbEmail = $allEmail->rowCount();
	$allEmail->closeCursor();

	if (empty($name) || empty($lastname) || empty($username) || empty($birthday) || empty($email) || empty($password_first) || empty($password_second)) {
		echo 'Tous les champs n\'ont pas été remplis.';		
	}elseif(preg_match("/([^A-Za-z\s])/",$name) == 1){
		echo "Le nom doit comporter que des caractéres";
		exit();// on sort du script si l'erreur existe.
	}elseif(preg_match("/([^A-Za-z\s])/",$lastname) == 1){
		echo "Le prénom doit comporter que des caractéres";
		exit();// on sort du script si l'erreur existe.
	}elseif($nbPseudo > 0){
		echo "Pseudo déjà utilisé !";
		exit();// on sort du script si l'erreur existe.
	}elseif($nbEmail > 0){
		echo "Adresse email déjà utilisé !";
		exit();// on sort du script si l'erreur existe.
	}elseif (strlen($username) < 3 || strlen($username) > 16) {
		echo "Le pseudo doit etre compris entre 3 à 16 caractères.";
		exit();// on sort du script si l'erreur existe.
	}elseif (is_numeric($username[0])) {
		echo "Le pseudo doit commencé par une lettre.";
		exit();// on sort du script si l'erreur existe.
	}elseif ($password_first != $password_second) {
		echo "Les mots de passe sont différents.";
		exit();// on sort du script si l'erreur existe.
	}else{
		$hash_pass = sha1($password_first);
		$rq = $db->prepare('INSERT INTO user(name, lastname, username, birthday, email, password, ip, created)
							VALUES(:name, :lastname, :username, :birthday, :email, :password, :ip, now())');
		$rq->execute(array(
			'name' => strtoupper($name),
			'lastname' => ucfirst($lastname),
			'username' => $username,
			'birthday' => $birthday,
			'email' => $email,
			'password' => $hash_pass,
			'ip' => $ip,
			));
		$rq->closeCursor();
		$id_user = $db->lastInsertId(); // Retourne l'identifiant de la dernière ligne insérée
		//on va créée un dossier au nom de l'utilisateur qui vient de s'inscrire
		if(!file_exists("membres/$username$id_user")){
			mkdir("membres/$username$id_user",0755);
		}
		//on va envoyer un mail de confirmation
		echo 'success';
	}
}
	
?>