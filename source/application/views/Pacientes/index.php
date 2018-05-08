<style>
	.ls-table a{margin-left: 10px;}
</style>
<div class="ls-main">
	<?php
		if (isset($delete)) {
			echo "<div class='ls-alert-success'>$delete</div>";
		}

	 ?>
	<div class="ls-box ls-board-box">
	<header class="ls-info-header">
		<h2 class="ls-title-3 ls-ico-accessibility">Pacientes cadastrados</h2>
	</header>
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
		<?php
			foreach ($datapacientes as $value) {
				$this->db->from('prontuario, paciente');
				$this->db->where('prontuario.paciente_id = '.$value->idpaciente);
				$paciente_prontuario = $this->db->get()->result();
				echo "<tr>";
					echo "<td>".$value->nomepaciente.'</td>';
					echo "<td>".$value->emailpaciente.'</td>';
					echo "<td>".$value->telefonepaciente.'</td>';
					echo "<td>".$value->profissao.'</td>';
					echo "<td>".$value->sexopaciente.'</td>';
					echo "<td>".$value->cartaosaude.'</td>';
					echo "<td>".$value->numerosus.'</td>';
					echo "<td class='ls-txt-left'>";
						echo "<div data-ls-module='dropdown' class='ls-dropdown'>";
							echo "<a href='#' class='ls-btn'>Ação</a>";
							echo "<ul class='ls-dropdown-nav'>";
								echo "<li><a href='".base_url()."pacientescontroller/delete/$value->idpaciente' class='ls-ico-remove' title='Excluir'>Excluir</a></li>";
								echo "<li><a href='".base_url()."pacientescontroller/edit/$value->idpaciente' class='ls-ico-pencil' title='Editar'>Editar</a></li>";
								echo "<li>";
										if (count($paciente_prontuario) > 0) {
											echo "<a href='".base_url()."prontuarioscontroller/index/$value->idpaciente' class='ls-ico-search' title='Ver prontuário'>Ver prontuário</a>";
										} else{
											echo "<a href='".base_url()."prontuarioscontroller/create/$value->idpaciente' class='ls-ico-plus' title='Adcionar prontuário'>Adcionar prontuário</a>";
										}
								echo "</li>";
							echo "</ul>";
						echo "</div>";
						//Verificar se existe um prontuário pelo id do paciente
					echo "</td>";
				echo "</tr>";
			}
	 	?>
	 </table>
	 <div class="ls-pagination-filter">
	 	<?php
			echo $pagination;
		?>
	 </div>
	</div>
</div>
