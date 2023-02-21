 <?php 
 $Serveur = "127.0.0.1";
 $User = "root";
 $Pw = "";
 $Base = "lequai";
 try {
  $Connect = new PDO('mysql:host='.$Serveur.';dbname='.$Base, $User, $Pw);
  $Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (Exception $e){
  die ("Erreur acces Base -> ".$e->getMessage());
 }
?>