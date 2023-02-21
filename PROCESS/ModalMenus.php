<?php
    require('ConnectBase.php');
    $ReqMenus = "select * from tbl_menus where accueil='O';";
    $ExecReqMenus = $Connect -> query($ReqMenus);
    while ( $LigMenus = $ExecReqMenus -> fetch() ) {
	echo " <div class='modal-header'>
                    <p class='FontQuaiHeader'>".$LigMenus['intitule']."</p>
                    <button class='btn btn-close col-xs-2' data-bs-dismiss='modal'>
               </div>";
	$ReqMenuFormul = "select * from tbl_menusformules where id_menu='".$LigMenus['id_menu']."';";
	$ExecReqMenuFormul = $Connect -> query($ReqMenuFormul);
	while ($LigMenusFormul = $ExecReqMenuFormul -> fetch()) {
	    $ReqFormule = "select * from tbl_formules where id_formule='".$LigMenusFormul['id_formule']."';";
	    $ExecReqFormule = $Connect -> query($ReqFormule);
	    while ($LigFormule = $ExecReqFormule -> fetch()) {
	    	echo "<span class='SousTitre'>".utf8_encode($LigFormule['title_formule'])."</span><br>";
		echo "<br>";
		echo $LigFormule['periode_formule']."<br>";
		echo utf8_encode($LigFormule['content_formule'])." : ".$LigFormule['price_formule']." €<br><br>";
	    }
	}
    }
?>           