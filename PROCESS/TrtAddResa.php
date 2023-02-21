<?php
    extract($_POST);
    require('./ConnectBase.php');
    $DataNewResa = explode('|', $NewResa);
    $NameResa = addslashes($DataNewResa[0]);
    setlocale(LC_TIME, 'fr_FR', 'French');
    date_default_timezone_set('Europe/Paris');
    $JourDemand = strtoupper(strftime("%A", strtotime($DataNewResa[3])));
    $DateDemand = $DataNewResa[3];
    $HourDemand = $DataNewResa[4];
    $NbPlResaDemand = $DataNewResa[5];
    $Comment = addslashes($DataNewResa[6]);

    $ControlDispo = "";

    /************** CONTROLE JOUR D'OUVERTURE *******************************/
    $ReqOpenDayHour = "select * from tbl_horaires where jour_horaire='".$JourDemand."';";
    $ExecReqOpenDayHour = $Connect -> query($ReqOpenDayHour);
    $DataOpenDay = $ExecReqOpenDayHour -> fetch(PDO::FETCH_ASSOC);
    $DayConsult = $DataOpenDay['jour_horaire'];
    $MorningOpen = $DataOpenDay['open_m'];
    $EveningOpen = $DataOpenDay['open_s'];
    $HourOpenM = substr($DataOpenDay['hour_deb_m'],0,5);
    $HourCloseM = substr($DataOpenDay['hour_end_m'],0,5);
    $HourLimitM = date("H:i:s", strtotime("-1 hour", strtotime($HourCloseM)));
    $HourLimitResaM = substr($HourLimitM,0,5);
    $HourOpenS = substr($DataOpenDay['hour_deb_s'],0,5);
    $HourCloseS = substr($DataOpenDay['hour_end_s'],0,5);
    $HourLimitS = date("H:i:s", strtotime("-1 hour", strtotime($HourCloseS)));
    $HourLimitResaS = substr($HourLimitS,0,5);
    if ( $HourDemand >= $HourOpenM and $HourDemand <= $HourLimitResaM ) {
	if ( $MorningOpen == "O" ){
	    $ControlDispo = CallVerifResa($Connect, $DateDemand, $NbPlResaDemand);
	} else {
	    echo "Resa non acceptée - Notre Ets est fermé ce ".$DayConsult." MATIN|NonOK";
	}
    } else if ( $HourDemand >= $HourOpenS and $HourDemand <= $HourLimitResaS ) {
	if ( $EveningOpen == "O" ){
	    $ControlDispo = CallVerifResa($Connect, $DateDemand, $NbPlResaDemand);
	} else {
	    echo "Resa non acceptée - Notre Ets est fermé ce ".$DayConsult." SOIR|NonOK";
	}
    }
    if ($ControlDispo == 'DISPO') {
   	$ReqAddNewResa = "insert into tbl_resa (name_resa, phone_client_resa, email_client_resa, date_resa, hour_resa, nbr_couvert_resa, coment_resa) values(
	'".$NameResa."'
	,'".$DataNewResa[1]."'
	,'".$DataNewResa[2]."'
	,'".$DataNewResa[3]."'
	,'".$DataNewResa[4]."'
	,'".$DataNewResa[5]."'
	,'".$Comment."');";
	// echo $ReqAddNewResa;
	$Connect -> query($ReqAddNewResa);
	echo "RESERVATION ENREGISTREE!!\n Avec le plaisir de vous recevoir bientôt !!|OK";
    } else if ($ControlDispo == 'COMPLET') {
	echo "A cette date nous sommes COMPLET !!|NonOK";
    } else {
	echo "VOTRE DEMANDE EST INCOMPLETE, MERCI DE RECOMMENCER|NonOK";
    }

    function CallVerifResa($Connect, $DateDemand, $NbPlResaDemand) {
        /*************** CONTROLE DU NOMBRE DE COUVERT **************************/
	$ReqLimitCouv = "select * from tbl_nbrcouvert;";
	$ExecReqLimitCouv = $Connect -> query($ReqLimitCouv);
	$DatasLimitCouv = $ExecReqLimitCouv -> fetch(PDO::FETCH_ASSOC);

    	$ReqQteResaForDate = "select SUM(nbr_couvert_resa) as NbrCouvResaForDate from tbl_resa where date_resa='".$DateDemand."';";
	$ExecReqQteResaForDate = $Connect -> query($ReqQteResaForDate);
	$QteResaForDate = $ExecReqQteResaForDate -> fetch(PDO::FETCH_ASSOC);
	
	$QtePlaceDispo = $DatasLimitCouv['nbr_couvert'] - ( $QteResaForDate['NbrCouvResaForDate'] + $NbPlResaDemand ) ;
	if ( $QtePlaceDispo <= 0 ) {
	    return "COMPLET";
	} else {
	    return "DISPO";
	}
    }
?>