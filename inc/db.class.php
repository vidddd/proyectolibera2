<?php
require_once __DIR__ . '/../inc/config.php';

class Database{
     
    private $db;

    public function __construct()
    { 
        $this->db = new MysqliDb (HOST,USER,PASSWORD,DATABASE);
    }
    public function insertaParticipacion($persona, $email, $telefono, $direccion, $organiza, $masinfo, $provincia, $lugar, $location, $hora, $numero, $comentarios){
       $ok = false;

        $data = Array ("persona" => $persona,
                "email" => $email,
                "telefono" => $telefono,
                "direccion" => $direccion,
                "organiza" => $organiza,
                "masinfo" => $masinfo,
                "provincia" => $provincia,
                "lugar" => $lugar,
                "coordenadas" => $location,
                "hora" => $hora,
                "numerop" => $numero,
                "comentarios" => $comentarios,
                );
         
         $id = $this->db->insert ('participaciones', $data);
         if($id){
              $ok = true; 
         } else {
             echo 'insert failed: ' . $this->db->getLastError(); die;
         }
         return $ok;
     }
       
    /*
    public function getCines(){
        $this->db->where("active", 1);
        $ciudades = $this->db->get('ciudades');
        return $ciudades;
     }
  
*/
 public function existeEmail($email) {
        $ents = $this->db->rawQueryOne('select * from participaciones where email=?', Array($email));
        if(!empty($ents)){
            return true;
        } else {
            return false;
        }
 }
}