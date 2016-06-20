/* 
**Attente du chargement de la page
*/
jQuery(document).ready(function() {
	 
	$("#form_register input").focus(function() {
		$("#status").slideUp(600);
	});
	//Gestion name
	$("#name").keyup(function() {
		if($(this).val() == ''){// si le champs et vide on supprime l'icone success et le message d'erreur
			$("#output_checkname").html('').removeClass('alert alert-danger error-check').removeAttr('class');
			$("#success-check-name").html('');
		}else if($(this).val().match(/[0-9]/g)){ // on verifie que le champs ne contient pas de caractere alphanumerique
			$("#output_checkname").html('Le nom doit comporter que des caractéres').addClass('alert alert-danger error-check');
			$("#success-check-name").html('');
		}else{// si toute et ok on affiche un 
			$("#success-check-name").html('<img src="images/check.png" alt="icon de succès" />');
			$("#output_checkname").html('').removeClass('alert alert-danger error-check').removeAttr('class');
		}
	});
	//Gestion lastname
	$("#lastname").keyup(function() {
		if($(this).val() == ''){// si le champs et vide on supprime l'icone success et le message d'erreur
			$("#output_checklastname").html('').removeClass('alert alert-danger error-check').removeAttr('class');
			$("#success-check-lastname").html('');
		}else if($(this).val().match(/[0-9]/g)){
			$("#output_checklastname").html('Le prénom doit être que des caractéres').addClass('alert alert-danger error-check');
			$("#success-check-lastname").html('');
		}else{
			$("#success-check-lastname").html('<img src="images/check.png" alt="icon de succès" />');
			$("#output_checklastname").html('').removeClass('alert alert-danger error-check').removeAttr('class');
		}
	});
	//Gestion birthday
	$("#birthday").keyup(function() {
		if($(this).val() == ''){// si le champs et vide on supprime l'icone success et le message d'erreur
			$("#output_checkbirthday").html('').removeClass('alert alert-danger error-check').removeAttr('class');
			$("#success-check-birthday").html('');
		}else{
			$("#success-check-birthday").html('<img src="images/check.png" alt="icon de succès" />');
		}
	});
	//Gestion pseudo
	$("#username").keyup(function() { //capture l'evenement au clavier et execute la fonction check_pseudo a chaque entrée
		if($(this).val() == ''){// si le champs et vide on supprime l'icone success et le message d'erreur
			$("#output_checkpseudo").html('').removeClass('alert alert-danger error-check').removeAttr('class');
			$("#success-check-pseudo").html('');
		}else{
			check_pseudo();
		}
	});
	//Gestion email
	$("#email").keyup(function() { //capture l'evenement au clavier et execute la fonction check_email a chaque entrée
		if($(this).val() == ''){// si le champs et vide on supprime l'icone success et le message d'erreur
			$("#output_checkemail").html('').removeClass('alert alert-danger error-check').removeAttr('class');
			$("#success-check-email").html('');
		}else{
			check_email();
		}
	});
	//Gestion password_first
	$("#password-first").keyup(function() { //capture l'evenement au clavier et execute la fonction a chaque entrée
		if($(this).val() == ''){// si le champs et vide on supprime l'icone success et le message d'erreur
			$("#output_checkpassword-first").html('').removeClass('alert alert-danger error-check').removeAttr('class');
			$("#success-check-password-first").html('');
		}else if($(this).val().length < 6){//si le password et inferieur a 6 caractere
			$("#output_checkpassword-first").html('Mot de passe trop court (6 caractéres minimum)').addClass('alert alert-danger error-check');
			$("#success-check-password-first").html('');
		}else if($("#password-second").val() != "" && $("#password-second").val() != $("#password-first").val()){//si le password-second et pas vide et si le password-second n'est pas egale au password-first
			$("#output_checkpassword-first").html('Les deux mots de passe sont différents').addClass('alert alert-danger error-check');
			$("#output_checkpassword-second").html('Les deux mots de passe sont différents').addClass('alert alert-danger error-check');
			$("#success-check-password-first").html('');
		}else{
			$("#success-check-password-first").html('<img src="images/check.png" alt="icon de succès" />');
			$("#output_checkpassword-first").html('').removeClass('alert alert-danger error-check').removeAttr('class');
			$("#output_checkpassword-second").html('').removeClass('alert alert-danger error-check').removeAttr('class');
		}
	});
	//Gestion password_second
	$("#password-second").keyup(function() { //capture l'evenement au clavier et execute la fonction check_password a chaque entrée
		if($(this).val() == ''){// si le champs et vide on supprime l'icone success et le message d'erreur
			$("#output_checkpassword-second").html('').removeClass('alert alert-danger error-check').removeAttr('class');
			$("#success-check-password-second").html('');
		}else if($(this).val().length < 6){//si le password et inferieur a 6 caractere
			$("#output_checkpassword-second").html('Mot de passe trop court (6 caractéres minimum)').addClass('alert alert-danger error-check');
			$("#success-check-password-second").html('');
		}else if($("#password-first").val() != "" && $("#password-first").val() != $("#password-second").val()){//si le password-first et pas vide et si le password-first n'est pas egale au password-second
			$("#output_checkpassword-second").html('Les deux mots de passe sont différents').addClass('alert alert-danger error-check');
			$("#output_checkpassword-first").html('Les deux mots de passe sont différents').addClass('alert alert-danger error-check');
			$("#success-check-password-second").html('');
		}else{
			$("#success-check-password-second").html('<img src="images/check.png" alt="icon de succès" />');
			$("#output_checkpassword-second").html('').removeClass('alert alert-danger error-check').removeAttr('class');
			$("#output_checkpassword-first").html('').removeClass('alert alert-danger error-check').removeAttr('class');
		}
	});
	//Fonction check_pseudo
	function check_pseudo(){
		$.ajax({
			url: 'check_pseudo.php',
			type: 'POST',
			data: { 
				'pseudo_check': $("#username").val() //on envoie une variable pseudo_check qui contient la valeur du champs pseudo qui a l'id #username
			},
			success: function (data){
				if(data == "success"){
					$("#success-check-pseudo").html('<img src="images/check.png" alt="icon de succès" />');
					$("#output_checkpseudo").html('').removeClass('alert alert-danger error-check');
				}else {
					$("#output_checkpseudo").html(data).addClass('alert alert-danger error-check');
					$("#success-check-pseudo").html('');
				}
			}
		});
	}
	//Fonction check_email
	function check_email(){
		$.ajax({
			url: 'check_email.php',
			type: 'POST',
			data: {
				'email': $("#email").val(), //on envoie une variable email qui contient la valeur du champs email qui a l'id #email
			},
			success: function (data){
				if(data == "success"){
					$("#success-check-email").html('<img src="images/check.png" alt="icon de succès" />');
					$("#output_checkemail").html('').removeClass('alert alert-danger error-check');
				}else {
					$("#output_checkemail").html(data).addClass('alert alert-danger error-check');
					$("#success-check-email").html('');
				}
			}
		});
	}
	//traitement du formulaire d'inscription
	$("#form_register").on('submit', function(e) {
        e.preventDefault();
		var status = $("#status");
		var name = $("#name").val();
		var lastname = $("#lastname").val();
		var username = $("#username").val();
		var birthday = $("#birthday").val();
		var email = $("#email").val();
		var password_first = $("#password-first").val();
		var password_second = $("#password-second").val();

		$.ajax({
			url: 'register.php',
			type: 'POST',
			data: {
				'name': name,
				'lastname': lastname,
				'username': username,
				'birthday': birthday,
				'email': email,
				'password_first': password_first,
				'password_second': password_second,
			},
			beforeSend: function(){ // Avant d'envoyer la requete
				$("#loadRegister").attr("value", "Traitement en cours .....");
			},
			success: function (data){
				if(data == 'success'){

				setInterval(function(){ $("#loadRegister").attr("value", "S'inscrire"); },1000);	

				$("#name").val('');
				$("#lastname").val('');
				$("#username").val('');
				$("#birthday").val('');
				$("#email").val('');
 				$("#password-first").val('');
				$("#password-second").val('');
				$("#success-check-name").html('');
				$("#success-check-lastname").html('');
				$("#success-check-pseudo").html('');
				$("#success-check-birthday").html('');
				$("#success-check-email").html('');
				$("#success-check-password-first").html('');
				$("#success-check-password-second").html('');
				

				}else{
					status.html(data).slideDown(600);
					$("#loadRegister").attr("value", "S'inscrire");
				}
			}
		});
	});
	
});