<?php
    extract($_POST);

    require('PROCESS/ConnectBase.php');
    $PW = password_hash($PW, PASSWORD_DEFAULT);
 
    $ReqV = $Connect -> prepare("SELECT * FROM tbl_user WHERE mail= '$MAIL'");
    $ReqV -> execute(array('mail' => $MAIL));
    $Control = $ReqV -> rowCount();

    if ($Control) {
        echo 'Cette adresse mail est déjà enregistrée !';
    } else {
	$ReqI = $Connect -> prepare("INSERT INTO tbl_user(identifiant, passw, mail, role) VALUES ('".$ID."','".$PW."','".$MAIL."','".$ROLE."')");
	$ReqI->bindParam(':identifiant', $ID);
	$ReqI->bindParam(':passw', $PW);
	$ReqI->bindParam(':mail', $MAIL);
	$ReqI->bindParam(':role', $ROLE);
	$ReqI -> execute();
        echo "Enregistrement OK !";
    }
?>