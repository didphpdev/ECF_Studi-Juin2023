<?php
    
    extract($_POST);
    require ('./ConnectBase.php');
    $NewNAME = addslashes($NewNAME);
    if(isset($IMG)) {
	$ReqUpdNewView = "update tbl_mets set name='".$NewNAME."', link='".$IMG."' where id_photo='".$ID."';";
    } else {
	$ReqUpdNewView = "update tbl_mets set name='".$NewNAME."' where id_photo='".$ID."';";
    }
    $Connect -> query($ReqUpdNewView);

?>