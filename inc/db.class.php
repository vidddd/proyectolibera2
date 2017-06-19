<?php

require_once __DIR__ . '/../inc/config.php';
class Database{
    private $db;
    public function __construct()
    {
        $this->db = new MysqliDb (HOST,USER,PASSWORD,DATABASE);
    }
      public function getParticipaciones($estado){
          $this->db->where("estado", $estado);
          $ciudades = $this->db->get('participaciones pa');
          $parts = array();
          foreach($ciudades as $ciu) {
              $ciu['cuantas'] = $this->getPersonasPCount($ciu['id']);
              array_push($parts, $ciu);

          }
            return $parts;
         }

      public function getParticipacion($id){
             $this->db->where("id", $id);
             $ciudades = $this->db->get('participaciones');
             return $ciudades;
          }
      public function getParticipacionesCount($estado){
             $this->db->where("estado", $estado);
             $ciudades = $this->db->get('participaciones');
             return $this->db->count;
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

     public function updateParticipacion($id, $persona, $email, $telefono, $direccion, $organiza, $masinfo, $provincia, $lugar, $location, $hora, $numerop, $comentarios){
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
                 "numerop" => $numerop,
                 "comentarios" => $comentarios
                 );
          $this->db->where('id', $id);
          $id = $this->db->update('participaciones', $data);
          if($id){
               $ok = true;
          } else {
              echo 'update failed: ' . $this->db->getLastError(); die;
          }
          return $ok;
      }
     public function insertaPersona($persona, $email, $telefono, $lugarid, $personas, $comentarios){
        $ok = false;
        $data = Array ("persona" => $persona,
                 "email" => $email,
                 "telefono" => $telefono,
                 "lugarid" => $lugarid,
                 "personas" => $personas,
                 "comentarios" => $comentarios,
                 );
          $id = $this->db->insert ('personas', $data);
          if($id){
               return $id;
          } else {
              echo 'insert failed: ' . $this->db->getLastError(); die;
          }
      }

       public function updatePersona($id, $persona, $email, $telefono, $personas, $comentarios){
        $ok = false;
        $data = Array ("persona" => $persona,
                 "email" => $email,
                 "telefono" => $telefono,
                 "personas" => $personas,
                 "comentarios" => $comentarios
                 );

          $this->db->where('id', $id);
          $id = $this->db->update('personas', $data);
          if($id){
               $ok = true;
          } else {
              echo 'update failed: ' . $this->db->getLastError(); die;
          }
          return $ok;
      }
    /** Get Active locations */
    public function getLocations(){
        $locations = array(); $count = 1; $latitud = ""; $longitud = "";
        $this->db->where("estado", 2);
        $this->db->where("coordenadas != ''");
        $this->db->orderBy("lugar","asc");
        $partis = $this->db->get('participaciones');
        
        foreach ($partis as $pa) {
          $co = $pa['coordenadas'];
          $coor = str_replace("(", "", $co);
          $coor = str_replace(")", "", $coor);
          $pieces = explode(",", $coor);
          $latitud = $pieces[0];
          $longitud = $pieces[1];
             $locations[$count]['id'] = $pa['id'];
             $locations[$count]['lugar'] = $pa['lugar'];
             $locations[$count]['hora'] = $pa['hora'];
             $locations[$count]['latitud'] = "".$latitud;
             $locations[$count]['longitud'] = "".$longitud;
             $locations[$count]['comentarios'] = "".$pa['comentarios'];
          $count++;
        }
        return $locations;
     }

 public function existeEmail($email) {
        $ents = $this->db->rawQueryOne('select * from participaciones where email=?', Array($email));
        if(!empty($ents)){
            return true;
        } else {
            return false;
        }
 }
 public function existeEmailPersona($email) {
        $ents = $this->db->rawQueryOne('select * from personas where email=?', Array($email));
        if(!empty($ents)){
            return true;
        } else {
            return false;
        }
 }
  public function existeEmailPorlibre($email) {
        $ents = $this->db->rawQueryOne('select * from porlibre where email=?', Array($email));
        if(!empty($ents)){
            return true;
        } else {
            return false;
        }
 }
  public function getNombrelugar($id){
     $this->db->where("pa.id", $id);
     $personas = $this->db->get('participaciones pa');

     return $personas[0];
  }

 public function getPersona($id){
     $this->db->join("participaciones pa", "p.lugarid=pa.id", "LEFT");
     $this->db->where("pa.id", $id);
     $personas = $this->db->get('personas p', null, 'p.*, pa.lugar');

     return $personas;
  }

   public function getPersonaId($id){

     $this->db->join("participaciones pa", "p.lugarid=pa.id", "LEFT");
     $this->db->where("p.id", $id);
     $personas = $this->db->get('personas p', null, 'p.*, pa.lugar');

     return $personas;
  }
  public function getPersonas($id = null){
      //$this->db->where("id", $id);
      $this->db->join("participaciones pa", "p.lugarid=pa.id", "LEFT");
      if($id) $this->db->where("pa.id", $id);
       $this->db->where("p.estado", "0");
       $this->db->orderBy("id","desc");
      $personas = $this->db->get('personas p', null, 'pa.id as paid, pa.persona as papersona, pa.email as paemail, pa.telefono as patelefono, pa.direccion as padireccion, pa.organiza as paorganiza, pa.lugar, pa.hora as pahora, pa.numerop as panumerop, p.id, p.persona, p.email, p.telefono, p.personas, p.comentarios');
      return $personas;
   }
  public function getPersonasEstado($estado = null){
      //$this->db->where("id", $id);
      $this->db->join("participaciones pa", "p.lugarid=pa.id", "LEFT");
       if($estado) $this->db->where("p.estado", $estado);
      $personas = $this->db->get('personas p', null, 'p.id, p.persona, p.email, p.telefono, pa.lugar, p.personas, p.comentarios');
      return $personas;
   }
   public function getPersonasCount(){
             $ciudades = $this->db->get('personas');
             return $this->db->count;
      }
   public function getPersonasPCount($pid){
             $this->db->where("lugarid",$pid);
              $this->db->where("estado","0");
             $ciudades = $this->db->get('personas');
             return $this->db->count;
      }
  public function updateEstado($id,$estado){
    $data = Array (
       'estado' => $estado,
       );
       $this->db->where ('id', $id);
       if ($this->db->update ('participaciones', $data)){}
   }

   public function updateEstadoPersona($id,$estado){
    $data = Array (
       'estado' => $estado,
       );
       $this->db->where ('id', $id);
       if ($this->db->update ('personas', $data)){}
   }
  public function getPorlibre($id){
             $this->db->where("id", $id);
             $ciudades = $this->db->get('porlibre');
             return $ciudades;
          }

    public function getPorlibres(){
      $personas = $this->db->get('porlibre');
      return $personas;
   }
    public function getPorlibreCount(){
          $ciudades = $this->db->get('porlibre');
             return $this->db->count;
      }
    public function insertaPorlibre($persona, $email){
        $ok = false;
        $data = Array ("persona" => $persona,
                 "email" => $email,
                 );
          $id = $this->db->insert ('porlibre', $data);
          if($id){
               return $id;
          } else {
              echo 'insert failed: ' . $this->db->getLastError(); die;
          }
      }
      
     public function updatePorlibre($id, $persona, $email){
        $ok = false;
        $data = Array ("persona" => $persona,"email" => $email);
          $this->db->where('id', $id);
          $id = $this->db->update('porlibre', $data);
          if($id){
               $ok = true;
          } else {
              echo 'update failed: ' . $this->db->getLastError(); die;
          }
          return $ok;
      }
      
    public function getParticipacionesTodo(){
      $this->db->where("pa.estado","2");
      $this->db->join("personas p", "p.lugarid=pa.id", "LEFT");
      $personas = $this->db->get('participaciones pa', null, '');
      return $personas;
   }
}
