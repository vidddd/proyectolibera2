<?php
//session_start();
opcache_reset();
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_erros', 'On');

require_once  '../vendor/autoload.php';
require_once  '../inc/config.php';
require_once  '../inc/db.class.php';
$loader = new Twig_Loader_Filesystem('templates/');
$twig = new Twig_Environment($loader, array("cache" => false));
$db = new Database();
if($_GET['par']) $es = $_GET['par']; else $es = 1;
$parti = null;

if($_POST){
    if($_GET['guarda'] == '1') {
        $persona = $_POST['persona'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $organiza = $_POST['organiza'];
        $masinfo = $_POST['masinfo'];
        $provincia = $_POST['provincia'];
        $lugar = $_POST['lugar'];
        $location = $_POST['coordenadas'];
        $hora = $_POST['hora'];
        $numerop = $_POST['numerop'];
        $comentarios = $_POST['comentarios'];
        $id = $_POST['id'];
        $es = $_POST['par'];
        $db->updateParticipacion($id, $persona, $email, $telefono, $direccion, $organiza, $masinfo, $provincia, $lugar, $location, $hora, $numerop, $comentarios);
        header("Location: index.php?par=".$es);
    } else if ($_GET['guarda'] == '2') {
        
        $persona = $_POST['persona'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $personas = $_POST['personas'];
        $comentarios = $_POST['comentarios'];
        $id = $_POST['id'];
        $lugarid = $_POST['lugarid'];
        $db->updatePersona($id, $persona, $email, $telefono, $personas, $comentarios);
                header("Location: index.php?par=6&id=".$lugarid);
    }
    else if ($_GET['guarda'] == '3') {
        
        $persona = $_POST['persona'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        $es = $_POST['par'];
        $db->updatePorlibre($id, $persona, $email);
                header("Location: index.php?par=".$es);
    }
 
} // EDICION DE ORGANIZADORES
else if($_GET['edit'] == 1) {

  $id = $_GET['id'];
  $paticipacion = $db->getParticipacion($id);
  echo $twig->render('edit.html', array( "provincias" => $provincias, "participacion" => $paticipacion[0], "es" => $es));

 } // EDICION DE PARTICIPANTES
else if($_GET['edit'] == 2) {
    
  $id = $_GET['id'];
  $paticipacion = $db->getPersonaId($id);
  echo $twig->render('edit-personas.html', array( "provincias" => $provincias, "participacion" => $paticipacion[0], "es" => $es));
} // EDICION POR LIBRE
else if($_GET['edit'] == 3) {
  $id = $_GET['id'];
  $paticipacion = $db->getPorlibre($id);
  echo $twig->render('edit-porlibre.html', array( "provincias" => $provincias, "participacion" => $paticipacion[0], "es" => $es));
} else {
     if($_GET['change'] == 2 && $_GET['id']) {
          $db->updateEstado($_GET['id'],2);
      }
      if($_GET['change'] == 3 && $_GET['id']) {
          $db->updateEstado($_GET['id'],3);
      }
      if($_GET['change'] == 4 && $_GET['id']) {
          $db->updateEstadoPersona($_GET['id'],1);
          header("Location: /admin/index.php?par=8");
      }
       if($_GET['change'] == 5 && $_GET['id']) {
          $db->updateEstadoPersona($_GET['id'],0);
          header("Location: /admin/index.php?par=4");
      }
    $total1 = $db->getParticipacionesCount(1);
    $total2 = $db->getParticipacionesCount(2);
    $total3 = $db->getParticipacionesCount(3);
    $total4 = $db->getParticipacionesCount(4);
    $totalp = $db->getPersonasCount();
    $totalpl = $db->getPorlibreCount();
    $parti = array(); $paticipantes = array();
    if($_GET['par'] == 2) {
      $parti = $db->getParticipaciones(2); $es = 2;
    } else if($_GET['par'] == 3) {
      $parti = $db->getParticipaciones(3); $es = 3;
    } else if($_GET['par'] == 4) {
      $parti = $db->getParticipaciones(2); $es = 4;
    } else if($_GET['par'] == 7) {
      $parti = $db->getParticipaciones(4); $es = 7;
    } else if($_GET['par'] == 5) {
      $parti = $db->getPorlibres(); $es = 5;
    } else if($_GET['par'] == 8) {
      $parti = $db->getPersonasEstado(1); $es = 8;
    } else if($_GET['par'] == 6) {
      $parti = $db->getPersona($_GET['id']); $es = 6;
      $pa = $db->getNombrelugar($_GET['id']);
    } else {
      $parti = $db->getParticipaciones(1);
    }
    
    if($_GET['par'] == 5) {
    echo $twig->render('porlibres.html', array( "URLHOME" => URL_HOME, "total1" => $total1, "total2" => $total2, "total3" => $total3, "totalp" => $totalp, "totalpl" => $totalpl, "es" => $es, "parti" => $parti));
    } else if($_GET['par'] == 6) {
    echo $twig->render('grupos.html', array( "URLHOME" => URL_HOME, "total1" => $total1, "total2" => $total2, "total3" => $total3, "totalp" => $totalp, "totalpl" => $totalpl,"lugar" => $pa['lugar'], "es" => $es, "parti" => $parti));
    }  else if($_GET['par'] == 8) {
    echo $twig->render('grupos.html', array( "URLHOME" => URL_HOME, "total1" => $total1, "total2" => $total2, "total3" => $total3, "totalp" => $totalp, "totalpl" => $totalpl,"lugar" => "DENEGADOS", "es" => $es, "parti" => $parti));
    } 
    else if($_GET['par'] == 4) {
    echo $twig->render('personas.html', array( "URLHOME" => URL_HOME, "total1" => $total1, "total2" => $total2, "total3" => $total3,"total4" => $total4, "totalp" => $totalp, "totalpl" => $totalpl, "lugar" => "DENEGADOS", "es" => $es, "parti" => $parti));
    } else {
    echo $twig->render('index.html', array( "URLHOME" => URL_HOME, "total1" => $total1, "total2" => $total2, "total3" => $total3,"total4" => $total4, "totalp" => $totalp, "totalpl" => $totalpl, "provincias" => $provincias, "es" => $es, "parti" => $parti));
  }
}
