<style>
	.ls-table a{margin-left: 10px;}
</style>

	<div class="ls-main">
		<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
			<header class="ls-info-header ls-no-border">
				<h2 class="ls-title-3 ls-ico-folder">
					Prontuário de
					<b>
					<?php
						$this->db->select('nomepaciente');
						$this->db->from('paciente');
						$this->db->where('idpaciente = '.$dataprontuarios[0]->paciente_id);
						$this->db->order_by("nomepaciente", "asc");
						$result = $this->db->get()->result();
						echo $result[0]->nomepaciente;
					?>
					</b>
				</h2>
			</header>
			<table class="ls-table">
				<tr>
					<th>Número da ficha</th>
					<th>Clínica</th>
					<th>CID10/DSM</th>
					<th>Encaminhado</th>
					<th>Alta</th>
					<th></th>
				</tr>
				<?php foreach ($dataprontuarios as $value): ?>
					<tr>
						<td>
							<?=$value->numeroprontuario ?>
						</td>
						<td>
							<?php
								$this->db->select('nomeclinica');
								$this->db->from('clinica');
								$this->db->where('idclinica = '.$value->clinica_id);
								$this->db->order_by("nomeclinica", "asc");
								$query = $this->db->get()->result();
								echo $query[0]->nomeclinica;
							?>
						</td>
						<td>
							<?=$value->cid10 ?>
						</td>
						<td>
							<?=$value->encaminhado ?>
						</td>
						<td>
							<?=$value->alta ?>
						</td>
						<td class="ls-text-center">
							<div data-ls-module='dropdown' class='ls-dropdown'>
								<a href='#' class='ls-btn'>Ação</a>
								<ul class="ls-dropdown-nav">
									<li><a href="<?=base_url()?>SessoesController/index/<?=$value->numeroprontuario?>" class='ls-ico-docs ls-color-black ls-no-bghover' title='Ver sessões'>Ver sessões</a></li>
									<li><a href="<?=base_url()?>ProntuariosController/edit/<?=$value->numeroprontuario?>" class='ls-ico-search ls-color-black ls-no-bghover' title='Detalhar'>Ver informações</a></li>		
									<li><a href="<?=base_url()?>ProntuariosController/delete/<?=$value->numeroprontuario?>" class='ls-ico-remove ls-color-danger' title='Excluir'>Excluir</a></li>									
								</ul>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			 </table>
			 <a href="<?=base_url()?>ProntuariosController/create/<?=$dataprontuarios[0]->paciente_id?>" class='ls-btn'> Adcionar nova ficha</a>
			 <a href="<?=base_url()?>PacientesController" class="ls-btn-danger">Voltar</a>
		</div>
	</div>
</div>
