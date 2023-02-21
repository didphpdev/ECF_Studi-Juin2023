<?php
    require('./ConnectBase.php');

    $ReqSearchCoordos = "select * from tbl_user where mail='".$_SESSION['MailConnect']."';";
    // echo $ReqSearchCoordos;

    $ExecReqSearchCoordos = $Connect -> query($ReqSearchCoordos);
    $DataClt = $ExecReqSearchCoordos -> fetch(PDO::FETCH_ASSOC);

    echo "Identifiant :".$DataClt['identifiant']."<br>";
    echo "Email  : ".$DataClt['mail']."<br>";
    echo "Telephone : ".$DataClt['tel_client']."<br>";

?>