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
<script src="lib/jqueryui-editable.min.js"></script>
<script src="lib/pricing.js"></script>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>EShop - AndreaCantini.it | Amministrazione Eshop</title>
<link rel="shortcut icon" href="http://www.AndreaCantini.it/images/occhio.ico" type="image/vnd.microsoft.icon"/>
<link href="../jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="css/jqueryui-editable.css" rel="stylesheet" type="text/css" />
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
			<div id="content" style="width: 85%" role="main">
					
	<article id="post-873" class="post-873 post type-post status-publish format-standard hentry category-video tag-corso-alto tag-corsoalto tag-e-commerce tag-ecommerce tag-fashion tag-italia tag-made-in-italy tag-milano tag-moda tag-negozio tag-on-line tag-pubblicita tag-regista tag-shop tag-videoclip">
		<header class="entry-header">
						<h1 class="entry-title">Pannello Amministrativo EShop</h1>
			
					</header><!-- .entry-header -->

				<div class="entry-content">
					<h2>Gestione Listini Prezzi</h2>
					<div id="event_list">
						<table cellspacing="3" cellpadding="0" width="100%" >
						<tr>
							<th width="15%" style="text-align: center;">Nome</th>
							<th width="20%" style="border-left: 1px solid #ddd; text-align: center;">Descrizione</th>
							<th width="5%" style="border-left: 1px solid #ddd; text-align: center;">HD</th>
							<th width="5%" style="border-left: 1px solid #ddd; text-align: center;">HD Sconto</th>
							<th width="5%" style="border-left: 1px solid #ddd; text-align: center;">10x15</th>
							<th width="5%" style="border-left: 1px solid #ddd; text-align: center;">10x15 Sconto</th>
							<th width="5%" style="border-left: 1px solid #ddd; text-align: center;">12x18</th>
							<th width="5%" style="border-left: 1px solid #ddd; text-align: center;">12x18 Sconto</th>
							<th width="5%" style="border-left: 1px solid #ddd; text-align: center;">15x23</th>
							<th width="5%" style="border-left: 1px solid #ddd; text-align: center;">15x23 Sconto</th>
							<th width="5%" style="border-left: 1px solid #ddd; text-align: center;">20x30</th>
							<th width="5%" style="border-left: 1px solid #ddd; text-align: center;">20x30 Sconto</th>
							<th width="5%" style="border-left: 1px solid #ddd; text-align: center;">30x45</th>
							<th width="5%" style="border-left: 1px solid #ddd; text-align: center;">30x45 Sconto</th>
							<th width="5%" style="border-left: 1px solid #ddd; text-align: center;"></th>
						</tr>

						<?	$pricelist = CoreSystem::getPricesList();
							foreach($pricelist as $key => $value) {
								echo "<tr>\n";
								echo "<td class='name' data-pk='".$pricelist[$key]['id']."' data-name='name' style='border-left: 1px solid #ddd; text-align: center;'>".$pricelist[$key]['name']."</td>\n";
								echo "<td class='note' data-pk='".$pricelist[$key]['id']."' data-name='note' style='border-left: 1px solid #ddd; text-align: center;'>".$pricelist[$key]['note']."</td>\n";
								echo "<td class='price1' data-pk='".$pricelist[$key]['id']."' data-name='price1' style='border-left: 1px solid #ddd; text-align: center;'>".$pricelist[$key]['price1']."</td>\n";
								echo "<td class='price1sc' data-pk='".$pricelist[$key]['id']."' data-name='price1sc' style='border-left: 1px solid #ddd; text-align: center;'>".$pricelist[$key]['price1sc']."</td>\n";
								echo "<td class='price2' data-pk='".$pricelist[$key]['id']."' data-name='price2' style='border-left: 1px solid #ddd; text-align: center;'>".$pricelist[$key]['price2']."</td>\n";
								echo "<td class='price2sc' data-pk='".$pricelist[$key]['id']."' data-name='price2sc' style='border-left: 1px solid #ddd; text-align: center;'>".$pricelist[$key]['price2sc']."</td>\n";
								echo "<td class='price3' data-pk='".$pricelist[$key]['id']."' data-name='price3' style='border-left: 1px solid #ddd; text-align: center;'>".$pricelist[$key]['price3']."</td>\n";
								echo "<td class='price3sc' data-pk='".$pricelist[$key]['id']."' data-name='price3sc' style='border-left: 1px solid #ddd; text-align: center;'>".$pricelist[$key]['price3sc']."</td>\n";
								echo "<td class='price4' data-pk='".$pricelist[$key]['id']."' data-name='price4' style='border-left: 1px solid #ddd; text-align: center;'>".$pricelist[$key]['price4']."</td>\n";
								echo "<td class='price4sc' data-pk='".$pricelist[$key]['id']."' data-name='price4sc' style='border-left: 1px solid #ddd; text-align: center;'>".$pricelist[$key]['price4sc']."</td>\n";
								echo "<td class='price5' data-pk='".$pricelist[$key]['id']."' data-name='price5' style='border-left: 1px solid #ddd; text-align: center;'>".$pricelist[$key]['price5']."</td>\n";
								echo "<td class='price5sc' data-pk='".$pricelist[$key]['id']."' data-name='price5sc' style='border-left: 1px solid #ddd; text-align: center;'>".$pricelist[$key]['price5sc']."</td>\n";
								echo "<td class='price6' data-pk='".$pricelist[$key]['id']."' data-name='price6' style='border-left: 1px solid #ddd; text-align: center;'>".$pricelist[$key]['price6']."</td>\n";
								echo "<td class='price6sc' data-pk='".$pricelist[$key]['id']."' data-name='price6sc' style='border-left: 1px solid #ddd; text-align: center;'>".$pricelist[$key]['price6sc']."</td>\n";
								echo "<td style='border-left: 1px solid #ddd; text-align: center;'>\n";
									if ($pricelist[$key]['active'] == 0 && $pricelist[$key]['id'] != 1) {
										echo "<img src='imgsys/delete.png' class='active_list' data-id='".$pricelist[$key]['id']."' title='Abilita' style='cursor: pointer;'>\n";
									} else if ($pricelist[$key]['active'] == 1 && $pricelist[$key]['id'] != 1) {
										echo "<img src='imgsys/accept.png' class='disable_list' data-id='".$pricelist[$key]['id']."' title='Disabilita' style='cursor: pointer;'>\n";
									}
								echo "</td>\n";
								echo "</tr>\n";
						}	
						
						?>
						<tr>
							<td colspan="15">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="7"><input type='button' id='create_new_list' class='stylebutton' value='Crea Nuovo Listino'></td>
							<td colspan="8" align="right"><input type='button' id='back_to_home' class='stylebutton' value='Torna alla Home'></td>
						</tr>					
						</table>	

						<p><b>Note di Utilizzo</b></p>
						<p style='font-size: 11px;'>- Per creare un nuovo listino prezzi cliccare su "Crea Nuovo Listino", sarà inserita una riga nuova da modificare<br>
						   - E' possibile modificare ogni singolo campo cliccandoci sopra, si aprirà una piccola finestra in cui inserire la modifica di testo o prezzo<br>
						   - I campi di prezzo NON possono assumere valori non numerici<br>
						   - Una volta assegnati i prezzi è possibile attivare il nuovo listino cliccando sull'icona <img src='imgsys/delete.png'>. In egual modo è possibile disattivare il listino cliccando sull'icona <img src='imgsys/accept.png'>.<br>
						   - Nella schermata principale, attraverso il menù a tendina è possibile assegnare un listino prezzi a un evento specifico<br>
						   - ATTENZIONE: non è possibile cancellare il listino di default<br>
						   - ATTENZIONE: ad ogni nuovo evento creato viene assegnato il listino di default<br>
						   - ATTENZIONE: se viene disabilitato un listino che è assegnato a un evento, questo evento verrà automaticamente disabilitato. Riabilitare l'evento attivando il listino o modificando i listino con uno attivo.
						</p>

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
		
</body>
</html>