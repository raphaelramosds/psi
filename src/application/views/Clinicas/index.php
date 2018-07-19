<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
			<header class="ls-info-header ls-no-border">
				<h2 class="ls-title-3 ls-ico-location">Clínicas cadastradas</h2>
			</header>
			
			<?php if(isset($add_clinica)):?>
				<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$add_clinica?></div>
			<?php elseif(isset($delete_clinica)):?>
				<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$delete_clinica?></div>
			<?php elseif(isset($update_clinica)):?>
				<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'><?=$update_clinica?></div>
			<?php endif;?>

			<form  action="<?=base_url()?>ClinicasController/search" class="ls-form ls-form-inline" method="POST">
				<label class="ls-label" role="search">
					<input type="text" id="q" name="clinica" aria-label="Faça sua busca pela clínica" placeholder="Nome da clínica" required="" class="ls-field">
				</label>
				<input type="submit" value="Buscar" class="ls-btn" title="Buscar">
				<a href="<?=base_url()?>create-clinica" class="ls-ico-plus ls-btn">Adcionar uma clínica</a>
			</form>
			<table class="ls-table">
				<tr>
					<th>Nome</th>
					<th>Telefone</th>
					<th>Estado</th>
					<th>Cidade</th>
					<th class="ls-txt-center"></th>
				</tr>
				<?php foreach ($dataclinica as $value): ?>
				<tr>
					<td><?=$value->nomeclinica?></td>
					<td><?=$value->telefone?></td>
					<td><?=$value->estado?></td>
					<td><?=$value->cidade?></td>
					<td class="ls-txt-left">
						<div data-ls-module='dropdown' class='ls-dropdown'>
							<a href="$" class="ls-btn">Ação</a>
							<ul class="ls-dropdown-nav">
								<li><a href="<?=base_url()?>update-clinica/<?=$value->idclinica?>" class='ls-ico-pencil ls-color-black ls-no-bghover' title='Editar'>Editar</a></li>
								<li><a href="<?=base_url()?>delete-clinica/<?=$value->idclinica?>" class='ls-ico-remove ls-color-danger' title='Excluir'>Excluir</a></li>								
							</ul>
						</div>
					</td>
				</tr>
				<?php endforeach ?>
			</table>
			<div class="ls-pagination-filter">
				<?php if(isset($pagination)): ?>
				<?=$pagination?>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
