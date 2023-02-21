<?php
    require('./ConnectBase.php');
    extract($_POST);
    $DatasNewPlat = explode("|", $DatasNP);
        
    $NameNewMets = addslashes($DatasNewPlat[0]);
    $DescriptNewMets = addslashes($DatasNewPlat[1]);
    $CatNewMets = $DatasNewPlat[2];
    $GenreNewMets = $DatasNewPlat[3];
    $PriceNewMets = $DatasNewPlat[4];

    $ReqInsertNewPlat = "insert into tbl_mets (name, categorie, genre, description, price) "
. "values ('".$NameNewMets."','".$CatNewMets."','".$GenreNewMets."','".$DescriptNewMets."','".$PriceNewMets."');";
    // echo $ReqInsertNewPlat;
    $Connect->query($ReqInsertNewPlat);
?>