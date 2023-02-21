<?php
    extract($_POST);
    require('./ConnectBase.php');
    $DataMdfCmptClt = explode('|', $NewDatasCmptClt);
    echo $NewDatasCmptClt;
    $NbVar = count($DataMdfCmptClt);
    if ($NbVar == 4 ){
	$ReqUpdCmptClt = "update tbl_user set identifiant='".$DataMdfCmptClt[1]."', mail='".$DataMdfCmptClt[2]."', tel_client='".$DataMdfCmptClt[3]."' where id_user='".$DataMdfCmptClt[0]."';";
	// $Connect -> query($ReqUpdCmptClt);
	echo $ReqUpdCmptClt;
    } else if ($NbVar == 3) {
	$ReqUpdCmptClt = "update tbl_user set nbr_couvert_client='".$DataMdfCmptClt[1]."', comment_client='".$DataMdfCmptClt[2]."' where id_user='".$DataMdfCmptClt[0]."';";
	// $Connect -> query($ReqUpdCmptClt);
	echo $ReqUpdCmptClt;
    }
    echo "MODIFICATION ENREGISTREES";
?>