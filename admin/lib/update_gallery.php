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
 * @File		  update_gallery.php
 * @Description	  Admin Aggiorna l'Evento nella Galleria del Database
 * @Version		  1.0.0
 * @Date		  2014-03-26
 */
session_start();

include('../../config/db_config.php');
include('core.php');
 
if (isset($_POST['id']) && isset($_POST['event'])) {
	CoreSystem::updateGalleryEvent($_POST['id'],$_POST['event']);
} else {
	echo "Param Error";
}

?>