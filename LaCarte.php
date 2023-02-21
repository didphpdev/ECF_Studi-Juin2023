<script>
 $('#MODIFICATION').modal('hide');
  
 $('#closeModif').click(function(e){
     e.preventDefault();
     $('#MODIFICATION').modal('hide');
 });
 
 $('#LstMets img').click(function (e){
    e.preventDefault();
    var Mets = $(this).attr('idPh');
    var Action = Mets.split('|');
    if (Action[0]==='DEL') {
	$.ajax({
	    url: 'PROCESS/TrtDelMets.php',
	    type: 'POST',
	    data: 'Act=' + Mets,
	    success: function(retour) {
		$('#Carte').load("LaCarte.php");
		alert(retour);
	    }
	});
    }
    if (Action[0]==='MDF') {
	$('#MODIFICATION').modal('show');
	$('.modal-header p').text('FORMULAIRE DE MODIFICATION');
	$.ajax({
	    url: 'ModalMdfMets.php',
	    type: 'POST',
	    data: 'IdMets=' + Action[1],
	    success: function (retour) {
		$('.modal-body').html(retour);
	    }
	});
    }
 });

 $('#LstMets input[type=checkbox]').click(function (){
    var IdPhoto = $(this).attr('id');
    var Genre = $(this).val();
    if ( $(this).is(':checked') ) { var Check = "O"; } else { var Check = "N"; }
    var DatasInLine = IdPhoto + "|" + Check + "|" + Genre;
    $.ajax({
	url: 'PROCESS/ChgModView.php',
	type: 'POST',
	data: "DiL=" +DatasInLine,
	success: function(retour) {
	    $('#Carte').load("LaCarte.php");
	    alert (retour);
	}
    });
 });

</script>
<!-- ************************ CONTENU DE LA CARTE PAR COLONNES ************************ -->
<div class='col-4'>
    <h3>LES ENTREES</h3>
    <div class='row'>
    <?php 
    $Categ = 1;
    CallLstMets($Categ); 
    ?>
    </div>
</div>
<div class='col-4'>
    <h3>LES PLATS</h3>
    <div class='row'>
    <?php
    $Categ = 2;
    CallLstMets($Categ); 
    ?>
    </div>
</div>
<div class='col-4'>
    <h3>LES DESSERTS</h3>
    <div class='row'>
    <?php
	$Categ = 3;
	CallLstMets($Categ); 
    ?>
    </div>
</div>

<!-- *************** Fonction appel des listes mets par catégorie ************** -->
<?php
function CallLstMets($Categ) {
	require('PROCESS/ConnectBase.php');
	$Req = "select * from tbl_mets where categorie='".$Categ."';";
	$ExecReq = $Connect -> query($Req);
	$ExecReq ->setFetchMode(PDO::FETCH_OBJ);
	echo "<div style='overflow:auto; border:#000000 3px outset; height: 300px;'>";
	echo "<table class='table table-striped flex' id='LstMets'>";
	echo "<tr><th>Nom du plat</th><th>Prix</th><th>Accueil</th><th>Modif</th><th>Sup</th></tr>";
	while ( $Datas = $ExecReq -> fetch() ) {
	    $Name = $Datas -> name;
	    $Descript = utf8_encode($Datas -> description);
	    $Price = $Datas -> price;
	    $IdPhoto = $Datas -> id_photo;
	    $FileName = $Datas -> photo_name;
	    $EnLigne = $Datas -> en_ligne;
	    $Genre = $Datas -> genre;
	    echo "<tr class='border-bottom'>";
		echo "<td class='col-6' id='nameP'>".strtoupper($Name)."</td>";
		echo "<td class='col-3'>".$Price." €</td>";
		echo "<td>";
		if ($EnLigne =="O") {
		    echo "<input type='checkbox' id='".$IdPhoto."' value='".$Genre."' checked>";
		} else {
		    echo "<input type='checkbox' id='".$IdPhoto."' value='".$Genre."'>";
		}
 		echo "</td>";
		echo "<td>";
		echo "<img src='Images/Btn_Modify.png' height='20' width='20' class='styleIcon' idPh='MDF|".$IdPhoto."|".$FileName."|".$Name."' title='".$FileName."'>";
 		echo "</td>";
		echo "<td>";
		echo "<img src='Images/Btn_Del.png' height='20' width='20' class='styleIcon' idPh='DEL|".$IdPhoto."|".$FileName."|".$Name."|".$EnLigne."' title='SUPPRIMER'>";
 		echo "</td>";
	    echo "</tr>";
	}
	echo "</table>";
	echo "</div>";
}
?>
<!--*************************** MODAL MODIFICATION **************************** -->
<div class="modal fade" id="MODIFICATION">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <p class="FontQuaiHeader col-12"></p>
		<img src='Images/IconClose.png' class='closeModal' id='closeModif'>
            </div>
            <div class="modal-body">
	    </div>
  	</div>
    </div>
</div>