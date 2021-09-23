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
 * @File		  delete_event.php
 * @Description	  Admin Cancella un Evento
 * @Version		  1.0.0
 * @Date		  2014-03-27
 */
session_start();

include('../../config/db_config.php');
include('core.php');
 
if (isset($_POST['id'])) {
	CoreSystem::deleteEvent($_POST['id']);
} else {
	echo "Param Error";
}

?>