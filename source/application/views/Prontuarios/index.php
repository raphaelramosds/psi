<style>
	.ls-table a{margin-left: 10px;}
</style>

<div class="ls-main">
	<div class="container-fluid">
	<div class="ls-box ls-board-box">
	<header class="ls-info-header">
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
	<?php
		if (isset($delete)){
			echo "<div class='ls-alert-success'>$delete</div>";
		}
		if (isset($dependence)) {
			echo "<div class='ls-alert-danger'>$dependece</div>";
		}
	 ?>
	<table class="ls-table">
		<tr>
			<th>Número da ficha</th>
			<th>Clínica</th>
			<th>Cid 10</th>
			<th>Encaminhado</th>
			<th>Alta</th>
			<th></th>
		</tr>
		<?php foreach ($dataprontuarios as $value): ?>
			<tr>
				<td>
					<?php echo $value->numeroprontuario ?>
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
					<?php echo $value->cid10 ?>
				</td>
				<td>
					<?php echo $value->encaminhado ?>
				</td>
				<td>
					<?php echo $value->alta ?>
				</td>
				<td class="ls-text-center">
					<?php
						echo "<div data-ls-module='dropdown' class='ls-dropdown'>";
							echo "<a href='#' class='ls-btn'>Ação</a>";
							echo "<ul class='ls-dropdown-nav'>";
								echo "<li><a href='".base_url()."prontuarioscontroller/delete/$value->numeroprontuario' class='ls-ico-remove' title='Excluir'>Excluir ficha</a></li>";
								echo "<li><a href='".base_url()."sessoescontroller/index/$value->numeroprontuario' class='ls-ico-docs' title='Ver sessões'>Sessões</a></li>";
								echo "<li><a href='".base_url()."prontuarioscontroller/edit/$value->numeroprontuario' class='ls-ico-search' title='Detalhar'>Ver informações</a></li>";
							echo "</ul>";
						echo "</div>";
					?>
				</td>
			</tr>
		<?php endforeach; ?>
	 </table>
	 <?php  echo "<a href='".base_url()."prontuarioscontroller/create/".$dataprontuarios[0]->paciente_id."' class='ls-btn'>Adcionar nova ficha</a>";?>
	 <?php  echo "<a href='".base_url()."pacientescontroller' class='ls-btn-danger'>Voltar</a> " ?>
	</div>
	</div>
</div>
