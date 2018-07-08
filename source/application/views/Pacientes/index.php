<style>
	.ls-table a{margin-left: 10px;}
</style>
<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
			<header class="ls-info-header ls-no-border" >
			<h2 class="ls-title-3 ls-ico-accessibility">Pacientes cadastrados</h2>
			</header>
			<?php
			if (isset($delete)) {
				echo "<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'>Deletado com sucesso! </div>";
			}
			if (isset($add)) {
				echo "<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'>Ficha adcionada </div>";
			}
			if (isset($update_prontuario)) {
				echo "<div class='ls-background-primary ls-sm-space ls-sm-margin-bottom ls-text-md ls-ico-checkmark'>Ficha atualizada </div>";
			}
			if (isset($update_paciente)){
				echo $update_paciente;
			}
			?>
			<form  action="<?=base_url()?>PacientesController/search" class="ls-form ls-form-inline" method="POST">
				<label class="ls-label" role="search">
					<input type="text" id="q" name="paciente" aria-label="Faça sua busca pelo paciente" placeholder="Nome do paciente" required="" class="ls-field">
				</label>
				<input type="submit" value="Buscar" class="ls-btn" title="Buscar">
					<a href="<?=base_url()?>PacientesController/create" class="ls-ico-plus ls-btn	">Adcionar um paciente</a>
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
								<li><a href="<?=base_url()?>PacientesController/edit/<?=$value->idpaciente?>" class='ls-ico-pencil ls-color-black ls-no-bghover' title='Editar'>Editar</a></li>
								<li>
									<?php if (count($paciente_prontuario) > 0): ?>
										<a href="<?=base_url()?>ProntuariosController/index/<?=$value->idpaciente?>" class='ls-ico-search ls-color-black ls-no-bghover' title='Ver prontuário'>Ver prontuário</a>
									<?php else: ?>
										
										<a  class='ls-ico-plus ls-color-black ls-no-bghover ls-cursor-pointer' title='Adcionar prontuário' data-ls-module="modal" data-target="#prontuario" onClick="paciente(<?=$value->idpaciente?>)">Adcionar prontuário</a>
									<?php endif ?>
								</li>
								<li><a href="<?=base_url()?>PacientesController/delete/<?=$value->idpaciente?>" class='ls-ico-remove ls-color-danger' title='Excluir'>Excluir</a></li>
							</ul>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
			</table>
			<div class="ls-pagination-filter">
			<?=$pagination?>
			</div>
		</div>
	</div>
</div>




<!-- Modal div: -->
<div class="ls-modal" id="prontuario">
  <div class="ls-modal-box ls-sm-space">
    <div class="ls-modal-header">
		<button data-dismiss="modal">&times;</button>
      	<h4 class="ls-modal-title">Cadastrar nova ficha</h4>
    </div>

    <div class="ls-modal-body" id="myModalBody">
      <form action="<?=base_url()?>ProntuariosController/add" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
			<!-- Clínica -->
			<label for="clinica" class="ls-label">
				<b class="ls-label-text">Clínica</b>
				<p class="ls-label-info">Nome da clínica</p>
				<div class="ls-custom-select">
					<select class="ls-select" name="clinicaid">
						<option value=""></option>
						<?php foreach ($clinicas as $value):?>
							<option value="<?=$value->idclinica?>"><?=$value->nomeclinica?></option>
						<?php endforeach;?>
					</select>
				</div>
			</label>

			<!-- Cid 10 -->
			<label for="" class="ls-label">
				<b class="ls-label-text">CID10/DSM</b>
				<p class="ls-label-info">Identifique a doença</p>
				<input type="text" name="cid10" required="required">
			</label>

			<!-- Alta -->
			<label for="" class="ls-label">
				<b class="ls-label-text">Alta</b>
				<div class="ls-custom-select">
					<select class="ls-select" name="alta" required="required">
						<option value="S">Sim</option>
						<option value="N">Não</option>
					</select>
				</div>
			</label>

			<!-- Encaminhado -->
			
			<label for="" class="ls-label">
				<b class="ls-label-text">Encaminhado</b>
				<div class="ls-custom-select">
					<select class="ls-select" name="encaminhado" required="required">
						<option value="S">Sim</option>
						<option value="N">Não</option>
					</select>
				</div>
			</label>

			<!-- Tratamento -->
			<label class="ls-label">
			    <b class="ls-label-text">Tratamento adotado</b>
			    <textarea rows="10" name="tratamentoadotado" required="required"></textarea>
		  	</label>

			<label class="ls-label">
			    <b class="ls-label-text">Diagnóstico</b>
			    <textarea rows="10" name="diagnostico" required="required"></textarea>
		  	</label>

		  	<label class="ls-label">
			    <b class="ls-label-text">Evolução</b>
			    <textarea rows="10" name="evolucao" required="required"></textarea>
		  	</label>
			<!-- id do psicologo -->
			<input type="hidden" name="id_psicologo" required="required" value="<?=$psicologo?>">
			<input type="hidden" name="paciente_id" required="required" id="paciente_id" value="">
			<script>
				function paciente(idpaciente){
					document.getElementById('paciente_id').value = idpaciente;
				}
			</script>
			<button type="submit" class="ls-btn">Salvar ficha</button>
	  </form>
    </div>
  </div>
</div>