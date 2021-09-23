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
 * @Version		  1.3.0
 * @LastUpdate	  2014-03-28
 * @ChangeLog	  2014-03-25 => added "events" field
 * @ChangeLog	  2014-03-28 => added multipage gallery view
 * @ChangeLog	  2017-05-23 => added multiprincing event list
 */

 class CoreSystem {
	
	public static function getEvents(){
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
		
		$mysqli->query("SET NAMES 'utf8'");
		
		$stmt = $mysqli->prepare("SELECT ev.id, ev.title, DATE_FORMAT(ev.createdate, \"%d/%m/%Y\") AS time, ev.notes FROM es_events ev INNER JOIN es_prices pr ON ev.idprice = pr.id WHERE ev.id IN (SELECT DISTINCT event FROM es_gallery) AND pr.active = 1 ORDER BY time desc");
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

	public static function getEventNote($id) {
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}

		$mysqli->query("SET NAMES 'utf8'");
				
		$stmt = $mysqli->query('SELECT title,id AS notes FROM es_events WHERE id='.$id);
		//$stmt = $mysqli->query('SELECT title,notes FROM es_events WHERE id='.$id);
		$row = $stmt->fetch_assoc();
		
		return $row;		
	}

	public static function getGalleries($id){
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
		
		$mysqli->query("SET NAMES 'utf8'");
		
		$stmt = $mysqli->prepare("SELECT id,event,dirname,description, DATE_FORMAT(createdate, \"%d/%m/%Y\") AS time FROM es_gallery WHERE event = ? ORDER BY createdate DESC");
		$stmt->bind_param('i', $id);
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

	public static function getGalleryImages($id, $limit, $range){
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}

		if ($limit == 0) { 
			$lines = ""; 
		} else if ($limit != 0 && $range == 0){
			$lines = " LIMIT ".$limit;
		} else {
			$lines = " LIMIT ".$limit.",".$range;
		}
		
		$mysqli->query("SET NAMES 'utf8'");
		
		$stmt = $mysqli->prepare("SELECT im.id, im.gallery, im.imgname, ga.dirname AS idgal, ev.idprice, ev.is_gest FROM es_images im JOIN es_gallery ga ON im.gallery = ga.id INNER JOIN es_events ev ON ga.event = ev.id WHERE im.gallery = ? ORDER BY im.id".$lines);
		$stmt->bind_param('i', $id);
		$stmt->execute();
		
		$meta = $stmt->result_metadata();

		$results = array();

		while ($field = $meta->fetch_field()) {
		  $parameters[] = &$row[$field->name];
		}

		call_user_func_array(array($stmt, 'bind_result'), $parameters);

		while ($stmt->fetch()) {
		  foreach($row as $key => $val) {
			$x[$key] = $val;
		  }
		  $results[] = $x;
		}
		return $results;		
	}
		
	public static function countGalleryImages($id) {
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
		
		$mysqli->query("SET NAMES 'utf8'");
		
		$stmt = $mysqli->query("SELECT count(*) as total FROM es_images WHERE gallery=".$id);
		$row = $stmt->fetch_assoc();
		
		return $row['total'];

	}

	public static function isAlbum($args){
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
		
		$mysqli->query("SET NAMES 'utf8'");
		
		$stmt = $mysqli->prepare('SELECT description FROM es_gallery WHERE id = ?');
		$stmt->bind_param('i', $args);
		$stmt->execute();
		
		$meta = $stmt->result_metadata();

		while ($field = $meta->fetch_field()) {
		  $parameters[] = &$row[$field->name];
		}

		call_user_func_array(array($stmt, 'bind_result'), $parameters);

		while ($stmt->fetch()) {
		  foreach($row as $key => $val) {
			$x[$key] = $val;
		  }
		  $results[] = $x;
		}
		return $results[0];
	
	}
	
	public static function getPrices($idprice, $discount){
		$mysqli = new mysqli(GlobalConfig::$dbconnect['host'], GlobalConfig::$dbconnect['user'], GlobalConfig::$dbconnect['pswd'], GlobalConfig::$dbconnect['name']);
		
		if (mysqli_connect_errno()) {
			echo "Errore in connessione al DB: ".mysqli_connect_error();
			exit();
		}
		
		$mysqli->query("SET NAMES 'utf8'");
		
		if ($discount == 0) {
			$stmt = $mysqli->prepare('SELECT price1 AS "1", price2 AS "2", price3 AS "3", price4 AS "4", price5 AS "5", price6 AS "6" FROM es_prices WHERE active = 1 AND id = ?');
		} else {
			$stmt = $mysqli->prepare('SELECT price1sc AS "1", price2sc AS "2", price3sc AS "3", price4sc AS "4", price5sc AS "5", price6sc AS "6" FROM es_prices WHERE active = 1 AND id = ?');			
		}
		$stmt->bind_param('i', $idprice);
		$stmt->execute();
		
		$meta = $stmt->result_metadata();

		while ($field = $meta->fetch_field()) {
		  $parameters[] = &$row[$field->name];
		}

		call_user_func_array(array($stmt, 'bind_result'), $parameters);

		while ($stmt->fetch()) {
		  foreach($row as $key => $val) {
			$x[$key] = $val;
		  }
		  $results[] = $x;
		}
		return $results[0];
	
	}

}
?>