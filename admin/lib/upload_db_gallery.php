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
 * @File		  upload_db_gallery.php
 * @Description	  Admin Carica i files nella Galleria
 * @Version		  1.0.0
 * @Date		  2013-06-04
 */
session_start();

include('../../config/db_config.php');
include('core.php');
 
if (isset($_POST['id']) && isset($_POST['dirname'])) {
	//Recupero i files presenti nella cartella
	$myDirectory = opendir("../../images/".$_POST['dirname']);

	while($entryName = readdir($myDirectory)) {
		if ($entryName != 'thumbs') { $dirArray[] = $entryName; }
	}

	closedir($myDirectory);
	$indexCount	= count($dirArray);
	sort($dirArray);
	
	//Pulisco il Database da eventuali files già caricati
	CoreSystem::deleteGalleryFiles($_POST['id']);

	//Carico i singoli files nel database
	for($index=0; $index < $indexCount; $index++) {
		if (substr("$dirArray[$index]", 0, 1) != "."){
			$element_id = str_replace('.jpg','',$dirArray[$index]);
			CoreSystem::insertFile($_POST['id'],$element_id);
		}

		if ($index % 30 == 0 ) { sleep(1); /*Sleep MODE per diminuire il carico sul server*/ }
	}

} else {
	echo "Param Error";
}

?>