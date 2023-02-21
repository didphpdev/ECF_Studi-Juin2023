<?php
require('PROCESS/ConnectBase.php');
$ReqHoraires = "select * from tbl_horaires;";
$ExecReqHoraires = $Connect -> query($ReqHoraires);
while ($LigHoraires = $ExecReqHoraires->fetch()) {
    $Day = $LigHoraires['jour_horaire'];
    $HrDebM = substr($LigHoraires['hour_deb_m'],0,5);
    $HrEndM = substr($LigHoraires['hour_end_m'],0,5);
    $OpenM = $LigHoraires['open_m'];
    $HrDebS = substr($LigHoraires['hour_deb_s'],0,5);
    $HrEndS = substr($LigHoraires['hour_end_s'],0,5);
    $OpenS = $LigHoraires['open_s'];

    echo "<tr>";
    echo "<td>".$Day."</td>";
    if ($OpenM == "N" and $OpenS =="N") {
        echo "<td colspan='2' style='color: red;'>FERME</td>";
    } else if ($OpenM=='N' and $OpenS =="O") {
	echo "<td style='color: red;'>FERME</td>";
	echo "<td>".$HrDebS." - ".$HrEndS."</td>";
    } else if ($OpenM=='O' and $OpenS =="N") {
	echo "<td>".$HrDebM." - ".$HrEndM."</td>";
	echo "<td style='color: red;'>FERME</td>";
    } else {
	echo "<td>".$HrDebM." - ".$HrEndM."</td>";
	echo "<td>".$HrDebS." - ".$HrEndS."</td>";
    }
    echo "</tr>";
}
?>