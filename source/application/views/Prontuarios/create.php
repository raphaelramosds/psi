<div class="ls-main">
	<div class="container-fluid">
<div class="ls-box ls-board-box ls-no-border">
	<header class="ls-info-header ls-no-border">
		<h2 class="ls-title-3">Registre uma nova ficha</h2>
	</header>
	<form action="<?=base_url()?>ProntuariosController/add" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
		<fieldset>
			<!-- <label for="" class="ls-label col-md-12">
				<b class="ls-label-text">Número do prontuário</b>
				<p class="ls-label-info">Apenas existe um</p>
			</label> -->
			<input type="hidden" name="numeroprontuario">
			<label for="" class="ls-label col-md-4 col-xs-12">
				<b class="ls-label-text">Clínica</b>
				<p class="ls-label-info">Nome da clínica</p>
				<!-- <input type="number" name="clinicaid" required="required"> -->
				<div class="ls-custom-select">
					<select class="ls-select" name="clinicaid">
						<option value=""></option>
						<?php
							foreach ($clinicas as $value) {
								echo "<option value='$value->idclinica'>";
									echo $value->nomeclinica;
								echo "</option>";
							}
						 ?>
					</select>
				</div>
			</label>

			<label for="" class="ls-label col-md-4 col-xs-12">
				<b class="ls-label-text">Paciente</b>
				<p class="ls-label-info">Nome do paciente</p>
				<!-- <input type="number" name="paciente_id" required="required"> -->
				<div class="ls-custom-select">
					<select class="ls-select" name="paciente_id">
						<option value="<?php echo $paciente; ?>">
							<?php
								$this->db->select('nomepaciente');
								$this->db->from('paciente');
								$this->db->where('paciente.idpaciente = '.$paciente);
								$nomepaciente = $this->db->get()->result();
								echo $nomepaciente[0]->nomepaciente;
							?>
						</option>
					</select>
				</div>
			</label>
			<label for="" class="ls-label col-md-4 col-xs-12">
				<b class="ls-label-text">CID10/DSM</b>
				<p class="ls-label-info">Identifique a doença</p>
				<input type="text" name="cid10" required="required">
			</label>

			<label for="" class="ls-label col-md-6 col-xs-12">
				<b class="ls-label-text">Alta</b>
				<div class="ls-custom-select">
					<select class="ls-select" name="alta" required="required">
						<option value="S">Sim</option>
						<option value="N">Não</option>
					</select>
				</div>
			</label>

			<label for="" class="ls-label col-md-6 col-xs-12">
				<b class="ls-label-text">Encaminhado</b>
				<div class="ls-custom-select">
					<select class="ls-select" name="encaminhado" required="required">
						<option value="S">Sim</option>
						<option value="N">Não</option>
					</select>
				</div>
			</label>

		  	<label class="ls-label col-md-4">
			    <b class="ls-label-text">Tratamento adotado</b>
			    <textarea rows="10" name="tratamentoadotado" required="required"></textarea>
		  	</label>

		  	<label class="ls-label col-md-4">
			    <b class="ls-label-text">Diagnóstico</b>
			    <textarea rows="10" name="diagnostico" required="required"></textarea>
		  	</label>
		  	<label class="ls-label col-md-4">
			    <b class="ls-label-text">Evolucao</b>
			    <textarea rows="10" name="evolucao" required="required"></textarea>
		  	</label>
				<input type="hidden" name="id_psicologo" required="required" value="<?php echo $psicologo; ?>">
		</fieldset>
		<button type="submit" class="ls-btn">Salvar todos os dados</button>
		<a href="<?=base_url()?>PacientesController" class="ls-btn-danger">Voltar</a>
	</form>
	</div>
	</div>
</div>
