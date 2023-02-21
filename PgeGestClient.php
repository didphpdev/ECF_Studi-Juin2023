<?php
 session_start();
    if ($_SESSION['Connect'] != date("Hm")."Y") {
	header('location: PgeNoConnect.php');
    }
?>
<script>
    RefreshFormResa();
    
    /**************** AJOUT RESA *****************/
    $('#AddResaClt').click(function(e){
	e.preventDefault();
	var NameResa = $("#nameResa").val();
	var MailResa = $('#mailResa').val();
	var TelResa = $("#telResa").val();
        var NbrCouv = $('#nbrCouvert').val();
	var Allergies = $('#Allergie').val();
	var DateDemand = $('#dateResa').val();
	if (DateDemand === '') { alert('Aucune date indiquée ??'); $('#dateResa').focus(); }
	var HourResaM = $("input[name='choicehourm']:checked").val();
        var HourResaS = $("input[name='choicehours']:checked").val();
	if (typeof HourResaM !== "undefined") { var HourResa = HourResaM; }
        if (typeof HourResaS !== "undefined") { var HourResa = HourResaS; }
	if ( typeof HourResa === "undefined" ) {
	    alert('A quelle heure souhaité vous réserver ??') ;
	} else {
	    var DatasNewResa = NameResa + "|" + TelResa + "|" + MailResa + "|" + DateDemand + "|" + HourResa + "|" + NbrCouv + "|" + Allergies ;
	    $.ajax({
		url: 'PROCESS/TrtAddResa.php',
		type: 'POST',
		data: 'NewResa=' + DatasNewResa,
		success: function (retour){
		    var RetourResa = retour.split('|');
		    if ( RetourResa[1]==='OK' ) {
			$('#dateResa').val('');
			$("input[type='radio'].choicehour").prop("checked", false);
		    }
		    alert (RetourResa[0]);
		}
	    });
	}
    });
    /**************** MODIF COORDOS CLT **********/
    $('#SubMdfCoordos').click(function(e){
	e.preventDefault();
	var IdUser = $("#IdUser").val();
	var Identifiant = $('#CoordosIdentClt').val();
	var Email = $('#CoordosMailClt').val();
	var Phone = $('#CoordosPhoneClt').val()
	var NewCoordosCmptClt = IdUser + "|" + Identifiant + '|' + Email + "|" + Phone;
	$.ajax({
	    url: 'PROCESS/TrtMdfCmptClt.php',
	    type: 'POST',
	    data: 'NewDatasCmptClt=' + NewCoordosCmptClt,
	    success: function(retour) {
		alert (retour);
		RefreshFormResa();
	    }
	});
    });
    /**************** MODIF INFOS CLT ************/
    $('#SubInfosClt').click(function(e){
	e.preventDefault();
	var IdUser = $("#IdUser").val();
	var NewInfosCmptClt = IdUser + "|" + $('#InfosNbCouvClt').val() + "|" + $('#InfosCommentClt').val();
	$.ajax({
	    url: 'PROCESS/TrtMdfCmptClt.php',
	    type: 'POST',
	    data: 'NewDatasCmptClt=' + NewInfosCmptClt,
	    success: function(retour) {
		RefreshFormResa();
		alert (retour);
	    }
	});
    });
    
    function RefreshFormResa() {
	$.ajax({
	    url: 'PROCESS/SearchInfosClt.php',
	    type: 'POST',
	    success: function(retour){
		var DatasClt = retour.split('|');
		$('#IdUser').val(DatasClt[0]);
		/************ Formulaire Modification ***********/
		$('#CoordosIdentClt').val(DatasClt[1]);
		$('#CoordosMailClt').val(DatasClt[2]);
		$('#CoordosPhoneClt').val(DatasClt[3]);
		$('#InfosNbCouvClt').val(DatasClt[4]);
		$('#InfosCommentClt').val(DatasClt[5]);
		/************ Formulaire reservation ***********/
		$('#nameResa').val(DatasClt[1]);
		$('#mailResa').val(DatasClt[2]);
		$('#telResa').val(DatasClt[3]);
		$('#nbrCouvert').val(DatasClt[4]);
		$('#Allergie').val(DatasClt[5]);
	    }
	});
    }
    
</script>
<div id='HEADER'>
    <div class='home'>
	<a href='Index.php' title='Retour acceuil'>
	    <img src='Images/home-icon.png' width='50' height='50' alt='DECONNEXION'>
	</a>
    </div>
    <p class='FontQuaiEnteteAdm align-self-auto'>
        Bienvenue sur votre espace client 
    </p>
</div>
<div class='container'>
    <div class='row'>
	<div class='col-6'>
	    <div class='row bg-gradient p-3'>
	        <p class='text-white  bg-secondary p-2 rounded'>MES COORDONNEES</p>
		<form id='MdfCoordosClt' style='background-color: #C0C0C0;' class='p-3'>
		    <input type='hidden' id='IdUser' value=''>
		    <div class='form-group row'>
			<div class='col-3'><label for='CoordosIdentClt' class='col-form-label'>Identifiant</label></div>
			<div class='col-9'><input type='text' id='CoordosIdentClt' class='form-control'></div>
		    </div>
		    <div class='form-group row'>
			<div class='col-3'><label for='CoordosMailClt' class='col-form-label'>E Mail</label></div>
			<div class='col-9'><input type='text' id='CoordosMailClt' class='form-control'></div>
		    </div>
		    <div class='form-group row'>
			<div class='col-3'><label for='CoordosPhoneClt' class='col-form-label'>Telephone</label></div>
			<div class='col-9'><input type='text' id='CoordosPhoneClt' class='form-control'></div>
		    </div>
		    <div class='form-group row text-center mt-3'> 
			<div class='col-12'><input type='submit' value='ENREGISTRER MODIFICATION' class='btn styleBtn' id='SubMdfCoordos'></div>
		    </div>
		</form>
	    </div>
	    <div class='row bg-gradient mt-3 p-3'>
	        <p class='text-white bg-secondary p-2 rounded'>MES INFORMATIONS</p>
		<form id='MdfInfosClt' style='background-color: #C0C0C0;' class='p-3'>
		    <div class='form-group row'>
			<div class='col-3'><label for='InfosNbCouvClt' class='col-form-label'>Nbr de couvert</label></div>
			<div class='col-9'><input type='number' id='InfosNbCouvClt' class='form-control' size='4'></div>
		    </div>
		    <div class='form-group row'>
			<div class='col-3'><label for='InfosCommentClt' class='col-form-label'>Commentaire(s) et Allergie(s)</label></div>
			<div class='col-9'><textarea id='InfosCommentClt' style='resize:none; width:100%;'></textarea></div>
		    </div>
		    <div class='form-group row text-center mt-3'>
			<div class='col-12'><input type='submit' value='ENREGISTRER MODIFICATION' class='btn styleBtn' id='SubInfosClt'></div>
		    </div>
		</form>
	    </div>
	</div>
	<div class='col-6'>
	    <p class='text-white  bg-secondary p-2 rounded'>NOUVELLE RESERVATION</p>
	<form id='NewFormResa' class='bg-gradient'>
	<div class='row'>
	    <div class='row m-2'>
	        <div class='col m-1' style='background-color: #C0C0C0;'>
		    <div class="form-group">
		        <label class="form-label">Votre nom <span style='color: #f44336;'>(*)</span></label>
		        <input type='text' id='nameResa' size='30' class='form-control' required><br>
		    </div>
		    <div class="form-group">
		        <label>Votre e mail <span style='color: #f44336;'>(*)</span></label>
		        <input type='email' id='mailResa' value='' class='form-control'><br>
		    </div>
		    <div class="form-group">
		        <label>Votre Numéro de portable</label>
		        <input type='tel' id='telResa' value='' class='form-control' id='PhoneGsm' Pattern='[0-9]{10}' size='10' placeholder="06xxxxxxxx"><br>
		    </div>
		    <div class="form-group">
		        <label class="col-form-label">Nombre de couverts <span style='color: #f44336;'>(*)</span></label>
		        <input type='number' id='nbrCouvert' min="1" size='3'>
		    </div>
		    <div class="form-group m-3">
		        <label class="col-form-label">Date <span style='color: #f44336;'>(*)</span></label>
		        <input type='date' id='dateResa'>
		    </div>
		     <span style='color: #f44336;'>(*) champs obligatoires</span>
		</div>
		<div class='col m-1'>
		    <div class='row m-3'>
			<label class='text-center'->ALLERGIES EVENTUELLES A INDIQUER A NOS CUISINES</label>
			<textarea style='resize: none;' id='Allergie' name='Allergie'></textarea>
		    </div>
		    <div style='text-align: left;'>
		        <p class='modal-header'>MIDI</p>
		        <?php
			    $IndicM = 1;
			    for ( $heures = 12 ; $heures <= 12 ; $heures++ ){
			        for ( $minutes = 0 ; $minutes <= 45 ; $minutes += 15 ){
				    $Min = sprintf("%02d", $minutes);
				    echo "<input type='radio' class='choicehour' name='choicehourm' id='choicehourm".$IndicM."' value='".$heures.":".$Min."'>";
				    echo "<label for='choicehourm".$IndicM."'>".$heures.":".$Min."</label>";
				    $IndicM++;
				}
			    }
			?>
		    </div>
		    <div style='text-align: left;'>
		        <p class='modal-header'>SOIR</p>
		        <?php
			    $IndicS = 1;
			    for ( $heures = 19 ; $heures <= 20 ; $heures++ ){
			        for ( $minutes = 0 ; $minutes <= 45 ; $minutes += 15 ){
				    $Min = sprintf("%02d", $minutes);
				    echo "<input type='radio' class='choicehour' name='choicehours' id='choicehours".$IndicS."' value='".$heures.":".$Min."'>";
				    echo "<label for='choicehours".$IndicS."'>".$heures.":".$Min."</label>";
				    $IndicS++;
				}
			    }
			?>
		    </div>
		</div>
	    </div>
	    <div class='row text-center'>
	        <div class='col mt-2'>
		    <button id='AddResaClt' class='btn styleBtn'>ENREGISTRER LA RESERVATION</button>
		</div>
	    </div>

        </div>
    </form>
	</div>
    </div>
</div>