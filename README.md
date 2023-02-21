/================================== README QuaiAntique ================================/
Cette application a été réalisée dans le cadre d'une formation STUDI.
Tous droits et usages étant réservés à l'attention du centre de formation
et des examinateurs pour l'obtention d'un Titre Professionnel de Devellopeur WEB 
et WEB Mobile.

L'application est écrite en PHP / HTML, CSS.
Elle utlise les bibliothèques Jquery et Bootstrap comprises dans le package.

Elle nécessite un serveur disposant de PHP.7XX (minimum) et de Mysql (version MariaDb).
Il est necessaire avant tout déploiement de paramétrer le serveur. 
En particulier le fichier *.conf du serveur apache sur LINUX ou 
le fichier Alias sous WAMP entre autre.

La structure a créer et la suivante :
Racine 	|
	|-- PROCESS (partie traitements)
	|-- Styles (mise en page CSS)
	|-- Scripts (Bibliothéque et scripts JS)
	|-- PHOTOS_METS (Photos des plats utilisés)
	|-- Images (Icones utillisés)
	|-- Fonts (Polices de caractères utilisées)
	|-- PhotoSrcExemple (contenant des photos de plats pour exemple)
	|-- DOCUMENTS (contient le manuel d'utilisation)	


La création d'un premier utilisateur de type administrateur est necessaire.
Cette création doit être faite par appel de l'URL locale suive de "..InstalFirst.php"

Une fois l'installation terminée, pour créer d'autres utilisateurs il faut se connecter 
en tant qu'administrateur et utiliser la combinaison [CTRL] + 2 x [fleche haute] depuis 
sur la page vierge "Administration du site".

Afin de premettre les premières utilisations, le dossier "PhotoSrcExemple" contient
3 photos pour tests.