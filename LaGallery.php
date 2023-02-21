<?php
    require ('PROCESS/ConnectBase.php');
    CallImg ($Connect,  'ENTREE');
    CallImg ($Connect,  'PLAT');
    CallImg ($Connect,  'DESSERT');

function CallImg($Connect, $GENRE) {
    $Req = "select * from tbl_mets where genre='".$GENRE."' and en_ligne='O';";
    $ExecReq = $Connect -> prepare ($Req);
    $ExecReq -> execute();
    while ($Data = $ExecReq -> fetch(PDO:: FETCH_ASSOC)) :
    ?>
    <div class='col-3 col-xs-2 STICKER'>
	    <img src="<?php echo 'PHOTOS_METS/'.$Data['photo_name']; ?>"
		 class="rounded mx-auto d-block img-fluid img-thumbnail"
		 style="height: auto; width:100%;">
	    <span><?php echo utf8_encode($Data['name']);?></span>
    </div>
    <?php
    endwhile;
}
?>
<div class='col-3 col-xs-2'>
    <button id='btnMenu' data-bs-toggle="modal" data-bs-target="#NewResa" style='height:auto; width: 100%;'>
	Réserver
    </button>
    <div class='row mt-3'>
        <button id='CrtCmptClient' class='styleBtnLink'>JE SOUHAITE CREER UN COMPTE</button>
    </div>
</div>   