<?php
    require_once('ConnectBase.php');
    setlocale(LC_TIME, 'fr_FR', 'FRENCH');
    date_default_timezone_set('Europe/Paris');
    $Jour = utf8_encode(strtoupper(strftime('%A')));
    $ReqJour = "select * from tbl_horaires where jour_horaire='".$Jour."';";
    $ExecReqJour = $Connect -> query($ReqJour);
    $DatasJour = $ExecReqJour -> fetch(PDO::FETCH_ASSOC);
    echo "<div class='container'>".
	    "<div class='row'>".
	    "<div class='col-12 text-center'>";
	if ($DatasJour['open_m']=="O" and $DatasJour['open_s']=="O") {
	    echo "<b>NOTRE RESTAURANT EST OUVERT AUJOURDHUI <BR>".
	      "DE ".substr($DatasJour['hour_deb_m'], 0, 5)." à ".substr($DatasJour['hour_end_m'],0,5).
	      " ET DE ".
	      substr($DatasJour['hour_deb_s'],0,5)." à ".substr($DatasJour['hour_end_s'],0,5)."</b>";
	} else if ($DatasJour['open_m']=="O" and $DatasJour['open_s']=="N") {
	    echo "<b>NOTRE RESTAURANT EST OUVERT CE MIDI<BR>".
	      "DE ".substr($DatasJour['hour_deb_m'], 0, 5)." à ".substr($DatasJour['hour_end_m'],0,5)."</b>";
	} else if ($DatasJour['open_m']=="N" and $DatasJour['open_s']=="O") {
	    echo "<b>NOTRE RESTAURANT EST OUVERT CE SOIR<BR>".
	      "DE ".substr($DatasJour['hour_deb_s'], 0, 5)." à ".substr($DatasJour['hour_end_s'],0,5)."</b>";
	} else {
	    echo "<b>NOUS SOMMES FERME AUJOURDHUI, A BIENTOT...</b>";
	}
    echo "</div>".
	 "</div>".
	 "</div>";
?>