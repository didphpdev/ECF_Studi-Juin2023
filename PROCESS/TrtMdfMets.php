<?php
    extract($_POST);
    require('./ConnectBase.php');
    $RefreshDatasMets = explode("|", $NewDatasMets);
    // echo $NewDatasMets;
    $ID_Mets = $RefreshDatasMets[0];
    $NewNameMets = $RefreshDatasMets[1];
    $NewDescript = $RefreshDatasMets[2];
    $NewPrice = $RefreshDatasMets[3];
    $ReqUpdMets = "update tbl_mets set name='".$NewNameMets
	    ."', description='".$NewDescript
	    ."', price='".$NewPrice
	    ."' where id_photo='".$ID_Mets."';";
    $Connect -> query($ReqUpdMets);
    // echo $ReqUpdMets;
    echo "MODIFICATION ENREGISTREE !";
?>