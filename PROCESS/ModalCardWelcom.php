<?php
    require('ConnectBase.php');

    echo "<div class='modal-dialog modal-dialog-centered modal-lg' role='document'>";
    echo "    <div class='modal-content'>";
    echo "	<div class='modal-header'>";
    echo "         <p class='FontQuaiHeader'>Notre Carte</p>";
    echo "         <button class='btn btn-close' id='closeCARTE' data-bs-dismiss='modal' mb-2></button>";
    echo "      </div>";
    echo "	<div class='modal-body'>";
    echo "	    <div class='row'>";
    echo "		<div class='col-4'>";
    echo "		    <p>LES ENTREES</p>";
    echo "		<table style='background-color: #E5E5E5;' class='table table-striped'>";
    $mets = 'ENTREE';
    callLstMets($Connect, $mets);
    echo "		</table>";
    echo "		</div>";
    echo "		<div class='col-4'>";
    echo "		    <p>LES PLATS</p>";
    echo "		<table style='background-color: #E5E5E5;' class='table table-striped'>";
    $mets = 'PLAT';
    callLstMets($Connect, $mets);
    echo "		</table>";
    echo "		</div>";
    echo "		<div class='col-4'>";
    echo "		    <p>LES DESSERTS</p>";
    echo "		<table style='background-color: #E5E5E5;' class='table table-striped'>";
    $mets = 'DESSERT';
    callLstMets($Connect, $mets);
    echo "		</table>";
    echo "		</div>";
    echo "	    </div>";
    echo "	</div>";
    echo "    </div>";
    echo "</div>";

function callLstMets($Connect, $mets) {
    $ReqMets = "select * from tbl_mets where genre='".$mets."';";
    $ExecReqMets = $Connect -> query($ReqMets);
    while ($DataMets = $ExecReqMets -> fetch(PDO::FETCH_ASSOC)) {
	echo "<tr><td class='col-7'>".$DataMets['name']."</td><td class='col-3'>".$DataMets['price']." €</td></tr>";
    }
}
?>    