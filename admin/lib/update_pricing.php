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
 * @File		  update_pricing.php
 * @Description	  Admin Aggiorna la Lista Prezzi associata all'Evento
 * @Version		  1.3.0
 * @Date		  2017-05-23
 */
session_start();

include('../../config/db_config.php');
include('core.php');
 
if (isset($_POST['id']) && isset($_POST['value'])) {
	CoreSystem::updatePricingEvent($_POST['id'],$_POST['value']);
} else {
	echo "Param Error";
}

?>