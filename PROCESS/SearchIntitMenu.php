<?php
    extract ($_POST);
    require('./ConnectBase.php');
    $ReqSeachIntit = "select * from tbl_menus where id_menu='".$IdMenu."';";
    $ExecReqSearchIntit = $Connect -> query ($ReqSeachIntit);
    $DataIntit = $ExecReqSearchIntit -> fetch();
    echo $DataIntit['intitule'];
?>