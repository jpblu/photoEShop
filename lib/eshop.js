/*!
 * PietroGerboni.it : Photo Eshop Module
 * Copyright 2013-2014, Andrea Fusco (http://www.andreafusco.net)
 *
 * Licensed under Creative Commons By-Nc-Nd
 * Redistributions of files must retain the above copyright notice.
 *
 * @Copyright     Copyright 2014, Andrea Fusco (http://www.andreafusco.net)
 * @License       Creative Commons By-Nc-Nd (http://creativecommons.org/licenses/by-nc-nd/3.0/)
 * @File		  eshop.js
 * @Description	  JQuery Script Library EShop NicolaGennari.it
 * @Version		  1.3.0
 * @Date		  2013-06-06
 */
 
$(document).ready(function() {
	jQuery(window).load(function() {
		jQuery('#iepopup').hide();
		jQuery('#iepopup_bk').hide();
	});

	assignEvents();

	$(".fancybox").fancybox({
			helpers	: {
				title	: {
					type: 'outside'
				},
				thumbs	: {
					width	: 50,
					height	: 50
				}
			}
	});

	$(".add_chart").click(function(){
			var element = $(this);
			var data_id = element.attr('data-userid');
			var data_gal = element.attr('data-galid');
			var data_price = element.attr('data-idprice');
			var data_gest = element.attr('data-gest');
			var element_id = data_id.replace('.jpg','');
			var quantity = $("#"+element_id+"_qty").val();
			var type = $("#"+element_id+"_type").val();
			
			//alert("Name: "+element_id+" imgname: "+data_id+" quantity: "+quantity+" imgtype: "+type);
			
			$.ajax({
				async: false,
				type: "POST",
				url: "addchart.php",
				data: { name: element_id, imgname: data_id, quantity: quantity, imgtype: type, galid : data_gal, idprice : data_price, gest : data_gest }
			})
			.done(function(msg)	{
				$("#shop_order").html(msg);
				assignEvents();
			})
			.fail(function() { 
				$("#shop_order").html("Errore in esecuzione dello script.");
			});
			
	});
	
	function assignEvents() {
		$("a.del_chart").click(function(){
			var element = $(this);
			var data_id = element.attr('data-userid');		
			var data_price = element.attr('data-idprice');
			
			$.ajax({
				async: false,
				type: "POST",
				url: "delchart.php",
				data: { id : data_id, idprice : data_price }
			})
			.done(function(msg)	{
				$("#shop_order").html(msg);
				assignEvents();
			})
			.fail(function() { 
				$("#shop_order").html("Errore in esecuzione dello script.");
			});
			
		});
		
		$("#drop_chart").click(function() {
			//Cancellazione Carrello
			$("#dialog_del").dialog({ resizable: false ,
					 height: 250 ,
					 width: 350 ,
					 modal: true ,
					 buttons: { "Svuota il Carrello": function() {
										$(this).dialog("close"); 
										
										$.ajax({
											async: false,
											url: "dropchart.php"
										})
										.done(function(msg)	{
											$("#shop_order").html(msg);
											assignEvents();
										})
										.fail(function() { 
											$("#shop_order").html("Errore in esecuzione dello script.");
										});
									},
									"Annulla" : function() {
										$(this).dialog("close");
									}
								}
					});
		});
		
		$("#send_order").click(function() {
			window.location.href = "send_order.php";
		});

	}
});
