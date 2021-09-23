<?php
/**
 * AndreaCantini.info : Photo Eshop Module
 * Copyright 2012-2013, Andrea Fusco (http://www.andreafusco.net)
 *
 * Licensed under Creative Commons By-Nc-Nd
 * Redistributions of files must retain the above copyright notice.
 *
 * @Copyright     Copyright 2013, Andrea Fusco (http://www.andreafusco.net)
 * @Info     	  http://www.andreafusco.net
 * @License       Creative Commons By-Nc-Nd (http://creativecommons.org/licenses/by-nc-nd/3.0/)
 * @File		  core.php
 * @Description	  Funzioni Generiche
 * @Version		  1.0.1
 * @Date		  2013-06-03
 * @LastUpdate	  2014-03-25
 * @ChangeLog	  2014-03-25 => added "events" field
*/

 class CoreSystem {

	public static function getEvents(){
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
		
		$mysqli->query("SET NAMES 'utf8'");
		
		$stmt = $mysqli->prepare("SELECT ev.id, ev.title, pr.id AS idprice, pr.name, pr.active, ev.is_gest FROM es_events ev INNER JOIN es_prices pr ON ev.idprice = pr.id");
		$stmt->execute();
		
		$meta = $stmt->result_metadata();

		while ($field = $meta->fetch_field()) {
		  $parameters[] = &$row[$field->name];
		}

		call_user_func_array(array($stmt, 'bind_result'), $parameters);

		$results = array();

		while ($stmt->fetch()) {
		  foreach($row as $key => $val) {
			$x[$key] = $val;
		  }
		  $results[] = $x;
		}
		return $results;		
	}
	
	public static function getGalleries(){
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
		
		$mysqli->query("SET NAMES 'utf8'");
		
		$stmt = $mysqli->prepare("SELECT id, event, dirname, description, DATE_FORMAT(createdate, \"%d/%m/%Y\") AS time FROM es_gallery ORDER BY time DESC");
		$stmt->execute();
		
		$meta = $stmt->result_metadata();

		while ($field = $meta->fetch_field()) {
		  $parameters[] = &$row[$field->name];
		}

		call_user_func_array(array($stmt, 'bind_result'), $parameters);

		$results = array();

		while ($stmt->fetch()) {
		  foreach($row as $key => $val) {
			$x[$key] = $val;
		  }
		  $results[] = $x;
		}
		return $results;		
	}	

	public static function insertGallery($title,$name,$event) {
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
		
		$mysqli->query("SET NAMES 'utf8'");
		
		$stmt = $mysqli->prepare("INSERT INTO es_gallery VALUES ('',?,?,?,NOW())");
		$stmt->bind_param('iss', $event, $name, $title);
		$stmt->execute();
		
	}

	public static function updateGalleryEvent($id,$event) {
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
				
		$stmt = $mysqli->prepare("UPDATE es_gallery SET event = ? WHERE id = ?");
		$stmt->bind_param('ii', $event, $id);
		$stmt->execute();
		
	}

	public static function insertGalleryEvent($title,$notes) {
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
		
		$mysqli->query("SET NAMES 'utf8'");
		
		$stmt = $mysqli->prepare("INSERT INTO es_events VALUES ('',?,?,NOW(),1,0)");
		$stmt->bind_param('ss', $title, $notes);
		$stmt->execute();
		
	}

	public static function deleteEvent($id) {
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
				
		$stmt = $mysqli->prepare("DELETE FROM es_events WHERE id = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		$stmt = $mysqli->prepare("UPDATE es_gallery SET event = 0 WHERE event = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();

	}

	public static function deleteGalleryFiles($id) {
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
				
		$stmt = $mysqli->prepare("DELETE FROM es_images WHERE gallery = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
	}

	public static function deleteGallery($id) {
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
				
		$stmt = $mysqli->prepare("DELETE FROM es_gallery WHERE id = ?");
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
	}

	public static function insertFile($gallery, $name) {
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}

		$mysqli->query("SET NAMES 'utf8'");
				
		$stmt = $mysqli->prepare("INSERT INTO es_images VALUES('',?,?,NOW());");
		$stmt->bind_param('is', $gallery, $name);
		$stmt->execute();
		
	}

	public static function deleteAll($directory, $empty) { 
		if(substr($directory,-1) == "/") { 
			$directory = substr($directory,0,-1); 
		} 

		if(!file_exists($directory) || !is_dir($directory)) { 
			return false; 
		} elseif(!is_readable($directory)) { 
			return false; 
		} else { 
			$directoryHandle = opendir($directory); 
			
			while ($contents = readdir($directoryHandle)) { 
				if($contents != '.' && $contents != '..') { 
					$path = $directory . "/" . $contents; 
					
					if(is_dir($path)) { 
						CoreSystem::deleteAll($path, true); 
					} else { 
						unlink($path); 
					} 
				} 
			} 
			
			closedir($directoryHandle); 

			if($empty == true) { 
				if(!rmdir($directory)) { 
					return false; 
				} 
			} 
			
			return true; 
		} 
	}

	public static function getPricesList(){
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
		
		$mysqli->query("SET NAMES 'utf8'");
		
		$stmt = $mysqli->prepare("SELECT id, name, note, price1, price1sc, price2, price2sc, price3, price3sc, price4, price4sc, price5, price5sc, price6, price6sc, active FROM es_prices");
		$stmt->execute();
		
		$meta = $stmt->result_metadata();

		while ($field = $meta->fetch_field()) {
		  $parameters[] = &$row[$field->name];
		}

		call_user_func_array(array($stmt, 'bind_result'), $parameters);

		$results = array();

		while ($stmt->fetch()) {
		  foreach($row as $key => $val) {
			$x[$key] = $val;
		  }
		  $results[] = $x;
		}
		return $results;		
	}
	
	public static function modifyListPrice($id,$element,$value){
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
		
		//Modifico i Dati
		if ($element == "name") {
			
			$stmt = $mysqli->prepare('UPDATE es_prices SET name = ? WHERE id = ?');
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			
		} else if ($element == "note") {
			
			$stmt = $mysqli->prepare('UPDATE es_prices SET note = ? WHERE id = ?');
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			
		} else if ($element == "price1") {
			
			$stmt = $mysqli->prepare('UPDATE es_prices SET price1 = ? WHERE id = ?');
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			
		} else if ($element == "price1sc") {
			
			$stmt = $mysqli->prepare('UPDATE es_prices SET price1sc = ? WHERE id = ?');
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			
		} else if ($element == "price2") {
			
			$stmt = $mysqli->prepare('UPDATE es_prices SET price2 = ? WHERE id = ?');
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			
		} else if ($element == "price2sc") {
			
			$stmt = $mysqli->prepare('UPDATE es_prices SET price2sc = ? WHERE id = ?');
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			
		} else if ($element == "price3") {
			
			$stmt = $mysqli->prepare('UPDATE es_prices SET price3 = ? WHERE id = ?');
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			
		} else if ($element == "price3sc") {
			
			$stmt = $mysqli->prepare('UPDATE es_prices SET price3sc = ? WHERE id = ?');
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			
		} else if ($element == "price4") {
			
			$stmt = $mysqli->prepare('UPDATE es_prices SET price4 = ? WHERE id = ?');
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			
		} else if ($element == "price4sc") {
			
			$stmt = $mysqli->prepare('UPDATE es_prices SET price4sc = ? WHERE id = ?');
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			
		} else if ($element == "price5") {
			
			$stmt = $mysqli->prepare('UPDATE es_prices SET price5 = ? WHERE id = ?');
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			
		} else if ($element == "price5sc") {
			
			$stmt = $mysqli->prepare('UPDATE es_prices SET price5sc = ? WHERE id = ?');
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			
		} else if ($element == "price6") {
			
			$stmt = $mysqli->prepare('UPDATE es_prices SET price6 = ? WHERE id = ?');
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			
		} else if ($element == "price6sc") {
			
			$stmt = $mysqli->prepare('UPDATE es_prices SET price6sc = ? WHERE id = ?');
			$stmt->bind_param('si', $value, $id);
			$stmt->execute();
			
		} 
			
	}
	
	public static function activateList($id,$value) {
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
		
		$stmt = $mysqli->prepare('UPDATE es_prices SET active = ? WHERE id = ?');
		$stmt->bind_param('si', $value, $id);
		$stmt->execute();

	}
	
	public static function setGestCost($id,$value) {
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
		
		$stmt = $mysqli->prepare('UPDATE es_events SET is_gest = ? WHERE id = ?');
		$stmt->bind_param('ii', $value, $id);
		$stmt->execute();

	}
	
	public static function newList() {
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
		
		$stmt = $mysqli->query("INSERT INTO es_prices VALUES('','Nuova Lista','','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00','0.00',0)");

	}
	
	public static function updatePricingEvent($id,$value) {
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
				
		$stmt = $mysqli->prepare("UPDATE es_events SET idprice = ? WHERE id = ?");
		$stmt->bind_param('ii', $value, $id);
		$stmt->execute();
		
	}
	
}
?>