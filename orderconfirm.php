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
 * @File		  orderconfirm.php
 * @Description	  Creazione e Invio pagina PDF Ordine
 * @Version		  1.1.0
 * @Date		  2013-05-15
 * @LastUpdate	  2014-04-16
 * @ChangeLog	  2014-04-16 => added PayPal payment system
 */

	session_start();

	include("config/email_config.php");
	include("lib/html2pdf.class.php");
	include("lib/class.phpmailer.php");
	require_once ("lib/paypalfunctions.php");

	if (isset($_SESSION['eshop_order']) && isset($_SESSION['eshop_total']) && isset($_SESSION['eshop_discount']) && isset($_SESSION['eshop_userinfo'])) {

		//Intercetto il Response Code di PayPal
		if (isset($_GET['token']) && isset($_GET['PayerID'])) {
			$paypal = 1;
			$sendmail = false;

			//Setto nuovamente i parametri come da expresscheckout.php
			$currencyCodeType = "EUR";
			$paymentType = "Sale";

			//Effetto la conferma della transazione attraverso la DoExpressCheckout
			$resArray = ConfirmPayment ( $_GET['token'], $paymentType, $currencyCodeType, $_GET['PayerID'], $_SESSION["Payment_Amount"] );
			$ack = strtoupper($resArray["ACK"]);
			if( $ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING" )
			{
				/*
				'********************************************************************************************************************
				'
				' THE PARTNER SHOULD SAVE THE KEY TRANSACTION RELATED INFORMATION LIKE 
				'                    transactionId & orderTime 
				'  IN THEIR OWN  DATABASE
				' AND THE REST OF THE INFORMATION CAN BE USED TO UNDERSTAND THE STATUS OF THE PAYMENT 
				'
				'********************************************************************************************************************
				*/

				$transactionId		= $resArray["PAYMENTINFO_0_TRANSACTIONID"]; // ' Unique transaction ID of the payment. Note:  If the PaymentAction of the request was Authorization or Order, this value is your AuthorizationID for use with the Authorization & Capture APIs. 
				$transactionType 	= $resArray["PAYMENTINFO_0_TRANSACTIONTYPE"]; //' The type of transaction Possible values: l  cart l  express-checkout 
				$paymentType		= $resArray["PAYMENTINFO_0_PAYMENTTYPE"];  //' Indicates whether the payment is instant or delayed. Possible values: l  none l  echeck l  instant 
				$orderTime 			= $resArray["PAYMENTINFO_0_ORDERTIME"];  //' Time/date stamp of payment
				$amt				= $resArray["PAYMENTINFO_0_AMT"];  //' The final amount charged, including any shipping and taxes from your Merchant Profile.
				$currencyCode		= $resArray["PAYMENTINFO_0_CURRENCYCODE"];  //' A three-character currency code for one of the currencies listed in PayPay-Supported Transactional Currencies. Default: USD. 
				$feeAmt				= $resArray["PAYMENTINFO_0_FEEAMT"];  //' PayPal fee amount charged for the transaction
				$settleAmt			= $resArray["PAYMENTINFO_0_SETTLEAMT"];  //' Amount deposited in your PayPal account after a currency conversion.
				$taxAmt				= $resArray["PAYMENTINFO_0_TAXAMT"];  //' Tax charged on the transaction.
				$exchangeRate		= $resArray["PAYMENTINFO_0_EXCHANGERATE"];  //' Exchange rate if a currency conversion occurred. Relevant only if your are billing in their non-primary currency. If the customer chooses to pay with a currency other than the non-primary currency, the conversion occurs in the customer's account.
				
				/*
				' Status of the payment: 
						'Completed: The payment has been completed, and the funds have been added successfully to your account balance.
						'Pending: The payment is pending. See the PendingReason element for more information. 
				*/
				
				$paymentStatus	= $resArray["PAYMENTINFO_0_PAYMENTSTATUS"]; 

				/*
				'The reason the payment is pending:
				'  none: No pending reason 
				'  address: The payment is pending because your customer did not include a confirmed shipping address and your Payment Receiving Preferences is set such that you want to manually accept or deny each of these payments. To change your preference, go to the Preferences section of your Profile. 
				'  echeck: The payment is pending because it was made by an eCheck that has not yet cleared. 
				'  intl: The payment is pending because you hold a non-U.S. account and do not have a withdrawal mechanism. You must manually accept or deny this payment from your Account Overview. 		
				'  multi-currency: You do not have a balance in the currency sent, and you do not have your Payment Receiving Preferences set to automatically convert and accept this payment. You must manually accept or deny this payment. 
				'  verify: The payment is pending because you are not yet verified. You must verify your account before you can accept this payment. 
				'  other: The payment is pending for a reason other than those listed above. For more information, contact PayPal customer service. 
				*/
				
				$pendingReason	= $resArray["PAYMENTINFO_0_PENDINGREASON"];  

				/*
				'The reason for a reversal if TransactionType is reversal:
				'  none: No reason code 
				'  chargeback: A reversal has occurred on this transaction due to a chargeback by your customer. 
				'  guarantee: A reversal has occurred on this transaction due to your customer triggering a money-back guarantee. 
				'  buyer-complaint: A reversal has occurred on this transaction due to a complaint about the transaction from your customer. 
				'  refund: A reversal has occurred on this transaction because you have given the customer a refund. 
				'  other: A reversal has occurred on this transaction due to a reason not listed above. 
				*/
				
				$reasonCode		= $resArray["PAYMENTINFO_0_REASONCODE"];   
				$payid = "ID: <b>".$transactionId."</b> Status: <b>".$paymentStatus."</b> Note: ".$pendingReason;
				$sendmail = true;
			}
			else  
			{
				//Display a user friendly Error on the page using any of the following error information returned by PayPal
				$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
				$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
				$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
				$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
				
				echo "GetExpressCheckoutDetails API call failed. ";
				echo "Detailed Error Message: " . $ErrorLongMsg;
				echo "Short Error Message: " . $ErrorShortMsg;
				echo "Error Code: " . $ErrorCode;
				echo "Error Severity Code: " . $ErrorSeverityCode;
				$sendmail = false;
			}

		} else {
			$paypal = 0;
			$sendmail = true;
		}
		
		//Se l'invio mail è confermato procedo

		if ($sendmail) {
			//Variabili
			$dateorder = date('d-m-Y H:i', strtotime ("+6 hour"));
			$datefile = date('Ymd_H-i', strtotime ("+6 hour"));
			$filepath = "archive/".$datefile."_Ordine_".$_SESSION['eshop_userinfo']['surname']."_".$_SESSION['eshop_userinfo']['name'].".pdf";
			$pdftitle = "ORDINE ACQUISTO FOTOGRAFIE DI".$_SESSION['eshop_userinfo']['surname']." ".$_SESSION['eshop_userinfo']['name'];
			$gest = 0;
			$tot = 0;

			if ($_SESSION['eshop_userinfo']['paymode'] == 1) {
				$paymode = "Bonifico Bancario";
			} else if ($_SESSION['eshop_userinfo']['paymode'] == 2) {
				$paymode = "PayPal";
			}
			
			//Imposto il messaggio Email per il cliente
			$usermessage = "<img src='imgsys/logo_ordine.png'><br><br>";
			$usermessage.= "Gentile <b>".$_SESSION['eshop_userinfo']['name']."</b>,<br>ti ringraziamo per aver scelto il nostro servizio. In allegato a questa email puoi trovare il riepilogo del tuo ordine.<br>Ti ricordiamo che gli articoli digitali da te scelti saranno inviati all'indirizzo email indicato nell'ordine.<br>Le informazioni comunicate tramite il sito verranno utilizzate soltanto ai fini dell'evasione dell'ordine e non saranno archiviate in registri elettronici, comunicate a Terzi o utilizzate per fini commerciali nel pieno rispetto del <i>Codice in Materia di Protezione dei Dati Personali</i>, d.lgs. 30 giugno 2003.";
			if ($_SESSION['eshop_userinfo']['paymode'] == 1) { $usermessage.= "<br><br>Avendo scelto il pagamento tramite Bonifico Bancario devi effettuare il versamento al seguente Conto Corrente:<br><br>- Intestatario: <b>Andrea Cantini</b><br>- Banca: <b>Cariparma</b><br>- Codice IBAN: <b>IT03Z0623012783000035997147</b><br>- Causale: <b>Nome e Cognome di chi ha effettuato l'ordine</b><br><br>Ti ricordiamo che l'ordine sara' evaso soltanto alla ricezione del pagamento."; }
			$usermessage.= "<br>Per qualsiasi informazione ti preghiamo di contattarci all'indirizzo <b>info@andreacantini.photos</b>.";
			$usermessage.= "<br><br>Cordiali Saluti<br>Lo Staff di <a href='http://www.andreacantini.photos'>AndreaCantini.photos</a>";

			//Imposto il messaggio Email per l'Admin
			$adminmessage = "<img src='imgsys/logo_ordine.png'><br><br>";
			$adminmessage.= "E' stato inoltrato un nuovo ordine in data ".$dateorder.".<br><br>In allegato il resoconto dell'ordine che &egrave; stato archiviato ed inoltre consultabile al seguente indirizzo:<br><a href='http://www.andreacantini.photos/eshop/archive'>http://www.andreacantini.photos/eshop/archive</a>";
				
			//Creo la pagina dell'ordine
			$pdfpage="<page>";
			$pdfpage.="<style>p { color: #373737; font: 12px Helvetica, Arial, sans-serif; font-weight: 300; line-height: 1.625; } img { float: right; } table { border-bottom: 1px solid #ddd; margin: 0 0 1.625em; width: 100%; } td { border-top: 1px solid #ddd; padding: 6px 10px 6px 0; } h1 { font-size: 16px font-weight: bold } h2 { font-size: 14px font-weight: bold }</style>";	$pdfpage.="<p>";
			$pdfpage.="<img src='imgsys/logo_ordine.png'>";
			$pdfpage.="<h1>ORDINE DI ACQUISTO</h1>";
			$pdfpage.="DATA ".$dateorder."<br>";
			$pdfpage.="<h2>DATI PERSONALI</h2>";
			$pdfpage.="<table cellspan='0' colspan='0' border='0'>";
			$pdfpage.="<tr><td><b>Email</b></td><td>".$_SESSION['eshop_userinfo']['email']."</td></tr>";
			$pdfpage.="<tr><td><b>Nome</b></td><td>".$_SESSION['eshop_userinfo']['name']."</td></tr>";
			$pdfpage.="<tr><td><b>Cognome</b></td><td>".$_SESSION['eshop_userinfo']['surname']."</td></tr>";
			$pdfpage.="<tr><td><b>Telefono</b></td><td>".$_SESSION['eshop_userinfo']['phone']."</td></tr>";
			$pdfpage.="<tr><td><b>Indirizzo</b></td><td>".$_SESSION['eshop_userinfo']['address']."</td></tr>";
			$pdfpage.="<tr><td><b>Citta'</b></td><td>".$_SESSION['eshop_userinfo']['city']."</td></tr>";
			$pdfpage.="<tr><td><b>CAP</b></td><td>".$_SESSION['eshop_userinfo']['cap']."</td></tr>";
			$pdfpage.="<tr><td><b>Stato</b></td><td>".$_SESSION['eshop_userinfo']['state']."</td></tr>";
			$pdfpage.="<tr><td><b>Pagamento</b></td><td>".$paymode."</td></tr>";
			if ($_SESSION['eshop_userinfo']['paymode'] == 2) { $pdfpage.="<tr><td><b>Transazione</b></td><td>".$payid."</td></tr>"; }
			$pdfpage.="</table><br>";
			$pdfpage.="<h2>ARTICOLI</h2>";
			$pdfpage.="<table cellspacing='0' cellpadding='0' border='0'>";
			$pdfpage.="<tr><td><b>QUANTITA'</b></td><td><b>DESCRIZIONE</b></td><td><b>PREZZO</b></td><td><b>ALBUM</b></td></tr>";
			foreach($_SESSION['eshop_order'] as $key => $value) {
				$pdfpage.="<tr>";
				$pdfpage.="<td align='center'>".$_SESSION['eshop_order'][$key]['qty']."</td>";
				$pdfpage.="<td>".$_SESSION['eshop_order'][$key]['desc']."</td>";
					if ($_SESSION['eshop_discount']) { 
						$price = number_format($_SESSION['eshop_order'][$key]['price'],2,'.','');
						$pdfpage.="<td align='right'><span style='color: red;'>".$price." €</span></td>";
						$pdfpage.="<td align='right'>".$_SESSION['eshop_order'][$key]['gallery']."</td>";
					} else { 
						$price = number_format($_SESSION['eshop_order'][$key]['price'],2,'.','');
						$pdfpage.="<td align='right'>".$price." €</td>";
						$pdfpage.="<td align='right'>".$_SESSION['eshop_order'][$key]['gallery']."</td>";
					}
				$pdfpage.="</tr>\n";				
				$gest = $gest + $_SESSION['eshop_order'][$key]['gest'];
				$tot = $tot + $_SESSION['eshop_order'][$key]['price'];
			}
			$total_price = number_format($tot,2,'.','');
			$pdfpage.="<tr><td align='center'><b>".$_SESSION['eshop_total']."</b></td><td></td><td align='right'><b>".$total_price." €</b></td><td></td></tr>";
			$pdfpage.="<tr><td colspan='4'></td></tr>";
			if ($_SESSION['eshop_userinfo']['digitalcd'] == 1) { 
				$pdfpage.="<tr><td colspan=4><b>SERVIZI ACCESSORI</b></td></tr>";
				$pdfpage.="<tr><td align='center'>1</td><td>CD Provini Digitali</td><td align='right'>5.00 €</td><td></td></tr>";
				$tot = $tot + 5;
			}
			//Inserisco 2€ di Costi di Gestione se almeno uno degli Eventi è abilitato
			if ($gest > 0) {
				$pdfpage.="<tr><td colspan=4><b>SPESE AGGIUNTIVE</b></td></tr>";
				$pdfpage.="<tr><td align='center'>1</td><td>Spedizione e\o Gestione</td><td align='right'>2.00 €</td><td></td></tr>";
				$tot = $tot + 2;
			}
			$pdfpage.="</table>";
			if ($_SESSION['eshop_discount']) { 
				$pdfpage.="<span style='color: red; font-size: 9px'>E' stato applicato lo sconto per ordini uguali o superiori a 10 foto</span><br><br>";
			}
			$final_amount = number_format($tot,2,'.','');
			$pdfpage.="<hr>";
			$pdfpage.="<span style='text-align: right; font-weight: bold;'>Totale: ".$final_amount." €</span>";	
			$pdfpage.="</p></page>";
			
			//Converto e salvo in PDF		
			$html2pdf = new HTML2PDF('P', 'A4', 'it', false, 'UTF-8', array(10,20,10,20));
			$html2pdf->pdf->SetAuthor('AndreaCantini.photos');
			$html2pdf->pdf->SetTitle($pdftitle);
			$html2pdf->pdf->SetProtection(array('print'), '');
			$html2pdf->writeHTML($pdfpage);
			$html2pdf->Output($filepath, 'F');
			
			if (!EmailConfig::$debugmode) {
			
				//Creo la Mail di invio del Cliente
				$mail = new PHPMailer;
				$mail->IsMail();
				
				//Set who the message is to be sent from
				$mail->SetFrom('info@andreacantini.photos', 'EShop AndreaCantini.photos');
				$mail->AddReplyTo('info@andreacantini.photos', 'EShop AndreaCantini.photos');
				//Set who the message is to be sent to
				$mail->AddAddress($_SESSION['eshop_userinfo']['email']);
				
				//Set the subject line
				$mail->Subject = "Ordine di Acquisto - AndreaCantini.photos";
				//Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
				$mail->MsgHTML($usermessage);
				//Attach file
				$mail->AddAttachment($filepath);

				//Invio le Mail con l'allegato 
				
				if(!$mail->Send()) {
				   echo 'Message could not be sent.';
				   echo 'Mailer Error: ' . $mail->ErrorInfo;
				   exit;
				}

				//Creo la Mail di invio dell'Amministratore che sarà mandata a quelli configurati in email_config.php
				foreach(EmailConfig::$adminemail as $address) {
					$admin = new PHPMailer;
					$admin->IsMail();
					
					$admin->SetFrom('info@andreacantini.photos', 'EShop AndreaCantini.photos');
					$admin->AddReplyTo('info@andreacantini.photos', 'EShop AndreaCantini.photos');
					$admin->AddAddress($address);
					$admin->Subject = "Ordine di Acquisto - AndreaCantini.photos";
					$admin->MsgHTML($adminmessage);
					$admin->AddAttachment($filepath);			
					
					if(!$admin->Send()) {
					   echo 'Message could not be sent.';
					   echo 'Mailer Error: ' . $admin->ErrorInfo;
					   exit;
					}
				}				
			
			}
			
			//Elimino il Carrello
			unset($_SESSION['eshop_order']);
			unset($_SESSION['eshop_total']);
			unset($_SESSION['eshop_discount']);
			unset($_SESSION['eshop_userinfo']);

			//Stampo l'output in base alla chiamata
			if ($paypal == 1) {
				include("paypal_confirm.php");
			} else {
				echo "L'ordine &egrave; stato inoltrato, riceverai a breve un email con il riepilogo e le informazioni necessarie. Grazie per aver utilizzato i nostri servizi.\n";
			}

		} else {
			echo "Si e' verificato un errore.";
		}

	} else {
		echo "PARAM ERROR";
	}

?>