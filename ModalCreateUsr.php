<script>
    $('#ID').focus();
</script>

<form id='FormCreateUsr' method='POST' enctype='multipart/form-data'>

    <div class="form-group">
	<label for="ID">Identifiant</label>
	<input type="text" class="form-control" id="ID" placeholder="saisissez votre identfiant" required>
    </div>   
    <div class="form-group">
	<label for="MAIL">Email</label>
	<input type="email" class="form-control" id="MAIL" placeholder="saisissez votre identfiant" required>
    </div>   
    <div class="form-group">
	<label for="PW">Entrez votre MOT DE PASSE</label>
	<input type="password" class="form-control" id="PW" placeholder="saisissez votre mot de passe" required>
    </div>
    <br>
    <div class="form-group">
	<div class='row'>
	    <label class="form-label">ROLE</label>
            <div>
                <div class="form-check form-check-inline">
		    <input type="radio" class="form-check-input" id="Admin" name="ROLE" value='A' checked>
		    <label class="custom-control-label" for="Admin">ADMINISTRATEUR</label> 
                </div>
                <div class="form-check form-check-inline">    
		    <input type="radio" class="form-check-input" id="Client" name="ROLE" value='C'>
		    <label class="custom-control-label" for="Client">CLIENT</label>   
                </div>
            </div>
	</div>
    </div>

    <br>
    <div class="form-group">
	<input type="submit" class="form-submit" id="valider" value='CREER'>
    </div>

</form>