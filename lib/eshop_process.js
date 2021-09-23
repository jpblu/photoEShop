/*!
 * NicolaGennari.it : Photo Eshop Module
 * Copyright 2012-2013, Andrea Fusco (http://www.andreafusco.net)
 *
 * Licensed under Creative Commons By-Nc-Nd
 * Redistributions of files must retain the above copyright notice.
 *
 * @Copyright     Copyright 2013, Andrea Fusco (http://www.andreafusco.net)
 * @License       Creative Commons By-Nc-Nd (http://creativecommons.org/licenses/by-nc-nd/3.0/)
 * @File		  eshop.js
 * @Description	  JQuery Script Library EShop NicolaGennari.it
 * @Version		  1.0.1
 * @Date		  2013-05-14
 * @LastUpdate	  2014-03-18
 * @ChangeLog	  2014-03-18 => "address", "city", "cap" fields added
 */
 
$(document).ready(function() {
	$("#button_process").click(function(){										
		$("#process_shop").validate({
			rules:
			{
				email: {
					required: true,
					email: true
				},
				name: "required",
				surname: "required",
				phone: "required",
				address: "required",
				city: "required",
				cap: "required"
			},
			messages:
			{
				email: {
					required: " Devi inserire un indirizzo Email",
					email: " L'indirizzo inserito non è in un formato valido"
				},
				name: " Non hai inserito il tuo nome",
				surname: " Non hai inserito il tuo cognome",
				phone: " Non hai inserito il tuo numero di telefono",
				address: " Non hai inserito l'indirizzo di residenza",
				city: " Non hai inserito la città di residenza",
				cap: " Non hai inserito il CAP della città di residenza"
			},
			ignore: "disabled",
			onfocusout: false,
			onkeyup: false,
			onclick: false,
			onsubmit: false
		});
		
		if ($("#process_shop").valid()) {
			$("#email").attr('disabled', 'disabled');
			$("#name").attr('disabled', 'disabled');
			$("#surname").attr('disabled', 'disabled');
			$("#phone").attr('disabled', 'disabled');
			$("#address").attr('disabled', 'disabled');
			$("#city").attr('disabled', 'disabled');
			$("#cap").attr('disabled', 'disabled');
			$("#state").attr('disabled', 'disabled');
			//$("#digitalcd").attr('disabled', 'disabled');
						
			var email = $("#email").val();
			var name = $("#name").val();
			var surname = $("#surname").val();
			var phone = $("#phone").val();
			var address = $("#address").val();
			var city = $("#city").val();
			var cap = $("#cap").val();
			var paymode = $("#paymode").val();
			var state = $("#state").val();
			
			/*if ($('#digitalcd').prop('checked')) {
				var digitalcd = 1;
			} else {
				var digitalcd = 0;
			}*/
			var digitalcd = 0;
			
			$("#process_order").html("<img src='imgsys/loader.gif'>");
			
			$.ajax({
				async: false,
				type: "POST",
				url: "setuser.php",
				data: { email: email, name: name, surname: surname, phone: phone, address: address, city: city, cap: cap, state: state, paymode: paymode, digitalcd: digitalcd }
			})
			.done(function(msg)	{
				$("#process_order").html(msg);
				orderProcessEvents();
			})
			.fail(function() { 
				$("#process_order").html("Errore in esecuzione dello script.");
			});
			
		}
		
	});
	
	function orderProcessEvents(){
		$("#order_confirm").click(function() {
				$("#dialog_order_confirm").dialog({ resizable: false ,
						 height: 250 ,
						 width: 350 ,
						 modal: true ,
						 buttons: { "Procedi": function() {
											$(this).dialog("close"); 
											$("#process_order").html("<img src='imgsys/loader.gif'>");
											
											$.ajax({
												async: false,
												url: "orderconfirm.php"
											})
											.done(function(msg)	{
												$("#process_order").html(msg);
											})
											.fail(function() { 
												$("#process_order").html("Si è verificato un errore durante il processo");
											});
										},
										"Annulla" : function() {
											$(this).dialog("close");
										}
									}
				});
		});
		
		$("#order_delete").click(function() {
				$("#dialog_order_delete").dialog({ resizable: false ,
						 height: 250 ,
						 width: 350 ,
						 modal: true ,
						 buttons: { "Cancella l'Ordine": function() {
											$(this).dialog("close"); 
											$("#process_order").html("<img src='imgsys/loader.gif'>");
											
											$.ajax({
												async: false,
												url: "dropchart.php"
											})
											.done(function(msg)	{
												$("#process_order").html("Ordine Annullato.");
												window.location.href = "index.php";
											})
											.fail(function() { 
												$("#process_order").html("Si è verificato un errore durante il processo");
											});
										},
										"Annulla" : function() {
											$(this).dialog("close");
										}
									}
				});
		});
	}
	
});
