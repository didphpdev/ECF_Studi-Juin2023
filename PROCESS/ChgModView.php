<?php
    extract($_POST);
    require_once('./ConnectBase.php');
    $DataInLine = explode("|", $DiL);
   
    $UpdReq = "update tbl_mets set en_ligne='N' where genre='".$DataInLine[2]."';";
    $Connect -> query($UpdReq);

    if ($DataInLine[1]=='O') {
	$UpdReq = "update tbl_mets set en_ligne='O' where id_photo = '".$DataInLine[0]."';";
	echo "Activé sur la page ACCEUIL !";
    } else { 
	$UpdReq = "update tbl_mets set en_ligne='N' where id_photo = '".$DataInLine[0]."';";
	echo "Retiré de la page ACCEUIL !";
    }
    $ExecUpdReq = $Connect -> query($UpdReq)
?>