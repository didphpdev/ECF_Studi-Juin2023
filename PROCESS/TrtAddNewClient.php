<?php
    extract($_POST);
    require('./ConnectBase.php');
    $DataNewCmpt = explode('|', $DatasNewClient);
    $PwNwClt = password_hash($DataNewCmpt[1], PASSWORD_DEFAULT);

    $ReqCreateNewCmpt = "insert into tbl_user (identifiant, passw, tel_client, mail, comment_client, nbr_couvert_client, role) 
    values(
    '".$DataNewCmpt[0]."',
    '".$PwNwClt."',
    '".$DataNewCmpt[3]."',
    '".$DataNewCmpt[2]."',
    '".$DataNewCmpt[5]."',
    '".$DataNewCmpt[4]."',
    'C');";

    $Connect -> query($ReqCreateNewCmpt);
    // echo $ReqCreateNewCmpt;
    echo "VOTRE COMPTE A ETE CREER. Vous pouvez maintenant réserver plus rapidement depuis 'Me Connecter' de notre page accueil";
?>