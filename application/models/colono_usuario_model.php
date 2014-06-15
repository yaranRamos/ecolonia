<?php 
class Colono_usuario_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function inserta_2_usuario($id_colono, $id_usuario){
		$result = $this->db->set('colono_Id',$id_colono)
						->set('usuario_Id',$id_usuario)
						->insert('colono_has_usuario');
		if($result == true){
			$result = $this->db->set('colono_Id',$id_colono)
						->set('usuario_Id',$id_usuario+1)
						->insert('colono_has_usuario');
		}
		return $result;
	}

	public function inserta_usuario($id_colono, $id_usuario){
		return $this->db->set('colono_Id',$id_colono)
						->set('usuario_Id',$id_usuario)
						->insert('colono_has_usuario');
	}
}