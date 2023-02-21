<?php	
    session_start();
    unset($_SESSION['Connect']);
    session_destroy();
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>QUAI ANTIQUE</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=La+Belle+Aurore&display=swap" rel="stylesheet">

    <link href="Styles/bootstrap.min.css" rel="stylesheet">
    <link href="Styles/bootstrap-grid.min.css" rel="stylesheet">
    <link href="Styles/index.css" rel="stylesheet">

    <script src="Scripts/Jquery-3.6.1.min.js"></script>
    <script src="Scripts/bootstrap.min.js"></script>
</head>
<body>
<div id='HEADER'>
    <div class='home'>
	<a href='Index.php' alt='Retour acceuil'>
	    <img src='Images/home-icon.png' width='50px' height='50px'>
	</a>
    </div>
    <p class='FontQuaiEnteteAdm align-self-sm-auto'>
        Email ou mot de passe inconnu
    </p>
    </div>
    <div id='CONTENT'>

</div>
</body>
</html>