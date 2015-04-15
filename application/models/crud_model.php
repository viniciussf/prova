<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Crud_model extends CI_Model{
	
	public function do_insert ($dados=null)
	{
		if($dados != NULL):
			$this->session->set_flashdata('c','Cadastro efetuado com sucesso');
			$this->db->insert('usuario',$dados);
			redirect('crud/create');
		endif;
	}
	public function get_all(){
		return $this->db->get('usuario');
	}
	
	public function buscarAtualizar($id=''){
	if($id != NULL):
			$this->db->where('id',$id);
			$this->db->limit(1);
		return $this->db->get('usuario');
	else:
		return false;
	endif;
	}
	public function buscarExcluir($id=''){
		if($id != null):
				$this->db->where('id',$id);
				$this->db->limit(1);
				return $this->db->get('usuario');
		else:
			return false;
		endif;
	
	}
	public function excluir($id=''){
		if($id!= null):
			
			$this->session->set_flashdata('excluir','Excluir efetuado com sucesso');
			$this->db->delete('usuario',array('id'=>$id));
			redirect('crud/consultar');
		else:
			return false;
		endif;
	
	}
	public function atualizar($dados=null,$condicao=null){
			if($dados != NULL && $condicao != NULL):
				$this->db->update('usuario',$dados,$condicao);
				$this->session->set_flashdata('edicao','atualizado com sucesso');
				redirect(current_url());
		endif;
	}

	public function consultaPorNome($dados=null){
		if($dados != null):
			$nome='';
			foreach ($dados as $key => $value) {
				$nome = $value;
			}
			$this->db->like('nome',$nome);
			$this->db->limit(1);
			$query =$this->db->get('usuario');
			if($query != null):
				return $query->row();

			else:
				$this->session->set_flashdata('consultaPorNome','Funcionario Não encontrado');
				return false;
			endif;
		endif;
	
	
	}
}	