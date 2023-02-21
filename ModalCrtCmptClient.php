<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content">
		<div class="modal-header">
                    <p class='FontQuaiHeader'></p>
                    <button class="btn btn-close" id="closeCrtNewCmptClient" data-bs-dismiss="modal" mb-2></button>
                </div>
		<div class="modal-body">
		    <form id='FormClient' class='form-control' style='background-color: #C0C0C0;'>
			<div class='form-group row'>
			    <div class='col-3'><label class='form-label'>Votre NOM</label></div>
			    <div class='col-9'><input type='text' id='nameClient' value='' class='form-control' required></div>
			</div>
			<div class='form-group row'>
			    <div class='col-3'><label class='form-label'>Votre PRENOM</label></div>
			    <div class='col-9'><input type='text' id='lastnameClient' value='' class='form-control'></div>
			</div>
			<div class='form-group row'>
			    <div class='col-3'><label for='password' class='form-label'>Mot de passe de 8 caractères minimum</label></div>
			    <div class='col-9'><input type='password' id='PwDclient' minlength='8' class='form-control' required></div>
			</div>
			<div class='form-group row'>
			    <div class='col-3'><label for='phoneClient' class='form-label'>Telephone</label></div>
			    <div class='col-9'><input type='text' id='phoneClient' value='' class='form-control'></div>
			</div>
			<div class='form-group row'>
			    <div class='col-3'><label for='mailClient' class='form-label'>Email</label></div>
			    <div class='col-9'><input type='text' id='mailClient' value='' class='form-control'></div>
			</div>
			<div class='form-group row'>
			    <div class='col-3'><label for='nbrCouvClient' class='form-label'>Nombre de couvert habituel</label></div>
			    <div class='col-9'><input type='text' id='nbrCouvClient' value='' size='4' class='form-control'></div>
			</div>
			<div class='form-group row' class='form-label'>
			    <div class='col-3'><label for='commentClient' style='vertical-align: top;'>Allergie et commentaire</label></div>
			    <div class='col-9'><textarea id='commentClient' style='resize:none; width:100%;'  class='form-control'></textarea></div>
			</div>
			<div class='form-group mt-3 text-center row'>
			    <div class='col'><button id='ValidNewClient' class='btn styleBtn'>ENREGISTRER</button></div>
			</div>
		    </form>
		</div>
	    </div>
</div>