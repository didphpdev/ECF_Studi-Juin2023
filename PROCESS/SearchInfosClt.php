<?php
    session_start();
    require('./ConnectBase.php');

    $ReqSearchCoordos = "select * from tbl_user where mail='".$_SESSION['MailConnect']."';";
    // echo $ReqSearchCoordos;

    $ExecReqSearchCoordos = $Connect -> query($ReqSearchCoordos);
    $DataClt = $ExecReqSearchCoordos -> fetch(PDO::FETCH_ASSOC);

    echo $DataClt['id_user']."|".$DataClt['identifiant']."|".$DataClt['mail']."|".$DataClt['tel_client']."|".$DataClt['nbr_couvert_client']."|".$DataClt['comment_client'];
?>