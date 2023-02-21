<?php
    extract ($_POST);
    require('./ConnectBase.php');
    $ReqSeachTitle = "select * from tbl_formules where id_formule='".$IdFormule."';";
    $ExecReqSearchTitle = $Connect -> query ($ReqSeachTitle);
    $DatasFormule = $ExecReqSearchTitle -> fetch();
    echo $DatasFormule['id_formule']
    ."|".$DatasFormule['title_formule']
    ."|".$DatasFormule['periode_formule']
    ."|".$DatasFormule['content_formule']
    ."|".$DatasFormule['price_formule'];
?>