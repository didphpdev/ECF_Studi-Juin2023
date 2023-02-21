<?php
    extract($_POST);
    
    $img_src_tmp = $_FILES['image']['tmp_name'];
 
/*-------------------- UPOLAD FILE -------------------------------------*/
    $dir_dst = 'PHOTOS_METS/';
    $FileDest = $dir_dst.$NamePhoto;
    move_uploaded_file($img_src_tmp, $FileDest);