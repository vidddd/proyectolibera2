<?php
opcache_reset();
require_once  '../vendor/autoload.php';
require_once  '../inc/config.php';
require_once  '../inc/db.class.php';
$db = new Database();
$parti = $db->getParticipaciones($_GET['es']);



	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=Organizadores.xls" );

	// print your data here. note the following:
	// - cells/columns are separated by tabs ("\t")
	// - rows are separated by newlines ("\n")
  echo 'Persona' . "\t" . 'Email' . "\t" . 'Telefono' . "\t" . 'Direccion' . "\t" . 'Organiza' . "\t" . 'Masinfo' . "\t" . 'Provincia' . "\t" . 'Lugar' . "\t" . 'Coordenadas' . "\t" . 'hora' . "\t" . 'Personas' . "\t" . 'comentarios' . "\n";
  foreach($parti as $pp) {
	   echo utf8_decode($pp["persona"]) . "\t" . $pp["email"]. "\t" . $pp["telefono"]. "\t" . utf8_decode($pp["direccion"]). "\t" . utf8_decode($pp["organiza"]). "\t" .$pp["masinfo"]. "\t" . $provincias[$pp["provincia"]] . "\t" . utf8_decode($pp["lugar"]). "\t". $pp["coordenadas"]. "\t" .     $pp["hora"]. "\t" . $pp["numerop"]. "\t" . preg_replace("/\r\n+|\r+|\n+|\t+/i", " ",utf8_decode($pp["comentarios"])). "\n";
  }
?>
