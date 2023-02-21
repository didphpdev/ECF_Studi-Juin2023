<?php
    extract($_POST);
    require('./ConnectBase.php');
    $ReqUsr = "select * from tbl_user wher email='".$MailVerif."';";
    echo $ReqUsr;

?>