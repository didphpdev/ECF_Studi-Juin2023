<?php
    extract($_POST);

    $DatasFirst = explode ("|", $FirstAdmin);
    $ID = $DatasFirst[0];
    $PW = password_hash($DatasFirst[1], PASSWORD_DEFAULT);
    $MAIL = $DatasFirst[2];
	
    $ServName = 'localhost';
    $BaseName = 'lequai';
    $User = 'root';
    $PassW = '';
						
    $ConnectInstall = new PDO('mysql:host='.$ServName.';dbname='.$BaseName, $User, $PassW);

    $ReqFirstAdmin = "insert into tbl_user (identifiant, passw, mail, role) values ('".$ID."','".$PW."','".$MAIL."','A');";
    // echo $ReqFirstAdmin;
    $ConnectInstall -> query($ReqFirstAdmin);
?>