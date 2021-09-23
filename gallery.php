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
<script src="lib/eshop.js?v=130"></script>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Simple Photo EShop</title>
<link rel="shortcut icon" href="http://www.AndreaCantini.it/images/occhio.ico" type="image/vnd.microsoft.icon"/>
<link href="lib/jquery.fancybox.css" rel="stylesheet" />
<link href="jquery-ui.css" rel="stylesheet" type="text/css" />
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
<div id="iepopup" style="display: block;">Sto caricando l'EShop, si prega di attendere (la durata del caricamento pu&ograve; dipendere dalla velocit&agrave; della propria connessione).<br><br><img src="imgsys/loader.gif"></div>
<div id="iepopup_bk" style="display:block;"></div>
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
								<li id="menu-item-2677" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2615"><a href="http://www.andreacantini.photos/eshop/help.php">Aiuto</a></li>
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

				<?
					if (isset($_GET['id'])) {

						//Recupero le informazioni sulla Gallery
						$title = CoreSystem::isAlbum($_GET['id']);
				?>
				<header class="entry-header">
						<h1 class="entry-title"><?=$title['description']; ?></h1>						
			
					</header><!-- .entry-header -->

				<div class="entry-content">
				<p>					
					<div id="show_gallery">
					<?	//Recupero la Galleria
						if (isset($_GET['pgtot']) && isset($_GET['subpg']) && $_GET['subpg'] != 1) {
							$page_total = $_GET['pgtot'];
							$subpage = $_GET['subpg'];

							//Calcolo l'intervallo immagini da estrarre
							$limit = (($subpage - 1) * 30) + 1;
							$galleryimage = CoreSystem::getGalleryImages($_GET['id'],$limit,30);

						} else {
							$image_total = CoreSystem::countGalleryImages($_GET['id']);

							//Calcolo il numero di immagini totali
							if ($image_total % 30 > 0) {
								$page_total = intval(($image_total / 30) + 1);
							} else {
								$page_total = intval(($image_total / 30));
							}
							
							//Imposto la pagina attuale
							$subpage = 1;
							$galleryimage = CoreSystem::getGalleryImages($_GET['id'],30,0);

						}

						$totalfiles = count($galleryimage);
						$image = 1;
						
						if ($totalfiles > 0) {
							
							echo "Clicca sulle immagini per visualizzare la galleria interattiva.\n";
							echo "<table border=1 cellpadding=0 cellspacing=0>\n";
							echo "<tr>\n";

							foreach($galleryimage as $key => $value) {
								$name_ext = $galleryimage[$key]['imgname'].".jpg";
								$name_small_ext = $galleryimage[$key]['imgname']."_small.jpg";
							
								if (($image) % 3 == 0) {
									?>
										<td style="vertical-align: top;">
											<a href="images/<?=$galleryimage[$key]['idgal']; ?>/<?=$name_ext; ?>" class="fancybox" rel="gallery" title="<?=$galleryimage[$key]['imgname']; ?> - Foto di Andrea Cantini, Copyrights &copy 2016 AndreaCantini.it">
											<img src="images/<?=$galleryimage[$key]['idgal']; ?>/thumbs/<?=$name_small_ext; ?>" width="150"></a><br><br>
										</td>												
										<td style="vertical-align: top; font-size: 10px; text-align: center;">
											<input type="button" id="<?=$galleryimage[$key]['imgname']; ?>" class="add_chart" data-userid="<?=$name_ext; ?>" data-galid="<?=$galleryimage[$key]['idgal']; ?>" data-idprice="<?=$galleryimage[$key]['idprice']?>" data-gest="<?=$galleryimage[$key]['is_gest']?>" value="Aggiungi"><br>
											Quantit&agrave;<br>
											<input type="text" id="<?=$galleryimage[$key]['imgname']; ?>_qty" value="1" maxlengh="3" size="4">
											<br><br>
											Dimensione<br>
											<select id="<?=$galleryimage[$key]['imgname']; ?>_type">
												<option value="1">Digitale HD</option>
												<option value="2">10x15 cm.</option>
												<option value="3">12x18 cm.</option>
												<option value="4">15x23 cm.</option>
												<option value="5">20x30 cm.</option>
												<option value="6">30x45 cm.</option>
											</select><br><br>
											Nome<br>
											<b><?=$galleryimage[$key]['imgname']; ?></b>
										</td>
									</tr>
									<tr>
									<?
									$image++;										
								} else {
										?>
										<td style="vertical-align: top;">
											<a href="images/<?=$galleryimage[$key]['idgal']; ?>/<?=$name_ext; ?>" class="fancybox" rel="gallery" title="<?=$galleryimage[$key]['imgname']; ?> - Foto di Andrea Cantini, Copyrights &copy 2016 AndreaCantini.it">
											<img src="images/<?=$galleryimage[$key]['idgal']; ?>/thumbs/<?=$name_small_ext; ?>" width="150"></a><br><br>
										</td>												
										<td style="vertical-align: top; font-size: 10px; text-align: center;">
											<input type="button" id="<?=$galleryimage[$key]['imgname']; ?>" class="add_chart" data-userid="<?=$name_ext; ?>" data-galid="<?=$galleryimage[$key]['idgal']; ?>" data-idprice="<?=$galleryimage[$key]['idprice']?>" data-gest="<?=$galleryimage[$key]['is_gest']?>" value="Aggiungi"><br>
											Quantit&agrave;<br>
											<input type="text" id="<?=$galleryimage[$key]['imgname']; ?>_qty" value="1" maxlengh="3" size="4">
											<br><br>
											Dimensione<br>
											<select id="<?=$galleryimage[$key]['imgname']; ?>_type">
												<option value="1">Digitale HD</option>
												<option value="2">10x15 cm.</option>
												<option value="3">12x18 cm.</option>
												<option value="4">15x23 cm.</option>
												<option value="5">20x30 cm.</option>
												<option value="6">30x45 cm.</option>
											</select><br><br>
											Nome<br>
											<b><?=$galleryimage[$key]['imgname']; ?></b>
										</td>						
										<?
										$image++;
								}
														
							}
							echo "</tr></table>\n";
							echo "<table border=1 cellpadding=0 cellspacing=0>\n";
							echo "<tr><td align='center'>";
							if ($subpage > 1) { $pageprec = $subpage - 1; echo "<a href='gallery.php?id=".$_GET['id']."&pgtot=".$page_total."&subpg=".$pageprec."' title='Pagina Precedente'>&laquo;Precedente</a>"; }
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							if (($subpage == 1 || $subpage < $page_total) && $page_total > 1) { $pagesucc = $subpage + 1; echo "<a href='gallery.php?id=".$_GET['id']."&pgtot=".$page_total."&subpg=".$pagesucc."' title='Pagina Successiva'>Successivo&raquo;</a>"; }
							echo "</td><td align='right'>Pagina ".$subpage." di ".$page_total."&nbsp;</td></tr>\n";
							echo "</table>\n";

							
						} else {
							echo "Non ci sono files caricati nella Galleria\n";
						}
					} else {
						echo "Galleria non trovata.";
					}
					?>
					</div>
				</p>
				<a href="<? if (isset($_GET['pgtot'])) { echo "index.php"; } else { echo $_SERVER['HTTP_REFERER']; } ?>">Indietro</a>

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
						if ($_SESSION['eshop_discount']) { echo "<span style='color: red; font-size: 9px'>E' stato applicato lo sconto del 20% per ordini uguali o superiori a 5 foto</span><br><br>"; }
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