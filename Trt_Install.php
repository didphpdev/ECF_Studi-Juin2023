<?php
    $ServName = 'localhost';
    $User = 'root';
    $PassW = '';

    try {
        $ConnectInstall = new PDO('mysql:host='.$ServName, $User, $PassW);
        $ConnectInstall->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
        $sqlBase = "CREATE DATABASE lequai;";
        $ConnectInstall -> exec($sqlBase);
                
        echo 'Base de données créée bien créée !<br>';
		
    } catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
	
	$BaseName = 'lequai';
						
	$ConnectInstall = new PDO('mysql:host='.$ServName.';dbname='.$BaseName, $User, $PassW);
		try {
			$sql_user = "CREATE table tbl_user (
			id_user INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			identifiant VARCHAR(255) NOT NULL,
			passw VARCHAR(255) NOT NULL,
			tel_client VARCHAR(10) NULL,
			mail VARCHAR(255) NOT NULL,
			comment_client LONGTEXT NULL,
			nbr_couvert_client DECIMAL(2,0) NULL,
			role  VARCHAR(1) NOT NULL DEFAULT 'C')
			ENGINE=InnoDB;";
			$ConnectInstall -> prepare($sql_user)->execute();
			echo "Table [user] -> CREER<br>";
		} catch (PDOException $e){
			echo $e -> getMessage();
		}
		
		try {
			$sql_Formules = "CREATE table tbl_formules(
			id_formule INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			title_formule VARCHAR(250) NOT NULL,
			periode_formule MEDIUMTEXT NOT NULL,
			content_formule VARCHAR(250) NOT NULL,
			price_formule DECIMAL(2,0) NOT NULL)
			ENGINE=InnoDB;";
			$ConnectInstall -> prepare($sql_Formules)->execute();
			echo "Table [formule] -> CREER<br>";
		} catch (PDOException $e){
			echo $e -> getMessage();
		}

		try {
			$sql_horaires = "CREATE table tbl_horaires(
			id_horaire INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			jour_horaire VARCHAR(8) NOT NULL,
			hour_deb_m TIME NOT NULL DEFAULT '10:00',
			hour_end_m TIME NOT NULL DEFAULT '15:00',
			open_m VARCHAR(1) NOT NULL DEFAULT 'O',
			hour_deb_s TIME NOT NULL DEFAULT '17:00',
			hour_end_s TIME NOT NULL DEFAULT '23:00',
			open_s VARCHAR(1) DEFAULT 'O')
			ENGINE=InnoDB;";
			$ConnectInstall -> prepare($sql_horaires)->execute();
			echo "Table [horaires] -> CREER<br>";
		} catch (PDOException $e){
			echo $e -> getMessage();
		}
		$Semaine = ['LUNDI', 'MARDI', 'MERCREDI', 'JEUDI', 'VENDREDI', 'SAMEDI', 'DIMANCHE'];
		foreach ($Semaine as $Day) {
		    $ReqInsertDay = ("insert into tbl_horaires (jour_horaire) values('".$Day."');");
		    $ConnectInstall -> query($ReqInsertDay);
		}

		try {
			$sql_menus = "CREATE table tbl_menus(
			id_menu INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			intitule VARCHAR(250) NOT NULL,
			accueil VARCHAR(1) NOT NULL DEFAULT 'N')";
			$ConnectInstall -> prepare($sql_menus)->execute();
			echo "Table [menus] -> CREER<br>";
		} catch (PDOException $e){
				echo $e -> getMessage();
		}
		
		try {	
			$sql_menusformules = "CREATE table tbl_menusformules(
			id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			id_menu INT NOT NULL,
			id_formule INT NOT NULL)";
			$ConnectInstall -> prepare($sql_menusformules)->execute();
			echo "Table lien [menu-formules] -> CREER<br>";
		} catch (PDOException $e){
			echo $e -> getMessage();
		}
			
		try {
			$sql_mets = "CREATE table tbl_mets(
			id_photo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(255) NOT NULL,
			genre VARCHAR(10) NULL,
			categorie VARCHAR(1) NULL,
			description LONGTEXT NOT NULL,
			price DECIMAL(5,2) NOT NULL,
			photo_name VARCHAR(255) NULL,
			to_create TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
			en_ligne VARCHAR(1) NOT NULL DEFAULT 'N')
			ENGINE=InnoDB;";
			$ConnectInstall ->prepare($sql_mets)->execute();
			echo "Table [mets] -> CREER<br>";
		} catch (PDOException $e){
			echo $e -> getMessage();
		}
		
		try {			
			$sql_NbrCouvert = "CREATE table tbl_nbrcouvert(
			id_nbcouv INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			nbr_couvert DECIMAL(3,0) NOT NULL DEFAULT '1')";
			$ConnectInstall ->prepare($sql_NbrCouvert)->execute();	
			echo "Table [nombre couvert en ligne] -> CREER<br>";
		} catch (PDOException $e){
			echo $e -> getMessage();
		}
		$ReqInsertNbCouvert = ("insert into tbl_nbrcouvert (nbr_couvert) values ('1');");
		$ConnectInstall -> query($ReqInsertNbCouvert);
			
		try {
			$sql_resa = "CREATE table tbl_resa(
			id_resa INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name_resa VARCHAR(255) NOT NULL,
			phone_client_resa VARCHAR(10) NOT NULL,
			email_client_resa VARCHAR(255) NOT NULL,
			date_resa DATE NOT NULL,
			hour_resa TIME NOT NULL,
			nbr_couvert_resa DECIMAL(3,0),
			coment_resa MEDIUMTEXT NOT NULL)
			ENGINE=InnoDB;";
			$ConnectInstall ->prepare($sql_resa)->execute();
			echo "Table [Reservation] -> CREER<br>";
		} catch (PDOException $e){
			echo $e -> getMessage();
		}
?>