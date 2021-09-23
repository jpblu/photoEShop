<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb">
<head>
<?	session_start();
	include('config/db_config.php');
	include('lib/core.php');
?>
<script src="lib/jquery-1.8.2.min.js"></script>
<script src="lib/jquery-ui-1.9.2.min.js"></script>
<script src="lib/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="lib/jquery.fancybox-thumbs.js"></script>
<script src="lib/jquery.paginate.js"></script>
<script src="lib/index.js"></script>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Simple Photo EShop</title>
<link rel="shortcut icon" href="../images/occhio.ico" type="image/vnd.microsoft.icon"/>
<link href="lib/jquery.fancybox.css" rel="stylesheet" />
<link href="jquery-ui.css" rel="stylesheet" type="text/css" />
<link href='lib/jquery.paginate.css' rel='stylesheet' />
<link rel="stylesheet" href="lib/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
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
					
	<article id="post-873" class="post-873 post type-post status-publish format-standard">
		<header class="entry-header">
						<h1 class="entry-title">Simple Photo EShop</h1>
											
					</header><!-- .entry-header -->

				<div class="entry-content">
				<p>
					<?	if (isset($_GET['id'])) {
							$eventnote = CoreSystem::getEventNote($_GET['id']);
							echo "<h2>".$eventnote['title']."</h2>\n";
							//echo $eventnote['notes'];
							echo "<br><br>\n";
					?>
					<table cellspacing=0 cellpadding=0 border=0>
					<tr>
						<th>Album</th>
						<th>Pubblicazione</th>
						<th></th>
					</tr>
					<?						
							$galleryindex = CoreSystem::getGalleries($_GET['id']);
							foreach($galleryindex as $key => $value) {
								echo "<tr>\n";
								echo "<td style='vertical-align: middle;'><b>".$galleryindex[$key]['description']."</td><td style='vertical-align: middle;'>".$galleryindex[$key]['time']."</b></td><td style='vertical-align: middle;'><a href='gallery.php?id=".$galleryindex[$key]['id']."'><img src='imgsys/gallery.png' width='40' title='Visualizza la Galleria'></a></td>\n";
								echo "</tr>\n";
							}
							echo "</table>\n";
						} else {
							echo "Evento non trovato.\n";
						}
					?>
				</p>
				<a href="<? if (strpos($_SERVER['HTTP_REFERER'],'gallery') !== false) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Indietro</a>

					</div><!-- .entry-content -->
	
	</article><!-- #post-873 -->	
			
			</div><!-- #content -->
		</div><!-- #primary -->

		<div id="secondary" class="widget-area" role="complementary">

			<div id="evidence">
				ACQUISTANDO ALMENO 10 FOTO SI AVRA' DIRITTO AD UNO SCONTO SULL'INTERO ORDINE!
			</div>
			<br>
			<aside id="recent-posts-2" class="widget widget_recent_entries">
				<h3 class="widget-title">Carrello</h3>
				<div id="shop_order">
				<?
					if (isset($_SESSION['eshop_order']) && count($_SESSION['eshop_order']) > 0) {
						$tot = 0;
						echo "<table cellspacing=3 cellpadding=0 border=1 width=200>";
						echo "<tr><td><b>QTY</b></td><td><b>DESCRIZIONE</b></td><td><b>PREZZO</b></td><td></td></tr>";
						foreach($_SESSION['eshop_order'] as $key => $value) {
							echo "<tr>\n";
							echo "<td>".$_SESSION['eshop_order'][$key]['qty']."</td>";
							echo "<td>".$_SESSION['eshop_order'][$key]['desc']."</td>";
							if ($_SESSION['eshop_discount']) { echo "<td><span style='color: red'>".$_SESSION['eshop_order'][$key]['price']." &euro;</span></td>";	} else { echo "<td>".$_SESSION['eshop_order'][$key]['price']." &euro;</td>"; }
							echo "<td><a href='#' class='del_chart' data-userid=".$_SESSION['eshop_order'][$key]['id']." data-idprice=".$_SESSION['eshop_order'][$key]['idprice']."><img src=\"imgsys/cross.png\" title='Elimina' alt='Elimina'></a></td>";
							echo "</tr>\n";
							$tot = $tot + $_SESSION['eshop_order'][$key]['price'];
						}
						echo "</table>";						
						echo "<hr>\n";
						echo "Totale: ".$tot." &euro;<br>";
						if ($_SESSION['eshop_discount']) { echo "<span style='color: red; font-size: 9px'>E' stato applicato lo sconto per ordini uguali o superiori a 10 foto</span><br><br>"; }
						echo "<input type='button' id='send_order' class='stylebutton' data-userid=".$_SESSION['eshop_order'][$key]['id']." value='Procedi'>&nbsp;&nbsp;<input type='button' id='drop_chart' class='stylebutton' value='Svuota'>\n";
					} else {
						echo "<table cellspacing=3 cellpadding=0 border=1 width=200>";
						echo "<tr><td><b>QTY</b></td><td><b>DESCRIZIONE</b></td><td><b>PREZZO</b></td><td></td></tr>";						
						echo "</table>";
						echo "<hr>\n";
						echo "Totale: 0 &euro;";
					}
				?>
					<div id="dialog_del" style="display: none;">Sei sicuro di voler cancellare tutti gli elementi del Carrello?</div>
				<div>				
			</aside>
		</div><!-- #secondary .widget-area -->

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
			
			<div id="site-generator">
								<a href="http://wordpress.org/" title="Piattaforma semantica di editoria personale " rel="generator">&copy; Copyright 2015 Andreafusco.net  &bull; All Rights Reserved  &bull;</a>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
		
</body>
</html>