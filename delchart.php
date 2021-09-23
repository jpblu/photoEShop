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
 * @File		  delchart.php
 * @Description	  Elimina elemento dal Carrello
 * @Version		  1.3.0
 * @Created		  2013-05-14
 * @Updated		  2017-05-22
 */
session_start();

include('config/db_config.php');
include('lib/core.php');
 
if (isset($_POST['id']) && isset($_POST['idprice'])) {
	//$element_price = array(0,5,3.5,4,5,6,10);
	$element_price = CoreSystem::getPrices($_POST['idprice'],0);

	//Elimino l'elemento da cancellare
	$_SESSION['eshop_total'] = $_SESSION['eshop_total'] - $_SESSION['eshop_order'][$_POST['id']]['qty'];
	unset($_SESSION['eshop_order'][$_POST['id']]);  
	
	//Ricalcolo il carrello ed i suoi elementi in caso di sconto per un totale ordini uguale o superiore a 10 elementi
	if ($_SESSION['eshop_total'] < 10) {
		$_SESSION['eshop_discount'] = false;
		foreach($_SESSION['eshop_order'] as $key => $value) {
			$_SESSION['eshop_order'][$key]['price'] = $_SESSION['eshop_order'][$key]['qty'] * $element_price[$_SESSION['eshop_order'][$key]['imgtype']];
		}
	}
	
	//Ricreo il carrello
	if (count($_SESSION['eshop_order']) > 0) {
		$tot = 0;
		echo "<table cellspacing=3 cellpadding=0 border=1 width=200>";
		echo "<tr><td><b>QTY</b></td><td><b>DESCRIZIONE</b></td><td><b>PREZZO</b></td><td></td></tr>";
		foreach($_SESSION['eshop_order'] as $key => $value) {
			echo "<tr>\n";
			echo "<td>".$_SESSION['eshop_order'][$key]['qty']."</td>";
			echo "<td>".$_SESSION['eshop_order'][$key]['desc']."</td>";
			if ($_SESSION['eshop_discount']) { echo "<td><span style='color: red;'>".$_SESSION['eshop_order'][$key]['price']." &euro;</span></td>";	} else { echo "<td>".$_SESSION['eshop_order'][$key]['price']." &euro;</td>"; }
			echo "<td><a href='#' class='del_chart' data-userid=".$_SESSION['eshop_order'][$key]['id']." data-idprice=".$_SESSION['eshop_order'][$key]['idprice']."><img src=\"imgsys/cross.png\" title='Elimina' alt='Elimina'></a></td>";
			echo "</tr>\n";
			$tot = $tot + $_SESSION['eshop_order'][$key]['price'];
		}
		echo "</table>";
		echo "<hr>\n";
		echo "Totale: ".$tot." &euro;<br>";
		if ($_SESSION['eshop_discount']) { echo "<span style='color: red; font-size: 9px'>E' stato applicato lo sconto per ordini uguali o superiori a 10 foto</span><br><br>"; }
		echo "<input type='button' id='send_order' class='stylebutton' data-userid=".$_SESSION['eshop_order'][$key]['id']." value='Procedi'>&nbsp;&nbsp;<input type='button' id='drop_chart' class='stylebutton' value='Svuota'>\n";
		echo "<div id='dialog_del' style='display: none;'>Sei sicuro di voler cancellare tutti gli elementi del Carrello?</div>";
	} else {
		echo "<table cellspacing=3 cellpadding=0 border=1 width=200>";
		echo "<tr><td><b>QTY</b></td><td><b>DESCRIZIONE</b></td><td><b>PREZZO</b></td><td></td></tr>";						
		echo "</table>";
		echo "<hr>\n";
		echo "Totale: 0 &euro;";
	}
} else {
	echo "Param Error";
}

?>