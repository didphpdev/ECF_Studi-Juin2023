<?php
    require('PROCESS/ConnectBase.php');
    require('PROCESS/SearchId.php');
    extract($_POST);

    $img_src_tmp = $_FILES['image']['tmp_name'];
    $img_src_name = $_FILES['image']['name'];
    $Ext = substr($img_src_name, -3 );
    $Ext = strtolower($Ext);

    $NewName = $Genre.$NewID.".".$Ext;

/*-------------------- UPOLAD FILE -------------------------------------*/
    $dir_dst = 'PHOTOS_METS/';
    $FileDest = $dir_dst.$NewName;
    move_uploaded_file($img_src_tmp, $FileDest);

    $ReqUpdNamePhoto = "update tbl_mets set photo_name='".$NewName."' where id_photo='".$NewID."';";
    $Connect -> query($ReqUpdNamePhoto);
 
    echo "NOUVEAU plat créé !";
