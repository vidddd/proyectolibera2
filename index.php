<?php
session_start();
opcache_reset();
//error_reporting(E_ALL);
require_once __DIR__ . '/vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('templates/');
$twig = new Twig_Environment($loader, array("cache" => false));
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/db.class.php';
$db = new Database();
require_once 'inc/mail.class.php';
$mail = new Mails;
$locations = $db->getLocations();

if ($_GET['quees']) {
    echo $twig->render('quees.html', array("URLHOME" => URL_HOME));
} else if ($_GET['participa']) {
    if ($_POST && $_GET['participa'] == 1) {
        $persona = $_POST['persona'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $organiza = $_POST['organiza'];
        $masinfo = $_POST['masinfo'];
        $provincia = $_POST['provincia'];
        $lugar = $_POST['lugar'];
        $location = $_POST['location'];
        $hora = $_POST['hora'];
        $numero = $_POST['numero'];
        $comentarios = $_POST['comentarios'];
        $cuando = $_POST['momentos'];
        if ($db->existeEmail($email)) {
            echo $twig->render('unmetro_participa.html', array("URLHOME" => URL_HOME, "mensaje" => 1, "locations" => $locations, "provincias" => $provincias));
        } else {
            $db->insertaParticipacion($persona, $email, $telefono, $direccion, $organiza, $masinfo, $provincia, $lugar, $location, $hora, $numero, $comentarios);
            echo $twig->render('unmetro_participa.html', array("URLHOME" => URL_HOME, "mensaje" => 4, "locations" => $locations, "nombre" => $persona, "email" => $email, "provincias" => $provincias, "lugar" => $lugar, "hora" => $hora));
            $mail->addAddress($email);
            $mail->envioOrganiza($persona, $email, $telefono, $direccion, $organiza, $masinfo, $provincia, $lugar, $location, $hora, $numero, $comentarios);
        }
    } else if ($_POST && $_GET['participa'] == 2) {
        $persona2 = $_POST['persona2'];
        $email2 = $_POST['email2'];
        $telefono2 = $_POST['telefono2'];
        $lugarid = $_POST['lugarid'];
        $numero2 = $_POST['numero2'];$lugarname = $_POST['lugarname']; $horaa = $_POST['horaa'];
        $comentarios2 = $_POST['comentarios2'];
        if ($db->existeEmailPersona($email2)) {
            echo $twig->render('unmetro_participa.html', array("URLHOME" => URL_HOME, "mensaje" => 1, "locations" => $locations, "provincias" => $provincias));
        } else {
            $id = $db->insertaPersona($persona2, $email2, $telefono2, $lugarid, $numero2, $comentarios2);
 

            $mail->addAddress($email2);
            $mail->envioUnete($id);
            echo $twig->render('unmetro_participa.html', array("URLHOME" => URL_HOME, "mensaje" => 5, "locations" => $locations, "nombre" => $persona2, "hora" => $horaa, "email" => $email2, "provincias" => $provincias, "lugar" => $lugarname));
        }
    } else if ($_POST && $_GET['participa'] == 3) {
        $persona3 = $_POST['persona3'];
        $email3 = $_POST['email3'];
        if ($db->existeEmailPorlibre($email3)) {
            echo $twig->render('unmetro_participa.html', array("URLHOME" => URL_HOME, "mensaje" => 1, "locations" => $locations, "provincias" => $provincias));
        } else {
            $id = $db->insertaPorlibre($persona3, $email3);
            echo $twig->render('unmetro_participa.html', array("URLHOME" => URL_HOME, "mensaje" => 2, "locations" => $locations, "provincias" => $provincias));
            $mail->addAddress($email3);
            $mail->envioPorlibre($id);
        }
    } else {
        echo $twig->render('unmetro_participa.html', array("URLHOME" => URL_HOME, "locations" => $locations, "provincias" => $provincias));
    }
} else if ($_GET['difunde']) {
    echo $twig->render('unmetro_difunde.html', array("URLHOME" => URL_HOME));
} else if ($_GET['unmetro']) {
    echo $twig->render('unmetro.html', array("URLHOME" => URL_HOME, "locations" => $locations));
} else {
    echo $twig->render('home.html', array("URLHOME" => URL_HOME));
}
