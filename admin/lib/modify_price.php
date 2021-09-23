<?php
/**
 * Office Manager
 * Copyright © 2014, Andrea Fusco (http://www.andreafusco.net)
 *
 * Licensed under Creative Commons By-Nc-Nd
 * Redistributions of files must retain the above copyright notice.
 *
 * @Copyright     Copyright © 2014, Andrea Fusco (http://www.andreafusco.net)
 * @License       Creative Commons By-Nc-Nd (http://creativecommons.org/licenses/by-nc-nd/3.0/)
 * @File		  modify_price.php
 * @Description	  Pricing List Modify
 * @Version		  1.3.0
 * @Date		  2017-05-23
 */

session_start();

include('../../config/db_config.php');
include('core.php');

if (isset($_POST['pk']) && isset($_POST['name']) && isset($_POST['value'])) {
	//Parametri OK
	CoreSystem::modifyListPrice($_POST['pk'],$_POST['name'],$_POST['value']);
} else {
	echo "Param Function Error";
}
?>