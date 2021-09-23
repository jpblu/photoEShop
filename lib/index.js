/*!
 * NicolaGennari.it : Photo Eshop Module
 * Copyright 2012-2013, Andrea Fusco (http://www.andreafusco.net)
 *
 * Licensed under Creative Commons By-Nc-Nd
 * Redistributions of files must retain the above copyright notice.
 *
 * @Copyright     Copyright 2013, Andrea Fusco (http://www.andreafusco.net)
 * @License       Creative Commons By-Nc-Nd (http://creativecommons.org/licenses/by-nc-nd/3.0/)
 * @File		  index.js
 * @Description	  JQuery Script Library EShop NicolaGennari.it
 * @Version		  1.0.1
 * @Date		  2013-05-13
 */
 
$(document).ready(function() {
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

	var totalelements = $("#scrollpagecontainer").attr("data-internalid");
	var totalpages = 0;
	
	if (totalelements <= 18) { totalpages = 1; } else { totalpages = Math.ceil(totalelements / 18); }
	
	$("#scrollpage").paginate({
		count 		: +totalpages,
		start 		: 1,
		display     : 10,
		border					: true,
		border_color			: '#fff',
		text_color  			: '#fff',
		background_color    	: 'black',	
		border_hover_color		: '#ccc',
		text_hover_color  		: '#000',
		background_hover_color	: '#fff', 
		images					: false,
		mouse					: 'press',
		onChange     			: function(page){
									$('._current','#scrollpagecontainer').removeClass('_current').hide();
									$('#p'+page).addClass('_current').show();
								  }
	});
	
	$(".add_chart").click(function(){
		var element = $(this);
		var data_id = element.attr('data-userid');
		var data_price = element.attr('data-idprice');
		var element_id = data_id.replace('.jpg','');
		var quantity = $("#"+element_id+"_qty").val();
		var type = $("#"+element_id+"_type").val();
		
		//alert("Name: "+element_id+" imgname: "+data_id+" quantity: "+quantity+" imgtype: "+type);
		
		$.ajax({
			async: false,
			type: "POST",
			url: "addchart.php",
			data: { name: element_id, imgname: data_id, quantity: quantity, imgtype: type, idprice : data_price }
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
	
	$(".eventsLink").click(function()
	{
		var l = $(this).attr("link");
		var psw = prompt("Introdurre password per quest'evento");

		var pattern = new RegExp(/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/);
	    if (pattern.test(psw)) 
	    {
	        alert("Usare solo caratteri alfanumerici.");
	        return false;
	    }
		
		$.ajax(
		{
			async: true,
			url: "lib/getpsw.php?a=1&psw="+psw+"&wh="+$(this).attr("wh"),
			success: function(data)
			{
				if (data.indexOf("riprovare") > -1)
					alert(data);
				else
					window.open(l, "_self");
			},
			error: function(data)
			{
				alert("Si e' verificato un errore nella verifica della password, per favore riprovare");
			}
		});
	});
	
	function isValid(str)
	{
		 return !/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
	}
});
