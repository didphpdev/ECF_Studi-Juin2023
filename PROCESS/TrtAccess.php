<?php
    session_start();
    require('ConnectBase.php');    
    extract($_POST);

    $ReqIdentify = $Connect -> prepare ("select * from tbl_user where mail='".$MAIL."';");
    $ReqIdentify -> bindValue('mail',$MAIL);
    $ReqIdentify -> bindValue('passw',$PW);
    $ReqIdentify -> execute();
    $dataConnect = $ReqIdentify -> fetch(PDO::FETCH_ASSOC);
    $role = $dataConnect['role'];

    if ($dataConnect) {
	$_SESSION['Connect'] = date("Hm")."Y";
	$passwordhash = $dataConnect['passw'];
	if (password_verify($PW, $passwordhash) ) {
	    if ($role=="A") {
		header('location: ../PgeGestSite.php');
	    } else if ($role=="C") {
		$_SESSION['MailConnect'] = $dataConnect['mail'];
		header('location: ../PgeGestClient.php');
	    }
	} 
    } else {
	header('location: PgeNoConnect.php');
    }
?>