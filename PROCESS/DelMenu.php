<?php
    extract($_POST);
    require('./ConnectBase.php');
    $ActionDel = explode('|', $ActionDel);
    $ReqDelForm = "delete from tbl_menus where id_menu='".$ActionDel[1]."';";
    // echo $ReqDelForm;
    $Connect -> query($ReqDelForm);
    $ReqDelItemMenu = "delete from tbl_menusformules where id_menu='".$ActionDel[1]."';";
    // echo $ReqDelItemMenu;
    $Connect -> query($ReqDelForm);
    echo "SUPPRESSION EFFECTUEE !!";
?>