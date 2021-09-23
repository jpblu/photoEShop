<html>
<head>
	<title>AndreaCantini.photos - Archivio Files</title>
	<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.3/css/jquery.dataTables.css">
	  
	<!-- jQuery -->
	<script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	  
	<!-- DataTables -->
	<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.3/js/jquery.dataTables.js"></script>

	<script>
		$(document).ready(function(){
		    $('#table_list').DataTable({"order": [[ 0, "desc" ]]});
		});
	</script>
</head>
<body style='font-family: Verdana; font-size: 14px;'>
<div id='head'>
	<div style="float: right; width: 30%;">
		<img src="../imgsys/logo_ordine.png" border="0">
	</div>
	<div style="float: left; width: 70%;">
		<p>Per scaricare un file premere sul tasto Scarica oppure cliccare con il tasto destro del mouse e selezionare "Salva file con nome...".</p>
		<table style='border: 0; width: 100%; font-size: 14px;' id='table_list'>
		<thead>
			<tr style='background: #2A526E; color: #FFFFFF;'><td align='center' colspan='3'>Lista dei Files Disponibili</td></tr>
			<tr style='text-align: center; background: #B5C6D2;'><td>Nome</td><td></td></tr>
		</thead>
		<tbody>
		<?php 
		if ($handle = opendir('.')) {
			while (false !== ($file = readdir($handle))) { 
				if ($file != "." && $file != ".." && $file != "index.php") { 
					echo "<tr style='background: #E9E9E9;'><td>".$file."</td><td><a href='".$file."' target='_blank'>Scarica</a></td></tr>\n";
				} 
			}
			closedir($handle); 
		}
		?>
		</tbody>
		</table>
	</div>
</body>
</html>