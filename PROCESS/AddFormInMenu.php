<?php
    extract($_POST);
    require('./ConnectBase.php');

    $ReqAddItemMenu  = "insert into tbl_menusformules (id_menu, id_formule) values ('".$IdMenu."', '".$ItemFormul."');";
    // echo $ReqAddItemMenu;
    $Connect -> query($ReqAddItemMenu);
?>