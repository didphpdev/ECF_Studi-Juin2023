<div class='container text-center'>
    <p class='text-white  bg-secondary p-2 rounded'>LES HORAIRES</p>
</div>
<script>
    $('#TblDaySel button').click(function(e){
	e.preventDefault();
	var DaySelect = $(this).attr('id');
	$('#ShowDaySelect').text(DaySelect);
	$('#MdfDayHrOpen input').val('');
	$.ajax({
	    url: "ModalMdfOpen.php",
	    type: "POST",
	    data: 'DaySelection=' + DaySelect,
	    success: function(retour){
		$(':checkbox').prop('checked', false);
		var hropcl = retour.split('*');
		if (hropcl[1]=="O") {
		    $('#OpenM').prop('checked', true);
		};
		$('#HrOpenM').text(hropcl[2]);
		$('#HrCloseM').text(hropcl[3]);
		if (hropcl[4]=="O") {
		    $('#OpenS').prop('checked', true);
		};
		$('#HrOpenS').text(hropcl[5]);
		$('#HrCloseS').text(hropcl[6]);
		$('#ModalContent').append(retour);
	    }
	})
    });
    
    $('#MdfDayHrOpen button').click(function(e){
	e.preventDefault();
	if ($('#OpenM').is(':checked')) { var OpenMat = "O"; } else { var OpenMat = "N"; }
	if ($('#OpenS').is(':checked')) { var OpenSoi = "O"; } else { var OpenSoi = "N"; }
	var NewHrMdfOpCl = 
	    $('#ShowDaySelect').text() + "-" + 
	    OpenMat + "-" +
	    $('#NewHrOpM').val() + "-" +
	    $('#NewHrClM').val() + "-" + 
	    OpenSoi + "-" +
	    $('#NewHrOpS').val() + "-" +
	    $('#NewHrClS').val();
	$.ajax({
	    url: 'PROCESS/UpdOpeClo.php',
	    type: 'POST',
	    data: 'NewHrs=' + NewHrMdfOpCl,
	    success: function(retour){
		$("#Horaires").modal('hide');
	    }
	});
    })
</script>
<div class='container' id='TblDaySel'>
    <div class='row'>
	<div class='col-6 text-center'>
	    <button id='LUNDI' class='col-xs-2 DayMdf' data-bs-toggle="modal" data-bs-target="#Horaires" style='height:80px; width: 100%;'>
		LUNDI
	    </button>
	</div>
	<div class='col-6 text-center'>
	    <button id='MARDI' class='col-xs-2 DayMdf' data-bs-toggle="modal" data-bs-target="#Horaires"  style='height:80px; width: 100%;'>
		MARDI
	    </button>
	</div>
    </div>
    <div class='row'>
	<div class='col-6 text-center'>
	    <button id='MERCREDI' class='col-xs-2 DayMdf' data-bs-toggle="modal" data-bs-target="#Horaires"  style='height:80px; width: 100%;'>
		MERCREDI
	    </button>
	</div>
	<div class='col-6 text-center'>
	    <button id='JEUDI' class='col-xs-2 DayMdf' data-bs-toggle="modal" data-bs-target="#Horaires"  style='height:80px; width: 100%;'>
		JEUDI
	    </button>
	</div>
    </div>
    <div class='row'>
	<div class='col-6 text-center'>
	    <button id='VENDREDI' class='col-xs-2 DayMdf' data-bs-toggle="modal" data-bs-target="#Horaires"  style='height:80px; width: 100%;'>
		VENDREDI
	    </button>
	</div>
	<div class='col-6 text-center'>
	    <button id='SAMEDI' class='col-xs-2 DayMdf' data-bs-toggle="modal" data-bs-target="#Horaires"  style='height:80px; width: 100%;'>
		SAMEDI
	    </button>
	</div>
    </div>
    <div class='row'>
	<div class='col-12 text-center'>
	    <button id='DIMANCHE' class='col-xs-2 DayMdf' data-bs-toggle="modal" data-bs-target="#Horaires"  style='height:80px; width: 100%;'>
		DIMANCHE
	    </button>
	</div>
    </div>
</div>
<!-------------------- LA MODAL ------------------------> 
<div class="modal fade min-vw-auto" id="Horaires" tabindex="-1" role="dialog" aria-labelledby="Horaires" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header text-center">
                <p id='ShowDaySelect'></p>
                <button class="btn btn-close col-xs-2" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
		    <table id='MdfDayHrOpen' class='col-12 text-center'>
			<tr><th class='col-4'></th><th class='col-4'>Resto OUVERT</th><th class='col-4'>ACTUELLE</th><th class='col-4'>NOUVELLE</th></tr>
			<tr>
			<td class='col-3'>OUVERTURE MAT.</td>
			<td class='col-4'><input type='checkbox' size='1' id='OpenM'></td>
			<td class='col-4' id='HrOpenM'></td>
			<td class='col-4'><input type='time' size='12' id='NewHrOpM'></td>
			</tr><tr>
			<td class='col-3'>FERMETURE MAT.</td>
			<td class='col-4'></td>
			<td class='col-4' id='HrCloseM'></td>
			<td class='col-4'><input type='time' size='12' id='NewHrClM'></td>
			</tr><tr>
			<td class='col-3'>OUVERTURE SOIR</td>
			<td class='col-4'><input type='checkbox' size='1' id='OpenS'></td>
			<td class='col-4' id='HrOpenS'></td>
			<td class='col-4'><input type='time' size='12' id='NewHrOpS'></td>
			</tr><tr>
			<td class='col-3'>FERMETURE SOIR</td>
			<td class='col-4'></td>
			<td class='col-4' id='HrCloseS'></td>
			<td class='col-4'><input type='time' size='12' id='NewHrClS'></td>
			</tr><tr height='100'>
			<td colspan='4' class='col-12 text-center h-50'><button class='styleBtn'>ENREGISTRER MODIFICATION</button></td>
			</tr>
		    </table>
	    </div>
	</div>
    </div>
</div>