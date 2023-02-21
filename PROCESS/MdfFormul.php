<script>
$('form').submit(function(e){
    e.preventDefault();
    var IdFormule = $('#IdFormuleChx').val();
    var NewTitre = encodeURIComponent($('#NewTitre').val());
    var NewPeriode = encodeURIComponent($('#NewPeriode').val());
    var NewContent = encodeURIComponent($('#NewContent').val());
    var NewPrice = $('#NewPrice').val();
    var NewDatasFormule = IdFormule + '|' +NewTitre + '|' + NewPeriode + "|" + NewContent + '|' + NewPrice ;
    $.ajax({
	url: 'PROCESS/TrtMdfFormule.php',
	type: 'POST',
	data: "NewDatasFormule=" + NewDatasFormule,
	success: function(retour){
	    alert (retour);
	    $('#MdfFormule').modal('hide');
	    $.ajax({
		url: 'gest_menus.php',
		type: 'POST',
		success: function (retour){
		    $('#PAGE').html(retour);
		}
	    }); 
	}
    })
})
</script>
<div class='modal fade' id='MdfFormule'>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class='modal-header'>
                <p class="FontQuaiHeader col-12"></p>
                <img src='Images/IconClose.png' class='closeModal' id='closeMdfFormule'>
            </div>
	    <div class='modal-body'>
		<form class='form-group' enctype='multipart/form-data' id='FormMdfFormule'>
		    <input type='hidden' id='IdFormuleChx' value=''>
		    <div class='row'>
			<div class='col'>
			    <div class=form-group'>
				<label class='form-label'>TITRE FORMULE</label>
				<input type='text' value="" id='NewTitre'>
			    </div>
			    <div class=form-group'>
				<label class='form-label'>PERIODDE ACTUELLE APPLICABLE</label>
				<input type='text' value='' id='NewPeriode'>
			    </div>
			    <div class=form-group'>
				<label class='form-label'>CONTENU ACTUEL DE LA FORMULE</label>
				<input type='text' value='' id='NewContent'>
			    </div>
			    <div class=form-group'>
				<label class='form-label'>PRIX ACTUEL DE LA FORMULE</label>
				<input type='text' id='NewPrice' class='money' size='5' maxlength='5' style='text-align: right;' value=''> €
			    </div>
			</div>
		    </div>
		    <div class='row'>
			<div class='col'>
			    <div class=form-group'>
				<input type='submit' value='VALIDER MODIFICATION'>
			    </div>
			</div>
		    </div>
		</form>
	    </div>
        </div>
    </div>
</div>