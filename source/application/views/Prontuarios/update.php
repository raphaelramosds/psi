<div class="ls-main">
<div class="container-fluid">
	<div class="ls-box ls-board-box">
	<header class="ls-info-header">
		<h2 class="ls-title-3 ls-ico-search">Detalhes</h2>
	</header>
	<form action="<?=base_url()?>prontuarioscontroller/update" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
		<fieldset>
<!-- 			<label for="" class="ls-label col-md-12">
				<b class="ls-label-text">Número do prontuário</b>
				<p class="ls-label-info">Apenas existe um</p>
				<input type="number" name="numeroprontuario" value="<?php echo $prontuarios->numeroprontuario ?>">
			</label> -->

			<label for="" class="ls-label col-md-4 col-xs-12">
				<b class="ls-label-text">Clínica</b>
				<!-- <input type="number" name="clinicaid" required="required" value="<?php echo $prontuarios->clinica_id; ?>"> -->
				<div class="ls-custom-select">
					<select class="ls-custom" name="clinicaid">
						<option value="<?php echo $prontuarios->clinica_id ?>">
							<?php
								$idclinica = $prontuarios->clinica_id;
								$this->db->select('nomeclinica');
								$this->db->from('clinica');
								$this->db->where('clinica.idclinica = '.$idclinica);
								$nome = $this->db->get()->result();
								foreach ($nome as $value) {
									echo $value->nomeclinica;
								}
							?>
						</option>
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
				<!-- <input type="number" name="paciente_id" required="required" value="<?php echo $prontuarios->paciente_id;?>"> -->
				<div class="ls-custom-select">
					<select class="ls-custom" name="paciente_id">
						<option value="<?php echo $prontuarios->paciente_id ?>">
							<?php
								$idpaciente = $prontuarios->paciente_id;
								$this->db->select('nomepaciente');
								$this->db->from('paciente');
								$this->db->where('paciente.idpaciente = '.$idpaciente);
								$nome = $this->db->get()->result();
								foreach ($nome as $value) {
									echo $value->nomepaciente;
								}
							 ?>
						 </option>
						 <?php
						 		foreach ($pacientes as $value) {
						 			echo "<option value='$value->idpaciente'>";
										echo $value->nomepaciente;
									echo "</option>";
						 		}
						  ?>
					</select>
				</div>

			</label>

			<label for="" class="ls-label col-md-4 col-xs-12">
				<b class="ls-label-text">Cid 10</b>
				<p class="ls-label-info">Identifique a doença</p>
				<input type="text" name="cid10" required="required" value="<?php echo $prontuarios->cid10; ?>">
			</label>

			<label for="" class="ls-label col-md-4 col-xs-12">
				<b class="ls-label-text">Alta</b>
				<div class="ls-custom-select">
					<select class="ls-select" name="alta" required="required">
						<option value="<?php echo $prontuarios->alta; ?>">
							<?php if ($prontuarios->alta == 'S') {
								 echo "Sim";
							}else{echo "Não"; } ?>
						</option>
						<option value="S">Sim</option>
						<option value="N">Não</option>
					</select>
				</div>
			</label>

			<label for="" class="ls-label col-md-4 col-xs-12">
				<b class="ls-label-text">Encaminhado</b>
				<div class="ls-custom-select">
					<select class="ls-select" name="encaminhado" required="required">
						<option value="<?php echo $prontuarios->encaminhado; ?>">
							<?php if ($prontuarios->encaminhado == 'S') {
								 echo "Sim";
							}else{echo "Não"; } ?>
						</option>
						<option value="S">Sim</option>
						<option value="N">Não</option>
					</select>
				</div>
			</label>

		  	<label class="ls-label col-md-12">
			    <b class="ls-label-text">Tratamento adotado</b>
			    <textarea rows="10" name="tratamentoadotado" required="required">
			    	<?php print($prontuarios->tratamentoadotado)?>
			    </textarea>
		  	</label>
		  	<label class="ls-label col-md-12">
			    <b class="ls-label-text">Diagnóstico</b>
			    <textarea rows="10" name="diagnostico" required="required">
			    	<?php print($prontuarios->diagnostico)?>
			    </textarea>
		  	</label>
		  	<label class="ls-label col-md-12">
			    <b class="ls-label-text">Evolucao</b>
			    <textarea rows="10" name="evolucao" required="required">
			    	<?php print($prontuarios->evolucao)?>
			    </textarea>
		  	</label>
		</fieldset>

		<input type="hidden" name="id_psicologo" required="required" value='<?php echo $prontuarios->id_psicologo;?>'>
		<input type="hidden" name="numeroprontuario" value="<?php echo $prontuarios->numeroprontuario ?>">
		<button type="submit" class="ls-btn">Salvar todos os dados</button>
		<a href="<?=base_url()?>prontuarioscontroller/view" class="ls-btn-danger">Voltar</a>

	</form>
	</div>	
</div>

</div>
