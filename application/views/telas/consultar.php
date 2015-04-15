<?php 
echo '<h2>Lista de usuarios</h2>';
?>
<script>
$(function(){
    $("#tabela input").keyup(function(){       
        //variavel que recebe o valor da colula que contem o  input
        var index = $(this).parent().index();
      
        var nth = "#tabela td:nth-child("+(index+1).toString()+")";
  		
        var valor = $(this).val().toUpperCase();
     
        $("#tabela tbody tr").show();
        $(nth).each(function(){
            if($(this).text().toUpperCase().indexOf(valor) < 0){
                $(this).parent().hide();
            }
        });
    });
 
    $("#tabela input").blur(function(){
        $(this).val("");
    });
});

</script>
<table class="table" id="tabela">
        <thead>
          <tr>
            <th>#</th>
            <th>email </th>
            <th>Login</th>
            <th>cargo</th>
            <th>setor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th><input type="text" id="txtColuna1"/></th>
            <th><input type="text" id="txtColuna2"/></th>
            <th><input type="text" id="txtColuna3"/></th>
            <th><input type="text" id="txtColuna3"/></th>
            <th><input type="text" id="txtColuna3"/></th>
           
        </tr> 
            <?php 
            foreach($usuarios as $linha):
				//,$linha->nome,$linha->email,$linha->login,anchor("crud/atualizar/$linha->id",'Editar').'-'.anchor("crud/excluir/$linha->id",'Excluir')
			$table = "<tr><td>".$linha->id."</td>";
			$table.="<td>".$linha->email."</td>";
			$table.="<td>".$linha->login."</td>";
			$table.="<td>".$linha->cargo."</td>";
			$table.="<td>".$linha->setor."</td>";
			$table.="<td>".anchor("crud/atualizar/$linha->id",'Editar')."-".anchor("crud/excluir/$linha->id",'Excluir')."</td></tr>";
			
			echo $table;
			endforeach;?>
        
        </tbody>
      </table>