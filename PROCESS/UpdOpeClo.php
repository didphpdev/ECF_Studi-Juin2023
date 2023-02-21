<?php
    extract($_POST);
    require ('./ConnectBase.php');
    $NewHrOpCl = explode('-', $NewHrs);
    
    $ReqUpdOpR = "update tbl_horaires set open_m='".$NewHrOpCl[1]."', open_s='".$NewHrOpCl[4]."' where jour_horaire='".$NewHrOpCl[0]."';";
    $Connect -> query($ReqUpdOpR);

    if (!empty($NewHrOpCl[2])) {
	$ReqUpdHrOpM = "update tbl_horaires set hour_deb_m='".$NewHrOpCl[2]."' where jour_horaire='".$NewHrOpCl[0]."';";
	//echo $ReqUpdHrOpM;
	$Connect->query($ReqUpdHrOpM);
    }
    if (!empty($NewHrOpCl[3])) {
	$ReqUpdHrClM = "update tbl_horaires set hour_end_m='".$NewHrOpCl[3]."' where jour_horaire='".$NewHrOpCl[0]."';";
	// echo $ReqUpdHrClM;
	$Connect->query($ReqUpdHrClM);
    } 
    if (!empty($NewHrOpCl[5])) {
	$ReqUpdHrOpS = "update tbl_horaires set hour_deb_s='".$NewHrOpCl[5]."' where jour_horaire='".$NewHrOpCl[0]."';";
	// echo $ReqUpdHrOpS;
	$Connect->query($ReqUpdHrOpS);
    }
    if (!empty($NewHrOpCl[6])) {
	$ReqUpdHrClS = "update tbl_horaires set hour_end_s='".$NewHrOpCl[6]."' where jour_horaire='".$NewHrOpCl[0]."';";
	// echo $ReqUpdHrClS;
	$Connect->query($ReqUpdHrClS); 
    }
?>