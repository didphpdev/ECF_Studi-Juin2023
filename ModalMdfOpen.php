<?php
    extract ($_POST);
    require_once ('PROCESS/ConnectBase.php');

    $ReqHrDay = "select * from tbl_horaires where jour_horaire='".$DaySelection."';";
    $ExecReqHrDay = $Connect -> query($ReqHrDay);
    $DataDaySelect = $ExecReqHrDay -> fetch(PDO::FETCH_ASSOC);
    
   
    echo $DataDaySelect['jour_horaire']."*". 
	$DataDaySelect['open_m']."*".
	substr($DataDaySelect['hour_deb_m'],0,5)."*".
	substr($DataDaySelect['hour_end_m'],0,5)."*".
	$DataDaySelect['open_s']."*".
	substr($DataDaySelect['hour_deb_s'],0,5)."*".
	substr($DataDaySelect['hour_end_s'],0,5);
?>