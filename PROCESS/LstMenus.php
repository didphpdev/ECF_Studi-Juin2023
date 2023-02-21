<script>
    $('#LstMenu img').click(function(){
	var ActChx = $(this).attr('id');
	var Action = ActChx.split('|');
	$('#IdMenuChx').val(Action[1]);
	$.ajax({
	    url: 'PROCESS/SearchIntitMenu.php',
	    type: 'POST',
	    data: 'IdMenu=' + Action[1],
	    success: function(retour) {
		var Intitule = retour;
		$("#AddItemMenu .modal-header p").text("Ajouter/Retirer du "+ Intitule);
	    }
	});
	if ( Action[0] === "MDF" ) {
	    $('#AddItemMenu').find('input:checkbox').prop('checked',false);
	    $('#AddItemMenu').modal('show');
	    var ItemMenu = $('#IdMenuChx').val();
	    $.ajax({
		url: 'PROCESS/LstFormInclude.php',
		type: 'POST',
		data: "IdMenu=" + ItemMenu,
		success: function(retour) {
		    $('#FormulInclude').html(retour);
		}
	    });
	}
	if ( Action[0] === "DEL" ) {
	    $.ajax({
		url: 'PROCESS/DelMenu.php',
		type: 'POST',
		data: 'ActionDel=' + ActChx,
		success: function(retour) {
		    alert (retour);
		    $('#LstIntitMenus').load('PROCESS/LstMenus.php');
		}
	    });
	}
    });
        
    /************* LES BOUTONS ADD/REMOVE MODAL MENU *********************/
    $('#BtnAdd').click(function(e) {
	e.preventDefault();
	var ItemMenu = $('#IdMenuChx').val();
	$("#LstItemDispo input[type='checkbox']").each(function() {
	    if ($(this).is(':checked')) {
		var ValAddDispo = $(this).attr('id');
		$.ajax({
		    url: 'PROCESS/AddFormInMenu.php',
		    type: 'POST',
		    data: 'ItemFormul=' + ValAddDispo + "&IdMenu=" + ItemMenu
		});
	    }
	});
	alert('AJOUT(S) OK !!');
	$('#AddItemMenu').modal('hide');
	$.ajax({
	    url: 'gest_menus.php',
	    type: 'POST',
	    success: function (retour){
	        $('#PAGE').html(retour);
	    }
	});
    });
    
    $('#BtnRemove').click(function(e) {
	e.preventDefault();
	var ItemMenu = $('#IdMenuChx').val();
	$("#LstItemContent input[type='checkbox']").each(function() {
	    if ($(this).is(':checked')) {
		var ValAddDispo = $(this).attr('id');
		$.ajax({
		    url: 'PROCESS/RemFormOutMenu.php',
		    type: 'POST',
		    data: 'ItemFormul=' + ValAddDispo + "&IdMenu=" + ItemMenu
		});
	    }
	});
	alert('RETRAIT(S) OK !!');
	$('#AddItemMenu').modal('hide');
    });
    
    $('#closeAddItem').click(function(){
	$('#AddItemMenu').modal('hide');
    });

</script>
<?php
    require('ConnectBase.php');
    $ReqLst = "select * from tbl_menus;";
    $ExecReqLst = $Connect -> query($ReqLst);
    echo "<span class='FontQuaiTeteLst text-center'>LISTE DES INTITULES MENUS</span>";
    echo "<table class='table table-striped' style='overflow:auto; height:60%;' id='LstMenu'>";
    echo "<tr><th>TITRE MENU</th><th class='text-center'>ACCEUIL</th><th class='text-center'>MODIFIER</th><th class='text-center'>SUPPRIMER</th></tr>";
    while ( $DatasLst = $ExecReqLst -> fetch(PDO::FETCH_ASSOC) ) {
	echo "<tr>";
	    echo "<td id='IntitMenu'>".$DatasLst['intitule']."</td>";
	    if ( $DatasLst['accueil'] == "O" ) {
	        echo "<td class='text-center'><input type='radio' name='ChxIntitAcc' value='".$DatasLst['id_menu']."' checked></td>";
	    } else {
	        echo "<td class='text-center'><input type='radio' name='ChxIntitAcc' value='".$DatasLst['id_menu']."'></td>";
	    }
	    echo "<td class='text-center'>";
	    echo "  <img src='Images/Btn_Modify.png' height='20px;' width='20px;' id='MDF|".$DatasLst['id_menu']."'>";
	    echo "</td>";
	    echo "<td class='text-center'>";
	    echo "  <img src='Images/Btn_Del.png' height='20px;' width='20px;' id='DEL|".$DatasLst['id_menu']."'>";
	    echo "</td>";
	echo "</tr>";
    }
    echo "</table>";
?>