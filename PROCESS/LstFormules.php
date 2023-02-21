<script>
/*************************************************************/
/*****    Gestion des icone MDF et DEL formules       ********/
/*************************************************************/ 
    $('#LstFormule img').click(function(){
	var Action = $(this).attr('id');
	var ChxAction = Action.split('|');
	$.ajax({
	    url: 'PROCESS/SearchTitleFormule.php',
	    type: 'POST',
	    data: 'IdFormule=' + ChxAction[1],
	    success: function(retour) {
		var DatasFormule = retour;
		var LstDataFormule = DatasFormule.split('|');
		$("#IdFormuleChx").val(LstDataFormule[0]);
		$("#MdfFormule .modal-header p").html("MODIFICATION DE<br>"+ LstDataFormule[1]);
		$('#NewTitre').attr('placeholder', LstDataFormule[1]);
		$('#NewPeriode').attr('placeholder',LstDataFormule[2]);
		$('#NewContent').attr('placeholder',LstDataFormule[3]);
		$('#NewPrice').attr('placeholder',LstDataFormule[4]);
	    }
	});
	
	if (ChxAction[0] === 'MDF') {
	    $('#MdfFormule .modal-header p').attr("MODIFICATION DE LA FORMULE<b>" + ChxAction[1]);
	    $('#MdfFormule').modal('show');
	}

	if (ChxAction[0] === 'DEL') {
	    $.ajax({
		url: 'PROCESS/DelFormul.php',
		type: 'POST',
		data: 'ActionDel=' + Action,
		success: function(retour) {
		    alert (retour);
		    $.ajax({
			url: 'gest_menus.php',
			type: 'POST',
			success: function (retour){
			    $('#PAGE').html(retour);
			}
		    });
		}
	    });
	}
    });
    
    $('#closeMdfFormule').click(function(){
	$('#MdfFormule').modal('hide');
    });
    
</script>

<table class='table table-striped' style='overflow:auto;' id='LstFormule'>
    <span class='FontQuaiTeteLst text-center'>LISTE DES FORMULES</span>
    <tr><th>INTITULE FORMULE</th><th class='text-center'>MODIFIER</th><th class='text-center'>SUPPRIMER</th></tr>
    <tr>
<?php
    require('ConnectBase.php');
    $ReqLst = "select * from tbl_formules;";
    $ExecReqLst = $Connect -> query($ReqLst);
    while ( $DatasLst = $ExecReqLst -> fetch(PDO::FETCH_ASSOC) ) {
	echo "<tr>";
	    echo "<td>".$DatasLst['title_formule']."</td>";
	    echo "<td class='text-center'>";
	    echo "  <img src='Images/Btn_Modify.png' height='20px;' width='20px;' id='MDF|".$DatasLst['id_formule']."' title='".$DatasLst['id_formule']."'>";
	    echo "</td>";
	    echo "<td class='text-center'>";
	    echo "<img src='Images/Btn_Del.png' height='20px;' width='20px;' id='DEL|".$DatasLst['id_formule']."'>";
	    echo "</td>";
	echo "</tr>";
    }
?>
    </tr>
</table>