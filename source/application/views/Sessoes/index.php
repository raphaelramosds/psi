<style>
	.ls-table a{margin-left: 10px;}
</style>
<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
		<header class="ls-info-header ls-no-border">
			<h2 class="ls-title-3 ls-ico-stats">Sessões cadastradas</h2>
		</header>
		<table class="ls-table">
			<tr><!--
				<th>Id</th> -->
				<th>Título</th>
				<th>Data</th>
				<th>Descricao</th>
				<th class="ls-txt-center">Ação</th>
			</tr>
			<?php foreach ($datasessoes as $value): ?>
				<tr>
					<td><?=$value->titulo?></td>
					<td><?=$value->data?></td>
					<td><?=$value->descricao?></td>
					<td class='ls-txt-center'>
						<a href="<?=base_url()?>SessoesController/delete/<?=$value->idsessao?>" class='ls-ico-remove ls-btn-danger' title='Excluir'>Excluir</a>
						<a href="<?=base_url()?>SessoesController/edit/<?=$value->idsessao?>" class='ls-ico-remove ls-btn' title='Editar'>Editar</a>
					</td>
				</tr>
			<?php endforeach ?>
		 </table>
		 <a href="<?=base_url()?>SessoesController/create" class="ls-ico-plus ls-btn">Adcionar um sessão</a>
		 <a href="<?=base_url()?>ProntuariosController/view" class="ls-btn-danger">Voltar</a>
		</div>
</div>
</div>
