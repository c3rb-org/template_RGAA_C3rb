Pré-requis : 
- Node.js
- Npm
- la variable d'environement doit pouvoir accéder à node depuis la totalité des répertoires de votre poste.

//-------------------------------
// ACTIVER GRUNT POUR UN PROJET LOCAL
1 - Lancer une console
2 - Se placer dans le dossier projet/sources pour dialoguer avec le systeme grunt mis en place.

	Permet de descendre à la racine de c:
	cd c:/ 

	Enssuite pour changer de disque à partir de la racine : 
	d:

	puis on se déplace dans le dossier projet/sources
	cd D:\site\joomla3\template_RGAA_C3rb\Sources (exemple depuis mon poste)

//-------------------------------
// METTRE A JOUR / INSTALLER LES DEPENDENCES GITHUB
1 - Se placer dans le dossier projet/sources pour dialoguer avec le systeme grunt mis en place.
	
	Permet de lancer la mise a jour des dépendences git :
	npm install

//-------------------------------
// Intégrer les mises à jour des dépendences github dans le dossier local (Il est nécessaire de mettre à jour les dépendences git en amont) :
1 - Se placer dans le dossier projet/sources pour dialoguer avec le systeme grunt mis en place.
2 - Mise a jour du dossier local

	Permet la maj en local 
	grunt copy:golocal



//-------------------------------
// TRAVAILLER SUR LE PROJET LOCAL
1 - Se placer dans le dossier projet/sources 
2 - Mettre à jour les dépendences
3 - Lancer un "watch" pour avoir un regard sur les fichiers en modification et les traiter les cas échéants (ex : a la sauvegarde d'un fichier less, une compilation est réalisé)
	
	Permet de lancer un watch : 
	grunt watch

//-------------------------------
// CREER LE DOSSIER DIST POUR LES PROJETS FINI
1 - Se placer dans le dossier projet/sources
2 - lancer la commande de construction :
	
	Permet la construction du dossier dist : 
	grunt copy:godist

//-------------------------------

//-------------------------------
//Debug 
Solution: Bootstrap glyphicons-halflings-regular.woff 404 not found
dans IIS : clicker MIME Types icon et ajouter .woff avec application/octet-stream

