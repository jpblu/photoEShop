/*!
 * AndreaCantini : Photo Eshop Module
 * Copyright 2012-2013, Andrea Fusco (http://www.andreafusco.net)
 *
 * Licensed under Creative Commons By-Nc-Nd
 * Redistributions of files must retain the above copyright notice.
 *
 * @Copyright     Copyright 2013, Andrea Fusco (http://www.andreafusco.net)
 * @License       Creative Commons By-Nc-Nd (http://creativecommons.org/licenses/by-nc-nd/3.0/)
 * @File		  pricing.js
 * @Description	  JQuery Admin Script Library EShop 
 * @Version		  1.3.0
 * @Date		  2017-05-23
 */

$(document).ready(function() {
	$.fn.editable.defaults.mode = 'popup';

	$('.name').editable({
		type: 'text',
		url: 'lib/modify_price.php',
		title: 'Titolo',
		validate: function(value) {
			if($.trim(value) == '') {
				return 'Campo Obbligatorio!';
			}
		},
		showbuttons: 'bottom',
		success: function(response, newValue) {
			window.location.reload();
		}
	});
	
	$('.note').editable({
		type: 'text',
		url: 'lib/modify_price.php',
		title: 'Descrizione',
		emptytext: 'Non valorizzato',
		showbuttons: 'bottom',
		success: function(response, newValue) {
			window.location.reload();
		}
	});
	
	$('.price1').editable({
		type: 'text',
		url: 'lib/modify_price.php',
		title: 'Prezzo Digitale HD',
		validate: function(value) {
			if(!$.isNumeric(value)) {
				return 'Il Valore deve essere Numerico!';
			}
		},
		showbuttons: 'bottom',
		success: function(response, newValue) {
			window.location.reload();
		}
	});
	
	$('.price1sc').editable({
		type: 'text',
		url: 'lib/modify_price.php',
		title: 'Prezzo Digitale HD Scontato',
		validate: function(value) {
			if(!$.isNumeric(value)) {
				return 'Il Valore deve essere Numerico!';
			}
		},
		showbuttons: 'bottom',
		success: function(response, newValue) {
			window.location.reload();
		}
	});
	
	$('.price2').editable({
		type: 'text',
		url: 'lib/modify_price.php',
		title: 'Prezzo 10x15',
		validate: function(value) {
			if(!$.isNumeric(value)) {
				return 'Il Valore deve essere Numerico!';
			}
		},
		showbuttons: 'bottom',
		success: function(response, newValue) {
			window.location.reload();
		}
	});
	
	$('.price2sc').editable({
		type: 'text',
		url: 'lib/modify_price.php',
		title: 'Prezzo 10x15 Scontato',
		validate: function(value) {
			if(!$.isNumeric(value)) {
				return 'Il Valore deve essere Numerico!';
			}
		},
		showbuttons: 'bottom',
		success: function(response, newValue) {
			window.location.reload();
		}
	});
	
	$('.price3').editable({
		type: 'text',
		url: 'lib/modify_price.php',
		title: 'Prezzo 12x18',
		validate: function(value) {
			if(!$.isNumeric(value)) {
				return 'Il Valore deve essere Numerico!';
			}
		},
		showbuttons: 'bottom',
		success: function(response, newValue) {
			window.location.reload();
		}
	});
	
	$('.price3sc').editable({
		type: 'text',
		url: 'lib/modify_price.php',
		title: 'Prezzo 12x18 Scontato',
		validate: function(value) {
			if(!$.isNumeric(value)) {
				return 'Il Valore deve essere Numerico!';
			}
		},
		showbuttons: 'bottom',
		success: function(response, newValue) {
			window.location.reload();
		}
	});
	
	$('.price4').editable({
		type: 'text',
		url: 'lib/modify_price.php',
		title: 'Prezzo 15x23',
		validate: function(value) {
			if(!$.isNumeric(value)) {
				return 'Il Valore deve essere Numerico!';
			}
		},
		showbuttons: 'bottom',
		success: function(response, newValue) {
			window.location.reload();
		}
	});
	
	$('.price4sc').editable({
		type: 'text',
		url: 'lib/modify_price.php',
		title: 'Prezzo 15x23 Scontato',
		validate: function(value) {
			if(!$.isNumeric(value)) {
				return 'Il Valore deve essere Numerico!';
			}
		},
		showbuttons: 'bottom',
		success: function(response, newValue) {
			window.location.reload();
		}
	});
	
	$('.price5').editable({
		type: 'text',
		url: 'lib/modify_price.php',
		title: 'Prezzo 20x30',
		validate: function(value) {
			if(!$.isNumeric(value)) {
				return 'Il Valore deve essere Numerico!';
			}
		},
		showbuttons: 'bottom',
		success: function(response, newValue) {
			window.location.reload();
		}
	});
	
	$('.price5sc').editable({
		type: 'text',
		url: 'lib/modify_price.php',
		title: 'Prezzo 20x30 Scontato',
		validate: function(value) {
			if(!$.isNumeric(value)) {
				return 'Il Valore deve essere Numerico!';
			}
		},
		showbuttons: 'bottom',
		success: function(response, newValue) {
			window.location.reload();
		}
	});
	
	$('.price6').editable({
		type: 'text',
		url: 'lib/modify_price.php',
		title: 'Prezzo 30x45',
		validate: function(value) {
			if(!$.isNumeric(value)) {
				return 'Il Valore deve essere Numerico!';
			}
		},
		showbuttons: 'bottom',
		success: function(response, newValue) {
			window.location.reload();
		}
	});
	
	$('.price6sc').editable({
		type: 'text',
		url: 'lib/modify_price.php',
		title: 'Prezzo 30x45 Scontato',
		validate: function(value) {
			if(!$.isNumeric(value)) {
				return 'Il Valore deve essere Numerico!';
			}
		},
		showbuttons: 'bottom',
		success: function(response, newValue) {
			window.location.reload();
		}
	});
			
	$("#create_new_list").on("click", function() {
		if (confirm("Sei sicuro di voler procedere a creare un nuovo Listino Prezzi?")) {

			$.ajax({
				type: "POST",
				url: "lib/new_list.php",
			})
			.done(function(msg)	{
				alert("Listino Creato!")
				window.location.reload();
			})
			.fail(function(msg) { 
				alert("Errore in esecuzione dello script: "+msg);
			});
		
		}

	});
			
	$("#back_to_home").on("click", function() {
		window.location.href = 'index.php';
	});
	
	$(".active_list").on("click", function() {
		var element = $(this);
		var id = element.attr('data-id');

		$.ajax({
			type: "POST",
			url: "lib/activate_list.php",
			data: { id: id, value : 1 }
		})
		.done(function(msg)	{
			alert("Listino Abilitato!")
			window.location.reload();
		})
		.fail(function(msg) { 
			alert("Errore in esecuzione dello script: "+msg);
		});		

	});
	
	$(".disable_list").on("click", function() {
		var element = $(this);
		var id = element.attr('data-id');

		$.ajax({
			type: "POST",
			url: "lib/activate_list.php",
			data: { id: id, value : 0 }
		})
		.done(function(msg)	{
			alert("Listino Disabilitato!")
			window.location.reload();
		})
		.fail(function(msg) { 
			alert("Errore in esecuzione dello script: "+msg);
		});		

	});
	
});
