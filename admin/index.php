<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb">
<head>
<?	session_start();
	include('../config/db_config.php');
	include('lib/core.php');

?>
<script src="lib/jquery-1.8.2.min.js"></script>
<script src="lib/jquery-ui-1.9.2.min.js"></script>
<script src="lib/jquery.validate.min.js"></script>
<script src="lib/admin.js?v=130"></script>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>EShop - AndreaCantini.it | Amministrazione Eshop</title>
<link rel="shortcut icon" href="http://www.AndreaCantini.it/images/occhio.ico" type="image/vnd.microsoft.icon"/>
<link href="../jquery-ui.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="../css/style.css" />
<style>
		/* Link color */
		a,
		#site-title a:focus,
		#site-title a:hover,
		#site-title a:active,
		.entry-title a:hover,
		.entry-title a:focus,
		.entry-title a:active,
		.widget_twentyeleven_ephemera .comments-link a:hover,
		section.recent-posts .other-recent-posts a[rel="bookmark"]:hover,
		section.recent-posts .other-recent-posts .comments-link a:hover,
		.format-image footer.entry-meta a:hover,
		#site-generator a:hover {
			color: #259d2a;
		}
		section.recent-posts .other-recent-posts .comments-link a:hover {
			border-color: #259d2a;
		}
		article.feature-image.small .entry-summary p a:hover,
		.entry-header .comments-link a:hover,
		.entry-header .comments-link a:focus,
		.entry-header .comments-link a:active,
		.feature-slider a.active {
			background-color: #259d2a;
		}
		#wpadminbar { display:none; }
		html { margin-top: 28px !important; }
		* html body { margin-top: 28px !important; }
		.add_chart, .stylebutton {
		-moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
		-webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
		box-shadow:inset 0px 1px 0px 0px #ffffff;
		background-color:#ededed;
		-moz-border-radius:6px;
		-webkit-border-radius:6px;
		border-radius:6px;
		border:1px solid #dcdcdc;
		display:inline-block;
		color:#777777;
		font-family:arial;
		font-size:10px;
		font-weight:bold;
		padding:6px 10px;
		text-decoration:none;
		text-shadow:1px 1px 0px #ffffff;
		}
		.add_chart:hover, .stylebutton:hover {
			background-color:#dfdfdf;
		}
		.add_chart:active, .stylebutton:active {
			position:relative;
			top:1px;
		}
		select {
			font-size: 10px;
		}
		#iepopup {
			position:		absolute;
			width:			810px;
			left: 			50%;
			margin:			150px 0 0 -405px;			
			background-color: 	#333333;
			border:			1px solid #FFFFFF;
			color:			#FFFFFF;
			font-family: 		font-family: "Lucida Grande", Arial, Helvetica, sans-serif;
			font-size: 		10px;
			font-style: 		normal;
			text-align:		center;	
			padding:		5px 10px 5px 10px;
			z-index:		1001;
		}

		#iepopup_bk {
		position: fixed;
		height: 100%;
		width: 100%;
		z-index: 1000;
		background-color: #000000;
		filter: alpha(opacity=80);
		-moz-opacity: 0.80;
		opacity: 0.80;
		}
</style>
</style>
</head>
<body class="home blog logged-in admin-bar no-customize-support single-author two-column right-sidebar">
<div id="page" class="hfeed">
	
	<div id="main">
		<div id="primary">
			<div id="content"  style="width: 85%" role="main">
					
	<article id="post-873" class="post-873 post type-post status-publish format-standard hentry category-video tag-corso-alto tag-corsoalto tag-e-commerce tag-ecommerce tag-fashion tag-italia tag-made-in-italy tag-milano tag-moda tag-negozio tag-on-line tag-pubblicita tag-regista tag-shop tag-videoclip">
		<header class="entry-header">
						<h1 class="entry-title">Pannello Amministrativo EShop</h1>
			
					</header><!-- .entry-header -->

				<div class="entry-content">
					<h2>Eventi</h2>
					<div id="event_list">
						<table cellspacing="3" cellpadding="0" border="1">
						<tr>
							<td><b>Id</b></td>
							<td><b>Titolo</b></td>
							<td><b>Listino</b></td>
							<td style="text-align: center;"><b>Costi Gestione</b></td>
							<td style="text-align: center;"><b>Stato</b></td>
							<td></td>
						</tr>
						<?	$optionEvents = CoreSystem::getEvents(); 
							$pricesList = CoreSystem::getPricesList();
							foreach($optionEvents as $key => $value) {
								echo "<tr><td style='vertical-align: middle;'>".$optionEvents[$key]['id']."</td><td style='vertical-align: middle;'>".$optionEvents[$key]['title']."</td>";
									 
								echo "<td style='vertical-align: middle;'>";
								echo "<select class='pricelist_change' evvalue='".$optionEvents[$key]['id']."'>\n";
									foreach($pricesList as $key2 => $value2) {
										if ($optionEvents[$key]['idprice'] == $pricesList[$key2]['id']) { $selected = 'selected'; } else { $selected = ''; }											
										echo "<option value='".$pricesList[$key2]['id']."' galvalue='".$optionEvents[$key]['id']."' ".$selected.">".$pricesList[$key2]['name']."</option>\n";
									}
								echo "</select>\n";
								echo "</td>";
								
								if ($optionEvents[$key]['is_gest'] == 1) { $checked = "checked"; } else { $checked = ""; }
								echo "<td style='vertical-align: middle; text-align: center;'><input type='checkbox' class='set_gest' data-userid='".$optionEvents[$key]['id']."' ".$checked."></td>\n";
									 
								echo "<td style='vertical-align: middle; text-align: center;'>\n";
								if ($optionEvents[$key]['active'] == 0) {
									echo "<img src='imgsys/delete.png' title='Listino Prezzi NON Attivo'>\n";
								} else {
									echo "<img src='imgsys/accept.png' title='Galleria Pubblicata'>\n";
								}
								echo "</td>";
							
								echo "<td style='vertical-align: middle;'><a href='#' class='del_event' data-userid=".$optionEvents[$key]['id']."><img src='../imgsys/cross.png' title='Elimina' alt='Elimina'></a></td>\n";
								echo "</tr>\n";
							}
						?>
						<tr>
							<td colspan="3"><input type='button' id='create_event' class='stylebutton' value='Crea Nuovo Evento'></td>
							<td colspan="3" style="text-align: right;"><input type='button' id='manage_prices' class='stylebutton' value='Gestisci Listino Prezzi'></td>
						</tr>					
						</table>						

					</div>
				
					<h2>Crea Nuova Galleria</h2>
						<table cellspacing=0 cellpadding=0 border=0>
							<tr>
								<td>Titolo Album</td>
								<td><input type="text" id="gallery_title" max="255">&nbsp;&nbsp;(es. "Foto Mare 2013")</td>
							</tr>
							<tr>
								<td>Nome Directory</td>
								<td><input type="text" id="gallery_dirname" max="255">&nbsp;&nbsp;(es. "20130826")</td>
							</tr>
							<tr>
								<td>Evento</td>
								<td><select id="gallery_event" style="font-size: 14px;">
										<option value="0" selected>Nessuno</option>
										<? 	foreach($optionEvents as $key => $value) {
												echo "<option value='".$optionEvents[$key]['id']."'>".$optionEvents[$key]['title']."</option>\n";
											}
										?>	
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="2"><input type="button" id="make_gallery" class='stylebutton' value="Crea Directory"></td>
							<tr>
						</table><br>

						<h2>Carica Files nel Database</h2>
						<div id="gallerylist">
							<table cellspacing=0 cellpadding=0 border=0>
							<tr>
								<th>Album</th>
								<th>Evento</th>
								<th>Nome Dir</th>
								<th>Pubblicazione</th>
								<th width="15%"></th>
							</tr>
							<?
								$galleryindex = CoreSystem::getGalleries();
								foreach($galleryindex as $key => $value) {
									echo "<tr>\n";
									echo "<td style='vertical-align: middle;'>".$galleryindex[$key]['description']."</td>\n";
									echo "<td style='vertical-align: middle;'>\n";

									echo "<select class='event_change' galvalue='".$galleryindex[$key]['id']."'>\n";
									echo "<option value='0'>Nessuno</option>";

										foreach($optionEvents as $key2 => $value2) {
											if ($galleryindex[$key]['event'] == $optionEvents[$key2]['id']) { $selected = 'selected'; } else { $selected = ''; }											
											echo "<option value='".$optionEvents[$key2]['id']."' galvalue='".$galleryindex[$key]['id']."' ".$selected.">".$optionEvents[$key2]['title']."</option>\n";
										}

									echo "</select>\n";
										

									echo "</td><td style='vertical-align: middle;'><b>".$galleryindex[$key]['dirname']."</b></td><td style='vertical-align: middle;'>".$galleryindex[$key]['time']."</td><td style='vertical-align: middle; width: 40px;'><a href='#' class='db_file_uploader' data-userid='".$galleryindex[$key]['id']."' data-userdir='".$galleryindex[$key]['dirname']."'><img src='imgsys/kthememgr.png' width='40' title='Caricamento Files sul DB'></a>&nbsp;<a href='#' class='delete_gallery' data-userid='".$galleryindex[$key]['id']."' data-userdir='".$galleryindex[$key]['dirname']."'><img src='imgsys/error.png' width='40' title='Cancella la Galleria'></a></td>\n";
									echo "</tr>\n";
								}

							?>
							</table>
						</div>

				</div><!-- .entry-content -->
	
	</article><!-- #post-873 -->	
			
			</div><!-- #content -->
		</div><!-- #primary -->		

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
			
			<div id="site-generator">
								<a href="http://wordpress.org/" title="Piattaforma semantica di editoria personale " rel="generator">&copy; Copyright 2015 Andreafusco.net  &bull; All Rights Reserved  &bull;</a>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- Element Extra -->

	<div id="dialog_event_create" title="Crea Nuovo Evento">
		<form id="form_event_create">
			<table cellspacing="0" cellpadding="0" border="0" style="font-size: 12px;">
				<tr><td>Titolo</td><td><input type="text" id="name" name="name"></td></tr>
				<tr><td style="vertical-align: top;">Note</td><td><textarea id="notes" name="notes" style="width: 400px; height: 200px; resize: none;"></textarea></td></tr>
			</table>
		</form>
	</div>
						
<!-- Element Extra End -->
		
</body>
</html>