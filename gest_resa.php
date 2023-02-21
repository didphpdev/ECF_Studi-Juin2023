<script>
    $('#submitMdf').click(function (e){
	e.preventDefault();
	var IdResa = $("#IdResaChx").val();
	var NameResa = $("#NameResa").text();
	var DateResa = $("#DateResa").val();
	var HourResa = $("#HourResa").val();
	var NbrCouvert = $("#NbrCouvert").val();
	var TelResa = $("#TelResa").val();
	var MailResa = $("#MailResa").val();
	var Comment = $("#Comment").val();
	var DatasModif = IdResa + "|" +
	    NameResa + "|" + 
	    TelResa + "|" + 
	    MailResa + "|" + 
	    DateResa + "|" + 
	    HourResa + "|" + 
	    NbrCouvert  + "|" +
	    Comment;
	$.ajax({
	    url: 'PROCESS/TrtMdfResa.php',
	    type: 'POST',
	    data: 'DatasModif=' + DatasModif,
	    success: function(retour) {
		alert (retour);
		$('#NbrPlceInLine').load('PROCESS/InfoGenResa.php');
		$('#ModalMdfResa').modal('hide');
	    }
	});
    });
    
    $('#submitPlaceDispo').click(function(e){
	e.preventDefault();
	var NbAddPlace = $('#NbrCouvInL').val();
	$.ajax({
	    url: 'PROCESS/TrtAddPlace.php',
	    type: 'POST',
	    data: 'NbrAddPlace=' + NbAddPlace,
	    success: function(retour) {
		alert (retour);
		$('#NbrCouvInL').val('');
		$('#NbrPlceInLine').load('PROCESS/InfoGenResa.php');
	    }
	})
	
    });
    
</script>
<div class='container text-center'>
    <p class='text-white  bg-secondary p-2 rounded'>LES RESERVATIONS</p>
    <div class='row'>
	<div class='col-6 align-content-center'>
		<div class='row mb-5'>
		    <form id='NbCouvertDispo' class="bg-gradient">
			<fieldset>
			<legend>Nombre de couverts</legend>
			<div class='form-group text-center'>
			    <label for='NbrCouvInL'>Nombre en ligne</label>
			    <input type="number" id="NbrCouvInL" min="1" max="100" size="3" style="text-align: right;">
			</div>
			</fieldset>
			<div class='form-group'>
			    <button id='submitPlaceDispo' class='btn styleBtn'>ENREGISTRER</button>
			</div>
		    </form>
		   
		</div>
		<div class='row bg-gradient' id='NbrPlceInLine'>
			<?php require('PROCESS/InfoGenResa.php'); ?>
		</div>
	</div>
	<div class='col-6 overflow-auto p-3 bg-light' style='max-height: 60%;' id="RightScreenResa">
	    <?php
	       require('PROCESS/RightScreenResa.php');
	    ?>
	</div>
    </div>
</div>
<!**************************** MODAL MODIFICATION DE RESERVATION ***************************!>
<div class='modal fade' id='ModalMdfResa'>
    <div class="modal-dialog modal-lg mt-5">
        <div class="modal-content align-items-center">
            <div class='modal-header'>
                <p class="FontQuaiHeader col-12 text-center">Réservation au nom de : <span id='NameResa'></span></p>
                <img src='Images/IconClose.png' id='closeModalMdfResa' style='height:25px; width:25px;'>
            </div>
	    <div class='modal-body'>
		<form class='form-group' enctype='multipart/form-data' id='FormMdfResa' class='text-center'>
		    <input type='hidden' id='IdResaChx'>
		    <div class='row'>
			<div class='col'>
			    <div class=form-group'>
				<label class='form-label'>DATE DE LA RESERVATION</label>
				<input type='date' value='' id='DateResa'>
			    </div>
			    <div class=form-group'>
				<label class='form-label'>HEURE DE LA RESERVATION</label>
				<input type='time' value='' id='HourResa'>
			    </div>
			    <div class=form-group'>
				<label class='form-label'>NOMBRE DE COUVERT(S) RESERVE(S)</label>
				<input type='number' id='NbrCouvert' style='resize:none; text-align:right;' size='3'>
			    </div>
			    <div class=form-group'>
				<label class='form-legend'>CONTACT</label>
				<label class='form-label' for='email'>Email</label>
				<input type='email' id='MailResa' value=''>
				<label class='form-label' for='TelResa'>Telephone</label>
				<input type='text' id='TelResa' style='text-align:right;' size='11'>
			    </div>
			    <div class=form-group '>
				<label class='form-label' for='Comment' style='vertical-align:top;'>COMMENTAIRES / ALLERGIES</label>
				<textarea id='Comment' style='resize: none;' class='form-control'></textarea>
			    </div>
			</div>
		    </div>
		    <div class='row'>
			<div class='col text-center mt-3'>
			    <div class=form-group'>
				<button id='submitMdf' class='btn styleBtn'>VALIDER MODIFICATION</button>
			    </div>
			</div>
		    </div>
		</form>
	    </div>
        </div>
    </div>
</div>