<script>
    $('#LstResa img').click(function(e){
	e.preventDefault();
	var ValAct = $(this).attr('id');
	var Action = ValAct.split("|");
	var IdResa = Action[1];
	if (Action[0]==="VIEW") {
	    $.ajax({
		url: 'PROCESS/ReadResa.php',
		type: 'POST',
		data: 'IdResa= '+ IdResa,
		success: function (retour){
		    var DataResaMdf = retour.split('|');
		    $("#NameResa").text(DataResaMdf[1]);
		    $("#IdResaChx").val(DataResaMdf[0]);
		    $("#DateResa").val(DataResaMdf[4]);
		    $("#HourResa").val(DataResaMdf[5]);
		    $("#NbrCouvert").val(DataResaMdf[6]);
		    $("#TelResa").val(DataResaMdf[2]);
		    $("#MailResa").val(DataResaMdf[3]);
		    $("#Comment").val(DataResaMdf[7]);
		    $('#ModalMdfResa').modal('show');
		}
	    });
	}
	if (Action[0]==="DEL") {
	    $.ajax({
		url: 'PROCESS/DelResa.php',
		type: 'POST',
		data: 'IdResa= '+ IdResa,
		success: function (retour){
		    alert (retour);
		    $('#NbrPlceInLine').load('PROCESS/InfoGenResa.php'); 
		    $('#RightScreenResa').load('PROCESS/RightScreenResa.php');
		}
	    });
	}
    });
    
    $('#closeModalMdfResa').click(function(){
	$('#ModalMdfResa').modal('hide');
	/* ResetResa(); */
    });
     
</script>
<?php
$DateDuJour = date('Y-m-d');
require('ConnectBase.php');
echo "<span class='FontQuaiTeteLst text-center'>LISTE DES RESERVATIONS ENREGISTREES</span>";
echo "<table class='table table-striped ' id='LstResa'>";
echo "   <tr><th>DATE</th><th>Nom de la réservation</th><th class='text-center'>VOIR</th><th class='text-center'>SUPPRIMER</th></tr>";
echo "   <tr>";
$ReqLstResa = "select * from tbl_resa where date_resa >= '".$DateDuJour."' order by date_resa asc;";
$ExecReqLstResa = $Connect -> query($ReqLstResa);
while ( $DatasLstResa = $ExecReqLstResa -> fetch(PDO::FETCH_ASSOC) ) {
    $DateResa = substr($DatasLstResa['date_resa'],8,2)."/".substr($DatasLstResa['date_resa'],5,2)."/".substr($DatasLstResa['date_resa'],0,4);
    echo "<tr>";
    echo "<td>".$DateResa."</td>";
    echo "<td>";
    echo "<span class='text-left'>".$DatasLstResa['name_resa']."</span>";
    echo "</td>";
    echo "<td class='text-center'>";
    echo "  <img src='Images/Btn_Modify.png' height='20px;' width='20px;' id='VIEW|".$DatasLstResa['id_resa']."' title='Voir ou Modifier'>";
    echo "</td>";
    echo "<td class='text-center'>";
    echo "<img src='Images/Btn_Del.png' height='20px;' width='20px;' id='DEL|".$DatasLstResa['id_resa']."' title='Supprimer'>";
    echo "</td>";
    echo "</tr>";
}
echo "	</tr>";
echo "</table>";    
?>