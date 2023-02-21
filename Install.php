<!DOCTYPE>
<html>
    <head>
        <title>Install Quai Antique</title>
        <meta charset="utf-8">
		<script src="Scripts/Jquery-3.6.1.min.js"></script>
		
		<script>
		$(document).ready(function(){

			$.ajax({
				url: 'Trt_Install.php',
				type: 'POST',
				success: function(retour){
					$('#RetourCreateBdd').html(retour);
					$('#ID').focus();
				}
			});

		$('#BtnCreateUsr').click('submit', function(e) {
				e.preventDefault();
				var ID_FirstAdmin = $('#ID').val();
				var PW_FirstAdmin = $('#PW').val();
				var MAIL_FisrtAdmin = $('#MAIL').val();
				var DatasFirstAdmin = ID_FirstAdmin + "|" + PW_FirstAdmin + "|"  + MAIL_FisrtAdmin;
				$.ajax({
					url: 'CrtFirstAdmin.php',
					data: 'FirstAdmin=' + DatasFirstAdmin,
					type: 'POST',
					success: function (retour) {
						/* alert (retour); */
					    alert ('Installation TERMINEE !!');
					}
				});
			});
		
		});

		</script>
	</head>
    <body>
        <h1>INSTALLATION DU QUAI ANTIQUE</h1>  

		<p id='RetourCreateBdd'></p>

			<form id='FormCreateUsr' method='POST' enctype='multipart/form-data' action='' style='background-color: #cfcfd1; padding: 30px;'>
				<label for="ID">Identifiant</label>
				<input type="text" id="ID" name="ID" placeholder="saisissez votre identfiant" required>
				<br>
				<label for="MAIL">Email</label>
				<input type="email" id="MAIL" name="MAIL" placeholder="saisissez votre identfiant" required>
				<br>
				<label for="PW">Entrez votre MOT DE PASSE</label>
				<input type="password" id="PW" name="PW" placeholder="saisissez votre mot de passe" required>
				<br>
				<legend><b>ROLE</b></legend>
					
					<input type="radio" id="Admin" name="ROLE" value='A' checked>
					<label for='Admin'>ADMINISTRATEUR</label> 
					
					<input type="radio" id="Client" name="ROLE" value='C'>
					<label for="Client">CLIENT</label>
				<br>
				<input type='submit' id='BtnCreateUsr' value='CREER LE PREMIER ADMINISTRATEUR'>
				
			</form>
    </body>
</html>