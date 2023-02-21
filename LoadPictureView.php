<?php
   
    extract($_POST);
    require ('PROCESS/ConnectBase.php');

    $ReqMdf = "select * from tbl_mets where id_photo = ".$ID.";";
    $ExecReqMdf = $Connect -> query($ReqMdf);
    $Datas = $ExecReqMdf -> fetch(PDO::FETCH_ASSOC);

    echo ($Datas['name'])."-".$Datas['link'];

?>