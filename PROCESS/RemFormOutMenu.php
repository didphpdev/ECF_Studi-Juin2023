<?php
    extract($_POST);
    require('./ConnectBase.php');
    $ReqRemItemMenu = "delete from tbl_menusformules where id_menu='".$IdMenu."' and id_formule='".$ItemFormul."';";
    // echo $ReqRemItemMenu;
    $Connect -> query($ReqRemItemMenu);
?>