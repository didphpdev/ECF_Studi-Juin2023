<script type="text/javascript" src="Scripts/ChampMoney.js"></script>
<script>

function previewFile(input){
        var file = $("#NewPlat input[type=file]").get(0).files[0];
	if(file){
            var reader = new FileReader();
            reader.onload = function(){
		$("#PictSrc").attr({width : 150, height : 200});
                $("#PictSrc").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
}

$('#AddNewPlat').click(function(e){
    e.preventDefault();
    var Titre = $('#Titre').val();
    if (Titre === '') { alert ('Vous devez saisir un Titre'); $('#Titre').focus(); return false; }
    var Descript = $('#DescriptPlat').val();
    if (Descript === '') { alert ('La description ne peut pas être vide'); $('#DescriptPlat').focus(); return false; }
    var Price = $('#PricePlat').val();
    if (Price === '') { alert ('Un prix doit être indiqué'); $('#Price').focus(); return false; }
    const FileName = $('#pictureFile').get(0).files[0].name;
    if (FileName === '') { alert ('Une photo doit être choisie'); $('#pictureFile').focus(); return false; }
    var Genre = $('input[name=catPlat]:checked').val();
    Genre = Genre.split('|');
    if (Genre[0] === '') { alert ('Quelle est la catégorie de votre plat ?'); $('#Titre').focus(); return false; }
    var DatasPlat = Titre + "|" + Descript + "|" + Genre[0] + "|" + Genre[1] + "|" + Price;
    $.ajax({
	url: 'PROCESS/AddNewPlat.php',
	type: 'POST',
	enctype: 'multipart/form-data',
	data: "DatasNP=" + DatasPlat,
	success: function (){
	    var DataPhoto = new FormData();
	    DataPhoto.append("image", $('#pictureFile').prop('files')[0]);
	    DataPhoto.append("Genre",  Genre[1]);
	    $.ajax({
		url : 'UploadFile.php',
		type: 'POST',
		enctype: 'multipart/form-data',
		contentType: false,
	        processData: false,
	        cache: false,
		data: DataPhoto,
		success: function(retour) {
		    alert(retour);
		    $("#PictSrc").attr('src', '');
		    $('#NewPlat').find("textarea, :text, :file, :hidden").val("").end().find(":checked").prop("checked", false).find($('#PictSrc').attr({width : 0, height : 0}));
		    $('#Carte').load('LaCarte.php');
		}
	    });
	}
    });
});

</script>

<div class='container text-center'>
    <p class='text-white  bg-secondary p-2 rounded'>CARTE ET GALERIE</p>
    <div class='row'>
	<div class='col-12'>
	    <div class='form-control'>
	        <form id='NewPlat' class='form-control' enctype='multipart/form-data'>
		    <div class='row h-100 align-content-center align-items-center'>
			<div class='col'>
			    <label for='NewPlat' class='form-label'>Titre nouveau plat</label>
			    <input type='text' class='form-text' id='Titre'>
			</div>
 			<div class='col'>
			    <img class='img-thumbnail' id='PictSrc'>
			    <fieldset><legend>Photo choisie</legend>
			    <input type='file' id='pictureFile' name='pictureFile' class='form-control-file' onchange="previewFile(this);">
			    </fieldset>
			</div>			
			<div class='col'>

			    <label for='DescriptPlat' class='form-check-label'>Description plat</label>
			    <textarea class='form-text' id='DescriptPlat' style='resize:none;'></textarea>
			</div>
			<div class='col'>
			    Catégorie plat
			    <div class='container'>
				<div class='form-check'>
				    <div class="form-check">
					<input class="form-check-input"type='radio' name='catPlat' value='1|ENTREE' checked>
					<label class="form-check-label" for="entree">ENTREE</label>
				    </div>
				    <div class="form-check">
					<input class="form-check-input" type='radio' name='catPlat' value='2|PLAT'>
					<label class="form-check-label" for="entree">PLAT</label>
				    </div>
				    <div class="form-check">
					<input class="form-check-input" type='radio' name='catPlat' value='3|DESSERT'>
					<label class="form-check-label" for="entree">DESSERT</label>
				    </div>
				</div>
			    </div>
			</div>
			<div class='col'>
			    <label for='PricePlat' class='form-label'>Prix nouveau plat</label>
			    <input type='text' class='money' id='PricePlat' size='5' maxlength='5' style='text-align: right;'> €
			</div>
			<div class='col'>
			    <button id='AddNewPlat' class='btn styleBtn'>AJOUTER</button>
			</div>
		    </div>
		</form>
	    </div>
	</div>
    </div>

    <div class='row justify-content-around custom-line' id='Carte'>
	<?php require('LaCarte.php'); ?>
    </div>
</div>
