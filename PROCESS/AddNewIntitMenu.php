<?php
    extract($_POST);
    require('./ConnectBase.php');
    $INTITULE = strtoupper($INTITULE);
    $ReqInsertIntit = "insert into tbl_menus (intitule) values ('".$INTITULE."');";
    // echo $ReqInsertIntit;
    $Connect -> query($ReqInsertIntit);
    echo "AJOUT D'UN INTITULE";
?>