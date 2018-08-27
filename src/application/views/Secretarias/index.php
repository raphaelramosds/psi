<div class="ls-main">
	<div class="container-fluid">
        <h1 class="ls-title-intro ls-ico-panel-pabx">Secretárias cadastradas</h1>
		<div class="ls-box ls-board-box ls-no-border">
            <table class="ls-table">
            	<tr>
            		<th>Nome</th>
            		<th>Sexo</th>
            		<th>Endereco</th>
            		<th>Telefone</th>
            		<th>Ação</th>
            	</tr>
            	<?php foreach ($data_secretaria as $row):?>
				<tr>
					<td><?=$row->nome?></td>			
					<td><?=$row->sexo?></td>
					<td><?=$row->endereco?></td>
					<td><?=$row->telefone?></td>
                    <td class="ls-txt-left">
                        <div class="ls-dropdown" data-ls-module="dropdown">
                            <a href="#" class="ls-btn">Ação</a>
                            <ul class="ls-dropdown-nav">
                                <li><a href="<?=base_url('update-secretaria')?>/<?=$row->id?>" class="ls-ico-search ls-color-black ls-no-bghover">Ver mais informações</a></li>
                                <li><a href="<?=base_url('delete-secretaria')?>/<?=$row->id?>" class="ls-ico-remove ls-color-danger" title="Excluir">Excluir</a></li>
                            </ul>
                        </div>

                    </td>
				</tr>
            	<?php endforeach;?>
            </table>
            <hr>
            <a href="<?=base_url('create-secretaria')?>" class="ls-ico-plus ls-btn	">Adcionar uma secretária</a>
        </div>
    </div>
</div> 