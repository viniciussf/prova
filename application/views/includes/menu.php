
<div class="pure-menu pure-menu-horizontal">
    <ul class="pure-menu-list">
        <li class="pure-menu-item"><?php echo anchor('crud/create','Criar','class="pure-menu-link"') ?></li>
        <li class="pure-menu-item"><?php echo anchor('crud/consultar','Consultar/Editar/Excluir','class="pure-menu-link"') ?></li>
        <li class="pure-menu-item"><?php echo anchor('crud/consultaPorNome','consultaPorNome','class="pure-menu-link"') ?></li>
    	 <li class="pure-menu-item"><a href="<?php echo base_url('crud/logout') ;?>">Sair</a></li>
    
    </ul>
</div>
