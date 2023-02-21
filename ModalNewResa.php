<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <p class='FontQuaiHeader'>RESERVATION</p>
            <button class="btn btn-close" data-bs-dismiss="modal" id='closeNewResa'></button>
        </div>
        <div class="modal-body">

    <form id='NewFormResa'>
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
		        <label class="col-form-label">Date <span style='color: #f44336;'>(*)</span></label>
		        <input type='date' id='dateResa'>
		    </div>
		    <div class="form-group m-3">
		        <label class="col-form-label">Nombre de couverts <span style='color: #f44336;'>(*)</span></label>
		        <input type='number' id='nbrCouvert' min="1">
		    </div>
		     <span style='color: #f44336;'>(*) champs obligatoires</span>
		</div>
		<div class='col m-1'>
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
		    <div class='row m-3'>
			<label class='text-center'->ALLERGIES EVENTUELLES A INDIQUER A NOS CUISINES</label>
			<textarea style='resize: none;' id='Allergie' name='Allergie'></textarea>
		    </div>
		</div>
	    </div>
	    <div class='row'>
	        <div class='col mt-4'>
		    <input type='submit' id='AddResa' class='btn styleBtn' value='ENREGISTRER LA RESERVATION'>
		</div>
	    </div>

        </div>
    </form>

</div>
    <div class='modal-footer'>
        <?php require('PROCESS/InfoOpenResto.php'); ?>
    </div>
</div>
</div>