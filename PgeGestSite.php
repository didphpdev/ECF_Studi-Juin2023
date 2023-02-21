<?php
    session_start();
    if ($_SESSION['Connect'] != date("Hm")."Y") {
	$session_destroy();
	header('location: PgeNoConnect.php');
    }
?>
<html>
<head>
<script>
    $('#BtnNav button').click(function(e) {
        e.preventDefault();
	var Link = $(this).val();
	$.ajax({
	    url: Link,
	    type: 'POST',
	    success: function(retour) {
	        $('#PAGE').html(retour);
	    }
	});
    });
 
    var ctrlI = false;
    function testKey(e) {
	var evtobj = window.event? event : e
	if(ctrlI==true && evtobj.keyCode==38){
	    $('#CrtUsr').modal('show');
	    $('#CrtUsr').on('hidden.bs.modal', function () {
		$('#CrtUsr form')[0].reset();
	    });
	}
	if (evtobj.keyCode == 38 && evtobj.ctrlKey){
	    ctrlI = true;
	} else {
	    ctrlI = false;
	} 
    }
    
    $("#CloseModal").click(function(e) {
    	e.preventDefault();
	$('#CrtUsr').modal('hide');
    });

    document.onkeydown = testKey;
    
    $('#FormCreateUsr').submit(function(e){
	e.preventDefault();
        var ID = $('#ID').val();
	var MAIL = $('#MAIL').val();
	var PW = $('#PW').val();
	var ROLE = $('input[name=ROLE]:checked').val();
	$.ajax({
            url: 'gest_newusr.php',
            method: 'POST',
	    data: "ID=" + ID + "&MAIL=" + MAIL + "&PW=" + PW + "&ROLE=" + ROLE,
            success: function(Retour) {
		$('#CrtUsr').modal('hide');
		alert(Retour);
            }
        })
    });
    
    $('.home a').click(function(){
	window.location.replace('index.php');
    });  
    
</script>
</head>
<body>
    <div id='HEADER'>
    <div class='home'>
	<a href='#' style='decoration: none;'>
	    <img src='Images/home-icon.png' width='50px' height='50px'>
	</a>
    </div>
    <p class='FontQuaiEnteteAdm text-center'>
	    Bienvenue sur l'administration de votre site
    </p>
    </div>
    <div class='container'>
        <ul class='navbar nav-pills navbar-dark bg-dark flex-column flex-sm-row p-3 ' id='BtnNav'>
	    <li class='nav-item '>
	        <button type='button' class='btn btn-outline-warning' value='ScreenCardGalery.php'>LA CARTE et GALERIE</button>
	    </li>
	    <li class='nav-item'>
	        <button type='button' class='btn btn-outline-warning' value='gest_menus.php'>FORMULES ET MENUS</button>
	    </li>
	    <li class='nav-item'>
	        <button type='button' class='btn btn-outline-warning' value='gest_horaires.php'>LES HORAIRES</button>
	    </li>
	    <li class='nav-item'>
		<button type='button' class='btn btn-outline-warning' value='gest_resa.php'>LES RESERVATIONS</button>
	    </li>
	</ul>
    </div>

    <div id='PAGE'>

    </div>

<!-- ---------------  MODAL DE CREATION D'UN NOUVEL IDENTIFIANT -------------- -->
    <div id="CrtUsr" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header">
		    <p class='FontQuaiHeader'>CREATION NOUVEL IDENTIFIANT</p>
		    <button type="button" class="close" id="CloseModal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <?php
                        require('ModalCreateUsr.php');
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>