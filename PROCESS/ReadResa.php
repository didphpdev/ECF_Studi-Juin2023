<?php
    extract($_POST);
    require('./ConnectBase.php');
    $ReqMdfResa = "select * from tbl_resa where id_resa='".$IdResa."';";
    $ExecReqMdfResa = $Connect -> query($ReqMdfResa);
    $DatasMdfResa = $ExecReqMdfResa -> fetch(PDO::FETCH_ASSOC);
    foreach ($DatasMdfResa as $Data) {
	echo $Data."|";
    }
?>