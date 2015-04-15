<?php 
echo form_open("crud/consultaPorNome");
echo validation_errors('<p>','</p>');
echo '<h2>Lista de funcionario</h2>';
echo form_label('Nome Completo');
echo form_input(array('name'=>'nome'),set_value('nome'));
echo form_submit(array('name' => 'Consultar'),'Consultar Dados');
echo form_close();

if($usuario == false):
	if($this->session->flashdata('consultaPorNome')):
		echo' <p>'.$this->session->flashdata('consultaPorNome').'</p>';
	endif;
else:
$tmpl = array ( 'table_open'  => '<table  class="pure-table">' );
$this->table->set_template($tmpl);
$this->table->set_heading("id","nome","email","login");	
$this->table->add_row($usuario->id,$usuario->nome,$usuario->email,$usuario->login);
echo $this->table->generate();
endif;
