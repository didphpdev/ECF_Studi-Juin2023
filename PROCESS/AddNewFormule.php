<?php
    extract($_POST);
    require('./ConnectBase.php');
    $NewDatas = explode ("|", $DatasNewFormul);
    if ( addslashes($NewDatas[0]) != "" ) {
	$ReqInsertNewFormule = "insert into tbl_formules (title_formule, periode_formule, content_formule, price_formule) values("
	. "'".addslashes($NewDatas[0])."',"
	. "'".addslashes($NewDatas[1])."',"
	. "'".addslashes($NewDatas[2])."',"
	. "'".$NewDatas[3]."');";
	// echo $ReqInsertNewFormule;
	$Connect -> query($ReqInsertNewFormule);
	echo "Nouvelle formule enregistrée !!";
    }
?> 