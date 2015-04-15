<?php 

echo validation_errors('<p>','</p>');
if(empty($erro)){

}else{
	print_r($erro) ;
}
if($this->session->flashdata('c')):
	echo'<p>'.$this->session->flashdata('c').'</p>';
endif;
?>
<div class="panel panel-default">
	<div class="panel-body">
		<form enctype="multipart/form-data" action="<? echo base_url('crud/create') ?>" method="post">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nome</label>
		    <input type="text" class="form-control" name="nome">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Login</label>
		    <input type="text" class="form-control" name="login">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email</label>
		    <input type="email" class="form-control" name="email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Password</label>
		    <input type="password" class="form-control" name="senha">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Password 2</label>
		    <input type="password" class="form-control" name="senha2">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">setor</label>
		    <input type="text" class="form-control" name="setor">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">cargo</label>
		    <input type="text" class="form-control" name="cargo">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputFile">Foto</label>
		    <input type="file" name="arquivo" size="20">
		    <p class="help-block"></p>
		  </div>
		  
		  <button type="submit" value="upload" name="cadastrar" class="btn btn-default">Submit</button>
		</form>
	</div>
</div>