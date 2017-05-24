<?php
require_once 'db.class.php';
class Mails extends PHPMailer {

    public function __construct()
    {
        $this->SMTPDebug = 0;                               // Enable verbose debug output
        $this->isSMTP();                                      // Set mailer to use SMTP
        $this->Host = 'proyectolibera.org';  // Specify main and backup SMTP servers
        $this->SMTPAuth = true;                               // Enable SMTP authentication
        $this->Username = 'no-reply@proyectolibera.org';                 // SMTP username
        $this->Password = 'YA0F5DA4cB';                           // SMTP password
        $this->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $this->Port = 587;                                    // TCP port to connect to
        $this->setFrom('no-reply@proyectolibera.org', '1 m2 por la Naturaleza');
        $this->twig = new Twig_Environment(new Twig_Loader_Filesystem(__DIR__ .'/../templates/'), array());
        $this->db = new Database();
    }
    public function setAddress($email, $name) {
          $this->addAddress($email, $name);     // Add a recipient
    }

    public function envio1(){
        $this->isHTML(true);
        $this->Subject = 'Formulario de Organiza';
        $this->Body    = 'Hola !! Gracias por organizar y liderar un grupo de limpieza';
        $this->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if(!$this->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $this->ErrorInfo;
            } else {
                //echo 'Message has been sent';
            }
    }

    public function envioOrganiza($persona, $email, $telefono, $direccion, $organiza, $masinfo, $provincia, $lugar, $location, $hora, $numero, $comentarios){
      $this->isHTML(true);
      $this->Subject = 'Formulario de Organiza';
      $this->Body    = 'Hola !! Gracias por organizar y liderar un grupo de limpieza <br>
                        Persona: '. $persona .'<br>
                        Email: '. $email .' <br>
                        Telefono: '. $telefono. '<br>
                        Direccion: '. $direccion. '<br>
                        Organiza: '. $organiza. '<br>
                        Mas info: '. $masinfo. '<br>
                        Provincia: '. $provincia. '<br>
                        Lugar: '. $lugar. '<br>
                        Hora: '. $hora. '<br>
                        Numero personas: '. $numero. '<br>
                        Comentarios: '. $comentarios. '<br>
                        ';
      $this->AltBody = 'This is the body in plain text for non-HTML mail clients';
          if(!$this->send()) {
              echo 'Message could not be sent.';
              echo 'Mailer Error: ' . $this->ErrorInfo;
          } else {
              //echo 'Message has been sent';
          }
    }
    public function envioUnete($id){
      $this->isHTML(true);
      $persona = $this->db->getPersona($id);
      $this->Subject = 'Formulario de Unete';
      $this->Body    = 'Hola !! Gracias por uniter a un grupo de limpieza <br>
                        Persona: '. $persona[0]['persona'] .'<br>
                        Email: '. $persona[0]['email'] .' <br>
                        Lugar: '. $persona[0]['lugarid'] . '<br>
                        personas: '. $persona[0]['personas'] . '<br>
                        Comentarios: '. $persona[0]['comentarios'] . '<br>
                        ';
      $this->AltBody = 'This is the body in plain text for non-HTML mail clients';
          if(!$this->send()) {
              echo 'Message could not be sent.';
              echo 'Mailer Error: ' . $this->ErrorInfo;
          } else {
              echo 'Message has been sent';
          }
    }

    public function envioUnet22e($id){
        $this->isHTML(true);
        $this->Subject = 'Formulario de Unete';
        $this->Body    = $this->twig->render('email-perfecto.html', array());
            if(!$this->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $this->ErrorInfo;
            } else {
              //  echo 'Message has been sent';
            }
    }
}
