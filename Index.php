<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>QUAI ANTIQUE</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=La+Belle+Aurore&display=swap" rel="stylesheet">

    <link href="Styles/bootstrap.min.css" rel="stylesheet">
    <link href="Styles/bootstrap-grid.min.css" rel="stylesheet">
    <link href="Styles/index.css" rel="stylesheet">

    <script src="Scripts/Jquery-3.6.1.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
       
    $('#FormConnect').submit(function(e){
	e.preventDefault();
        var MAIL = $('#MAIL').val();
	var PW = $('#PW').val();
	$.ajax({
            url: 'PROCESS/TrtAccess.php',
            method: 'POST',
	    data: "MAIL=" + MAIL + "&PW=" + PW,
            success: function(Retour) {
		$("body").html(Retour);
            }
        });
    });
    /******************************************************************/
    /******************** CREATE COMPTE NEW CLIENT ********************/
    $('#CrtCmptClient').click(function(e) {
	e.preventDefault();
	ResetCrtCmptClt()
	$('#ModalCrtClient').modal('show');
	$('.modal-header p').text("CREATION D'UN COMPTE CLIENT");
	$('#nameClient').focus();
    });
    
    $('#ValidNewClient').click('submit', function(e) {
	e.preventDefault();
	var Nom = $('#nameClient').val();
	if (Nom === "" ) { alert ("VOUS DEVEZ INDIQUER UN NOM !!");  $("#nameClient").focus(); return false; }
	var Prenom = $('#lastnameClient').val()
	var Identifiant = Nom + " " + Prenom;
	var PassWdClt = $('#PwDclient').val();
	var EmailClient = $('#mailClient').val();
	var PhoneClient = $('#phoneClient').val();
	var NbrCouvClient = $('#nbrCouvClient').val();
	var CommentClient = $('#commentClient').val();
	var DatasNewClient = Identifiant + "|" +
	     PassWdClt + "|" + 
	     EmailClient + "|" + 
	     PhoneClient + "|" + 
	     NbrCouvClient + "|" + 
	     CommentClient;
	$.ajax({
	    url: 'PROCESS/TrtAddNewClient.php',
	    type: 'POST',
	    data: 'DatasNewClient=' + DatasNewClient,
	    success: function(retour){
		alert (retour);
		ResetCrtCmptClt();
		$('#ModalCrtClient').modal('hide');
	    }
	});
    });
    
    function ResetCrtCmptClt(){
	$('#nameClient').val('');
	$('#lastnameClient').val('');
	$('#PwDclient').val('');
	$('#mailClient').val('');
	$('#phoneClient').val('');
	$('#nbrCouvClient').val('');
	$('#commentClient').val('');
    }
    /***************************************************************/
    /******************** NOUVELLE RERSERVATION ********************/
    ResetResa();
    
    $('#closeNewResa').click(function(){
	ResetResa();
	$("#NewResa").load('ModalNewResa.php');
    });
    
    $('#AddResa').click('submit', function(e){
	e.preventDefault();
	var NameResa = $("#nameResa").val();
	if (NameResa === "" ) { alert ("VOUS DEVEZ INDIQUER UN NOM !!");  $("#nameResa").focus(); return false; }
	var MailResa = $('#mailResa').val();
	var TelResa = $("#telResa").val();
        var NbrCouv = $('#nbrCouvert').val();
        var DateResa = $('#dateResa').val();
        var HourResaM = $("input[name='choicehourm']:checked").val();
        var HourResaS = $("input[name='choicehours']:checked").val();
	var Allergies = $('#Allergie').val();
        if (typeof HourResaM !== "undefined") { var HourResa = HourResaM; }
        if (typeof HourResaS !== "undefined") { var HourResa = HourResaS; }
	var NewResa = NameResa + "|" + TelResa + "|" + MailResa + "|" + DateResa + "|" + HourResa + "|" + NbrCouv + "|" + Allergies ;
	$.ajax({
	    url: 'PROCESS/TrtAddResa.php',
	    type: 'POST',
	    enctype: 'multipart/form-data',
	    data: 'NewResa=' + NewResa,
	    success: function(retour){
		var RetourResa = retour.split('|');
		alert (RetourResa[0]);
		if ( RetourResa[1]==='OK' ) {
		    $('#NewResa').modal('hide');
		    ResetResa(); 
		} else {
		    ResetResa(); 
		    return false;
		}
	    }
	});
    }); 
    
    function ResetResa(){
	$('#nameResa').val('');
	$('#mailResa').val('');
	$('#dateResa').val('');
	$('#telResa').val('');
	$('#nbrCouvert').val('');
	$('input[name="choicehourm"]').prop('checked', false);
	$('input[name="choicehours"]').prop('checked', false);
	$('#Allergie').val('');
    }
    
});
</script>

</head>

<body>
    <div class='container '>
	<div class='row'>
	    <div class='col text-center'>
                <p class='FontQuaiEntete'>Le Quai Antique</p>
	    </div>
	</div>
	<div class='row' >
	    <div class='col-6 text-center'>
	        <p><img src='Images/Quai_Antique.jpg' style='width: 70%; height: auto;' class='img-thumbnail'></p>
	    </div>
	    
	    <!-------------------------- BOUTONS MENU NAVIGATION ---------------------------->
	    <div class='col-6 col-xs-2'>
		<div class='row h-50 align-items-center text-center'>
		    <div class='align-middle col-4 text-center'>
			<button id='btnMenu' class='col-xs-2' data-bs-toggle="modal" data-bs-target="#Menus" style='height:80px;'>
			    Nos menus
			</button>
		    </div>
		    <div class='align-middle col-4 text-center'>
			<button id='btnMenu' class='col-xs-2' data-bs-toggle="modal" data-bs-target="#Horaires" style='height:80px;'>
				    Nos horaires
			</button>
		    </div>
		    <div class='align-middle col-4 col-xs-4 text-center'>
			<button id='btnMenu' class='col-xs-2' data-bs-toggle="modal" data-bs-target="#Connect" style='height:80px;'>
			    Me connecter
			</button>
		    </div>
		</div>
		<div class='row h-50 align-items-center text-center'>
		    <div class='col-xs-2 col-12'>
			<button id='btnMenu' class='col-xs-2' data-bs-toggle="modal" data-bs-target="#LaCARTE" style='height:80px;'>
			    Notre carte
			</button>
		    </div>
		</div>
	    </div>
	</div>
	
	<div class='row align-items-center'>
	    <?php require('LaGallery.php'); ?>
	</div>
    </div>

<!-----------------------------------  LES MODALS  ---------------------------------->
<div class='container' id='EveryModals'>
    <?php require('EveryModals.php'); ?>
</div>
<!-- ****************************** PIED DE PAGE ****************************** -->
<FOOTER>
    <?php require('PROCESS/InfoOpenResto.php'); ?>
</FOOTER>

</body>
</html>