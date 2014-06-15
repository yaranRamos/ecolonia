<?php 
class Especial_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function usuario_colono_casa($usuario, $contrasena, $tipo){
		return $this->db->select('casa.Colonia as colonia')
				 ->from('usuario')
				 ->join('colono_has_usuario','usuario.Id = colono_has_usuario.usuario_id')
				 ->join('colono','colono_has_usuario.colono_Id = colono.Id')
				 ->join('casa','colono.Casa = casa.Id')
				 ->where('usuario.Nombre',$usuario)
				 ->where('usuario.Password',$contrasena)
				 ->where('usuario.rol_Id',$tipo)
				 ->get()
				 ->row();
	}

	public function usuario_cu_comitebarrio($usuario, $contrasena, $tipo){
		return $this->db->select('comitedebarrio_has_colono.comitedebarrio_Id as Idcomite')
						->from('usuario')
						->join('colono_has_usuario','usuario.Id = colono_has_usuario.usuario_id')
						->join('comitedebarrio_has_colono','colono_has_usuario.colono_Id = comitedebarrio_has_colono.colono_Id')
						->where('usuario.Nombre',$usuario)
				 		->where('usuario.Password',$contrasena)
				 		->where('usuario.rol_Id',$tipo)
				 		->get()
				 		->row();
	}

	public function get_id_calle($usuario, $contrasena, $tipo){
		return $this->db->select('catalogocalle_has_colono.catalogocalle_Id as Id_calle')
						->from('usuario')
						->join('colono_has_usuario','usuario.Id = colono_has_usuario.usuario_id')
						->join('colono','colono_has_usuario.colono_Id = colono.Id')
						->join('catalogocalle_has_colono','colono.Id = catalogocalle_has_colono.colono_Id')
						->where('usuario.Nombre',$usuario)
				 		->where('usuario.Password',$contrasena)
				 		->where('usuario.rol_Id',$tipo)
				 		->get()
				 		->row();
	}

	public function get_id_casa($usuario, $contrasena, $tipo){
		return $this->db->select('colono.Casa as Id_casa')
						->from('usuario')
						->join('colono_has_usuario','usuario.Id = colono_has_usuario.usuario_id')
						->join('colono','colono_has_usuario.colono_Id = colono.Id')
						->where('usuario.Nombre',$usuario)
				 		->where('usuario.Password',$contrasena)
				 		->where('usuario.rol_Id',$tipo)
				 		->get()
				 		->row();
	}
}