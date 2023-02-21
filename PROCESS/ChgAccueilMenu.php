<?php
    extract($_POST);
    require_once('./ConnectBase.php');
    $ChxMenu = explode("|", $MiL);
    $UpdReq = "update tbl_menus set accueil='N';";
    $Connect -> query($UpdReq);
    if ($ChxMenu[1]=='O') {
	$UpdReq = "update tbl_menus set accueil='O' where id_menu='".$ChxMenu[0]."';";
    } else { 
	$UpdReq = "update tbl_menus set accueil='N' where id_menu='".$ChxMenu[0]."';";
    }
    $ExecUpdReq = $Connect -> query($UpdReq);  
?>