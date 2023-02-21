<?php
    extract($_POST);
    require('./ConnectBase.php');
    $ActionDel = explode('|', $ActionDel);
    $ReqDelForm = "delete from tbl_formules where id_formule='".$ActionDel[1]."';";
    // echo $ReqDelForm;
    $Connect -> query($ReqDelForm);
    $ReqDelItemMenu = "delete from tbl_menusformules where id_formule='".$ActionDel[1]."';";
    // echo $ReqDelItemMenu;
    $Connect -> query($ReqDelForm);
    echo "SUPPRESSIOIN EFFECTUEE !!";
?>