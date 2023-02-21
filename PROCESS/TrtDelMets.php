<?php
    require('ConnectBase.php');
    extract($_POST);
    $Action = explode("|", $Act);
    if ($Action[4]!=='O') {
	$ReqDelMets = "delete from tbl_mets where id_photo = '".$Action[1]."';";
	$Connect -> query($ReqDelMets);
	if( file_exists( "../PHOTOS_METS/".$Action[2]) ) {
	    unlink( "../PHOTOS_METS/".$Action[2] );
	}
	echo "SUPPRESSION EFFECTUEE !!";
    } else {
        echo "ACTION NON AUTORISEE, ce plat est en page ACCUEIL !!";
    }
?>