<?php

try {
	$db = new PDO('mysql:host=185.26.126.11;dbname=scael','intranet','Net:Int:2016');
	} catch (PDOException $e) {
	die('Erreur: '.$e->getMessage());	
	}
		$table = 'adherents';
		$etat = 1;
		$idoffre = 2917;

		/*$rq = $db->prepare("UPDATE ".$table." SET etat = :etat WHERE id_offre = :idoffre");
		$arr = array(
			':idoffre'=> $idoffre, 
			':etat'	=> $etat
		);
		$rq->execute($arr);*/

	$reponse = $db->query("SELECT * FROM adherents");
	$nb = $reponse->rowCount();

	echo "Nombre de resultat ".$nb."<br>";

	// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
	echo "<table border='1' cellpadding='10' cellspacing='1' width='100%''>";
	echo $donnees['id_adherent']."<br>";
	echo $donnees['nomcomplet']."<br>";
	echo $donnees['prenom']."<br>";
	echo $donnees['famnom']."<br>";
	echo $donnees['email']."<br>";
	echo $donnees['famnom']."<br>";
	echo $donnees['flagadm']."<br>";
	echo $donnees['mobile']."<br>";
	echo $donnees['login']."<br>";
	echo $donnees['mdp']."<br>";
	echo $donnees['codep']."<br>";
	echo $donnees['securite']."<br>";
	echo $donnees['md5step']."<br>";
	echo $donnees['dernier_log']."<br>";
	echo $donnees['dernier_act']."<br>";
	echo $donnees['dernier_rfrsh']."<br>";
	echo $donnees['etat']."<br>";
}

$reponse->closeCursor(); // Termine le traitement de la requête
?>
<table border="1" cellpadding="10" cellspacing="1" width="100%">
   <tr>
      <th></th>
      <th>Nom</th>
      <th>Profession</th>
   </tr>
   <tr>
      <td>Mike</td>
      <td>Stuntman</td>
      <td>Cascadeur</td>
   </tr>
   <tr>
      <td>Mister</td>
      <td>Pink</td>
      <td>Gangster</td>
   </tr>
</table>
