/*!
 * AndreaCantini.it : Photo Eshop Module
 * Copyright 2012-2013, Andrea Fusco (http://www.andreafusco.net)
 *
 * Licensed under Creative Commons By-Nc-Nd
 * Redistributions of files must retain the above copyright notice.
 *
 * @Copyright     Copyright 2013, Andrea Fusco (http://www.andreafusco.net)
 * @License       Creative Commons By-Nc-Nd (http://creativecommons.org/licenses/by-nc-nd/3.0/)
 * @File		  admin.js
 * @Description	  JQuery Admin Script Library EShop NicolaGennari.it
 * @Version		  1.0.1
 * @Date		  2013-06-03
 * @LastUpdate	  2014-03-25
 * @ChangeLog	  2014-03-25 => added "events" field
 */
 
$(document).ready(function() {	
	
	$("#make_gallery").on('click', function(){
		$("#make_gallery").attr('disabled', 'disabled');
		$("#gallerylist").html("<center><img src='imgsys/loader.gif'></center>");
		var title = $("#gallery_title").val();
		var dirname = $("#gallery_dirname").val();
		var event = $("#gallery_event").val();
		
		$.ajax({
			async: false,
			type: "POST",
			url: "lib/add_gallery.php",
			data: { title : title, dirname : dirname, event : event }
		})
		.done(function(msg)	{
			$("#gallerylist").html(msg);
			$("#gallery_title").val('');
			$("#gallery_dirname").val('');
			$("#gallery_event").val(0);
			$("#make_gallery").removeAttr("disabled");
			window.location.href = "index.php";
		})
		.fail(function(msg) { 
			$("#gallerylist").html(msg);
		});
		
	});

	$('.event_change').on('change', function() {
		var element = $(this);
		var event = element.attr('value');
		var gallery = element.attr('galvalue');

		$.ajax({
				async: false,
				type: "POST",
				url: "lib/update_gallery.php",
				data: { id : gallery, event : event }
			})
			.done(function()	{
				window.location.href = "index.php";
			})
			.fail(function(msg) { 
				$("#gallerylist").html(msg);
			});
	});

	$("#form_event_create").validate({
			rules:
			{
				name: "required"
			},
			messages:
			{
				name: "Devi inserire il Titolo dell'Evento"
			},
			ignore: ":disabled",
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            onsubmit: false
	});

	$("#dialog_event_create").dialog(	{ autoOpen: false },
										{ resizable: false },
										{ height: 380 },
										{ width: 500 },
										{ modal: true },
										{ buttons: [ { text: "Inserisci", click: function() {

																if ($("#form_event_create").valid()) {
																	$(this).dialog("close"); 																							
																	
																	var name = $("#name").val();
																	var notes = $("#notes").val();

																	$.ajax({
																		type: "POST",
																		url: "lib/insert_event.php",
																		data: { title: name, note: notes }
																	})
																	.done(function(msg)	{
																		window.location.href = 'index.php';
																	})
																	.fail(function() { 
																		alert("Errore in esecuzione dello script.");
																	});
																}
															}
													},
													{ text: "Annulla", click: function() {
															$(this).dialog("close"); 
														}
													}] 
	});	

	$("#create_event").on('click', function() {
		$("#dialog_event_create").dialog("open");
	});

	$("a.del_event").on('click', function(){
		var element = $(this);
		var data_id = element.attr('data-userid');

		if (confirm("Attenzione! Procedendo con la cancellazione l'Evento non sara' recuperabile e tutte le Gallerie presenti sotto di esso verranno messe in stato 'Nessuno'. Volete continuare?")) {
		
			$.ajax({
				async: false,
				type: "POST",
				url: "lib/delete_event.php",
				data: { id : data_id }
			})
			.done(function()	{
				window.location.href = "index.php";
			})
			.fail(function(msg) { 
				$("#gallerylist").html(msg);
			});

		}
	
	});
	
	$("a.db_file_uploader").on('click', function(){			
		var element = $(this);
		var data_id = element.attr('data-userid');
		var data_dir = element.attr('data-userdir');			

		if (confirm("Attenzione! Procedendo con il caricamento dei files i contenuti gi&agrave; inseriti saranno cancellati e sovrascritti. Si desidera continuare?")) {
			
			$("#gallerylist").html("<center><img src='imgsys/loader.gif'></center>");

			$.ajax({
				async: false,
				type: "POST",
				url: "lib/upload_db_gallery.php",
				data: { id : data_id, dirname : data_dir }
			})
			.done(function()	{
				window.location.href = "index.php";
			})
			.fail(function(msg) { 
				$("#gallerylist").html(msg);
			});

		}
		
	});

	$("a.delete_gallery").on('click', function(){
		var element = $(this);
		var data_id = element.attr('data-userid');
		var data_dir = element.attr('data-userdir');		

		if(confirm("Attenzione! Procedendo con la cancellazione non sarà più possibile recuperare i files. Volete continuare?")) {
		
			$.ajax({
				async: false,
				type: "POST",
				url: "lib/delete_gallery.php",
				data: { id : data_id, dirname : data_dir }
			})
			.done(function(msg)	{
				$("#gallerylist").html(msg);
				$("#gallery_title").val('');
				$("#gallery_dirname").val('');
				$("#delete_gallery").removeAttr("disabled");
				window.location.href = "index.php";
			})
			.fail(function(msg) { 
				$("#gallerylist").html();
			});

		}
	
	});
	
	$("#manage_prices").on('click', function(){
		window.location.href = "pricing.php";
	});
	
	$('.pricelist_change').on('change', function() {
		var element = $(this);
		var price = element.attr('value');
		var evvalue = element.attr('evvalue');

		$.ajax({
				async: false,
				type: "POST",
				url: "lib/update_pricing.php",
				data: { id : evvalue, value : price }
			})
			.done(function(msg) {
				alert(msg);
				window.location.reload();
			})
			.fail(function(msg) { 
				alert(msg);
			});
	});
	
	$(".set_gest").on("change",function() {
		var element = $(this);
		var id = element.attr('data-userid');
		var control = $(this).is(':checked'); 
		
		if(control) {

			$.ajax({
				type: "POST",
				url: "lib/update_gestcost.php",
				data: { id : id, value : 1 }
			})
			.done(function(msg)	{
				window.location.reload();
			})
			.fail(function(msg) { 
				alert(msg);
			});

		} else {
			
			$.ajax({
				type: "POST",
				url: "lib/update_gestcost.php",
				data: { id : id, value : 0 }
			})
			.done(function(msg)	{
				window.location.reload();
			})
			.fail(function(msg) { 
				alert(msg);
			});

		}
	});
		
});
