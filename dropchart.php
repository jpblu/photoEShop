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
 * @File		  dropchart.php
 * @Description	  Cancellazione Carrello
 * @Version		  1.0.0
 * @Date		  2013-05-14
 */
session_start();
 
//Elimino l'elemento da cancellare
unset($_SESSION['eshop_order']);
unset($_SESSION['eshop_total']);
unset($_SESSION['eshop_discount']);

//Ricreo il carrello
echo "<table cellspacing=3 cellpadding=0 border=1 width=200>";
echo "<tr><td><b>QTY</b></td><td><b>DESCRIZIONE</b></td><td><b>PREZZO</b></td><td></td></tr>";						
echo "</table>";
echo "<hr>\n";
echo "Totale: 0 &euro;";

?>