<p class="text-center" style='font-family:cursive; background: #ece1be;'>LISTE DES FORMULES POSSIBLES</p>
<?php
    require ('ConnectBase.php');
    $ReqLstDispo = "select * from tbl_formules";
    $ExecReqLstDispo = $Connect -> query($ReqLstDispo);
    echo "<table class='table table-stripped' id='LstItemDispo'>";
    echo "<tr><th>Titre de la formule</th><th class='text-center'>SELECT</th></tr>";
    while ($DatasLstDispo = $ExecReqLstDispo -> fetch()) {
	echo "<tr>";
	echo "<td>".$DatasLstDispo['title_formule']."</td>";
	echo "<td class='text-center'><input type='checkbox' id='".$DatasLstDispo['id_formule']."'></td>";
	echo "</tr>";
    }
    echo "</table>";
?>