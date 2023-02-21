<script type="text/javascript" src="Scripts/ChampMoney.js"></script>
<script>

$('#ValidMdfMets').click(function(e){
    e.preventDefault();
    var IdMets = $('#IdMets').val();
    var NewTitre = $('#NewTitre').val();
    var Descript = $('#NewDescript').val();
    var Price = $('#NewPrice').val();
    var NewDatasMets = IdMets + '|' + NewTitre + '|' + Descript + '|' + Price;
    var VARIABLE = $('#FormMdfMets input[type=file]').prop('files')[0];
    if ( typeof VARIABLE != "undefined" ) {
	UpLoadMdfFile();
    }
    $.ajax({
	url: 'PROCESS/TrtMdfMets.php',
	type: 'POST',
	enctype: 'multipart/form-data',
	data: "NewDatasMets=" + NewDatasMets,
	success: function(retour) {
	    alert(retour);
	    $('#MODIFICATION').modal('hide');
	    $('#MODIFICATION').find("textarea, :text, :file, :hidden").val("").end();
	    $('#Carte').load('LaCarte.php');
	}
    });
});

function UpLoadMdfFile() {
    var DataPhoto = new FormData();
    DataPhoto.append("image", $('#FormMdfMets input[type=file]').prop('files')[0]);
    DataPhoto.append("NamePhoto", $('#NamePhoto').val());
    $.ajax({
	url : 'UploadMdfFile.php',
	type: 'POST',
	enctype: 'multipart/form-data',
	contentType: false,
        processData: false,
	cache: false,
	data: DataPhoto
    });
}

function previewPhoto(input){
    var file = $("#FormMdfMets input[type=file]").get(0).files[0];
    if(file){
        var reader = new FileReader();
        reader.onload = function(){
	    $("#NewPhoto").attr({width : 150, height : 200});
	    $("#NewPhoto").attr("src", reader.result);
	}
    reader.readAsDataURL(file);
    }
}
</script>
<?php
    extract($_POST);
    require('PROCESS/ConnectBase.php');
    $ReqReadMets = "select * from tbl_mets where id_photo='".$IdMets."';";
    $ExecReqReadMets = $Connect -> query($ReqReadMets);
    $DatasReadMets = $ExecReqReadMets -> fetch(PDO::FETCH_ASSOC);
    $IdMetsRappel = $DatasReadMets['id_photo'];
    $NamePhotoRappel = $DatasReadMets['photo_name'];
?>
<form class='form-group' id='FormMdfMets'>
    <input type='hidden' id='IdMets' value='<?php echo $IdMetsRappel; ?>'>
    <input type='hidden' id='NamePhoto' value='<?php echo $NamePhotoRappel; ?>'>

    
    <div class='row'>
	<div class='col'>
	    <div class=form-group row'>
		<label class='form-label'>TITRE DU PLAT</label>
		<input type='text' value="<?php echo $DatasReadMets['name']; ?>" id='NewTitre'>
	    </div>
	    <div class=form-group row'>
		<label class='form-label'>DESCRPITION DU PLAT</label>
		<textarea style='resize: none;' id='NewDescript'><?php echo $DatasReadMets['description']; ?></textarea>
	    </div>
	    <div class=form-group row'>
		<label class='form-label'>PRIX DU PLAT</label>
		<input type='text' id='NewPrice' class='money' size='5' maxlength='5' style='text-align: right;' value='<?php echo $DatasReadMets['price']; ?>'> €
	    </div>
	</div>
	<div class='col'>
	    <div class='row'>
		<img src="PHOTOS_METS/<?php echo $DatasReadMets['photo_name']; ?>" class='form-control-file' id='NewPhoto' width="150" height="200">
	    </div>
	    <div class='row'>
		<label class='form-label'>PHOTO DU PLAT</label>
		<input type='file' id='NewPhotoName' onChange='previewPhoto(this);'>
	    </div>
	</div>
    </div>
    <div class='row text-center mt-5'>
	<div class='col'>
	    <div class=form-group'>
		<!-- <input type='submit' value='VALIDER MODIFICATION'> -->
		<button id='ValidMdfMets' class='btn styleBtn'>VALIDER MODIFICATION</button>
	    </div>
	</div>
    </div>