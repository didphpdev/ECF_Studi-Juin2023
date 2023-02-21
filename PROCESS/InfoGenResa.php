<?php
    $DateDuJour = date('Y-m-d');
    extract($_POST);
    require('ConnectBase.php');
    /********************* LES REQUETES *******************/
    $ReqInfoGenResa = "select SUM(nbr_couvert_resa) as NbTotResa from tbl_resa;";
    $ExecReqInfoGenResa = $Connect -> query($ReqInfoGenResa);
    $DatasInfoGenResa = $ExecReqInfoGenResa -> fetch();

    $ReqNbrCouv = "select * from tbl_nbrcouvert;";
    $ExecReqNbrCouv = $Connect -> query($ReqNbrCouv);
    $DatasReqNbrCouv = $ExecReqNbrCouv -> fetch(PDO::FETCH_ASSOC);

    $ReqNbrResaOfDay = "select sum(nbr_couvert_resa) as NbrResaOfDay from tbl_resa where date_resa='".$DateDuJour."';";
    $ExecReqNbrResaOfDay = $Connect -> query($ReqNbrResaOfDay);
    $DatasResaOfDay = $ExecReqNbrResaOfDay -> fetch(PDO::FETCH_ASSOC);

    /******************** L(AFFICHAGE ********************/
    echo "<div class='border border-white border-5'>";
    echo "  <div class='row text-center'>";
    echo "	<div class='col mt-3 mb-3'>";
    echo "	    Nombre <u>JOURNALIER</u> de places mises en ligne -> <b>".$DatasReqNbrCouv['nbr_couvert']."</b>";
    echo "	</div>";
    echo "  </div>";
    echo "  <div class='row text-center'>";
    echo "	<div class='col mt-3 mb-3'>";
    echo "	    Nombre de <u>TOTAL</u> de réservation(s) enregistrée(s) -> <b>".$DatasInfoGenResa['NbTotResa']."</b>";
    echo "	</div>";
    echo "  </div>";    
    echo "  <div class='row text-center'>";
    echo "	<div class='col mt-3 mb-3'>";
    echo "	    Nombre de réservation enregistrée pour <u>AUJOURD'HUI</u> -> <b>".$DatasResaOfDay['NbrResaOfDay']."</b>";
    echo "	</div>";
    echo "  </div>";
    echo "</div>";
?>