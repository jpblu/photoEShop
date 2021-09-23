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
 * @File		  dropchart_paypal.php
 * @Description	  Cancellazione Carrello da Redirect PayPal
 * @Version		  1.0.0
 * @Date		  2014-03-19
 */
session_start();
 
//Elimino l'elemento da cancellare
unset($_SESSION['eshop_order']);
unset($_SESSION['eshop_total']);
unset($_SESSION['eshop_discount']);

//Reindirizzo alla Home dell'Eshop
echo "<script>window.location.href = 'index.php';</script>\n";

?>