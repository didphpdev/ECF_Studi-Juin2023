<?php
    extract($_POST);
    require('./ConnectBase.php');

    $ReqDelResa = "delete from tbl_resa where id_resa='".$IdResa."';";
    $Connect -> query($ReqDelResa);
    echo "RESERVATION SUPPRIMEE !!";
    
?>