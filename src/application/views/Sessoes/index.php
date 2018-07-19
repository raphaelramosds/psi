<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
		<header class="ls-info-header ls-no-border">
			<h2 class="ls-title-3 ls-ico-stats">Sessões cadastradas</h2>
		</header>
		<?php if(isset($add_sessao)):?>
			<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$add_sessao?></div>
			<?php elseif(isset($delete_sessao)):?>
			<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$delete_sessao?></div>
			<?php elseif(isset($update_sessao)):?>
			<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$update_sessao?></div>
			<?php endif;?>
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
						<a href="<?=base_url()?>delete-sessao/<?=$value->idsessao?>" class='ls-ico-remove ls-btn-danger' title='Excluir'>Excluir</a>
						<a href="<?=base_url()?>update-sessao/<?=$value->idsessao?>" class='ls-ico-search ls-btn' title='Editar'>Ver/Editar</a>
					</td>
				</tr>
			<?php endforeach ?>
		 </table>
		 <a href="<?=base_url()?>create-sessao" class="ls-btn">Adcionar um sessão</a>
		 <a href="<?=base_url()?>view-prontuario" class="ls-btn-danger">Voltar</a>
		</div>
	</div>
</div>