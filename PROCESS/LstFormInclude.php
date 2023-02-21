<p class='text-center' style='font-family:cursive; background: #ece1be;'>LISTE DES FORMULES CONTENUES</p>
<?php
    require ('./ConnectBase.php');
    extract($_POST);
    $ReqLstContent = "select * from tbl_Menusformules where id_menu='".$IdMenu."';";
    $ExecReqLstContent = $Connect -> query($ReqLstContent);
    echo "<table class='table table-stripped .bg-secondaire.bg-gradient' id='LstItemContent'>";
    echo "<tr><th class='text-center'>SELECT</th><th class='text-center'>Titre de la formule</th></tr>";
    while ($DatasLstContent = $ExecReqLstContent -> fetch()) {
	$ReqItemForm = "select * from tbl_formules where id_formule='".$DatasLstContent['id_formule']."';";
	$ExecReqItemForm = $Connect -> query($ReqItemForm);
	while ($DatasItemForm = $ExecReqItemForm -> fetch()) {
	    echo "<tr>";
	    echo "<td class='text-center'><input type='checkbox' id='".$DatasItemForm['id_formule']."'></td>";
	    echo "<td>".$DatasItemForm['title_formule']."</td>";
	    echo "</tr>";
	}
    }
    echo "</table>";
?>