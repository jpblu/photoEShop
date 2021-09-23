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
 * @File		  delete_gallery.php
 * @Description	  Admin Cancella Galleria nel Database
 * @Version		  1.0.0
 * @Date		  2014-03-20
 */
session_start();

include('../../config/db_config.php');
include('core.php');
 
if (isset($_POST['id']) && isset($_POST['dirname'])) {
	//Verifico che la Directory esista
	if (file_exists("../../images/".$_POST['dirname'])) {
		//Cancello la Directory
		if (CoreSystem::deleteAll("../../images/".$_POST['dirname'], true)) {
			//Cancello il Record sul Database
			CoreSystem::deleteGalleryFiles($_POST['id']);
			CoreSystem::deleteGallery($_POST['id']);	
			echo "Galleria Cancellata";
		} else {
			echo('Impossibile cancellare la Cartella');
		}
	} else {
		echo "La Cartella di Destinazione non esiste!\n";
	}
} else {
	echo "Param Error";
}

?>