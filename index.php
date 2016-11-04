<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="Kennouche Omar">
		<meta name="description" content="Apprendre à coder en HTML, CSS, JavaScript, Jquery, Php">
		<title>Ajax | topdéveloppement</title>
		<link rel="icon" href="icon/favicon.ico">
		<!-- Reset CSS Meyer -->
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
		<!-- Style Bootstrap -->
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css" type="text/css" media="all">
		<!-- Style Site Global -->
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="all">
		<!-- Chargement Jquery -->
		<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
	</head>
<body>
	<div id="loading"></div>
	<img id="loadingImg" src="images/loading.svg" alt="image de chargement page">
	<div class="container-fluid">
		<form id="form_register" class="form-padding form-margin col-lg-offset-4 col-md-offset-4 col-lg-4 col-md-4">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h2 class="text-center">Formulaire d'inscription</h2>
					<h3 class="text-center">Avec Ajax !</h3>
				</div>
			</div>
			<div class="row">
				<label for="name" class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">Votre Nom</label>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input class="form-control" id="name" type="text" placeholder="Votre Nom">
					</div>
				</div>
				<div id="success-check-name" class="success-check col-lg-1 col-md-1"></div>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div id="output_checkname"></div>
				</div>
			</div>
			<br>
			<div class="row">
				<label for="lastname" class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">Votre Prénom</label>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input class="form-control" id="lastname" type="text" placeholder="Votre Prénom">
					</div>
				</div>
				<div id="success-check-lastname" class="success-check col-lg-1 col-md-1"></div>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div id="output_checklastname"></div>
				</div>
			</div>
			<br>
			<div class="row">
				<label for="username" class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">Votre Pseudo</label>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input class="form-control pseudo" id="username" type="text" placeholder="Votre Pseudo">
					</div>
				</div>
				<div id="success-check-pseudo" class="success-check col-lg-1 col-md-1"></div>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div id="output_checkpseudo"></div>
				</div>
			</div>
			<br>
			<div class="row">
				<label for="birthday" class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">Votre Date de Naissance</label>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input class="form-control" id="birthday" type="date" placeholder="Votre Date de Naissance">
					</div>
				</div>
				<div id="success-check-birthday" class="success-check col-lg-1 col-md-1"></div>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div id="output_checkbirthday"></div>
				</div>
			</div>
			<br>
			<div class="row">
				<label for="email" class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">Votre Email</label>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div class="input-group">
						<span class="input-group-addon"><i>@</i></span>
						<input class="form-control email" id="email" type="email" placeholder="Votre Email">
					</div>
				</div>
				<div id="success-check-email" class="success-check col-lg-1 col-md-1"></div>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div id="output_checkemail"></div>
				</div>
			</div>
			<br>
			<div class="row">
				<label for="password-first" class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">Mot de passe</label>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input class="form-control" id="password-first" type="password" placeholder="Mot de passe">
					</div>
				</div>
				<div id="success-check-password-first" class="success-check col-lg-1 col-md-1"></div>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div id="output_checkpassword-first"></div>
				</div>
			</div>
			<br>
			<div class="row">
				<label for="password-second" class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">Confirmer votre mot de passe</label>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input class="form-control" id="password-second" type="password" placeholder="Retaper votre mot de passe">
					</div>
				</div>
				<div id="success-check-password-second" class="success-check col-lg-1 col-md-1"></div>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div id="output_checkpassword-second"></div>
				</div>
			</div>
			<br>
			<div class="row">
			    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
			        <div id="status" class="alert alert-danger">Remplir tous les champs</div>
			    </div>
			</div>
			<div class="row">
			    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
			        <input id="loadRegister" class="login btn-success btn btn-lg" type="submit" value="S'inscrire" />
			    </div>
			</div>
		</form>
	</div>
</body>

</html>