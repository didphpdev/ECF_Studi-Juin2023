<?php
    extract($_POST);
    require('./ConnectBase.php');
    $DatasModifResa = explode('|', $DatasModif);

    $ReqUpdResa = "update tbl_resa set name_resa='".addslashes($DatasModifResa[1])
    ."', phone_client_resa='".$DatasModifResa[2]
    ."', email_client_resa='".$DatasModifResa[3]
    ."', date_resa='".$DatasModifResa[4]
    ."', hour_resa='".$DatasModifResa[5]
    ."', nbr_couvert_resa='".$DatasModifResa[6]
    ."', coment_resa='".addslashes($DatasModifResa[7])
    ."' where id_resa='".$DatasModifResa[0]."';";

    $Connect ->query($ReqUpdResa);
    echo "MODIFICATION ENREGISTREES";

?>