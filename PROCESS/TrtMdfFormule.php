<?php
    extract($_POST);
    require('./ConnectBase.php');
    $NewDatasF = explode("|", $NewDatasFormule);
    if ( $NewDatasF[1] != "" ) {
	$ReqMdfFormTitle = "update tbl_formules set title_formule = '".addslashes($NewDatasF[1])."' where id_formule='".$NewDatasF[0]."';";
	// echo $ReqMdfFormTitle;
	$Connect -> query($ReqMdfFormTitle);
    }
    if ( $NewDatasF[2] != "" ) {
	$ReqMdfFormPeriode = "update tbl_formules set periode_formule = '".addslashes($NewDatasF[2])."' where id_formule='".$NewDatasF[0]."';";
	// echo $ReqMdfFormPeriode;
	$Connect -> query($ReqMdfFormPeriode);
    }
    if ( $NewDatasF[3] != "" ) {
	$ReqMdfFormContent = "update tbl_formules set content_formule = '".addslashes($NewDatasF[3])."' where id_formule='".$NewDatasF[0]."';";
	// echo $ReqMdfFormContent;
	$Connect -> query($ReqMdfFormContent);
    }
    if ( $NewDatasF[4] != "" ) {
	$ReqMdfFormPrice = "update tbl_formules set price_formule = '".$NewDatasF[4]."' where id_formule='".$NewDatasF[0]."';";
	// echo $ReqMdfFormPrice;
	$Connect -> query($ReqMdfFormPrice);
    }
    echo "MODIFICATION(S) ENREGISTREE(S) !!";
?>