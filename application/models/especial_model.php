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
}