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
 * @File		  setuser.php
 * @Description	  Passaggio Informazioni utente
 * @Version		  1.0.0
 * @Date		  2013-05-14
 */
session_start();
 
if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['cap']) && isset($_POST['state']) && isset($_POST['paymode']) && isset($_POST['digitalcd'])) {
	//Porto i dati personali in una sessione
	$_SESSION['eshop_userinfo']['email'] = $_POST['email'];
	$_SESSION['eshop_userinfo']['name'] = $_POST['name'];
	$_SESSION['eshop_userinfo']['surname'] = $_POST['surname'];
	$_SESSION['eshop_userinfo']['phone'] = $_POST['phone'];
	$_SESSION['eshop_userinfo']['address'] = $_POST['address'];
	$_SESSION['eshop_userinfo']['city'] = $_POST['city'];
	$_SESSION['eshop_userinfo']['cap'] = $_POST['cap'];
	$_SESSION['eshop_userinfo']['state'] = $_POST['state'];
	$_SESSION['eshop_userinfo']['paymode'] = $_POST['paymode'];
	$_SESSION['eshop_userinfo']['digitalcd'] = $_POST['digitalcd'];
	
	//Creo le variabili
	$dateorder = date('d-m-Y H:i', strtotime ("+6 hour"));
	$gest = 0;
	$tot = 0;
	if ($_SESSION['eshop_userinfo']['paymode'] == 1) {
		$paymode = "Bonifico Bancario";
	} else if ($_SESSION['eshop_userinfo']['paymode'] == 2) {
		$paymode = "PayPal";
	}
	
	//Creo la pagina di riepilogo dell'Ordine
	$order_page= "<h1>RIEPILOGO ORDINE DI ACQUISTO</h1>";
	$order_page.="DATA ".$dateorder."<br><br>";
	$order_page.="<h2>DATI PERSONALI</h2>";
	$order_page.="<table cellspan='0' colspan='0' border='0'>";
	$order_page.="<tr><td><b>Email</b></td><td>".$_SESSION['eshop_userinfo']['email']."</td></tr>";
	$order_page.="<tr><td><b>Nome</b></td><td>".$_SESSION['eshop_userinfo']['name']."</td></tr>";
	$order_page.="<tr><td><b>Cognome</b></td><td>".$_SESSION['eshop_userinfo']['surname']."</td></tr>";
	$order_page.="<tr><td><b>Telefono</b></td><td>".$_SESSION['eshop_userinfo']['phone']."</td></tr>";
	$order_page.="<tr><td><b>Indirizzo</b></td><td>".$_SESSION['eshop_userinfo']['address']."</td></tr>";
	$order_page.="<tr><td><b>Citta'</b></td><td>".$_SESSION['eshop_userinfo']['city']."</td></tr>";
	$order_page.="<tr><td><b>CAP</b></td><td>".$_SESSION['eshop_userinfo']['cap']."</td></tr>";
	$order_page.="<tr><td><b>Stato</b></td><td>".$_SESSION['eshop_userinfo']['state']."</td></tr>";
	$order_page.="<tr><td><b>Pagamento</b></td><td>".$paymode."</td></tr>";
	$order_page.="</table><br>";
	$order_page.="<h2>ARTICOLI</h2>";
	$order_page.="<table cellspacing=3 cellpadding=0 border=1>";
	$order_page.="<tr><td><b>QUANTITA'</b></td><td><b>DESCRIZIONE</b></td><td><b>PREZZO</b></td><td><b>ALBUM</b></td></tr>";
	foreach($_SESSION['eshop_order'] as $key => $value) {
		$order_page.="<tr>\n";
		$order_page.="<td align='center'>".$_SESSION['eshop_order'][$key]['qty']."</td>";
		$order_page.="<td>".$_SESSION['eshop_order'][$key]['desc']."</td>";
			if ($_SESSION['eshop_discount']) {
				$price = number_format($_SESSION['eshop_order'][$key]['price'],2,'.','');
				$order_page.="<td align='right'><span style='color: red'>".$price." &euro;</span></td>";
				$order_page.="<td align='right'>".$_SESSION['eshop_order'][$key]['gallery']."</td>";
			} else { 
				$price = number_format($_SESSION['eshop_order'][$key]['price'],2,'.','');
				$order_page.="<td align='right'>".$price." &euro;</td>";
				$order_page.="<td align='right'>".$_SESSION['eshop_order'][$key]['gallery']."</td>";
			}
		$order_page.="</tr>\n";
		$gest = $gest + $_SESSION['eshop_order'][$key]['gest'];
		$tot = $tot + $_SESSION['eshop_order'][$key]['price'];
	}
	$total_price = number_format($tot,2,'.','');
	$order_page.="<tr><td align='center'><b>".$_SESSION['eshop_total']."</b></td><td></td><td align='right'><b>".$total_price." &euro;</b></td><td></td></tr>";
	$order_page.="<tr><td colspan=4>&nbsp;</td></tr>";
	if ($_SESSION['eshop_userinfo']['digitalcd'] == 1) { 
		$order_page.="<tr><td colspan=4><b>SERVIZI ACCESSORI</b></td></tr>";
		$order_page.="<tr><td align='center'>1</td><td>CD Provini Digitali</td><td align='right'>5.00 &euro;</td><td></td></tr>";
		$tot = $tot + 5;
	}
	//Inserisco 2€ di Costi di Gestione se almeno uno degli Eventi è abilitato
	if ($gest > 0) {
		$order_page.="<tr><td colspan=4><b>SPESE AGGIUNTIVE</b></td></tr>";
		$order_page.="<tr><td align='center'>1</td><td>Spedizione e\o Gestione</td><td align='right'>2.00 &euro;</td><td></td></tr>";
		$tot = $tot + 2;
	}
	$order_page.="</table>";
	if ($_SESSION['eshop_discount']) { 
		$order_page.="<span style='color: red; font-size: 9px'>E' stato applicato lo sconto del 20% per ordini uguali o superiori a 5 foto</span><br><br>";
	}
	$_SESSION['Payment_Items'] = number_format($total_price,2,'.','');
	$_SESSION['Payment_Items_Quantity'] = $_SESSION['eshop_total'];
	$_SESSION['Payment_Items_Gest'] = $gest;
	$order_page.="<hr>\n";
	$total = number_format($tot,2,'.','');
	$order_page.="<span style='text-align: right; font-weight: bold;'>Totale: ".$total." &euro;<br><br>";					
	
	echo $order_page;

	//Imposto la risoluzione della pagina in base al sistema di pagamento
	if ($_SESSION['eshop_userinfo']['paymode'] == 1) {
		//Bonifico Bancario
		echo "<input type='button' id='order_confirm' class='stylebutton' value='Conferma Ordine'>&nbsp;&nbsp<input type='button' id='order_delete' class='stylebutton' value='Annulla'>\n";
	} else if ($_SESSION['eshop_userinfo']['paymode'] == 2) {
		//PayPal Express Checkout
		//Creo la variabile di sessione per passare il totale da pagare
		$_SESSION['Payment_Amount'] = $total;

		//Creo la Form di pagamento
		echo "<center>\n";
		echo "<form action='expresscheckout.php' method='post'>\n";
		echo "<input type='image' name='submit' src='imgsys/btn_xpressCheckout.gif' border='0' align='top' alt='Paga subito con PayPal'/>\n";
		echo "</form>\n";
		echo "<input type='button' id='order_delete' class='stylebutton' value='Annulla'>\n";
		echo "</center>\n";
	}
	
	echo "<div id='dialog_order_confirm' style='display: none;'>Sei sicuro di voler confermare l'ordine? Una volta inviato non sar&agrave; possibile annullare.</div>\n";
	echo "<div id='dialog_order_delete' style='display: none;'>Sei sicuro di voler confermare l'annullamento?</div>\n";
} else {
	echo "PAGE PARAM ERROR";
}

?>