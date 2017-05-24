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
} else if($_GET['edit'] == 1) {

  $id = $_GET['id'];
  $paticipacion = $db->getParticipacion($id);
  echo $twig->render('edit.html', array( "provincias" => $provincias, "participacion" => $paticipacion[0], "es" => $es));

} else {

      if($_GET['change'] == 2 && $_GET['id']) {
          $db->updateEstado($_GET['id'],2);
      }
      if($_GET['change'] == 3 && $_GET['id']) {
          $db->updateEstado($_GET['id'],3);
      }

    $total1 = $db->getParticipacionesCount(1);
    $total2 = $db->getParticipacionesCount(2);
    $total3 = $db->getParticipacionesCount(3);
    $totalp = $db->getPersonas();
    $parti = array(); $paticipantes = array();
    if($_GET['par'] == 2) {
      $parti = $db->getParticipaciones(2); $es = 2;
    } else if($_GET['par'] == 3) {
      $parti = $db->getParticipaciones(3); $es = 3;
    } else if($_GET['par'] == 4) {
      $parti = $db->getPersonas(); $es = 4;
    } else {
      $participantes = $db->getParticipaciones(1);
    }

    if($_GET['par'] == 4) {
    echo $twig->render('personas.html', array( "URLHOME" => URL_HOME, "total1" => $total1, "total2" => $total2, "total3" => $total3, "totalp" => $totalp, "es" => $es, "parti" => $parti));
    } else {
    echo $twig->render('index.html', array( "URLHOME" => URL_HOME, "total1" => $total1, "total2" => $total2, "total3" => $total3, "totalp" => $totalp, "provincias" => $provincias, "es" => $es, "parti" => $parti));
  }
}
