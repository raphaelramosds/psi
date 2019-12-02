<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-pencil">Sessões cadastradas</h1>
		<div class="ls-box ls-board-box ls-no-border">

		<form  action="<?=base_url('Sessoes/search')?>" class="ls-form ls-form-inline" method="POST">
			<label class="ls-label" role="search">
				<b class="ls-label-text">Filtrar sessões pelo mês:</b>
				<input type="month" name="mes" required="" class="ls-field">
			</label>
			<input type="submit" value="Buscar" class="ls-btn" title="Buscar">
		</form>
		
		<?php if(isset($add_sessao)):?>
			<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$add_sessao?></div>
		<?php elseif(isset($delete_sessao)):?>
			<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$delete_sessao?></div>
		<?php elseif(isset($update_sessao)):?>
			<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$update_sessao?></div>
		<?php endif;?>

		
		<?php if($datasessoes == NULL):?>
			<div class="ls-alert-info">
            Não há nada aqui
         	</div>
		<?php else:?>

		<table class="ls-table ls-table-striped">
			<tr>
				<th>Título</th>
				<th>Descrição</th>
				<th>Data</th>
				<th class="ls-txt-center">Ação</th>
			</tr>
			<?php foreach ($datasessoes as $value): ?>
				<tr>
					<td><?=$value->titulo?></td>
					<td style="overflow: hidden;text-overflow: ellipsis; white-space: nowrap;"><?=$value->descricao?></td>
					<td><?php
							$date = new DateTime($value->data);
							echo $date->format('d/m/Y')
						?></td>
					<td class='ls-txt-center'>
						<a href="<?=base_url()?>delete-sessao/<?=$value->id?>" class='ls-ico-remove ls-btn-danger' title='Excluir'>Excluir</a>
						<a href="<?=base_url()?>update-sessao/<?=$value->id?>" class='ls-ico-search ls-btn' title='Editar'>Ver/Editar</a>
					</td>
				</tr>
			<?php endforeach ?>
		 </table>
		<?php endif;?>

		 <a href="<?=base_url()?>create-sessao" class="ls-btn">Adcionar um sessão</a>
		 <a href="<?=base_url()?>view-prontuario" class="ls-btn-danger">Voltar</a>
		</div>
	</div>
</div>