<?php 
$iduser=$this->uri->segment(3);
if($iduser==NUll):
redirect('crud/consultar');
endif;
$query=$this->crud_model->buscarExcluir($iduser)->row();
$attributes = array('class' => 'pure-form pure-form-stacked', 'id' => 'myform');
echo form_open("crud/excluir/$iduser",$attributes);
echo validation_errors('<p>','</p>');
if($this->session->flashdata('excluir')):
	echo' <p>'.$this->session->flashdata('excluir').'</p>';
endif;
echo form_label('Nome Completo');
echo form_input(array('name'=>'nome'),set_value('nome',$query->nome),'disabled="disabled"');
echo "<br><br>";
echo form_label('Email Completo');
echo form_input(array('name'=>'email'),set_value('email',$query->email),'disabled="disabled"');
echo "<br><br>";
echo form_label('Login Completo');
echo form_input(array('name'=>'login'),set_value('login',$query->login),'disabled="disabled"');
echo "<br><br>";
echo form_label('Senha Completo');
echo form_password(array('name'=>'senha'),set_value('senha'));
echo "<br><br>";
echo form_label('repita senha Completo');
echo form_password(array('name'=>'senha2'),set_value('senha2'));
echo "<br><br>";
echo form_submit(array('name' => 'Excluir','class'=>'pure-button pure-button-primary'),'Ecluir Dados');
echo form_hidden('idusuario',$query->id);
echo form_close();