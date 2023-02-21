<script type="text/javascript" src="Scripts/ChampMoney.js"></script>
<script>
    $('#CreerFormule').modal('hide');

/***************** FORMULE *********************/
    $('#ButtonCrFormul').click(function(e){
	e.preventDefault();
	$('#FormNewFormule').find(":text").val("").end();
	$('#CreerFormule').modal('show');
    });
    
    $('#ValidNewFormule').click(function(e){
	e.preventDefault();
	var NewTitle = encodeURIComponent($('#TitleFormule').val());
	var NewPeriode =  encodeURIComponent($('#PerioFormule').val());
	var NewContent =  encodeURIComponent($('#ContentFormule').val());
	var PriceNewFormul =  $('#PriceFormule').val();
	var DataNewFormule = NewTitle + "|" + NewPeriode + "|" + NewContent + "|" + PriceNewFormul;
	$.ajax({
	    url: 'PROCESS/AddNewFormule.php',
	    type: 'POST',
	    data: "DatasNewFormul=" + DataNewFormule,
	    success: function(retour) {
		$('#CreerFormule').modal('hide');
		      $.ajax({
			url: 'gest_menus.php',
			type: 'POST',
			success: function (retour){
			    $('#PAGE').html(retour);
			}
		});
	    }
	});
    });
    $('#closeFormule').click(function(){
	$('#CreerFormule').modal('hide');
    });

/********************* MENU ********************/
    $('form #NewIntit').click(function(e){
	e.preventDefault();
	var intitule = $('#TitreMenu').val();
	if ( intitule != '' ) {
	    $.ajax({
		url : 'PROCESS/AddNewIntitMenu.php',
		type: 'POST',
		data: 'INTITULE='+ intitule,
		success: function(retour) {
		    $('#LstIntitMenus').load('PROCESS/LstMenus.php');
		    $('#TitreMenu').val('');
		    alert (retour);
		}
	    });
	} else {
	    alert('AUCUN INTITULE SAISI !!');
	    $('#TitreMenu').focus()
	}
    });
    /********************** GESTION DES ACCUEIL LISTE INTITULES **************/
    $('#LstMenu input[type=radio]').change(function (){
	var IdMenu = $(this).val();
	if ( $(this).is(':checked') ) { 
	    var CheckMe = "O"; 
	} else { 
	    var CheckMe = "N"; 
	}
	var MenuInLine = IdMenu + "|" + CheckMe;
	$.ajax({
	    url: 'PROCESS/ChgAccueilMenu.php',
	    type: 'POST',
	    data: 'MiL=' + MenuInLine,
	    success: function() {
		alert ("MENU PAGE ACCUEIL MIS A JOUR");
	    }
	});
    });
  
</script>
<div class='container text-center'>
    <p class='text-white  bg-secondary p-2 rounded'>MENUS ET FORMULES</p>
</div>
<div class='container' id='PgeFormMenu'>

<!---------------------------- COTE FORMULES ---------------------->
    <div class='row'>
	<div class='col-5'>
	    <div class='row' style='background-color: #C0C0C0' id='LstFormules'>
			<?php require('PROCESS/LstFormules.php'); ?>
	    </div>
	    <div class='row pt-3'>
		<div class='text-center'>
		    <button class='btn  styleBtn' style='width:60%; height:auto;' id='ButtonCrFormul'>Creer une formule</button>
		</div>
	    </div>
	</div>

	<div class='col-1'></div>
<!------------------------ COTE MENU ----------------------------->
	<div class='col-6'>
	    <div class='row pb-5'>
		    <form id='FormNewMenu'>
			<div class='form-group pb-4'>
			    <label class='form-label'>CREER UN NOUVEL INTITULE DE MENU</label>
			    <input type='text' id='TitreMenu' class='form-control'>
			</div>
			<div class='form-group text-center'>
			    <button id='NewIntit' class='btn styleBtn' style='width:50%; height:10%;'>Valider Intitule</button>
			</div>
		    </form>
	    </div>
	    <div class='row pt-2' style='background-color: #C0C0C0' id='LstIntitMenus'>
		<?php require('PROCESS/LstMenus.php'); ?>
	    </div>
	   
	</div>
    </div>	
</div>

<!--**************************** LES MODALS ***********************-->
<!----------------------------- FORMULE ----------------------------->
<div class='modal fade' id='CreerFormule'>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class='modal-header'>
                <p class="FontQuaiHeader col-12">CREATION D'UNE FORMULE</p>
                <img src='Images/IconClose.png' class='closeModal' id='closeFormule'>
            </div>
            <div class='modal-body'>
                <form class='form-horizontal' id='FormNewFormule'>
		    <div class='row'>
			<div class='col-6'>
			    <div class='form-group m-2'>
				<label class='form-label' for='TitleFormule'>INTITULE DE LA FORMULE</label>
				<div class='col'>
				    <input type='text' id='TitleFormule' class='form-control' placeholder='Intitule nouvelle formule'>
				</div>
			    </div>
			    <div class='form-group m-2'>
				<label class='form-label'>PERIODE DE LA FORMULE</label>
				<input type='text' id='PerioFormule' class='form-control' placeholder="Indiquer une période d'application">
			    </div>
			</div>
			<div class='col-6'>
			    <div class='form-group m-2'>
				<label class='form-label'>CONTENU DE LA FORMULE</label>
				<input type='text' id='ContentFormule' class='form-control' placeholder='indiquer entrée + plat + dessert ou autre...'>
			    </div>
			    <div class='form-group m-2'>
				<label for='PricePlat' class='form-label'>Prix Formule</label>
				    <input type='text' class='money form-control col-3' id='PriceFormule' size='6' maxlength='6' style='text-align: right;' placeholder="0.00 €">
			    </div>
			</div>
		    </div>
		    <div class='row'>
			<div class='form-group text-center col-12 text-center'>
			    <button id='ValidNewFormule' class='btn styleBtn'>Valider la formule</button>
			</div>
		    </div>
		</form>
	    </div>
	</div>
    </div>
</div>

<!-------------------------  AddItemMenu  ------------------------------>
<div class='modal fade' id='AddItemMenu'>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class='modal-header'>
                <p class="FontQuaiHeader col-12"></p>
                <img src='Images/IconClose.png' class='closeModal' id='closeAddItem'>
            </div>
	    <div class='modal-body'>
		<div class='row justify-content-around'>
		    <div class='col ms-2' div ='FormulDispo'>
			<?php
			    require('PROCESS/FormulDispo.php');
			?>
		    </div>
		    <!-------------------------- AJOUTER / RETIRER ------------------->
		    <input type='hidden' id='IdMenuChx' value=''>
		    <div class='col-2 align-self-center'>
			<div class='row justify-content-center' id='ItemAdd'>
			    <button class='btn styleBtn' style='width:80%; height:10%;' id='BtnAdd'>AJOUTER >>></button>
			</div>
			<div class='row justify-content-center' id='RemoveItem'>
			    <button class='btn styleBtn' style='width:80%; height:10%;' id='BtnRemove'><<< RETIRER</button>
			</div>
		    </div>
		    <!---------------------------------------------------------------->
		    <div class='col me-2'>
			<div class='form-group' id='FormulInclude'>
			</div>
		    </div>
		</div>
	    </div>
        </div>
    </div>
</div>
<!----------------------------- MODAL MODIF FORMULE ----------------------->
    <?php
        require('PROCESS/MdfFormul.php');
    ?>	   