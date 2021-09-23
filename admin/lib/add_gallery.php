<?php
/**
 * AndreaCantini.info : Photo Eshop Module
 * Copyright 2012-2013, Andrea Fusco (http://www.andreafusco.net)
 *
 * Licensed under Creative Commons By-Nc-Nd
 * Redistributions of files must retain the above copyright notice.
 *
 * @Copyright     Copyright 2013, Andrea Fusco (http://www.andreafusco.net)
 * @Info     	  http://www.andreafusco.net
 * @License       Creative Commons By-Nc-Nd (http://creativecommons.org/licenses/by-nc-nd/3.0/)
 * @File		  add_gallery.php
 * @Description	  Admin Aggiungi Galleria nel Database
 * @Version		  1.0.1
 * @Date		  2013-06-03
 * @LastUpdate	  2014-03-25
 * @ChangeLog	  2014-03-25 => added "events" field
 */
session_start();

include('../../config/db_config.php');
include('core.php');
 
if (isset($_POST['title']) && isset($_POST['dirname']) && isset($_POST['event'])) {
	//Verifico che la Directory non sia già esistente
	if (file_exists("../../images/".$_POST['dirname'])) {
		echo "La Cartella di Destinazione &egrave; gi&agrave; esistente!";
		exit;
	}

	//Creo la nuova Directory
	if (!mkdir("../../images/".$_POST['dirname'])) {
		echo('Impossibile creare la Cartella');
		exit;
	}

	//Creo la cartella dei Thumbs
	if (!mkdir("../../images/".$_POST['dirname']."/thumbs")) {
		echo('Impossibile creare la Cartella');
		exit;
	}

	//Inserisco il Record sul Database
	CoreSystem::insertGallery($_POST['title'],$_POST['dirname'],$_POST['event']);	

} else {
	echo "Param Error";
}

?>