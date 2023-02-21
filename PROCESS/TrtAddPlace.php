<?php
    extract($_POST);
    require('./ConnectBase.php');
    $ReqInsertPlace = "update tbl_nbrcouvert set nbr_couvert='".$NbrAddPlace."';";
    // echo $ReqInsertPlace;
    $Connect -> query($ReqInsertPlace);
    echo "Nombre de couverts mis en ligne corrigé !!";
?>