<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class crud extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper('file');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->model('crud_model');
		$this->load->library('session');
		$this->load->library('table');


	}
	
	public function index(){
		if($this->session->userdata('logged_in'))
		   {
		    $dados = array(
				"titulo" => "CRUD com Codeigniter",
				"tela" => "",
			);
		     $session_data = $this->session->userdata('logged_in');
		     $data['username'] = $session_data['username'];
		     $this->load->view('crud',$dados);
		   }
		   else
		   {
		     //If no session, redirect to login page
		     redirect('login', 'refresh');
		   }
	
	}
	public function logout(){
		   $this->session->unset_userdata('logged_in');
		   session_destroy();
		   redirect('login', 'refresh');
	}
	public function create(){
		//validacao de campos para cadastro
		//primeiro parametro e nome do elemento 
		//segundo e o que vai aparecer de mensagem de erro
		//
		
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[50]|ucwords');
		$this->form_validation->set_message('is_unique','este  %s já esta cadastrado no sistema ');
		$this->form_validation->set_rules('email','Email','trim|required|max_length[50]|strtolower|valid_email|is_unique[usuario.email]');
		$this->form_validation->set_rules('login','Login','trim|required|max_length[25]|strtolower|is_unique[usuario.login]');
		$this->form_validation->set_rules('senha','Senha','trim|required|strtolower');
		$this->form_validation->set_message('matches','o Campo  %s esta diferente do campo %s');
		$this->form_validation->set_rules('senha2','Repita a senha','trim|required|strtolower|matches[senha]');
		$this->form_validation->set_rules('cargo','Cargo não informado ','trim|required|strtolower');
		$this->form_validation->set_rules('setor','setor não informado ','trim|required|strtolower');
		

		if($this->form_validation->run()==TRUE):			
			$dados=elements(array('nome','email','login','senha','setor','cargo'),$this->input->post());
			$dados['senha']=md5($dados['senha']);
			$this->crud_model->do_insert($dados);
			
		endif;
		
		
		$dados = array(
			"titulo" => "CRUD &raquo; Create",
			"tela" => "create",
		
		);
		$this->load->view('crud',$dados);
	
	}
	

	public function consultaPorNome(){
		$dados =null;
		$query=null;
		$this->form_validation->set_rules('nome','NOME','trim|required');
		if($this->form_validation->run()==true):
			$dados=elements(array('nome'),$this->input->post());
			$query =$this->crud_model->consultaPorNome($dados);
		endif;
		$dados = array(
			"titulo" => "CRUD &raquo; Consulta por Nome",
			"tela" => "consultaPorNome",
			"usuario" =>$query,
			
		);
		$this->load->view('crud',$dados);
	}
	public function atualizar(){
		$this->form_validation->set_rules('nome','NOME','trim|required|max_length[50]|ucwords');
		$this->form_validation->set_rules('senha','Senha','trim|required|strtolower');
		$this->form_validation->set_message('matches','o Campo  %s esta diferente do campo %s');
		$this->form_validation->set_rules('senha2','Repita a senha','trim|required|strtolower|matches[senha]');
		$this->form_validation->set_rules('cargo','CARGO','trim|required|max_length[50]|ucwords');
		$this->form_validation->set_rules('setor','SETOR','trim|required|max_length[50]|ucwords');
		
		if($this->form_validation->run()==TRUE):
			$dados=elements(array('nome','senha','cargo','setor'),$this->input->post());
			$dados['senha']=md5($dados['senha']);
			$condicao= array('id' =>$this->input->post('idusuario'));
			$this->crud_model->atualizar($dados,$condicao);
		endif;
		$dados = array(
			"titulo" => "CRUD &raquo; Atualizar",
			"tela" => "atualizar",
		);
		$this->load->view('crud',$dados);
	}
		public function excluir(){
			
			$this->crud_model->excluir($this->input->post('idusuario'));
			
		$dados = array(
			"titulo" => "CRUD &raquo; Excluir",
			"tela" => "excluir",
		
		);
		$this->load->view('crud',$dados);
	
	}
	

	public function consultar(){
	
		$dados =array (
			"titulo" =>"CRUD &raquo; Consultar",
			"tela" =>"consultar",
			"usuarios"=>$this->crud_model->get_all()->result(),
		);
		$this->load->view('crud',$dados);
	}


}

