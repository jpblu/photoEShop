<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it-IT" lang="it-IT">
<head>
<?	session_start(); ?>
<script src="lib/jquery-1.8.2.min.js"></script>
<script src="lib/jquery-ui-1.9.2.min.js"></script>
<script src="lib/jquery.validate.min.js"></script>
<script src="lib/eshop_process.js"></script>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Simple Photo EShop</title>
<link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon"/>
<link href="jquery-ui.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
<link rel='stylesheet' id='be-themes-layout-css'  href='http://www.andreacantini.photos/wp-content/themes/namo/css/layout.css?ver=4.1.4' type='text/css' media='all' />
<link rel='stylesheet' id='be-themes-shortcodes-css'  href='http://www.andreacantini.photos/wp-content/themes/namo/css/shortcodes.css?ver=4.1.4' type='text/css' media='all' />
<link rel='stylesheet' id='be-themes-css-css'  href='http://www.andreacantini.photos/wp-admin/admin-ajax.php?action=be_themes_options_css&#038;ver=4.1.4' type='text/css' media='all' />
<link rel='stylesheet' id='fontello-css'  href='http://www.andreacantini.photos/wp-content/themes/namo/fonts/fontello/be-themes.css?ver=4.1.4' type='text/css' media='all' />
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
		input.error{
			border: 1px dotted red;
		}
		label.error {
			color: red;
			font-style: italic;
			font-size: 10px;
		}
		.stylebutton {
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
</head>
<body class="home blog logged-in admin-bar no-customize-support single-author two-column right-sidebar">
<div id="page" class="hfeed">
	<header style="background: #000000;">
		<div id="header-inner-wrap" class="" >
			<div id="header-wrap" class="be-wrap clearfix" data-default-height="84" data-sticky-height="64">
					<div id="logo">
							<a href="http://www.andreafusco.net"><img class="normal-logo" src="imgsys/logo.jpg" alt="" /></a>
					</div>
					<nav id="navigation" class="clearfix">	
						<div class="menu left">
							<ul id="menu" class="clearfix">
								<li id="menu-item-103" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-103"><a href="http://www.andreacantini.photos/portfolio/">Portfolio</a></li>
								<li id="menu-item-2673" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2673"><a href="http://www.andreacantini.photos/su-di-me/">Su di me</a></li>
								<li id="menu-item-2615" class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-2615"><a href="http://www.andreacantini.photos/contatti/">Contatti</a></li>
								<li id="menu-item-2677" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2483 current_page_item menu-item-2615"><a href="http://www.andreacantini.photos/eshop/">Eshop</a></li>
								<li id="menu-item-2677" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-2483 current_page_item menu-item-2615"><a href="http://www.andreacantini.photos/eshop/help.php">Aiuto</a></li>
							</ul>
						</div>
					</nav><!-- End Navigation -->
			</div>
	</div>
										
	</header><!-- #branding -->


	<div id="main">
		<div id="primary">
			<div id="content" role="main">					
				<div class="entry-content">
				<p>
					<div id="process_order">
					<?	if (isset($_SESSION['eshop_order']) && count($_SESSION['eshop_order']) > 0) {
							//Visualizzo la pagina di Riepilogo dell'Ordine
							echo "<h2>RIEPILOGO DELLE CONDIZIONI DI VENDITA</h2>";
							echo "<ul>\n";
							echo "<li>Una volta inviato l'ordine attraverso il sito riceverete le foto richieste all'indirizzo email specificato. E' necessario inserire un indirizzo email <b>valido</b> al fine di consentire la corretta evasione.</li>\n";
							echo "<li>Le informazioni inserite tramite il modulo sottostante verranno utilizzate soltanto ai fini dell'evasione dell'ordine e non saranno archiviate in registri elettronici, comunicate a Terzi o utilizzate per fini commerciali nel pieno rispetto del <i>Codice in Materia di Protezione dei Dati Personali</i>, d.lgs. 30 giugno 2003.</li>\n";
							echo "<li><i>AndreaCantini.photos</i> non &egrave; responsabile di eventuali comunicazioni errate dei dati personali che non consentano la corretta evasione degli ordini richiesti.</li>\n";
							echo "<li>E' possibile pagare tramite Bonifico Bancario sul Conto Corrente indicato nella mail di conferma dell'ordine oppure tramite sistema certificato PayPal e Carta di Credito.</li>\n";
							echo "</ul>\n";
							echo "<h2>INFORMAZIONI PERSONALI</h2><br>";
							echo "<form id='process_shop'>\n";
							echo "<table cellspan='0' colspan='0' border='0'>\n";
							echo "<tr><td>Email</td><td><input type='text' id='email' name='email' maxlength='255'></td></tr>\n";
							echo "<tr><td>Nome</td><td><input type='text' id='name' name='name' maxlength='255'></td></tr>\n";
							echo "<tr><td>Cognome</td><td><input type='text' id='surname' name='surname' maxlength='255'></td></tr>\n";
							echo "<tr><td>Telefono</td><td><input type='text' id='phone' name='phone' maxlength='255'></td></tr>\n";
							echo "<tr><td>Indirizzo</td><td><input type='text' id='address' name='address' maxlength='255'></td></tr>\n";
							echo "<tr><td>Citt&agrave;</td><td><input type='text' id='city' name='city' maxlength='255'></td></tr>\n";
							echo "<tr><td>CAP</td><td><input type='text' id='cap' name='cap' maxlength='5'></td></tr>\n";
							echo "<tr><td>Stato</td><td><select id='state' name='state'><option value='IT' selected>Italia</option></td></tr>\n";
							echo "<tr><td>Pagamento</td><td><select id='paymode' name='paymode'><option value='1' selected>Bonifico Bancario</option><option value='2'>PayPal o Carta di Credito</option></select></td></tr>\n";
							//echo "<tr><td>Desidero la consegna dei provini Digitali su CD (costo aggiuntivo di 5 &euro;)</td><td><input type='checkbox' class='checkbox' id='digitalcd' name='digitalcd'></td></tr>\n";
							echo "<tr><td colspan='2'></td></tr>";
							echo "<tr><td colspan='2'><input type='button' id='button_process' class='stylebutton' value='Conferma i Dati Personali'></td></tr>\n";
							echo "</table></form>\n";
						} else {
							echo "PAGE ERROR";
						}
					?>
					</div>
				</p>

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