<?php
opcache_reset();
require_once  '../vendor/autoload.php';
require_once  '../inc/config.php';
require_once  '../inc/db.class.php';
$db = new Database();
$es = $_GET['es'];
if($es == '2') {
$parti = $db->getParticipaciones(2);

	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=Organizadores.xls" );

	// print your data here. note the following:
	// - cells/columns are separated by tabs ("\t")
	// - rows are separated by newlines ("\n")
  echo 'Persona' . "\t" . 'Email' . "\t" . 'Telefono' . "\t" . 'Direccion' . "\t" . 'Organiza' . "\t" . 'Masinfo' . "\t" . 'Provincia' . "\t" . 'Lugar' . "\t" . 'Coordenadas' . "\t" . 'hora' . "\t" . 'Personas' . "\t" . 'comentarios' . "\n";
  foreach($parti as $pp) {
	   echo utf8_decode($pp["persona"]) . "\t" . $pp["email"]. "\t" . $pp["telefono"]. "\t" . utf8_decode($pp["direccion"]). "\t" . utf8_decode($pp["organiza"]). "\t" .$pp["masinfo"]. "\t" . $provincias[$pp["provincia"]] . "\t" . utf8_decode($pp["lugar"]). "\t". $pp["coordenadas"]. "\t" .     $pp["hora"]. "\t" . $pp["numerop"]. "\t" . preg_replace("/\r\n+|\r+|\n+|\t+/i", " ",utf8_decode($pp["comentarios"])). "\n";
  }
} else if ($es == '3') {
    $personas = $db->getPersonas();
    
	header( "Content-Type: application/vnd.ms-excel" ); 
	header( "Content-disposition: attachment; filename=Participantes.xls" );

  echo 'Persona' . "\t" . 'Email' . "\t" . 'Telefono' . "\t" . 'Lugar' . "\t" . 'Personas' . "\t" . 'comentarios' . "\n";
  foreach($personas as $pp) {
	   echo utf8_decode($pp["persona"]) . "\t" . $pp["email"]. "\t" . $pp["telefono"]. "\t" . utf8_decode($pp["lugar"]). "\t"  . $pp["personas"]. "\t" . preg_replace("/\r\n+|\r+|\n+|\t+/i", " ",utf8_decode($pp["comentarios"])). "\n";
    }
  // DESCARGAR TODO
  } else if ($es == '9') {
   // $parti = $db->getParticipacionesTodo();
  /*      $parti = $db->getParticipaciones(2);

	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=Organizadores.xls" );

  echo 'Id' . "\t" . 'Persona' . "\t" . 'Email' . "\t" . 'Telefono' . "\t" . 'Direccion' . "\t" . 'Organiza' . "\t" . 'Masinfo' . "\t" . 'Provincia' . "\t" . 'Lugar' . "\t" . 'Coordenadas' . "\t" . 'hora' . "\t" . 'Personas' . "\t" . 'comentarios' . "\n";
  foreach($parti as $pp) {
	 echo $pp["id"] . "\t" .utf8_decode($pp["persona"]) . "\t" . $pp["email"]. "\t" . $pp["telefono"]. "\t" . utf8_decode($pp["direccion"]). "\t" . utf8_decode($pp["organiza"]). "\t" .$pp["masinfo"]. "\t" . $provincias[$pp["provincia"]] . "\t" . utf8_decode($pp["lugar"]). "\t". $pp["coordenadas"]. "\t" .     $pp["hora"]. "\t" . $pp["numerop"]. "\t" . preg_replace("/\r\n+|\r+|\n+|\t+/i", " ",utf8_decode($pp["comentarios"])). "\n";
  
            $personas = $db->getPersonas($pp['id']);
       // echo $personas[0]['paid'] . "\t" . $personas[0]['papersona'] . "\t" . $personas[0]['paemail'] . "\t" . $personas[0]['patelefono'] . "\t" . $personas[0]['padireccion'] . "\t" . $personas[0]['paorganiza'] . "\t" . $personas[0]['lugar']. "\t" . $personas[0]['pahora']. "\t" . $personas[0]['panumerop']. "\n";
       // echo 'Persona' . "\t" . 'Email' . "\t" . 'Telefono' . "\t" . 'Lugar' . "\t" . 'Personas' . "\t" . 'comentarios' . "\n";

        foreach($personas as $pp) {
                 echo " ". "\t" .utf8_decode($pp["persona"]) . "\t" . $pp["email"]. "\t" . $pp["telefono"]. "\t" . utf8_decode($pp["lugar"]). "\t"  . $pp["personas"]. "\t" . preg_replace("/\r\n+|\r+|\n+|\t+/i", " ",utf8_decode($pp["comentarios"])). "\n";
          } 
    echo '' . "\t" . '' . "\t" . '' . "\t" . '' . "\t" . '' . "\t" . '' . "\t" . '' . "\t" . '' . "\t" . '' . "\t" . '' . "\t" . '' . "\t" . '' . "\t" . '' . "\n";
   }*/
          $personas = $db->getPersonas();
    // print_r($personas); die;
	header( "Content-Type: application/vnd.ms-excel" ); 
	header( "Content-disposition: attachment; filename=Participantes.xls" );
   // echo $personas[0]['paid'] . "\t" . $personas[0]['papersona'] . "\t" . $personas[0]['paemail'] . "\t" . $personas[0]['patelefono'] . "\t" . $personas[0]['padireccion'] . "\t" . $personas[0]['paorganiza'] . "\t" . $personas[0]['lugar']. "\t" . $personas[0]['pahora']. "\t" . $personas[0]['panumerop']. "\n";
  echo 'Id Organizacion' . "\t" .'Participante' . "\t" . 'Email' . "\t" . 'Telefono' . "\t" . 'Lugar' . "\t" . 'Personas' . "\t" . 'comentarios' . "\n";
  
  foreach($personas as $pp) {
	   echo $pp["paid"]. "\t" . utf8_decode($pp["persona"]) . "\t" . $pp["email"]. "\t" . $pp["telefono"]. "\t" . utf8_decode($pp["lugar"]). "\t"  . $pp["personas"]. "\t" . preg_replace("/\r\n+|\r+|\n+|\t+/i", " ",utf8_decode($pp["comentarios"])). "\n";
    }
   
  } else if ($es == '6') {
    $personas = $db->getPersonas($_GET['id']);
    $personas = rsort($personas);
    // print_r($personas); die;
	header( "Content-Type: application/vnd.ms-excel" ); 
	header( "Content-disposition: attachment; filename=Participantes.xls" );
    echo $personas[0]['paid'] . "\t" . $personas[0]['papersona'] . "\t" . $personas[0]['paemail'] . "\t" . $personas[0]['patelefono'] . "\t" . $personas[0]['padireccion'] . "\t" . $personas[0]['paorganiza'] . "\t" . $personas[0]['lugar']. "\t" . $personas[0]['pahora']. "\t" . $personas[0]['panumerop']. "\n";
  echo 'Persona' . "\t" . 'Email' . "\t" . 'Telefono' . "\t" . 'Lugar' . "\t" . 'Personas' . "\t" . 'comentarios' . "\n";
  
  foreach($personas as $pp) {
	   echo utf8_decode($pp["persona"]) . "\t" . $pp["email"]. "\t" . $pp["telefono"]. "\t" . utf8_decode($pp["lugar"]). "\t"  . $pp["personas"]. "\t" . preg_replace("/\r\n+|\r+|\n+|\t+/i", " ",utf8_decode($pp["comentarios"])). "\n";
    }
  } else if ($es == '5') {
    $por = $db->getPorlibres();
    
	header( "Content-Type: application/vnd.ms-excel" ); 
	header( "Content-disposition: attachment; filename=Porlibre.xls" );

  echo 'Persona' . "\t" . 'Email' . "\n";
  foreach($por as $pp) {
	   echo utf8_decode($pp["persona"]) . "\t" . $pp["email"]. "\n";
    }
}
?>
