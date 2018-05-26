<style>
	.ls-table a{margin-left: 10px;}
</style>
<div class="ls-main">
	<div class="container-fluid">
	<div class="ls-box ls-board-box">
	<header class="ls-info-header">
		<h2 class="ls-title-3 ls-ico-accessibility">Pacientes cadastrados</h2>
	</header>
	<?php
		if (isset($delete)) {
			echo "<div class='ls-alert-success'><strong>Sucesso</strong> Paciente deletado </div>";
		}
		if (isset($add)) {
			echo "<div class='ls-alert-success'><strong>Sucesso</strong> Ficha adcionada </div>";
		}
		if (isset($edit)) {
			echo "<div class='ls-alert-success'><strong>Sucesso</strong> Ficha atualizada </div>";
		}
	 ?>
	<form  action="<?=base_url()?>pacientescontroller/search" class="ls-form ls-form-inline" method="POST">
		 <label class="ls-label" role="search">
			 <input type="text" id="q" name="paciente" aria-label="Faça sua busca pelo paciente" placeholder="Nome do paciente" required="" class="ls-field">
		 </label>
			<input type="submit" value="Buscar" class="ls-btn" title="Buscar">
				<a href="<?=base_url()?>pacientescontroller/create" class="ls-ico-plus ls-btn	">Adcionar um paciente</a>
	 </form>
	<table class="ls-table">
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Telefone</th>
			<th>Profissão</th>
			<th>Sexo</th>
			<th>Cartão de Saúde</th>
			<th>Numeros SUS</th>
			<th></th>
		</tr>
		<?php foreach ($datapacientes as $value): ?>
			<?php
				$this->db->from('prontuario, paciente');
				$this->db->where('prontuario.paciente_id = '.$value->idpaciente);
				$paciente_prontuario = $this->db->get()->result();
			 ?>
			 <tr>
			 	<td><?=$value->nomepaciente?></td>
			 	<td><?=$value->emailpaciente?></td>
			 	<td><?=$value->telefonepaciente?></td>
			 	<td><?=$value->profissao?></td>
			 	<td><?=$value->sexopaciente?></td>

			 	<td>
				 	<?php if($value->cartaosaude == 0):?>
						<?="Não registrado"?>
					<?php else:?>
						<?=$value->cartaosaude?>
					<?php endif;?>
				 </td>

			 	<td>
				 	<?php if($value->numerosus == 0):?>
					 	<?="Não registrado"?>
					 <?php else:?>
					 	<?=$value->numerosus?>
					 <?php endif;?>
				 </td>
			 	<td class='ls-txt-left'>
			 		<div data-ls-module='dropdown' class='ls-dropdown'>
						<a href='#' class='ls-btn'>Ação</a>
						<ul class='ls-dropdown-nav'>

							<li>
								<a href="<?=base_url()?>pacientescontroller/edit/<?=$value->idpaciente?>" class='ls-ico-pencil ' title='Editar'>Editar</a>
							</li>
							<li>
								<?php if (count($paciente_prontuario) > 0): ?>
									<a href="<?=base_url()?>prontuarioscontroller/index/<?=$value->idpaciente?>" class='ls-ico-search' title='Ver prontuário'>Ver prontuário</a>
								<?php else: ?>
									<a href="<?=base_url()?>prontuarioscontroller/create/<?=$value->idpaciente?>" class='ls-ico-plus' title='Adcionar prontuário'>Adcionar prontuário</a>
								<?php endif ?>
							</li>
							<li>
								<a href="<?=base_url()?>pacientescontroller/delete/<?=$value->idpaciente?>" class='ls-ico-remove ls-color-danger' title='Excluir'>Excluir</a>
							</li>
						</ul>
					</div>
			 	</td>
			 </tr>
		<?php endforeach ?>
	 </table>
	 <div class="ls-pagination-filter">
	 	<?php
			echo $pagination;
		?>
	 </div>
	</div>
	</div>
</div>
