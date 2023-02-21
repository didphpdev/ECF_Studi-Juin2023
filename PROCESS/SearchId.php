<?php
    require('ConnectBase.php');
    $ReqId = "select last_Insert_Id(id_photo) as NewId from tbl_mets;";
    $ExecReqId = $Connect -> query($ReqId);
    
    while ($DataId = $ExecReqId -> fetch(PDO::FETCH_ASSOC)) {
     $NewID = $DataId['NewId'];
    }
    // echo $NewID;
?>
    