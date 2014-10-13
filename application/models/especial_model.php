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

	public function get_miembros_comite($comite){
		return $this->db->select('colono.Nombre as Nombre')
						->select('colono.ApellidoPaterno as ApellidoPaterno')
						->select('colono.ApellidoMaterno as ApellidoMaterno')
						->select('casa.Numero as Numero')
						->select('catalogocalle.Nombre as Nombre_calle')
						->select('comitedebarrio.Nombre as Nombre_comite')
						->select('comitedebarrio_has_colono.Puesto as Puesto')
						->from('colono')
						->join('casa','colono.Casa = casa.Id')
						->join('catalogocalle','casa.Calle = catalogocalle.Id')
						->join('comitedebarrio_has_colono','colono.Id = comitedebarrio_has_colono.colono_Id')
						->join('comitedebarrio','comitedebarrio_has_colono.comitedebarrio_Id = comitedebarrio.Id')
						->where('comitedebarrio.Id',$comite)
						->get()
						->result();
	}

	public function get_representantes_calle($comite){
		return $this->db->select('col.Nombre as nombre_colono')
						->select('col.ApellidoPaterno as ApellidoPaterno')
						->select('col.ApellidoMaterno as ApellidoMaterno')
						->select('cas.Numero as numero_casa')
						->select('catacalle.Nombre as Nombre_calle')
						->select('cb.Nombre as Nombre_comite')
						->select('cll.Nombre as Nombre_calle_representa')
						->from('colono as col')
						->join('catalogocalle_has_colono as callcol','col.Id = callcol.colono_Id')
						->join('catalogocalle as catcalle','callcol.catalogocalle_Id = catcalle.Id')
						->join('casa as cas','col.Casa = cas.Id')
						->join('catalogocalle as catacalle','cas.Calle = catacalle.Id')
						->join('comitedebarrio as cb','callcol.comitedebarrio_Id = cb.Id')
						->join('catalogocalle as cll','callcol.catalogocalle_Id = cll.Id')
						->where('callcol.comitedebarrio_Id',$comite)
						->get()
						->result();
	}

	public function get_presidentes(){
		return $this->db->select('cb.Nombre as nombre_comite')
						->select('cl.Nombre as nombre_colonia')
						->select('c.Nombre as nombre_colono')
						->select('c.ApellidoPaterno as ApellidoPaterno')
						->select('c.ApellidoMaterno as ApellidoMaterno')
						->select('usr.Nombre as nombre_usuario')
						->select('usr.Password as password_usuario')
						->select('c_has_c.status as status_presidente')
						->from('comitedebarrio as cb')
						->join('comitedebarrio_has_colono as c_has_c','cb.Id = c_has_c.comitedebarrio_Id')
						->join('colono as c','c_has_c.colono_Id = c.Id')
						->join('colonia as cl','cb.Colonia = cl.Id')
						->join('colono_has_usuario as c_has_u','c.Id = c_has_u.colono_Id')
						->join('usuario as usr','c_has_u.usuario_Id = usr.Id')
						->where('c_has_c.Puesto', 1)
						->where('usr.rol_Id',2)
						->get()
						->result();
	}

	public function detalle_colonia($colonia){
		return $this->db->select('est.Nombre as estado')
						->select('mun.Nombre as municipio')
						->select('col.Nombre as colonia')
						->select('col.FechaFun as fundacion')
						->select('col.NumeroHabitantes as habitantes')
						->select('col.ubicacion as ubicacion')
						->select('col.Extension_Geografica as extension')
						->select('col.Diagnostico_inicial as diagnostico')
						->from('colonia as col')
						->join('municipio as mun','col.Municipio = mun.Id')
						->join('estado as est','mun.Estado = est.Id')
						->where('col.Id',$colonia)
						->get()
						->row();
	}

	public function detalle_comite($comite){
		return $this->db->select('est.Nombre as estado')
						->select('mun.Nombre as municipio')
						->select('col.Nombre as colonia')
						->select('cb.Nombre as comite')
						->select('cb.Numero_Integrantes as integrantes')
						->select('cb.FechaFundacion as fundacion')
						->from('comitedebarrio as cb')
						->join('colonia as col','cb.Colonia = col.Id')
						->join('municipio as mun','col.Municipio = mun.Id')
						->join('estado as est','mun.Estado = est.Id')
						->where('cb.Id',$comite)
						->get()
						->row();
	}

	public function valida_presidente($Nombre,$ApellidoPaterno,$ApellidoMaterno,$puesto,$status){
		return $this->db->from('comitedebarrio as cb')
						->join('comitedebarrio_has_colono as cb_c','cb.Id = cb_c.comitedebarrio_Id')
						->join('colono as c ','cb_c.colono_Id = c.Id')
						->where('c.Nombre',$Nombre)
						->where('c.ApellidoPaterno',$ApellidoPaterno)
						->where('c.ApellidoMaterno',$ApellidoMaterno)
						->where('cb_c.Puesto',$puesto)
						->where('cb_c.status',$status)
						->get()
						->row();
	}
}
