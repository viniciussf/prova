<?php 
$iduser=$this->uri->segment(3);
if($iduser==NULL):
redirect('crud/consultar');
endif;
$query =$this->crud_model->buscarAtualizar($iduser)->row();

$attributes = array('class' => 'pure-form pure-form-stacked', 'id' => 'myform');
echo form_open("crud/atualizar/$iduser",$attributes);
echo validation_errors('<p>','</p>');
if($this->session->flashdata('edicao')):
	echo' <p>'.$this->session->flashdata('edicao').'</p>';
endif;



echo form_label('Nome Completo');
echo form_input(array('name'=>'nome'),set_value('nome',$query->nome),'autofocus');
echo "<br>";

echo form_label('Email Completo');
echo form_input(array('name'=>'email'),set_value('email',$query->email),'disabled="disabled"');
echo "<br>";

echo form_label('Login Completo');
echo form_input(array('name'=>'login'),set_value('login',$query->login),'disabled="disabled"');
echo "<br>";

echo form_label('Senha Completo');
echo form_password(array('name'=>'senha','require'=>''),set_value('senha'));
echo "<br>";

echo form_label('repita senha Completo');
echo form_password(array('name'=>'senha2','require'=>''),set_value('senha2'));
echo "<br>";

echo form_label('setor');
echo form_input(array('name'=>'setor'),set_value('setor',$query->setor));
echo "<br>";

echo form_label('cargo ');
echo form_input(array('name'=>'cargo'),set_value('cargo',$query->cargo));
echo "<br>";
echo form_submit(array('name' => 'Alterar','class'=>'pure-button pure-button-primary'),'Alterar Dados');
echo form_hidden('idusuario',$query->id);

echo form_close();